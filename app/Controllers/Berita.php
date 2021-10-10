<?php
namespace App\Controllers;

use \App\Models\BeritaModel;

class Berita extends BaseController
{
    public function __construct()
    {
        $this->BeritaModel = new BeritaModel();
        $this->request = \Config\Services::request();
    }
    public function index($page)
    {
        $cari="";
        $category="";
        if ($this->request->getGet('d')!=null) {
            $cari="judul_berita LIKE '%".urldecode($this->request->getGet('d'))."%' or konten_berita LIKE '%".urldecode($this->request->getGet('d'))."%' and tampil = TRUE";
        } elseif ($this->request->getGet('c')!=null) {
            $cari="kategori_berita = '".urldecode($this->request->getGet('c'))."' and tampil = TRUE";
        } else {
            $cari="judul_berita LIKE '%%' and tampil = TRUE";
        }
        $data=[
        'berita'=> $this->BeritaModel->getBerita($page, $cari)->getResultArray(),
        'all_berita'=>$this->BeritaModel->getAllBerita($cari)->getResultArray(),
        'all_kegiatan'=>$this->BeritaModel->getKegiatan()->getResultArray(),
        'title'=>"Berita HIMA Telkom",
        'halaman'=>'berita',
        'current_page'=>$page
      ];
        echo view("berita/index", $data);
    }
    public function detail($id)
    {
        
        $data=[
        'data'=> $this->BeritaModel->getDetailBerita($id)->getRow(),
        'berita'=> $this->BeritaModel->getBerita(1, "judul_berita LIKE '%%' and tampil = TRUE")->getResultArray(),
        'title'=>"Berita HIMA Telkom",
        'halaman'=>'berita'
      ];
        echo view("berita/detail_berita", $data);
    }

    //--------------------------------------------------------------------
}
