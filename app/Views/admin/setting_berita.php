<?= $this->extend('admin/main'); ?>

<?= $this->section('main_content'); ?>


<span class="navbar-brand p-0 mt-4 mb-0 h1 align-middle"
    style="display:inline-block;color:#000;font-family: 'Roboto', sans-serif;font-size:16pt;">Update Berita dengan ID
    <span style="color:#00826c;"><?= ucwords($berita->id_berita); ?></span></span>
<p class="blockquote-footer"><i><?= $berita->judul_berita; ?></i>
</p>

<?php
if ($post_submit) {
    if ($status) {?>
<div class="container-fluid mt-4 rounded-lg p-0">
    <?php
            echo "<div class='border-0 shadow-lg container text-center alert alert-success text-center'> <b>Data berita berhasil diperbarui!</b><br>Klik tautan di bawah untuk menuju ke halaman utama<br><br><a class='text-decoration-none' href='/admin/berita/p/1'>Kembali
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
    action="/admin/berita/update/<?=$berita->id_berita;?>"
    style="margin-bottom:8%;" enctype="multipart/form-data">
    <?= csrf_field();?>
    <div class="form-check mt-4">
            <input class="form-check-input" type="checkbox" value="" name="tampil" id="defaultCheck1" <?php if($berita->tampil){echo"checked";}?>>
            <label class="form-check-label" for="defaultCheck1">
                Tampilkan Berita
            </label>
        </div>
    <div id="biodata" class="container my-2 px-4 py-2 rounded-lg shadow">
        <center>
            <img src="<?php echo base_url() . "/img/berita/".$berita->gambar_berita; ?>"
                id="thumbnail_1" class="img-thumbnail rounded img-fluid mt-4" alt="Responsive image">
        </center>
        <div class="input-group my-3">
            <div class="custom-file">
                <input type="file" onchange="preview()" class="custom-file-input" name="gambar" id="id_gambar">
                <input type="hidden" name="temp_gambar"
                    value="<?= $berita->gambar_berita;?>">
                <label class="custom-file-label" id="label_gambar" for="inputGroupFile01">Klik untuk mengubah
                    gambar</label>
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


        <hr>


        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Judul Berita
                        <code>(*)</code></label>
                    <textarea class="form-control form-control-sm  rounded-pill" name="judul" rows="1"
                        value="<?= $berita->judul_berita;?>"
                        placeholder=""><?= $berita->judul_berita;?></textarea>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Kategori
                        <code>(*)</code></label>
                    <select class="form-control form-control-sm  rounded-pill" name="kategori">
                        <option
                            value="<?= $berita->kategori_berita;?>">
                            <?= ucwords($berita->kategori_berita);?>
                        </option>
                        <option value="kegiatan">Kegiatan</option>
                        <option value="hiburan">Hiburan</option>
                        <option value="akademik">Akademik</option>
                        <option value="prestasi">Prestasi</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Isi Berita
                        <code>(*)</code></label>
                    <textarea class="form-control form-control-sm  rounded" name="konten" rows="5"
                        value="<?= $berita->konten_berita;?>"
                        placeholder=""><?= $berita->konten_berita;?></textarea>
                </div>
            </div>
        </div>


    </div>



    <input type="submit" name="submit" class=" col-sm-12 mr-0 btn btn-info shadow-lg" value="Update">

</form>

<?= $this->endSection();
