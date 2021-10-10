<?= $this->extend('admin/main'); ?>

<?= $this->section('main_content'); ?>


<span class="navbar-brand p-0 mt-4 mb-0 h1 align-middle"
    style="display:inline-block;color:#000;font-family: 'Roboto', sans-serif;font-size:16pt;">Tambah Kegiatan
    </span>
<p class="blockquote-footer">Tambahkan kegiatan pada form berikut
</p>

<?php
if ($post_submit) {
    if ($status) {?>
<div class="container-fluid mt-4 rounded-lg p-0">
    <?php
            echo "<div class='border-0 shadow-lg container text-center alert alert-success text-center'> <b>Data kegiatan berhasil ditambahkan!</b><br>Klik tautan di bawah untuk menuju ke halaman utama<br><br><a class='text-decoration-none' href='/admin/kegiatan/p/1'>Kembali
    ke halaman utama</a>
</div>";?>
</div>
<?php
        } else {
            echo "<div class='container text-center alert alert-danger'>tambah gagal</div>".$post_submit;
        }
}
    
    ?>



<form id="form" method="post"
    action="/admin/kegiatan/tambah"
    style="margin-bottom:8%;" enctype="multipart/form-data">
    <?= csrf_field();?>

    <div id="biodata" class="container my-2 px-4 py-2 rounded-lg shadow">


<div class="row">

    <div class="col-md-12">
    <div class="input-group my-3">
            <div class="custom-file">
                <input type="file"  required onchange="preview()" class="custom-file-input" name="gambar" id="id_gambar">
                <input type="hidden" name="temp_gambar">
                <label class="custom-file-label" id="label_gambar" for="inputGroupFile01"><small>Klik untuk tambah
                    poster</small></label>
            </div>
            <div class="invalid-feedback">

            </div>
        </div>
        <script>
            function preview() {
                const gambar = document.querySelector("#id_gambar");
                const gambarLabel = document.querySelector("#label_gambar");
                const imgPreview = document.querySelector(".img-thumbnail");

                gambarLabel.textContent = gambar.files[0].name;

                const fileGambar = new FileReader();
                fileGambar.readAsDataUrl(gambar.files[0]);
                fileGambar.onload = function(e) {
                    gambarLabel.textContent = e.target.result;
                    imgPreview.src = e.target.result;
                }
            }
        </script>
    <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Judul kegiatan
                        <code>(*)</code></label>
                    <textarea class="form-control form-control-sm  rounded-pill" name="judul" rows="1" required
                        
                        placeholder=""></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Waktu Kegiatan
                        <code>(*)</code></label>
                    <input type="datetime-local" class="form-control form-control-sm rounded-pill" name="tanggal" rows="1" required
                        placeholder="mm/dd/yyyy H:m:s">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Peserta Kegiatan
                        <code>(*)</code></label>
                    <input type="text" class="form-control form-control-sm  rounded-pill" name="peserta" rows="1"
                    required
                        placeholder="Mahasiswa Aktif Teknik Telekomunikasi PENS">
                </div>
            </div>
        </div>
    </div>
</div>




      


        


        


    </div>



    <input type="submit" name="submit" class=" col-sm-12 mr-0 btn btn-info shadow-lg" value="Insert">

</form>

<?= $this->endSection();
