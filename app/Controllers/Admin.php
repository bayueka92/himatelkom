<?php

namespace App\Controllers;

use \App\Models\AlumniModel;
use \App\Models\AdminModel;
use \App\Models\BeritaModel;
use \App\Models\KegiatanModel;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->AlumniModel = new AlumniModel();
        $this->AdminModel = new AdminModel();
        $this->BeritaModel = new BeritaModel();
        $this->KegiatanModel = new KegiatanModel();
        $this->request = \Config\Services::request();
        $this->validation = \Config\Services::validation();
    }

    public function login()
    {
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');
        $id = $this->request->getCookie('id');
        $key = $this->request->getCookie('key');
        $valid = $this->request->getCookie('valid');
        
        if ($id!=""&&$key!=""&&$valid=="1") {
            header("Location:/admin/berita/p/1");//SINI
            exit;
        } else {
            if ($password!=""&&$email!="") {
                $check_result=$this->AdminModel->check_login($email, md5($password))->getResultArray();
                //echo $email." ".md5($password);
                if (sizeof($check_result)==1) {
                    setcookie('id', $this->AdminModel->check_login($email, md5($password))->getRow()->id_admin, time()+3600);
                    $key=md5($this->AdminModel->check_login($email, md5($password))->getRow()->id_admin."-".$this->AdminModel->check_login($email, md5($password))->getRow()->nama_admin."-".$this->AdminModel->check_login($email, md5($password))->getRow()->email);
                    $key=substr($key, 8, 5)."".substr($key, 5, 2);
                    setcookie('key', $key, time()+3600);
                    setcookie('valid', "1", time()+3600);
                    header("Location:/admin/berita/p/1");
                    exit;
                } else {
                    $data = [
                        "title" => "ADMIN HIMA TELKOM PENS",
                        "email" => $email,
                        "status" => "Mohon maaf, data yang anda inputkan bukan merupakan data admin.<br>Mohon untuk dicek kembali atau hubungi email <b>himatelkom.pens@gmail.com</b> jika masih terdapat masalah.",
                        "password" => "",
                        'halaman'=>'admin'
                    ];
                    echo view('admin/login', $data);
                }
            } else {
                $data = [
                    "title" => "ADMIN HIMA TELKOM PENS",
                    "email" => "",
                    "status" => "",
                    "password" => "",
                    'halaman'=>'admin'
                ];
                echo view('admin/login', $data);
            }
        }
    }


    public function kegiatan($page)
    {
        $id_session = $this->request->getCookie('id');
        $key = $this->request->getCookie('key');

        if ($id_session!=""&& $key!="") {
            $key_index=md5($this->AdminModel->getDetailAdmin($id_session)->getRow()->id_admin."-".$this->AdminModel->getDetailAdmin($id_session)->getRow()->nama_admin."-".$this->AdminModel->getDetailAdmin($id_session)->getRow()->email);
            $key_index=substr($key_index, 8, 5)."".substr($key_index, 5, 2);
            if ($key!=$key_index) {
                $data = [
                        "title" => "ADMIN HIMA TELKOM PENS",
                        "email" => "",
                        "status" => "",
                        "password" => "",
                        'halaman'=>'admin'
                    ];
                header("Location:/admin/login");
                return exit;
            }
        } else {
            $data = [
                "title" => "ADMIN HIMA TELKOM PENS",
                "email" => "",
                "status" => "",
                "password" => "",
                'halaman'=>'admin'
            ];
            header("Location:/admin/login");
            return exit;
        }


        $cari="";
        $category="";
        if ($this->request->getGet('d')!=null) {
            $cari="judul_kegiatan LIKE '%".urldecode($this->request->getGet('d'))."%'";
        } else {
            $cari="judul_kegiatan LIKE '%%'";
        }
        $data = [
            'kegiatan'=> $this->KegiatanModel->getKegiatan($page, $cari)->getResultArray(),
            'all_kegiatan'=>$this->KegiatanModel->getAllKegiatan($cari)->getResultArray(),
            "title" => "Halaman Admin",
            'halaman'=>'kegiatan',
            'current_page'=>$page
        ];
        echo view('admin/kegiatan', $data);
    }


    
    public function setting_kegiatan($id)
    {
        $id_session = $this->request->getCookie('id');
        $key = $this->request->getCookie('key');

        if ($id_session!=""&& $key!="") {
            $key_index=md5($this->AdminModel->getDetailAdmin($id_session)->getRow()->id_admin."-".$this->AdminModel->getDetailAdmin($id_session)->getRow()->nama_admin."-".$this->AdminModel->getDetailAdmin($id_session)->getRow()->email);
            $key_index=substr($key_index, 8, 5)."".substr($key_index, 5, 2);
            if ($key!=$key_index) {
                $data = [
                        "title" => "ADMIN HIMA TELKOM PENS",
                        "email" => "",
                        "status" => "",
                        "password" => "",
                        'halaman'=>'admin'
                    ];
                header("Location:/admin/login");
                return exit;
            }
        } else {
            $data = [
                "title" => "ADMIN HIMA TELKOM PENS",
                "email" => "",
                "status" => "",
                "password" => "",
                'halaman'=>'admin'
            ];
            header("Location:/admin/login");
            return exit;
        }
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

            if (!$this->validate([
                'gambar'=>[
                'rules'=>'max_size[gambar,3072]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran gambar melebihi 3MB',
                    'is_image' => 'File bukan merupakan gambar',
                    'mime_in' => 'File bukan merupakan gambar'
                ]
            ]])) {
                return redirect()->to('/admin/kegiatan/update/'.$id)->withInput()->with('validation', $this->validation);
            }
            $namaGambar=$this->request->getPost('temp_gambar');
            $fileGambar=$this->request->getFile('gambar');

            if ($fileGambar->getError()==4) {
                $namaGambar=$this->request->getPost('temp_gambar');
            } else {
                $namaGambar=$fileGambar->getRandomName();
                $fileGambar->move('img/kegiatan', $namaGambar);
            }
            $stat=false;
            if (isset($_POST["tampil"])) {
                $stat=true;
            }
            $data_kegiatan=[
                'judul_kegiatan'=>input($this->request->getPost("judul")),
                'poster_kegiatan'=>input($namaGambar),
                'tanggal_kegiatan'=>input($this->request->getPost("tanggal")),
                'peserta_kegiatan'=>input($this->request->getPost("peserta"))
            ];


            if ($this->KegiatanModel->update_kegiatan(input($id), $data_kegiatan)!="") {
                $status=true;
            }
        }

        $detail_kegiatan=$this->KegiatanModel->getDetailKegiatan($id)->getRow();
        $data = [
            "title" => "Halaman Admin",
            "kegiatan"=>$detail_kegiatan,
            "status"=>$status,
            "post_submit"=>$post_submit,
            
            'halaman'=>'kegiatan'
        ];
        echo view("admin/setting_kegiatan", $data);
    }
    public function delete_kegiatan($id)
    {
        function input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if ($this->KegiatanModel->delete_kegiatan(input($id))!="") {
            $data="";
            if (isset($_GET["d"]) && $_GET["d"]!="null") {
                $data = "?d=".urldecode($_GET["d"]);
            }
            header("Location:/admin/kegiatan/p/1$data");
            return exit;
        }
    }


    public function tambah_kegiatan()
    {
        $id_session = $this->request->getCookie('id');
        $key = $this->request->getCookie('key');

        if ($id_session!=""&& $key!="") {
            $key_index=md5($this->AdminModel->getDetailAdmin($id_session)->getRow()->id_admin."-".$this->AdminModel->getDetailAdmin($id_session)->getRow()->nama_admin."-".$this->AdminModel->getDetailAdmin($id_session)->getRow()->email);
            $key_index=substr($key_index, 8, 5)."".substr($key_index, 5, 2);
            if ($key!=$key_index) {
                $data = [
                        "title" => "ADMIN HIMA TELKOM PENS",
                        "email" => "",
                        "status" => "",
                        "password" => "",
                        'halaman'=>'admin'
                    ];
                header("Location:/admin/login");
                return exit;
            }
        } else {
            $data = [
                "title" => "ADMIN HIMA TELKOM PENS",
                "email" => "",
                "status" => "",
                "password" => "",
                'halaman'=>'admin'
            ];
            header("Location:/admin/login");
            return exit;
        }
        
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

            if (!$this->validate([
                'gambar'=>[
                'rules'=>'max_size[gambar,3072]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran gambar melebihi 3MB',
                    'is_image' => 'File bukan merupakan gambar',
                    'mime_in' => 'File bukan merupakan gambar'
                ]
            ]])) {
                return redirect()->to('/admin/kegiatan/update/'.$id)->withInput()->with('validation', $this->validation);
            }
            $namaGambar=$this->request->getPost('temp_gambar');
            $fileGambar=$this->request->getFile('gambar');

            if ($fileGambar->getError()==4) {
                $namaGambar="default.jpg";
            } else {
                $namaGambar=$fileGambar->getRandomName();
                $fileGambar->move('img/kegiatan', $namaGambar);
            }
            $stat=false;
            if (isset($_POST["tampil"])) {
                $stat=true;
            }
            $data_kegiatan=[
                'judul_kegiatan'=>input($this->request->getPost("judul")),
                'poster_kegiatan'=>input($namaGambar),
                'tanggal_kegiatan'=>input($this->request->getPost("tanggal")),
                'peserta_kegiatan'=>input($this->request->getPost("peserta"))
            ];


            if ($this->KegiatanModel->tambah_kegiatan($data_kegiatan)!="") {
                $status=true;
            }
        }

        
        $data = [
            "title" => "Halaman Admin",
            
            "status"=>$status,
            "post_submit"=>$post_submit,
            
            'halaman'=>'kegiatan'
        ];
        echo view("admin/tambah_kegiatan", $data);
    }


    public function berita($page)
    {
        $id_session = $this->request->getCookie('id');
        $key = $this->request->getCookie('key');

        if ($id_session!=""&& $key!="") {
            $key_index=md5($this->AdminModel->getDetailAdmin($id_session)->getRow()->id_admin."-".$this->AdminModel->getDetailAdmin($id_session)->getRow()->nama_admin."-".$this->AdminModel->getDetailAdmin($id_session)->getRow()->email);
            $key_index=substr($key_index, 8, 5)."".substr($key_index, 5, 2);
            if ($key!=$key_index) {
                $data = [
                        "title" => "ADMIN HIMA TELKOM PENS",
                        "email" => "",
                        "status" => "",
                        "password" => "",
                        'halaman'=>'admin'
                    ];
                header("Location:/admin/login");
                return exit;
            }
        } else {
            $data = [
                "title" => "ADMIN HIMA TELKOM PENS",
                "email" => "",
                "status" => "",
                "password" => "",
                'halaman'=>'admin'
            ];
            header("Location:/admin/login");
            return exit;
        }
        $cari="";
        $category="";
        if ($this->request->getGet('d')!=null) {
            $cari="judul_berita LIKE '%".urldecode($this->request->getGet('d'))."%' or konten_berita LIKE '%".urldecode($this->request->getGet('d'))."%'";
        } elseif ($this->request->getGet('c')!=null) {
            $cari="kategori_berita = '".urldecode($this->request->getGet('c'))."'";
        } elseif ($this->request->getGet('s')!=null) {
            $cari="tampil = ".urldecode($this->request->getGet('s'))." ";
        } else {
            $cari="judul_berita LIKE '%%'";
        }
        $data = [
            'berita'=> $this->BeritaModel->getBerita($page, $cari)->getResultArray(),
            'all_berita'=>$this->BeritaModel->getAllBerita($cari)->getResultArray(),
            "title" => "Halaman Admin",
            'halaman'=>'berita',
            'current_page'=>$page
        ];
        echo view('admin/berita', $data);
    }
    public function alumni($page)
    {
        $id_session = $this->request->getCookie('id');
        $key = $this->request->getCookie('key');

        if ($id_session!=""&& $key!="") {
            $key_index=md5($this->AdminModel->getDetailAdmin($id_session)->getRow()->id_admin."-".$this->AdminModel->getDetailAdmin($id_session)->getRow()->nama_admin."-".$this->AdminModel->getDetailAdmin($id_session)->getRow()->email);
            $key_index=substr($key_index, 8, 5)."".substr($key_index, 5, 2);
            if ($key!=$key_index) {
                $data = [
                        "title" => "ADMIN HIMA TELKOM PENS",
                        "email" => "",
                        "status" => "",
                        "password" => "",
                        'halaman'=>'admin'
                    ];
                header("Location:/admin/login");
                return exit;
            }
        } else {
            $data = [
                "title" => "ADMIN HIMA TELKOM PENS",
                "email" => "",
                "status" => "",
                "password" => "",
                'halaman'=>'admin'
            ];
            header("Location:/admin/login");
            return exit;
        }
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
                $kolom="konfirmasi";
            }

            $cari="pendaftaran.".$kolom." LIKE '%".$cari."%'";
            $data = [
                "title" => "Halaman Admin",
                "alumni" => $this->AlumniModel->getAlumni($page, $this->request->getGet('o'), $cari)->getResultArray(),
                "alumni_size" => sizeof($this->AlumniModel->getAlumniLength($cari)->getResultArray()),
                "current_page" => $page,
                "tahun_masuk" =>$this->AlumniModel->getTahunMasuk()->getResultArray(),
                'halaman'=>'alumni'
            ];
            
            echo view('admin/alumni', $data);
        }
    }

    public function tambah_berita()
    {
        $id_session = $this->request->getCookie('id');
        $key = $this->request->getCookie('key');

        if ($id_session!=""&& $key!="") {
            $key_index=md5($this->AdminModel->getDetailAdmin($id_session)->getRow()->id_admin."-".$this->AdminModel->getDetailAdmin($id_session)->getRow()->nama_admin."-".$this->AdminModel->getDetailAdmin($id_session)->getRow()->email);
            $key_index=substr($key_index, 8, 5)."".substr($key_index, 5, 2);
            if ($key!=$key_index) {
                $data = [
                        "title" => "ADMIN HIMA TELKOM PENS",
                        "email" => "",
                        "status" => "",
                        "password" => "",
                        'halaman'=>'admin'
                    ];
                header("Location:/admin/login");
                return exit;
            }
        } else {
            $data = [
                "title" => "ADMIN HIMA TELKOM PENS",
                "email" => "",
                "status" => "",
                "password" => "",
                'halaman'=>'admin'
            ];
            header("Location:/admin/login");
            return exit;
        }
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

            if (!$this->validate([
                'gambar'=>[
                'rules'=>'max_size[gambar,3072]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran gambar melebihi 3MB',
                    'is_image' => 'File bukan merupakan gambar',
                    'mime_in' => 'File bukan merupakan gambar'
                ]
            ]])) {
                return redirect()->to('/admin/berita/tambah')->withInput()->with('validation', $this->validation);
            }
            $namaGambar=$this->request->getPost('temp_gambar');
            $fileGambar=$this->request->getFile('gambar');

            if ($fileGambar->getError()==4) {
                $namaGambar="default.jpg";
            } else {
                $namaGambar=$fileGambar->getRandomName();
                $fileGambar->move('img/berita', $namaGambar);
            }

            $data_berita=[
                'judul_berita'=>input($this->request->getPost("judul")),
                'gambar_berita'=>input($namaGambar),
                'kategori_berita'=>input($this->request->getPost("kategori")),
                
                'konten_berita'=>input($this->request->getPost("konten")),
            ];


            if ($this->BeritaModel->tambah_berita($data_berita)!="") {
                $status=true;
            }
        }

       
        $data = [
            "title" => "Halaman Admin",
            "status"=>$status,
            "post_submit"=>$post_submit,
            
            'halaman'=>'berita'
        ];
        echo view("admin/tambah_berita", $data);
    }

    public function setting_berita($id)
    {
        $id_session = $this->request->getCookie('id');
        $key = $this->request->getCookie('key');

        if ($id_session!=""&& $key!="") {
            $key_index=md5($this->AdminModel->getDetailAdmin($id_session)->getRow()->id_admin."-".$this->AdminModel->getDetailAdmin($id_session)->getRow()->nama_admin."-".$this->AdminModel->getDetailAdmin($id_session)->getRow()->email);
            $key_index=substr($key_index, 8, 5)."".substr($key_index, 5, 2);
            if ($key!=$key_index) {
                $data = [
                        "title" => "ADMIN HIMA TELKOM PENS",
                        "email" => "",
                        "status" => "",
                        "password" => "",
                        'halaman'=>'admin'
                    ];
                header("Location:/admin/login");
                return exit;
            }
        } else {
            $data = [
                "title" => "ADMIN HIMA TELKOM PENS",
                "email" => "",
                "status" => "",
                "password" => "",
                'halaman'=>'admin'
            ];
            header("Location:/admin/login");
            return exit;
        }
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

            if (!$this->validate([
                'gambar'=>[
                'rules'=>'max_size[gambar,3072]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran gambar melebihi 3MB',
                    'is_image' => 'File bukan merupakan gambar',
                    'mime_in' => 'File bukan merupakan gambar'
                ]
            ]])) {
                return redirect()->to('/admin/berita/update/'.$id)->withInput()->with('validation', $this->validation);
            }
            $namaGambar=$this->request->getPost('temp_gambar');
            $fileGambar=$this->request->getFile('gambar');

            if ($fileGambar->getError()==4) {
                $namaGambar=$this->request->getPost('temp_gambar');
            } else {
                $namaGambar=$fileGambar->getRandomName();
                $fileGambar->move('img/berita', $namaGambar);
            }
            $stat=false;
            if (isset($_POST["tampil"])) {
                $stat=true;
            }
            $data_berita=[
                'judul_berita'=>input($this->request->getPost("judul")),
                'gambar_berita'=>input($namaGambar),
                'kategori_berita'=>input($this->request->getPost("kategori")),
                'tampil'=>$stat,

                'konten_berita'=>input($this->request->getPost("konten")),
            ];


            if ($this->BeritaModel->update_berita(input($id), $data_berita)!="") {
                $status=true;
            }
        }

        $detail_berita=$this->BeritaModel->getDetailBerita($id)->getRow();
        $data = [
            "title" => "Halaman Admin",
            "berita"=>$detail_berita,
            "status"=>$status,
            "post_submit"=>$post_submit,
            
            'halaman'=>'berita'
        ];
        echo view("admin/setting_berita", $data);
    }

    public function setting_alumni($id)
    {
        $id_session = $this->request->getCookie('id');
        $key = $this->request->getCookie('key');

        if ($id_session!=""&& $key!="") {
            $key_index=md5($this->AdminModel->getDetailAdmin($id_session)->getRow()->id_admin."-".$this->AdminModel->getDetailAdmin($id_session)->getRow()->nama_admin."-".$this->AdminModel->getDetailAdmin($id_session)->getRow()->email);
            $key_index=substr($key_index, 8, 5)."".substr($key_index, 5, 2);
            if ($key!=$key_index) {
                $data = [
                        "title" => "ADMIN HIMA TELKOM PENS",
                        "email" => "",
                        "status" => "",
                        "password" => "",
                        'halaman'=>'admin'
                    ];
                header("Location:/admin/login");
                return exit;
            }
        } else {
            $data = [
                "title" => "ADMIN HIMA TELKOM PENS",
                "email" => "",
                "status" => "",
                "password" => "",
                'halaman'=>'admin'
            ];
            header("Location:/admin/login");
            return exit;
        }
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
                'TA'=>input($this->request->getPost("TA")),
                'konfirmasi'=>input($this->request->getPost("konfirmasi"))
            ];
            if ($this->AlumniModel->verify_alumni(input($id), $data_alumni)!="") {
                $status=true;
            }
        }


        $detail_alumni=$this->AlumniModel->getDetailAlumni($id)->getRow();
        $data = [
            "title" => "Halaman Admin",
            "alumni"=>$detail_alumni,
            "provinsi" => $this->AlumniModel->getProvinsi()->getResultArray(),
            "status"=>$status,
            "post_submit"=>$post_submit,
            "nama"=>input($this->request->getPost("nama")),
            'halaman'=>'alumni'
        ];

        
        
        echo view("admin/setting_alumni", $data);
    }
    public function keluar()
    {
        setcookie('id', "");
        setcookie('key', "");
        header("Location:/admin/login");
        return exit;
    }
}
