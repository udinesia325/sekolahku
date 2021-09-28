<?php

namespace App\Models;

use CodeIgniter\Model;

class siswaModel extends Model
{
  protected $table = 'siswa';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nama',
    'nisn',
    'umur',
    'kelas'];

  // Dates
  protected $useTimestamps = true;
  public function getSiswa($id = null) {
    if (is_null($id)) {
      return $this->findAll();
    }
    return $this->where(['id' => $id])->first();
  }
  public function search($keyword) {
    return $this->table('siswa')->like('nama', $keyword)->orLike('kelas', $keyword);
  }
  public function getCount() {
    return $this->table('siswa')->countAll();
  }
}