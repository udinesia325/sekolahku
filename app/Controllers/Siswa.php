<?php
namespace App\Controllers;

use \App\Controllers\BaseController;
use \App\Models\ {
  siswaModel,
  KelasModel
};
class Siswa extends BaseController {
  protected $siswaModel;
  protected $kelasModel;
  public function __construct() {
    $this->siswaModel = new siswaModel();
    $this->kelasModel = new KelasModel();
  }
  public function index() {
    $key = $this->request->getVar('keyword');
    if ($key) {
      $siswa = $this->siswaModel->search($key);
    } else {
      $siswa = $this->siswaModel;
    }
    $data = [
      'title' => 'Data - Siswa',
      'siswa' => $siswa->paginate(5),
      'pager' => $this->siswaModel->pager,
      'validation' => \Config\Services::validation()
    ];
    return view('siswa/index', $data);
  }

  public function create() {
    $data = [
      'title' => 'Tambah Siswa',
      'validation' => \Config\Services::validation(),
      'kelas' => $this->kelasModel->getKelas()
    ];

    return view('siswa/tambah', $data);
  }
  public function save() {
    if (!$this->validate([
      'nama' => [
        'rules' => 'required|alpha_space',
        'errors' => [
          'required' => '{field} Wajib Diisi !',
          'alpha_space' => 'Nama yang anda masukkan tidak benar !'
        ]
      ],
      'nisn' => 'required|numeric|min_length[6]|max_length[6]|is_unique[siswa.nisn]',
      'umur' => 'required|numeric|min_length[1]|max_length[2]',
      'kelas' => 'required|numeric|min_length[1]|max_length[2]',


    ])) {
      return redirect()->to('siswa/tambah')->withInput();
    } else {
      session()->setFlashData('pesan', 'Berhasil menambahkan siswa dengan nama '.$this->request->getPost('nama'));
      $this->siswaModel->save($this->request->getPost());
      return redirect()->to('siswa');
    }
  }

  public function edit($id = null) {
    if (is_null($id)) {
      return redirect()->to('/siswa');
    }
    $data = [
      'title' => 'Update Siswa',
      'validation' => \Config\Services::validation(),
      'siswa' => $this->siswaModel->getSiswa($id),
      'kelas' => $this->kelasModel->getKelas()
    ];

    return view('siswa/update', $data);

  }
  public function update($id) {
    if ($this->siswaModel->getSiswa($id)['nama'] == $this->request->getPost('nama')) {
      $nama_unique_rule = 'required';
    } else {
      $nama_unique_rule = 'required|is_unique[siswa.nama]';
    }
    if ($this->siswaModel->getSiswa($id)['nisn'] == $this->request->getPost('nisn')) {
      $nisn_unique_rule = 'required';
    } else {
      $nisn_unique_rule = 'required|is_unique[siswa.nisn]';
    }
    if (!$this->validate([
      'nama' => [
        'rules' => $nama_unique_rule.'|alpha_space',
        'errors' => [
          'required' => '{field} Wajib Diisi !',
          'alpha_space' => 'Nama yang anda masukkan tidak benar !'
        ]
      ],
      'nisn' => $nisn_unique_rule.'|numeric|min_length[6]|max_length[6]',
      'umur' => 'required|numeric|min_length[1]|max_length[2]',
      'kelas' => 'required|numeric|min_length[1]|max_length[2]',


    ])) {
      return redirect()->to('/siswa/edit/'.$id)->withInput();
    } else {
      $this->siswaModel->save(
        ['id' => $id,
          'nama' => $this->request->getPost('nama'),
          'nisn' => $this->request->getPost('nisn'),
          'umur' => $this->request->getPost('umur'),
          'kelas' => $this->request->getPost('kelas')]
      );

      session()->setFlashData('pesan', 'Data berhasil di ubah !');
      return redirect()->to('/siswa');
    }
  }
  public function delete($id) {
    session()->setFlashData('pesan', 'Berhasil Menghapus');
    $this->siswaModel->delete($id);
    return redirect()->to('siswa');
  }
  public function recycle() {
    $data = [
      "title" => "Recycle",
      "siswa" => $this->siswaModel->onlyDeleted()->findAll()
    ];
    return view("siswa/recycle", $data);
  }
  public function restore($id) {
    session()->setFlashData('pesan', "Berhasil Mengembalikan Data Siswa");
    $this->siswaModel->restore($id);
    return redirect()->to("/siswa/recycle");
  }
  public function permanen($id) {


    $this->siswaModel->deletePermanen($id);
    session()->setFlashData("pesan", "Berhasil Menghapus Secara Permanen");
    return redirect()->to("/siswa/recycle");
  }
}