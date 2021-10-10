<?php namespace App\Controllers;
use \App\Models\BeritaModel;



class Home extends BaseController
{
  public function __construct()
  {
      $this->BeritaModel = new BeritaModel();
      $this->request = \Config\Services::request();
  }
    public function index()
    {
        $data=[
        'title'=>"HIMA TELKOM PENS",
        'halaman'=>'index',
        'kegiatan'=>$this->BeritaModel->getKegiatan()->getResultArray(),
        'berita'=> $this->BeritaModel->getBerita(1,"judul_berita LIKE '%%'")->getResultArray()
      ];
        echo view("home/index", $data);
    }

    //--------------------------------------------------------------------
}
