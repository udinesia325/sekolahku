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

}