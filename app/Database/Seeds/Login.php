<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Login extends Seeder
{
  public function run() {
    $data = [
      'username' => 'fahruddin',
      'email' => 'udinesia325@gmail.com',
      'password' => password_hash('12345678', PASSWORD_DEFAULT)
    ];
    $this->db->table('login')->insert($data);
  }
}