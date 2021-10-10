<?php

namespace App\Models;

use CodeIgniter\Model;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class KegiatanModel extends Model
{
    protected $useTimestamps = true;

    public function getKegiatan($page, $find)
    {
        $start=15*($page-1);


        //echo "select * from berita where $find order by id_berita desc limit $start,15";
        return $this->db->query("select * from kegiatan where $find order by id_kegiatan desc limit $start,15");
    }
    public function getDetailKegiatan($id)
    {
        return $this->db->query("select * from kegiatan where id_kegiatan = $id");
    }
    public function getAllKegiatan($find)
    {
        //echo "select pendaftaran.*,kecamatan.nama as nama_kec, kabupaten.nama as nama_kab, provinsi.nama as nama_prov from pendaftaran, kabupaten, kecamatan, provinsi where pendaftaran.kecamatan=kecamatan.id_kec AND pendaftaran.kabupaten=kabupaten.id_kab AND pendaftaran.provinsi = provinsi.id_prov and $find order by masuk $order limit $start,15";
        return $this->db->query("select * from kegiatan where $find");
    }
    public function update_kegiatan($id,$data)
    {
        return $this->db->table('kegiatan')->where('id_kegiatan', $id)->update($data);
    }
    public function delete_kegiatan($id)
    {
        return $this->db->table('kegiatan')->where('id_kegiatan', $id)->delete();
    }
    public function tambah_kegiatan($data)
    {
        return $this->db->table('kegiatan')->insert($data);
    }
}
