<?php

namespace App\Controllers;
use \App\Models\ {
  siswaModel,
  KelasModel
};
class Home extends BaseController
{
  protected $siswaModel,
  $kelasModel;
  public function __construct() {
    $this->siswaModel = new siswaModel();
    $this->kelasModel = new KelasModel();
  }
  public function index() {
    $data = [
      "title" => 'Dashboard',
      'siswa' => $this->siswaModel,
      'kelas' => $this->kelasModel

    ];
    if (!session('username') && !session("id")) {
      return redirect()->to('/login');
    }
    return view('dashboard', $data);
  }
}