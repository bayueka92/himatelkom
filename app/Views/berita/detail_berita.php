<?= $this->extend('main_layout'); ?>

<?= $this->section('main_content'); ?>

<div class="container-fluid mt-4" style="padding:0 2% 0 2%; margin-bottom:8%;">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area">


                        <span class=""><small><a
                                href="/berita/p/1?c=<?= $data->kategori_berita;?>"
                                class="text-muted text-decoration-none" title=""><?= ucwords($data->kategori_berita);?></a></small></span>

                        <h2><?= $data->judul_berita;?>
                        </h2>
                        <?php
function toDate($tanggal)
{
    $date=date_create($tanggal);
    $d=date_format($date, "d");
    $m=date_format($date, "m");
    $y=date_format($date, "Y");
    $bulan="";
    if ($m=="01") {
        $bulan="Januari";
    } elseif ($m=="02") {
        $bulan="Februari";
    } elseif ($m=="03") {
        $bulan="Maret";
    } elseif ($m=="04") {
        $bulan="April";
    } elseif ($m=="05") {
        $bulan="Mei";
    } elseif ($m=="06") {
        $bulan="Juni";
    } elseif ($m=="07") {
        $bulan="Juli";
    } elseif ($m=="08") {
        $bulan="Agustus";
    } elseif ($m=="09") {
        $bulan="September";
    } elseif ($m=="10") {
        $bulan="Oktober";
    } elseif ($m=="11") {
        $bulan="November";
    } elseif ($m=="12") {
        $bulan="Desember";
    }
    return $d." ".$bulan." ".$y;
}

function toDay($tanggal)
{
    $date=date_create($tanggal);
    $d=date_format($date, "D");
    $hari="";
    if ($d=="Mon") {
        $hari="Senin";
    } elseif ($d=="Tue") {
        $hari="Selasa";
    } elseif ($d=="Wed") {
        $hari="Rabu";
    } elseif ($d=="Thu") {
        $hari="Kamis";
    } elseif ($d=="Fri") {
        $hari="Jumat";
    } elseif ($d=="Sat") {
        $hari="Sabtu";
    } elseif ($d=="Sun") {
        $hari="Minggu";
    }
    return $hari;
}
?>
                        <div>
                            <small><?= toDate($data->tanggal_berita);?></small>
                            <small>by <?= $data->penulis_berita;?></small>
                        </div><!-- end meta -->
                    </div><!-- end title -->

                    <div class="single-post-media mt-4">
                        <img src="<?= base_url();?>/img/berita/<?= $data->gambar_berita;?>"
                            alt="" class="img-fluid rounded">
                    </div><!-- end media -->

                    <div class="blog-content mt-4">
                        <p><?= $data->konten_berita;?></p>
                    </div><!-- end content -->
                    <!-- END OPENING -->

                    <!-- DILUAR CONTENT -->


                    <!-- PREVESIOUS -->



                    <hr class="invis1 mt-5">
                
                    <!-- You may also Like -->
                  

                </div><!-- end page-wrapper -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                
            <form class="mt-2">
                <div class="input-group mb-2 rounded-pill">
                    <input type="text" id="cari_berita" class="form-control" placeholder="Pencarian berita"
                        aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?php if (isset($_GET["d"]) && $_GET["d"]!="null") {
    echo urldecode($_GET["d"]);
}
                ?>">
                    <div class="input-group-append">
                        <button class="btn btn-info" onclick="goCari()" type="button">Cari</button>
                    </div>
                </div>
            </form>

            <a href="/berita/p/1" class="text-decoration-nonen text-info"><b>#semua</b></a>
            <a href="/berita/p/1?c=kegiatan" class="text-decoration-nonen text-info"><b>#kegiatan</b></a>
            <a href="/berita/p/1?c=hiburan" class="text-decoration-nonen text-info"><b>#hiburan</b></a>
            <a href="/berita/p/1?c=akademik" class="text-decoration-nonen text-info"><b>#akademik</b></a>
            <a href="/berita/p/1?c=prestasi" class="text-decoration-nonen text-info"><b>#prestasi</b></a><br>
            <hr>
            <div>
                <div class="head_title" style="margin-top:20px;">
                    <p class="h3" style="">Liputan Terbaru</p>
                    <div
                        style="display: inline-block;background-color:#ffb74a;width:50pt;height:5px;margin:5px 0% 20px 0%;">
                    </div>
                </div>
                <div class="embed-responsive embed-responsive-16by9 rounded-lg">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/-FVguc8CUGU?rel=0"
                        allowfullscreen></iframe>
                </div>
                <a href="https://www.youtube.com/channel/UCoasLDoqmVfDpWbSTksmFvA/featured" type="button"
                    class="text-decoration-none mt-3 mb-2" style="color:#00826c;">Lihat Semua
                    Liputan
                    TNC Hima
                    Telkom</a>
            </div>

            <hr>



            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->

<?= $this->endSection();
