<?= $this->extend('main_layout'); ?>

<?= $this->section('main_content'); ?>
<div class="container mt-4">
    <form class="mt-2">
        <div class="input-group mb-2 rounded-pill">
            <input type="text" id="cari_nama" class="form-control" placeholder="Cari berdasarkan nama"
                aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?php if ($_GET["d"]!="null") {
    echo $_GET["d"];
}
                ?>">
            <div class="input-group-append">
                <button class="btn btn-info" onclick="goCari()" type="button">Telusuri</button>
            </div>
        </div>
    </form>

    <script>
        function goCari() {
            var x = document.getElementById("cari_nama").value;
            location.href = "<?= base_url();?>/alumni/p/1?o=desc&d=" + x +
                "&v=0";
        }
    </script>

    <small class="text-muted">Cari berdasarkan kata kunci terkait</small><br>
    <?php
    $i=0;
foreach ($tahun_masuk as $data) {?>
    <a
        href="/alumni/p/1<?= "?o=".$_GET["o"]."&d=".$data['masuk']."&v=1";?>"><button
            type="button" class="px-3 btn btn-sm btn-outline-secondary rounded-pill rounded-pill my-1"><?= $data["masuk"];?></button></a>
    <?php
    $i++;
    if ($i == 3) {
        break;
    }
}
?>





    <a
        href="/alumni/p/1<?= "?o=".$_GET["o"]."&d=D3&v=2";?>"><button
            type="button" class="px-3 btn btn-sm btn-outline-secondary rounded-pill rounded-pill my-1">D3</button></a>
    <a
        href="/alumni/p/1<?= "?o=".$_GET["o"]."&d=D4&v=2";?>"><button
            type="button" class="px-3 btn btn-sm btn-outline-secondary rounded-pill rounded-pill my-1">D4</button></a>
    <a
        href="/alumni/p/1<?= "?o=".$_GET["o"]."&d=LJ&v=2";?>"><button
            type="button" class="px-3 btn btn-sm btn-outline-secondary rounded-pill rounded-pill my-1">LJ</button></a>
    <a
        href="/alumni/p/1<?= "?o=".$_GET["o"]."&d=PJJ&v=2";?>"><button
            type="button" class="px-3 btn btn-sm btn-outline-secondary rounded-pill rounded-pill my-1">PJJ</button></a>
    <a
        href="/alumni/p/1<?= "?o=".$_GET["o"]."&d=S2&v=2";?>"><button
            type="button" class="px-3 btn btn-sm btn-outline-secondary rounded-pill rounded-pill my-1">S2</button></a>
    <a
        href="/alumni/p/1<?= "?o=".$_GET["o"]."&d=Bekerja&v=3";?>"><button
            type="button"
            class="px-3 btn btn-sm btn-outline-secondary rounded-pill rounded-pill my-1">Bekerja</button></a>
    <a
        href="/alumni/p/1<?= "?o=".$_GET["o"]."&d=Mencari Pekerjaan&v=3";?>"><button
            type="button" class="px-3 btn btn-sm btn-outline-secondary rounded-pill rounded-pill my-1">Mencari
            Pekerjaan</button></a>
    <a
        href="/alumni/p/1<?= "?o=".$_GET["o"]."&d=Lanjut Kuliah&v=3";?>"><button
            type="button" class="px-3 btn btn-sm btn-outline-secondary rounded-pill rounded-pill my-1">Lanjut
            Kuliah</button></a>
    <a
        href="/alumni/p/1<?= "?o=".$_GET["o"]."&d=Usaha&v=3";?>"><button
            type="button"
            class="px-3 btn btn-sm btn-outline-secondary rounded-pill rounded-pill my-1">Usaha</button></a>
    <a href="/alumni/p/1?o=desc&d=null&v=0"><button type="button"
            class="px-3 btn btn-sm btn-outline-danger rounded-pill rounded-pill my-1">Reset Pencarian</button></a>



    <div class="row mt-2">
        <div class="col">
            <small class="text-muted mt-0">
                <?php if ($_GET["d"]!="null") {
    echo 'Hasil pencarian untuk <b>"'.$_GET["d"].'"</b>';
} else {
    echo 'Hasil pencarian seluruh data alumni';
}
                ?>
            </small>
            <table style="border:0;" class="shadow-lg mb-5 mt-2 bg-white rounded table table-hover table-borderless">
                <thead>
                    <tr style="vertical-align:center;" class="border-bottom">
                        <th scope="col" class="text-center px-4 align-middle">
                            <a class="text-decoration-none" style="color:#00826c;" href="/alumni/p/1<?php
                                if ($_GET["o"]=="desc") {
                                    echo "?o=asc&d=".$_GET['d']."&v=".$_GET["v"];
                                } elseif ($_GET["o"]=="asc") {
                                    echo "?o=desc&d=".$_GET['d']."&v=".$_GET["v"];
                                }
                                 ?>"><small><b>Angkatan&nbsp;&nbsp;<i class="fa fa-sort"
                                            aria-hidden="true"></i>
                                    </b></small></a>
                        </th>
                        <th scope="col" class="text-center px-4 align-middle">
                            <small><b>Nama Lengkap</b></small>
                        </th>
                        <th scope="col" class="text-center px-4 align-middle">
                            <small><b>Jenjang Terakhir</b></small>
                        </th>
                        <th scope="col" class="text-center px-4 align-middle">
                            <small><b>Email</b></small>
                        </th>
                        <th scope="col" class="text-center px-4 align-middle">
                            <small><b>Telepon</b></small>
                        </th>
                        <th scope="col" class="text-center px-4 align-middle">
                            <small><b>Status</b></small>
                        </th>
                        <th scope="col" class="text-center px-4 align-middle">
                            <small><b>Lainnya</b></small>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alumni as $data) {
                                     if ($data['konfirmasi']=="Verified") {
                                         ?>
                    <tr>
                        <td class="text-center align-middle px-4">
                            <small><a style="color:#00826c;"
                                    href="/alumni/p/1<?= "?o=".$_GET["o"]."&d=".$data['masuk']."&v=1"; ?>"
                                    class=" text-decoration-none">
                                    <center>
                                        <div
                                            style="white-space: nowrap;width: 50px;overflow: hidden;text-overflow:ellipsis;">
                                            <?= $data['masuk']; ?>
                                        </div>
                                    </center>
                                </a></small>
                        </td>
                        <td class="text-center align-middle">
                            <small><a style="color:#00826c;" href="#detail"
                                    onclick="myFunc('<?= $data['id_pendaftaran']; ?>')"
                                    class="text-decoration-none" data-toggle="modal" data-target="#exampleModal">
                                    <center>
                                        <div
                                            style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow:ellipsis;">
                                            <?= $data['nama']; ?>
                                        </div>
                                    </center>
                                </a>
                            </small>
                        </td>
                        <td class="text-center align-middle">
                            <small><a style="color:#00826c;"
                                    href="/alumni/p/1<?= "?o=".$_GET["o"]."&d=".$data['jurusan']."&v=2"; ?>"
                                    class="text-truncate text-decoration-none">
                                    <center>
                                        <div
                                            style="white-space: nowrap;width: 150px;overflow: hidden;text-overflow:ellipsis;">
                                            <?= $data['jurusan']; ?>
                                        </div>
                                    </center>
                                </a></small>
                        </td>
                        <td class="text-center align-middle">
                            <small>
                                <center>
                                    <div
                                        style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow:ellipsis;">
                                        <?= $data['email']; ?>
                                    </div>
                                </center>


                            </small>
                        </td>
                        <td class="text-center align-middle">
                            <small><?= $data['no_telp']; ?></small>
                        </td>
                        <td class="text-center align-middle" style="overflow-y: hidden;">
                            <small><a style="color:#00826c;"
                                    href="/alumni/p/1<?= "?o=".$_GET["o"]."&d=".$data['status']."&v=3"?>"
                                    class="text-decoration-none"><?= $data['status']; ?></a></small>
                        </td>
                        <td class="text-center align-middle px-4" style="overflow-y: hidden;">
                            <small><button type="button" class="border-0 rounded-pill btn btn-info btn-sm"
                                    data-toggle="modal" data-target="#exampleModal" style="width:4rem;"
                                    onclick="myFunc('<?= $data['id_pendaftaran']; ?>')">Detail</button>
                        </td>
                    </tr>
                    <?php
                                     }
                                 }
                    if ($alumni_size==0) {?>
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
        </div>
    </div>
</div>





<nav aria-label=" Page navigation example"  style="margin-bottom:200px;">
    <ul class="pagination justify-content-center">

        <?php
$sisa_bagi = $alumni_size%15;
$jum_page = ($alumni_size-$sisa_bagi)/15;

if ($sisa_bagi>0) {
    $jum_page++;
}
//echo $jum_page;


if ($current_page>1) {?>
        <li class="page-item">
            <a class="page-link text-info"
                href="/alumni/p/<?=$current_page-1;?><?="?o=".$_GET["o"]."&d=".$_GET["d"]."&v=".$_GET["v"];?>"
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

function showLi($current_page, $i)
{
    if ($current_page==$i) {
        echo "<li class='page-item'><a class='page-link  bg-info text-white' href='/alumni/p/".$i."?o=".$_GET["o"]."&d=".$_GET["d"]."&v=".$_GET["v"]."'>".$i."</a></li>";
    } else {
        echo "<li class='page-item'><a class='page-link text-info' href='/alumni/p/".$i."?o=".$_GET["o"]."&d=".$_GET["d"]."&v=".$_GET["v"]."'>".$i."</a></li>";
    }
}

if ($current_page < $jum_page) {?>
        <li class="page-item">
            <a class="page-link text-info"
                href="/alumni/p/<?=$current_page+1;?><?="?o=".$_GET["o"]."&d=".$_GET["d"]."&v=".$_GET["v"];?>"
                aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        <?php
}
?>
    </ul>
</nav>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content" id="id_isi">
            ...

        </div>
    </div>
</div>



<script>
    function myFunc(str) {
        var xhttp;
        if (str == "") {
            document.getElementById("id_isi").innerHTML = "";
            return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("id_isi").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET",
            "<?= base_url();?>/alumni/detail/" +
            str,
            true);
        xhttp.send();
    }
</script>
<?= $this->endSection();
