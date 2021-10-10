<?= $this->extend('main_layout'); ?>

<?= $this->section('main_content'); ?>



<div class="container-fluid mt-4" style="padding:0 2% 0 2%; margin-bottom:8%;">
    <div class="row" style="margin:0%;">
        <div class="col-12 col-md-8 mt-4">
            <div class="head_title">
                <p class="h3" style=""> <a class="text-decoration-none text-dark" href="/berita/p/1">Berita Terbaru</a>
                </p>
                <div
                    style="display: inline-block;background-color:#ffb74a;width:50pt;height:5px;margin:5px 0% 20px 0%;">
                </div>
            </div>

            <ul class="list-unstyled mb-5">

                <?php
foreach ($berita as $data) {
    ?>


                <li class="media">
                    <img src="<?php echo base_url() .'/img/berita/'.$data['gambar_berita']; ?>"
                        style="object-fit: cover;object-position: center center;width: 100pt;height: 100pt;"
                        class="rounded asyncImage img-cropped align-self-center mr-3 img-fluid" alt="...">
                    <div class="media-body">
                        <p class="text-muted" style="margin:0;"><small><?=toDate($data["tanggal_berita"]); ?>
                                | <?=ucfirst($data["kategori_berita"]); ?></small>
                        </p>
                        <h5 class="mt-0 mb-1"
                            style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical; ">
                            <?=ucfirst($data["judul_berita"]); ?>
                        </h5>
                        <div
                            style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical; ">
                            <?=$data["konten_berita"]; ?>
                        </div>
                        <a
                            href="/berita/id/<?=$data["id_berita"]; ?>">Baca
                            Selengkapnya</a>
                    </div>
                </li>

                <hr>

                <?php
}
if (sizeof($berita)==0) {
    ?>

                <li class="media">

                    <div class="media-body">
                        <p class="text-muted" style="margin:0;">Belum terdapat berita</p>

                    </div>
                </li>

                <?php
} ?>
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
    function toHour($tanggal)
    {
        $date=date_create($tanggal);
        $d=date_format($date, "H:m");
    
        return $d;
    }
?>
            </ul>

            <nav aria-label=" Page navigation example" style="margin-bottom:8%;">
                <ul class="pagination justify-content-center">

                    <?php
$sisa_bagi = sizeof($all_berita)%15;
$jum_page = (sizeof($all_berita)-$sisa_bagi)/15;

if ($sisa_bagi>0) {
    $jum_page++;
}
//echo $jum_page;


if ($current_page>1) {?>
                    <li class="page-item">
                        <a class="page-link text-info"
                            href="/berita/p/<?=$current_page-1;?><?=find_d();?>"
                            aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php
}

if ($jum_page>10) {
    if ($current_page>6) {
        if ($current_page+4<=$jum_page) {
            for ($i=$current_page-5;$i<=$current_page+4;$i++) {
                echo showLi($current_page, $i);
            }
        } else {
            for ($i=($jum_page-9);$i<=$jum_page;$i++) {
                echo showLi($current_page, $i);
            }
        }
    } else {
        for ($i=1;$i<=10;$i++) {
            echo showLi($current_page, $i);
        }
    }
} else {
    for ($i=1;$i<=$jum_page;$i++) {
        echo showLi($current_page, $i);
    }
}

function find_d()
{
    $find="";
    if (isset($_GET["d"])) {
        $find="?d=".$_GET["d"];
    }
    if (isset($_GET["c"])) {
        $find="?c=".$_GET["c"];
    }
    return $find;
}


function showLi($current_page, $i)
{
    if ($current_page==$i) {
        echo "<li class='page-item'><a class='page-link  bg-info text-white' href='/berita/p/".$i."".find_d()."'>".$i."</a></li>";
    } else {
        echo "<li class='page-item'><a class='page-link text-info' href='/berita/p/".$i."".find_d()."'>".$i."</a></li>";
    }
}

if ($current_page < $jum_page) {?>
                    <li class="page-item">
                        <a class="page-link text-info"
                            href="/berita/p/<?=$current_page+1;?><?=find_d();?>"
                            aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                    <?php
}
?>
                </ul>
            </nav>







        </div>


        <div class="col-12 col-md-4 mt-4">
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
                    TNC HIMA TELKOM</a>
            </div>

            <hr>
            <div class="">
                <div class="head_title" style="margin-top:20px;">
                    <p class="h3" style="">Kegiatan Mendatang</p>
                    <div
                        style="display: inline-block;background-color:#ffb74a;width:50pt;height:5px;margin:5px 0% 20px 0%;">
                    </div>
                </div>

                <?php
                foreach ($all_kegiatan as $data) {
                    ?>

                <div class="card mb-3 kegiatan rounded">
                    <div class="card-body" style="border-left:5px solid #00826c;">



                        <div class="row">
                            <div class="col-3">
                                <img src="<?php echo base_url() .'/img/kegiatan/'.$data['poster_kegiatan']; ?>"
                                    class="rounded img-fluid" alt="Responsive image" style="height:99px;width:70px;">
                            </div>
                            <div class="col-9">

                                <h5 class="mt-0 mb-1"><?=$data['judul_kegiatan']; ?>
                                </h5>
                                <p style="margin:0;"><small><?=toDay($data['tanggal_kegiatan']); ?>,
                                        <?=toDate($data['tanggal_kegiatan']); ?>
                                        | <?=    toHour($data['tanggal_kegiatan'])." - Selesai"; ?></small>
                                </p>
                                <small class="text-muted">Untuk <cite title="Source Title"
                                        style="color:#00826c;"><b><?=$data['peserta_kegiatan']?></b></cite></small>

                            </div>
                        </div>




                    </div>
                </div>
                <?php
                } ?>
                <?php if (sizeof($all_kegiatan)==0) {?>
                <div class="text-left">
                    <p class="text-muted" style="margin:0;">Belum ada kegiatan mendatang</p>

                </div>
                <?php } ?>



            </div>
        </div>
        <!--Divide-->

    </div>

</div>

<script>
    function goCari() {
        var x = document.getElementById("cari_berita").value;
        if (x == "") x = "null";
        location.href = "<?= base_url();?>/berita/p/1?d=" + x;
    }



    $("#cari_berita").keypress(
        function(event) {
            if (event.which == '13') {
                event.preventDefault();
            }
        });
</script>



<?= $this->endSection();
