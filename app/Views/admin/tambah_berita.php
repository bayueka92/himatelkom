<?= $this->extend('admin/main'); ?>

<?= $this->section('main_content'); ?>


<span class="navbar-brand p-0 mt-4 mb-0 h1 align-middle"
    style="display:inline-block;color:#000;font-family: 'Roboto', sans-serif;font-size:16pt;">Tambah Berita</span>
<p class="blockquote-footer">Tambahkan artikel berita pada form berikut
</p>

<?php
if ($post_submit) {
    if ($status) {?>
<div class="container-fluid mt-4 rounded-lg p-0">
    <?php
            echo "<div class='border-0 shadow-lg container text-center alert alert-success text-center'> <b>Data berita berhasil ditambahkan!</b><br>Klik tautan di bawah untuk menuju ke halaman utama<br><br><a class='text-decoration-none' href='/admin/berita/p/1'>Kembali
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
    action="/admin/berita/tambah"
    style="margin-bottom:8%;" enctype="multipart/form-data">
    <?= csrf_field();?>
    <div id="biodata" class="container my-2 px-4 py-2 rounded-lg shadow">
        <div class="input-group my-3">
            <div class="custom-file">
                <input type="file" onchange="preview()" class="custom-file-input" name="gambar" id="id_gambar" required>
                <input type="hidden" name="temp_gambar"
                    >
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
                

                gambarLabel.textContent = gambar.files[0].name;
            }
        </script>


        <hr>


        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Judul Berita
                        <code>(*)</code></label>
                    <textarea required class="form-control form-control-sm  rounded-pill" name="judul" rows="1"
                       
                        placeholder=""></textarea>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Kategori
                        <code>(*)</code></label>
                    <select class="form-control form-control-sm  rounded-pill" name="kategori" required>
                        <option selected>
                            Pilih</option>
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
                    required
                        placeholder=""></textarea>
                </div>
            </div>
        </div>


    </div>



    <input type="submit" name="submit" class=" col-sm-12 mr-0 btn btn-info shadow-lg" value="Insert">

</form>

<?= $this->endSection();
