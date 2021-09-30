<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;
class Login extends BaseController
{
  protected $loginModel;
  public function __construct() {
    $this->loginModel = new LoginModel();
  }
  public function index() {

    $data = [
      'title' => 'Login',
      'valid' => \Config\Services::Validation()
    ];
    return view('login', $data);
  }
  public function login() {
    if (!$this->validate([
      'email' => 'required|valid_email',
      'password' => 'required|min_length[8]'
    ])) {
      return redirect()->to('/login')->withInput();
    }
    $post = $this->request->getPost();
    $data = $this->loginModel->getLogin($post['email']);
    if (empty($data)) {
      session()->setFlashData('pesan', 'username belum terdaftar');
      return redirect()->to('/login')->withInput();

    }
    if ($post['email'] == $data['email']) {
      if (password_verify($post['password'], $data['password'])) {
        session()->set('id', $data['id']);
        session()->set('username', $data['username']);
        return redirect()->to('/');
      } else {
        session()->setFlashData('pesan', 'password yang anda masukkan salah');
        return redirect()->to('/login')->withInput();

      }
    } else {
      session()->setFlashData('pesan', 'username tidak terdaftar');
      return redirect()->to('/login')->withInput();
    }

  }
  public function logout() {
    session()->remove('id');
    session()->remove('username');
    return redirect()->to('/login');
  }
  public function daftar() {
    $data = [
      "title" => "Daftar",
      "valid" => \Config\Services::Validation()
    ];
    return view("daftar", $data);
  }

  public function daftarProses() {
    if (!$this->validate([
      'username' => [
        "rules" => "required|min_length[3]|alpha_space|is_unique[login.username]",
        "errors" => [
          "alpha_space" => "Username tidak valid jangan gunakan simbol ataupun angka"
        ]
      ],
      'email' => 'required|valid_email|is_unique[login.email]',
      'password' => 'required|min_length[8]'
    ])) {
      return redirect()->to('/daftar')->withInput();
    }
    $post = $this->request->getPost();

    $this->loginModel->daftar($post["username"], strtolower($post["email"]), $post["password"]);
    session()->setFlashData("pesan", "Silahkan login dengan identitas yang anda gunakan saat mendaftar");
    return redirect()->to("login");
  }

}