<?php namespace App\Controllers;

class Profil extends BaseController
{
    public function index()
    {
        $data=[
        'title'=>"HIMA TELKOM PENS",
        'halaman'=>'profil'
      ];
        echo view("profil/index", $data);
    }

    //--------------------------------------------------------------------
}
