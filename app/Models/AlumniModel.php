<?php

namespace App\Models;

use CodeIgniter\Model;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class AlumniModel extends Model
{
    protected $useTimestamps = true;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getTahunMasuk()
    {
        return $this->db->query("SELECT COUNT(nama), masuk FROM pendaftaran GROUP BY masuk ORDER BY masuk DESC");
    }

    public function getAlumniLength($find)
    {
        return $this->db->query("select pendaftaran.*,kecamatan.nama as nama_kec, kabupaten.nama as nama_kab, provinsi.nama as nama_prov from pendaftaran, kabupaten, kecamatan, provinsi where pendaftaran.kecamatan=kecamatan.id_kec AND pendaftaran.kabupaten=kabupaten.id_kab AND pendaftaran.provinsi = provinsi.id_prov and $find");
    }

    public function getAlumni($page, $order, $find)
    {
        $start=15*($page-1);
        
        
        return $this->db->query("select pendaftaran.*,kecamatan.nama as nama_kec, kabupaten.nama as nama_kab, provinsi.nama as nama_prov from pendaftaran, kabupaten, kecamatan, provinsi where pendaftaran.kecamatan=kecamatan.id_kec AND pendaftaran.kabupaten=kabupaten.id_kab AND pendaftaran.provinsi = provinsi.id_prov and $find order by masuk $order limit $start,15");
    }
    public function getDetailAlumni($data)
    {
        return $this->db->query("select pendaftaran.*,kecamatan.nama as nama_kec,kecamatan.id_kec as id_kec, kabupaten.nama as nama_kab,kabupaten.id_kab as id_kab, provinsi.nama as nama_prov,provinsi.id_prov as id_prov from pendaftaran, kabupaten, kecamatan, provinsi where id_pendaftaran = '$data' AND pendaftaran.kecamatan=kecamatan.id_kec AND pendaftaran.kabupaten=kabupaten.id_kab AND pendaftaran.provinsi = provinsi.id_prov");
    }
    public function check_login($email, $password)
    {
        return $this->db->query("select * from pendaftaran where email = '$email' and masuk = '$password' and konfirmasi = 'Verified'");
    }
    public function getProvinsi()
    {
        return $this->db->query("select * from provinsi order by nama asc");
    }
    public function getKabupaten($prov)
    {
        return $this->db->query("select * from kabupaten where id_prov='$prov' order by nama asc");
    }
    public function getKecamatan($kab)
    {
        return $this->db->query("select * from kecamatan where id_kab='$kab' order by nama asc");
    }
    public function create_alumni($data)
    {
        return $this->db->table('pendaftaran')->insert($data);
    }
    public function verify_alumni($id,$data)
    {
        return $this->db->table('pendaftaran')->where('id_pendaftaran', $id)->update($data);
    }
}
