<?= $this->extend('admin/main'); ?>

<?= $this->section('main_content'); ?>


<span class="navbar-brand p-0 mt-4 mb-0 h1 align-middle"
    style="display:inline-block;color:#000;font-family: 'Roboto', sans-serif;font-size:16pt;">Update Kegiatan dengan ID
    <span style="color:#00826c;"><?= ucwords($kegiatan->id_kegiatan); ?></span></span>
<p class="blockquote-footer"><i><?= $kegiatan->judul_kegiatan; ?></i>
</p>

<?php
if ($post_submit) {
    if ($status) {?>
<div class="container-fluid mt-4 rounded-lg p-0">
    <?php
            echo "<div class='border-0 shadow-lg container text-center alert alert-success text-center'> <b>Data kegiatan berhasil diperbarui!</b><br>Klik tautan di bawah untuk menuju ke halaman utama<br><br><a class='text-decoration-none' href='/admin/kegiatan/p/1'>Kembali
    ke halaman utama</a>
</div>";?>
</div>
<?php
        } else {
            echo "<div class='container text-center alert alert-danger'>Update gagal</div>".$post_submit;
        }
}
    
    ?>



<form id="form" method="post"
    action="/admin/kegiatan/update/<?=$kegiatan->id_kegiatan;?>"
    style="margin-bottom:8%;" enctype="multipart/form-data">
    <?= csrf_field();?>

    <div id="biodata" class="container my-2 px-4 py-2 rounded-lg shadow">


<div class="row">
    <div class="col-md-3">
    <center>
            <img src="<?php echo base_url() . "/img/kegiatan/".$kegiatan->poster_kegiatan; ?>"
                id="thumbnail_1" style="height:auto;width:100%;" class="img-thumbnail rounded img-fluid mt-4" alt="Responsive image">
        </center>
        <div class="input-group my-3">
            <div class="custom-file">
                <input type="file" onchange="preview()" class="custom-file-input" name="gambar" id="id_gambar">
                <input type="hidden" name="temp_gambar"
                    value="<?= $kegiatan->poster_kegiatan;?>">
                <label class="custom-file-label" id="label_gambar" for="inputGroupFile01"><small>Klik untuk ganti
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
    </div>
    <div class="col-md-9">
    <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Judul kegiatan
                        <code>(*)</code></label>
                    <textarea class="form-control form-control-sm  rounded-pill" name="judul" rows="1"
                        value="<?= $kegiatan->judul_kegiatan;?>"
                        placeholder=""><?= $kegiatan->judul_kegiatan;?></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Waktu Kegiatan
                        <code>(*)</code></label>
                    <input type="datetime-local" class="form-control form-control-sm  rounded-pill" name="tanggal" rows="1"
                        value="<?= date_format(date_create($kegiatan->tanggal_kegiatan),"Y-m-d")."T".date_format(date_create($kegiatan->tanggal_kegiatan),"H:i"); ?>"
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
                        value="<?= $kegiatan->peserta_kegiatan;?>"
                        placeholder="Mahasiswa Aktif Teknik Telekomunikasi PENS">
                </div>
            </div>
        </div>
    </div>
</div>




      


        


        


    </div>



    <input type="submit" name="submit" class=" col-sm-12 mr-0 btn btn-info shadow-lg" value="Update">

</form>

<?= $this->endSection();
