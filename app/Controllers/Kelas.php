<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
class Kelas extends BaseController
{
  protected $kelasModel;
  public function __construct() {
    $this->kelasModel = new kelasModel();
  }
  public function index() {
    $page = $this->request->getVar('page')?$this->request->getVar('page'):1;
    $data = [
      'title' => 'Data - Kelas',
      'kelas' => $this->kelasModel->paginate(5),
      'pager' => $this->kelasModel->pager,
      'currentPage' => $page
    ];
    return view('kelas/index', $data);
  }

  public function tambah() {
    $data = [
      'title' => 'Tambah Kelas',
      'validation' => \Config\Services::validation(),
      'kelas' => $this->kelasModel->getKelas()
    ];

    return view('kelas/tambah', $data);
  }
  public function save() {
    if (!$this->validate([
      'kelas' => [
        'rules' => 'required|numeric|is_unique[kelas.kelas]',
        'errors' => [
          'required' => '{field} Wajib Diisi !',

        ]
      ],
      'wali_kelas' => [
        'rules' => 'required|alpha_space|min_length[2]',
        'errors' => [
          'required' => 'Nama wali kelas wajib diisi',
          'min_length' => 'Nama Wali Kelas terlalu pendek'
        ]]

    ])) {
      return redirect()->to('kelas/tambah')->withInput();
    } else {
      session()->setFlashData('pesan', 'Berhasil menambahkan kelas baru! ');
      $this->kelasModel->save($this->request->getPost());
      return redirect()->to('kelas');
    }
  }

  public function edit($id = null) {
    if (is_null($id)) {
      return redirect()->to('/kelas');
    }
    $data = [
      'title' => 'Update kelas',
      'validation' => \Config\Services::validation(),
      'kelas' => $this->kelasModel->getKelas($id)
    ];
    return view('kelas/edit', $data);

  }
  public function update($kelas) {
    $dataKelas = $this->kelasModel->getKelas($kelas);
    if ($dataKelas['kelas'] == $this->request->getVar('kelas')) {
      $kelasRule = 'required';
    } else {
      $kelasRule = 'required|is_unique[kelas.kelas]';

    }

    if (!$this->validate([
      'kelas' => [
        'rules' => $kelasRule
      ],
      'wali_kelas' => [
        'rules' => 'required|alpha_space|min_length[2]',
        'errors' => [
          'alpha_space' => 'Nama tidak Valid'
        ]
      ]
    ])) {

      return redirect()->to('/kelas/edit/'.$kelas)->withInput();
    } else {
      $post = $this->request->getPost();
      session()->setFlashData('pesan', 'Data kelas berhasil di update!');
      $this->kelasModel->save([
        'id_kelas' => $post['id_kelas'],
        'kelas' => $post['kelas'],
        'wali_kelas' => $post['wali_kelas']
      ]);
      return redirect()->to('/kelas');

    }
  }
  public function delete($id) {
    session()->setFlashData('pesan', 'Berhasil Menghapus');
    $this->kelasModel->delete($id);
    return redirect()->to('kelas');
  }
  public function siswa($kelas) {
    $dataModel = $this->kelasModel->getByKelas($kelas);
    $data = [
      "title" => "Data Siswa kelas $kelas",
      "siswa" => $dataModel,
    ];
    return view("kelas/siswa", $data);
  }
}