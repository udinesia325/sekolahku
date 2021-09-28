<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
  protected $table = 'kelas';
  protected $primaryKey = 'id_kelas';
  protected $allowedFields = ['kelas',
    'wali_kelas'];

  // Dates
  protected $useTimestamps = true;

  public function getKelas($kelas = null) {
    if (is_null($kelas)) {
      return $this->findAll();

    }
    return $this->where('kelas', $kelas)->first();
  }
  public function getCount() {
    return $this->table('kelas')->countAll();
  }
  public function getByKelas($kelas) {
    return $this->db->query("select * from siswa where kelas = '$kelas'")->getResultArray();
  }
}