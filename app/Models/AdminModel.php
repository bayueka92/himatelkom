<?php

namespace App\Models;

use CodeIgniter\Model;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class AdminModel extends Model
{
    protected $useTimestamps = true;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function check_login($email, $password)
    {
        echo "SELECT * FROM `admin` WHERE `email` = '$email' AND `password` = '$password'";
        return $this->db->query("SELECT * FROM `admin` WHERE `email` = '$email' AND `password` = '$password'");
    }
    public function getDetailAdmin($id)
    {
        //echo "select * from admin where id_admin = '$id'";
        return $this->db->query("select * from admin where id_admin = '$id'");
    }

}
