<?php

namespace App\Controllers;

use \App\Models\AlumniModel;

class Alumni extends BaseController
{
    public function __construct()
    {
        $this->AlumniModel = new AlumniModel();
        $this->request = \Config\Services::request();
    }

    public function login()
    {
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');
        $id = $this->request->getCookie('id');
        $key = $this->request->getCookie('key');
        $valid = $this->request->getCookie('valid');
        
        if ($id!=""&&$key!=""&&$valid=="1") {
            header("Location:/alumni/p/1?o=desc&d=null&v=0");//SINI
            exit;
        } else {
            if ($password!=""&&$email!="") {
                $check_result=$this->AlumniModel->check_login($email, $password)->getResultArray();
                if (sizeof($check_result)==1) {
                    setcookie('id', $this->AlumniModel->check_login($email, $password)->getRow()->id_pendaftaran, time()+3600);
                    $key=md5($this->AlumniModel->check_login($email, $password)->getRow()->id_pendaftaran."-".$this->AlumniModel->check_login($email, $password)->getRow()->nama."-".$this->AlumniModel->check_login($email, $password)->getRow()->no_telp);
                    $key=substr($key, 8, 5)."".substr($key, 5, 2);
                    setcookie('key', $key, time()+3600);
                    setcookie('valid', "1", time()+3600);
                    header("Location:/alumni/p/1?o=desc&d=null&v=0");
                    exit;
                } else {
                    $data = [
                        "title" => "Database Alumni",
                        "email" => $email,
                        "status" => "Mohon maaf, data yang anda inputkan tidak ditemukan pada database kami.<br>Mohon untuk dicek kembali atau hubungi email <b>himatelkom.pens@gmail.com</b> jika masih terdapat masalah.",
                        "password" => "",
                        'halaman'=>'alumni'
                    ];
                    echo view('alumni/login', $data);
                }
            } else {
                $data = [
                    "title" => "Database Alumni",
                    "email" => "",
                    "status" => "",
                    "password" => "",
                    'halaman'=>'alumni'
                ];
                echo view('alumni/login', $data);
            }
        }
    }

    

    public function index($page)
    {
        $id = $this->request->getCookie('id');
        $key = $this->request->getCookie('key');
        //echo "1<br>";
        if ($id!=""&& $key!="") {
            //echo "2<br>";
            $check_result=$this->AlumniModel->getDetailAlumni($id)->getResultArray();
            if (sizeof($check_result)==1) {
                //echo "3<br>";
                $key_index=md5($this->AlumniModel->getDetailAlumni($id)->getRow()->id_pendaftaran."-".$this->AlumniModel->getDetailAlumni($id)->getRow()->nama."-".$this->AlumniModel->getDetailAlumni($id)->getRow()->no_telp);
                $key_index=substr($key_index, 8, 5)."".substr($key_index, 5, 2);
                if ($key==$key_index) {
                    //echo "4<br>";
                    if (($this->request->getGet('o')=="desc"||$this->request->getGet('o')=="asc")&&($this->request->getGet('d')=="null"||$this->request->getGet('d')!="")&&($this->request->getGet('v')=="0"||$this->request->getGet('v')=="1"||$this->request->getGet('v')=="2"||$this->request->getGet('v')=="3")) {
                        //echo "5<br>";
                        $kolom="";
                        $cari="";
                        if ($this->request->getGet('d')!="null") {
                            $cari=urldecode($this->request->getGet('d'));
                        }
                        if ($this->request->getGet('v')==0) {
                            $kolom="nama";
                        } elseif ($this->request->getGet('v')==1) {
                            $kolom="masuk";
                        } elseif ($this->request->getGet('v')==2) {
                            $kolom="jurusan";
                        } elseif ($this->request->getGet('v')==3) {
                            $kolom="status";
                        }

                        $cari="pendaftaran.".$kolom." LIKE '%".$cari."%'";
                        $data = [
                            "title" => "Database Alumni",
                            "alumni" => $this->AlumniModel->getAlumni($page, $this->request->getGet('o'), $cari)->getResultArray(),
                            "alumni_size" => sizeof($this->AlumniModel->getAlumniLength($cari)->getResultArray()),
                            "current_page" => $page,
                            "tahun_masuk" =>$this->AlumniModel->getTahunMasuk()->getResultArray(),
                            'halaman'=>'alumni'
                        ];
                        
                        echo view('alumni/index', $data);
                    } else {
                        $data=[
                            "title"=>"Halaman Tidak Ditemukan",
                            'halaman'=>'alumni'
                        ];
                        echo view('not_found', $data);
                    }
                } else {
                    setcookie('valid', "", time()+3600);
                    $data = [
                        "title" => "Database Alumni",
                        "email" => "",
                        "status" => "Data yang anda inputkan tidak ditemukan pada database kami. <b>Mohon untuk dicek kembali!</b>",
                        "password" => "",
                        'halaman'=>'alumni'
                    ];
                    echo view('alumni/login', $data);
                }
            }
        } else {
            header("Location:/alumni/login");
            exit;
        }
    }

    public function showstatus($email, $status)
    {
        $data = [
            "title" => "Database Alumni",
            "email" => $email,
            "status" => $status,
            "password" => "",
            'halaman'=>'alumni'
        ];
        echo view('alumni/login', $data);
    }


    
    public function daftar()
    {
        function input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $status=false;
        $post_submit=false;
        if ($this->request->getPost('submit')!="") {
            $post_submit=true;
            $data_alumni=[
                'nrp'=>input($this->request->getPost("nrp")),
                'nama'=>input($this->request->getPost("nama")),
                'nick'=>input($this->request->getPost("nick")),
                'email'=>input($this->request->getPost("email")),
                'linked'=>input($this->request->getPost("linked")),
                'jk'=>input($this->request->getPost("jk")),
                'no_wa'=>input($this->request->getPost("no_wa")),
                'no_telp'=>input($this->request->getPost("no_telp")),
                'tempat_lahir'=>input($this->request->getPost("tempat_lahir")),
                'tanggal_lahir'=>input($this->request->getPost("tanggal_lahir")),
                'agama'=>input($this->request->getPost("agama")),
                'masuk'=>input($this->request->getPost("masuk")),
                'lulus'=>input($this->request->getPost("lulus")),
                'alamat'=>input($this->request->getPost("alamat")),
                'kode_pos'=>input($this->request->getPost("kode_pos")),
                'provinsi'=>input($this->request->getPost("provinsi")),
                'kabupaten'=>input($this->request->getPost("kabupaten")),
                'kecamatan'=>input($this->request->getPost("kecamatan")),
                'status'=>input($this->request->getPost("status")),
                'jurusan'=>input($this->request->getPost("jurusan")),
                'kerja'=>input($this->request->getPost("kerja")),
                'tempat_kerja'=>input($this->request->getPost("tempat_kerja")),
                'alamat_kerja'=>input($this->request->getPost("alamat_kerja")),
                'jabatan'=>input($this->request->getPost("jabatan")),
                'TA'=>input($this->request->getPost("TA"))
            ];
            if ($this->AlumniModel->create_alumni($data_alumni)!="") {
                $status=true;
            }
        }
        $data = [
            "title" => "Form Alumni",
            "provinsi" => $this->AlumniModel->getProvinsi()->getResultArray(),
            "status"=>$status,
            "post_submit"=>$post_submit,
            "nama"=>input($this->request->getPost("nama")),
            'halaman'=>'alumni'
        ];
        echo view('alumni/form', $data);
    }

    public function data_kab($prov)
    {
        $data = [
            "title" => "Form Alumni",
            "kab" => $this->AlumniModel->getKabupaten($prov)->getResultArray(),
            'halaman'=>'alumni'
        ];
        echo view('alumni/option_kab', $data);
    }

    public function data_kec($kab)
    {
        $data = [
            "title" => "Form Alumni",
            "kec" => $this->AlumniModel->getKecamatan($kab)->getResultArray(),
            'halaman'=>'alumni'
        ];
        echo view('alumni/option_kec', $data);
    }

    public function detail($data)
    {
        $detail_alumni=$this->AlumniModel->getDetailAlumni($data)->getRow();

        
        $data=[
            "alumni"=>$detail_alumni
        ];
        
        echo view("alumni/detail", $data);
    }

    



    //--------------------------------------------------------------------
}
