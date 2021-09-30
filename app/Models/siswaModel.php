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
  protected $useSoftDeletes = true;

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
  public function restore($id) {
    return $this->db->query("update siswa set deleted_at = null where id =$id");
  }
  public function deletePermanen($id) {
    return $this->db->query("delete from siswa where id =$id");
  }
}