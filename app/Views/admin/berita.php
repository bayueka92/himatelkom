<?= $this->extend('admin/main'); ?>

<?= $this->section('main_content'); ?>
<span class="navbar-brand p-0 mt-4 mb-0 h1 align-middle"
    style="display:inline-block;color:#000;font-family: 'Roboto', sans-serif;font-size:16pt;">Daftar
    <?= ucwords($halaman); ?></span>
<hr>
<form class="mt-4">
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
<div class="row mt-3">
    <div class="col-10">
        <a href="/admin/berita/p/1" class="text-decoration-nonen text-info"><b>#semua</b></a>
        <a href="/admin/berita/p/1?c=kegiatan" class="text-decoration-nonen text-info"><b>#kegiatan</b></a>
        <a href="/admin/berita/p/1?c=hiburan" class="text-decoration-nonen text-info"><b>#hiburan</b></a>
        <a href="/admin/berita/p/1?c=akademik" class="text-decoration-nonen text-info"><b>#akademik</b></a>
        <a href="/admin/berita/p/1?c=prestasi" class="text-decoration-nonen text-info"><b>#prestasi</b></a>
    </div>
    <div class="col-2 text-right">
        <a href="/admin/berita/tambah" class="btn btn-dark btn-sm rounded-pill"><i class="fas fa-plus"></i> Tambah
            Berita</a>
    </div>
</div>

<hr>






<table style="border:0;" class="shadow-lg mb-5 mt-2 bg-white rounded table table-hover table-borderless">


    <thead>
        <tr style="vertical-align:center;" class="border-bottom">
            <th scope="col" class="text-center px-4 align-middle">
                <small><b>Tanggal Rilis</b></small>
            </th>
            <th scope="col" class="text-center px-4 align-middle">
                <small><b>Terakhir Diubah</b></small>
            </th>
            <th scope="col" class="text-center px-4 align-middle">
                <small><b>Kategori Berita</b></small>
            </th>
            <th scope="col" class="text-center px-4 align-middle">
                <small><b>Judul Berita</b></small>
            </th>
            <th scope="col" class="text-center px-4 align-middle">
                <small><b>Status</b></small>
            </th>
            <th scope="col" class="text-center px-4 align-middle">
                <small><b>Aksi</b></small>
            </th>
        </tr>
    </thead>



    <tbody>
        <?php foreach ($berita as $data) {
                    // if ($data['konfirmasi']=="Verified") {?>
        <tr>
            <td class="text-center align-middle">
                <small>
                    <center>
                        <div style="white-space: nowrap;width: 100px;overflow: hidden;text-overflow:ellipsis;">
                            <?= toDate($data['tanggal_berita']); ?>
                        </div>
                    </center>

                </small>
            </td>
            <td class="text-center align-middle">
                <small>
                    <center>
                        <div style="white-space: nowrap;width: 100px;overflow: hidden;text-overflow:ellipsis;">
                            <?= toDate($data['terakhir_diubah']); ?>
                        </div>
                    </center>

                </small>
            </td>
            <td class="text-center align-middle">
                <small><a style="color:#00826c;"
                        href="/admin/berita/p/1<?= "?c=".$data['kategori_berita']; ?>"
                        class="text-truncate text-decoration-none">
                        <center>
                            <div style="white-space: nowrap;width: 80px;overflow: hidden;text-overflow:ellipsis;">
                                <?= ucwords($data['kategori_berita']); ?>
                            </div>
                        </center>
                    </a></small>
            </td>
            <td class="text-center align-middle">
                <small>
                    <center>
                        <div style="white-space: nowrap;width: 250px;overflow: hidden;text-overflow:ellipsis;">
                            <?= $data['judul_berita']; ?>
                        </div>
                    </center>

                </small>
            </td>
            <td class="text-center align-middle">
                <small>
                    <center>
                        <div style="white-space: nowrap;width: 50px;overflow: hidden;text-overflow:ellipsis;">

                            <?php
                          
                    if ($data['tampil']) {?>

                        <a style="color:#00826c;"
                        href="/admin/berita/p/1?s=TRUE"
                        class="text-truncate text-decoration-none">
                        Tampil
                        </a>

                    <?php } else {?>

                        <a
                        href="/admin/berita/p/1?s=FALSE"
                        class="text-truncate text-decoration-none text-warning">
                        Draft
                        </a>
                        
                    <?php } ?>
                        </div>
                    </center>

                </small>
            </td>
            <td class="text-center align-middle px-4" style="overflow-y: hidden;">
                <small><a class="border-0 rounded-pill btn btn-info btn-sm" style="width:4rem;"
                        href="/admin/berita/update/<?= $data['id_berita']; ?>">Update</a></small>
            </td>
        </tr>
        <?php
                                    // }
                }
                    if (sizeof($berita)==0) {?>
        <tr>
            <td colspan="7" class="text-center align-middle">
                <small style="color:#00826c;">Data tidak ditemukan</small>
            </td>
        </tr>
        <?php
                    }
                    
                    ?>
    </tbody>
</table>




















<ul class="list-unstyled mb-5">




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

    <script>
        function goCari() {
            var x = document.getElementById("cari_berita").value;
            if (x == "") x = "null";
            location.href = "<?= base_url();?>/admin/berita/p/1?d=" + x;
        }



        $("#cari_berita").keypress(
            function(event) {
                if (event.which == '13') {
                    event.preventDefault();
                }
            });
    </script>


    <?= $this->endSection();
