<?= $this->extend('admin/main'); ?>

<?= $this->section('main_content'); ?>
<span class="navbar-brand p-0 mt-4 mb-0 h1 align-middle"
    style="display:inline-block;color:#000;font-family: 'Roboto', sans-serif;font-size:16pt;">Daftar
    <?= ucwords($halaman); ?></span>
<hr>
<form class="mt-4">
    <div class="input-group mb-2 rounded-pill">
        <input type="text" id="cari_kegiatan" class="form-control" placeholder="Pencarian kegiatan"
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

    </div>
    <div class="col-2 text-right">
        <a href="/admin/kegiatan/tambah" class="btn btn-dark btn-sm rounded-pill"><i class="fas fa-plus"></i> Tambah
            kegiatan</a>
    </div>
</div>

<hr>






<table style="border:0;" class="shadow-lg mb-5 mt-2 bg-white rounded table table-hover table-borderless">


    <thead>
        <tr style="vertical-align:center;" class="border-bottom">
            <th scope="col" class="text-center px-4 align-middle">
                <small><b>Waktu Kegiatan</b></small>
            </th>
            <th scope="col" class="text-center px-4 align-middle">
                <small><b>Poster</b></small>
            </th>
            <th scope="col" class="text-center px-4 align-middle">
                <small><b>Judul Kegiatan</b></small>
            </th>
            <th scope="col" class="text-center px-4 align-middle">
                <small><b>Peserta</b></small>
            </th>
            <th scope="col" class="text-center px-4 align-middle">
                <small><b>Aksi</b></small>
            </th>
        </tr>
    </thead>



    <tbody>
        <?php foreach ($kegiatan as $data) {
                    // if ($data['konfirmasi']=="Verified") {?>
        <tr>
            <td class="text-center align-middle">
                <small>
                    <center>
                        <div style="white-space: nowrap;width: 180px;overflow: hidden;text-overflow:ellipsis;">
                            <?= "<b>".toDay($data['tanggal_kegiatan']).", ".toDate($data['tanggal_kegiatan'])."</b><br>Pukul ".toHour($data['tanggal_kegiatan'])." - Selesai"; ?>
                        </div>
                    </center>

                </small>
            </td>
            <td class="text-center align-middle">
                <small>
                    <center>
                        <div style="white-space: nowrap;width: 50px;overflow: hidden;text-overflow:ellipsis;">
                        <img src="<?php echo base_url() . "/img/kegiatan/".$data['poster_kegiatan'];?>"
                                    class="rounded img-fluid" style="height:80px;width:auto;"alt="Responsive image">
                        </div>
                    </center>

                </small>
            </td>
            <td class="text-center align-middle">
                <small>
                    <center>
                        <div style="white-space: nowrap;width: 250px;overflow: hidden;text-overflow:ellipsis;">
                            <?= $data['judul_kegiatan']; ?>
                        </div>
                    </center>

                </small>
            </td>
            <td class="text-center align-middle">
                <small>
                    <center>
                        <div style="white-space: nowrap;width: 180px;overflow: hidden;text-overflow:ellipsis;">
                            <?= $data['peserta_kegiatan']; ?>
                        </div>
                    </center>

                </small>
            </td>

            <td class="text-center align-middle px-4" style="overflow-y: hidden;">
                <small><a class="border-0 rounded-pill btn btn-info btn-sm" style="width:4rem;"
                        href="/admin/kegiatan/update/<?= $data['id_kegiatan']; ?>">Update</a>
                        </small>&nbsp;
                        <small><a class="border-0 rounded-pill btn btn-danger btn-sm" style="width:4rem;"
                        href="/admin/kegiatan/delete/<?= $data['id_kegiatan']; ?>?d=<?php if (isset($_GET["d"]) && $_GET["d"]!="null") {
    echo urldecode($_GET["d"]);
}
                ?>">Delete</a>
                        </small>
            </td>
        </tr>
        <?php
                                    // }
                }
                    if (sizeof($kegiatan)==0) {?>
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

function toHour($tanggal)
{
    $date=date_create($tanggal);
    $d=date_format($date, "H:m");
    
    return $d;
}
?>

    <nav aria-label=" Page navigation example" style="margin-bottom:8%;">
        <ul class="pagination justify-content-center">

            <?php
$sisa_bagi = sizeof($all_kegiatan)%15;
$jum_page = (sizeof($all_kegiatan)-$sisa_bagi)/15;

if ($sisa_bagi>0) {
    $jum_page++;
}
//echo $jum_page;


if ($current_page>1) {?>
            <li class="page-item">
                <a class="page-link text-info"
                    href="/kegiatan/p/<?=$current_page-1;?><?=find_d();?>"
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
        echo "<li class='page-item'><a class='page-link  bg-info text-white' href='/kegiatan/p/".$i."".find_d()."'>".$i."</a></li>";
    } else {
        echo "<li class='page-item'><a class='page-link text-info' href='/kegiatan/p/".$i."".find_d()."'>".$i."</a></li>";
    }
}

if ($current_page < $jum_page) {?>
            <li class="page-item">
                <a class="page-link text-info"
                    href="/kegiatan/p/<?=$current_page+1;?><?=find_d();?>"
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
            var x = document.getElementById("cari_kegiatan").value;
            if (x == "") x = "null";
            location.href = "<?= base_url();?>/admin/kegiatan/p/1?d=" + x;
        }



        $("#cari_kegiatan").keypress(
            function(event) {
                if (event.which == '13') {
                    event.preventDefault();
                }
            });
    </script>


    <?= $this->endSection();
