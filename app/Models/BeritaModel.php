<?php

namespace App\Models;

use CodeIgniter\Model;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class BeritaModel extends Model
{
    protected $useTimestamps = true;

    public function getBerita($page, $find)
    {
        $start=15*($page-1);


        //echo "select * from berita where $find order by id_berita desc limit $start,15";
        return $this->db->query("select * from berita where $find order by id_berita desc limit $start,15");
    }
    public function getDetailBerita($id)
    {
        return $this->db->query("select * from berita where id_berita = $id");
    }
    public function getAllBerita($find)
    {
        //echo "select pendaftaran.*,kecamatan.nama as nama_kec, kabupaten.nama as nama_kab, provinsi.nama as nama_prov from pendaftaran, kabupaten, kecamatan, provinsi where pendaftaran.kecamatan=kecamatan.id_kec AND pendaftaran.kabupaten=kabupaten.id_kab AND pendaftaran.provinsi = provinsi.id_prov and $find order by masuk $order limit $start,15";
        return $this->db->query("select * from berita where $find");
    }
    public function getKegiatan()
    {
        //echo "select pendaftaran.*,kecamatan.nama as nama_kec, kabupaten.nama as nama_kab, provinsi.nama as nama_prov from pendaftaran, kabupaten, kecamatan, provinsi where pendaftaran.kecamatan=kecamatan.id_kec AND pendaftaran.kabupaten=kabupaten.id_kab AND pendaftaran.provinsi = provinsi.id_prov and $find order by masuk $order limit $start,15";
        return $this->db->query("select * from kegiatan");
    }
    public function update_berita($id,$data)
    {
        return $this->db->table('berita')->where('id_berita', $id)->update($data);
    }
    public function tambah_berita($data)
    {
        return $this->db->table('berita')->insert($data);
    }
}
