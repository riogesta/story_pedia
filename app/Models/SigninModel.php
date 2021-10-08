<?php

namespace App\Models;

use CodeIgniter\Model;

class SigninModel extends Model
{
    protected $table = 'tb_user';
    protected $allowedFields = ['username','name','email','date_birth','password'];

    // check username is available on table
    public function checking($username)
    {
        // $query  = $this->db->query('SELECT username, password FROM tb_user');
        // return $query;

        return $query = $this->db->query("SELECT username, password FROM tb_user WHERE username='$username'");
    }

}