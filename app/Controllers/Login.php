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
}