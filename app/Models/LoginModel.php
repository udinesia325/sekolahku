<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
  protected $table = 'login';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $allowedFields = [];

  // Dates
  protected $useTimestamps = true;
  public function getLogin($email = null) {
    if (is_null($email)) {
      return [];
    }
    return $this->where('email', $email)->first();
  }
  public function daftar($username, $email, $password) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $this->db->query("INSERT INTO login (username ,email, password)
    VALUES ('$username','$email','$hashedPassword')");
  }
}