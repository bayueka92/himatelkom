<?= $this->extend('main_layout'); ?>

<?= $this->section('main_content'); ?>

<?php
if ($post_submit) {
    if ($status) {?>
<div class="container mt-5 rounded-lg p-0">
    <?php
            echo "<div class='border-0 shadow-lg container text-center alert alert-success text-center'> <b>Terima kasih, Sdr. $nama atas kerjasamanya!</b><br>Kami akan memvalidasi data tersebut terlebih dahulu sebelum dapat tampil pada Database Alumni HIMA Telkom PENS.<br><br><a class='text-decoration-none' href='".base_url()."'>Kembali
    ke halaman utama</a>
</div>";?>
</div>
<?php
        } else {
            echo "<div class='container text-center alert alert-danger'> Pendaftaraan Gagal.</div>".$post_submit;
        }
}
    
    ?>
<div class="text-center mt-4 container mb-5 px-4 rounded-lg shadow">
    <p class="py-4">Silakan melengkapi data profil anda sesuai dengan form yang disediakan. Jika
        terdapat
        tanda "<b><code>(*)</code></b>", maka wajib diisi.</p>
</div>
<form id="form" method="post" action="/alumni/daftar" style="margin-bottom:8%;">
    <?= csrf_field();?>
    <div class="container my-5 px-4 py-2 rounded-lg shadow">
        <h5 class="card-title mt-4">Biodata</h5>
        <p class="card-subtitle mb-4 text-muted">Isikan sesuai biodata anda.</p>
        <hr>


        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Nama Lengkap
                        <code>(*)</code></label>
                    <input required type="text" name="nama" class="form-control form-control-sm  rounded-pill"
                        placeholder="Contoh : Ahmad Azzam">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Nama Panggilan</label>
                    <input type="text" name="nick" class="form-control form-control-sm  rounded-pill"
                        placeholder="Contoh : Azzam">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Tempat Lahir
                        <code>(*)</code></label>
                    <input required type="text" name="tempat_lahir" class="form-control form-control-sm  rounded-pill"
                        placeholder="Contoh : Surabaya">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Tanggal Lahir
                        <code>(*)</code></label>
                    <input required type="date" name="tanggal_lahir" class="form-control form-control-sm  rounded-pill">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Jenis Kelamin
                        <code>(*)</code></label>
                    <select class="form-control form-control-sm  rounded-pill" name="jk">
                        <option value="">Pilih</option>
                        <option value="1">Laki-laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Agama
                        <code>(*)</code></label>
                    <select class="form-control form-control-sm  rounded-pill" name="agama">
                        <option value="">Pilih</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Alamat / Domisili
                        <code>(*)</code></label>
                    <textarea class="form-control form-control-sm  rounded-pill" name="alamat" rows="1" id="alamat"
                        placeholder="Contoh : Perumahan Griya Candramas Blok A-17"></textarea>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Kode Pos</label>
                    <input type="number" name="kode_pos" class="form-control form-control-sm  rounded-pill"
                        placeholder="Contoh : 61251">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Provinsi
                        <code>(*)</code></label>
                    <select class="form-control form-control-sm  rounded-pill" name="provinsi" id="provinsi"
                        onchange="get_kab()">
                        <option value="">Pilih</option>
                        <?php
                        foreach ($provinsi as $data) {?>
                        <option
                            value="<?= $data["id_prov"];?>">
                            <?= $data["nama"];?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Kabupaten
                        <code>(*)</code></label>
                    <select class="form-control form-control-sm  rounded-pill" name="kabupaten" id="kabupaten"
                        onchange="get_kec()">
                        <!-- Kabupaten akan diload menggunakan ajax, dan ditampilkan disini -->
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Kecamatan
                        <code>(*)</code></label>
                    <select class="form-control form-control-sm  rounded-pill" name="kecamatan" id="kecamatan">
                        <!-- Kecamatan akan diload menggunakan ajax, dan ditampilkan disini -->
                    </select>
                </div>
            </div>

        </div>
        <script>
            function get_kab() {

                var xhttp;
                var str = document.getElementById("provinsi").value;

                if (str == "") {
                    document.getElementById("kabupaten").innerHTML = "";
                    return;
                }
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("kabupaten").innerHTML = this.responseText;
                    }
                };

                xhttp.open("GET",
                    "<?= base_url();?>/alumni/data_kab/" +
                    str,
                    true);
                xhttp.send();
            }

            function get_kec() {
                var xhttp;
                var str = document.getElementById("kabupaten").value;
                if (str == "") {
                    document.getElementById("kecamatan").innerHTML = "";
                    return;
                }
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("kecamatan").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET",
                    "<?= base_url();?>/alumni/data_kec/" +
                    str,
                    true);
                xhttp.send();
            }



            /*
            $("#provinsi").change(function() {
                // variabel dari nilai combo provinsi
                var id_provinsi = $("#provinsi").val();

                // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil-data.php",
                    data: "provinsi=" + id_provinsi,
                    success: function(data) {
                        $("#kabupaten").html(data);
                    }
                });
            });

            $("#kabupaten").change(function() {
                // variabel dari nilai combo box kabupaten
                var id_kabupaten = $("#kabupaten").val();

                // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil-data.php",
                    data: "kabupaten=" + id_kabupaten,
                    success: function(data) {
                        $("#kecamatan").html(data);
                    }
                });
            });
            */
        </script>
    </div>
    <div class="container my-5 px-4 py-2 rounded-lg shadow">
        <h5 class="card-title mt-4">Kontak Yang Dapat Dihubungi</h5>
        <p class="card-subtitle mb-4 text-muted">Isikan data kontak anda yang aktif dan dapat dihubungi.</p>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Email
                        <code>(*)</code></label>
                    <input required type="text" name="email" class="form-control form-control-sm  rounded-pill"
                        placeholder="Contoh : ahmad@gmail.com">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Nomor WhatsApp
                        <code>(*)</code></label>
                    <input required type="number" name="no_wa" class="form-control form-control-sm  rounded-pill"
                        placeholder="Contoh : 0821xxxxxxxx">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Nomor Telepon
                        <code>(*)</code></label>
                    <input required type="number" name="no_telp" class="form-control form-control-sm  rounded-pill"
                        placeholder="Contoh : 0821xxxxxxxx">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Username LinkedIn</label>
                    <input type="text" name="linked" class="form-control form-control-sm  rounded-pill"
                        placeholder="Contoh : ahmadazzam">
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5 px-4 py-2 rounded-lg shadow">
        <h5 class="card-title mt-4">Riwayat Pendidikan Terakhir di PENS</h5>
        <p class="card-subtitle mb-4 text-muted">Isikan sesuai riwayat pendidikan terakhir anda di jurusan
            Teknik
            Telekomunikasi PENS.</p>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Jenjang Terakhir
                        <code>(*)</code></label>
                    <select class="form-control form-control-sm  rounded-pill" name="jurusan">
                        <option value="">Pilih</option>
                        <option value="D3 Teknik Telekomunikasi">D3 Teknik Telekomunikasi</option>
                        <option value="D3 PJJ Teknik Telekomunikasi">D3 PJJ Teknik Telekomunikasi</option>
                        <option value="D4 Teknik Telekomunikasi">D4 Teknik Telekomunikasi</option>
                        <option value="D4 LJ Teknik Telekomunikasi">D4 LJ Teknik Telekomunikasi</option>
                        <option value="D4 PJJ Teknik Telekomunikasi">D4 PJJ Teknik Telekomunikasi</option>
                        <option value="S2 Teknik Telekomunikasi">S2 Teknik Telekomunikasi</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">NRP Terakhir</label>
                    <input type="number" name="nrp" class="form-control form-control-sm  rounded-pill"
                        placeholder="Contoh : 2220******">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Angkatan / Tahun Masuk
                        <code>(*)</code></label>
                    <select class="form-control form-control-sm  rounded-pill" name="masuk">
                        <option value="">Pilih</option>
                        <?php
                        for ($i=date("Y")-15;$i<=date("Y")-3;$i++) {
                            ?>
                        <option value="<?= $i; ?>">
                            <?= $i; ?>
                        </option>
                        <?php
                        }
                        ?>

                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Tahun Lulus
                        <code>(*)</code></label>
                    <select class="form-control form-control-sm  rounded-pill" name="lulus">
                        <option value="">Pilih</option>
                        <?php
                        for ($i=date("Y")-15;$i<=date("Y");$i++) {
                            ?>
                        <option value="<?= $i; ?>">
                            <?= $i; ?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Judul Tugas Akhir
                    </label>
                    <input type="text" name="TA" class="form-control form-control-sm  rounded-pill"
                        placeholder="Contoh : Rancang Bangun Aplikasi . . .">
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5 px-4 py-2 rounded-lg shadow">
        <h5 class="card-title mt-4">Status Pekerjaan</h5>
        <p class="card-subtitle mb-4 text-muted">Isikan data pekerjaan anda saat ini.</p>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Status Saat Ini
                        <code>(*)</code></label>
                    <select class="form-control form-control-sm  rounded-pill" name="status">
                        <option selected>Pilih</option>
                        <option value="Bekerja">Bekerja</option>
                        <option value="Mencari Pekerjaan">Mencari Pekerjaan</option>
                        <option value="Lanjut Kuliah">Lanjut Kuliah</option>
                        <option value="Usaha">Usaha</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Pekerjaan</label>
                    <input type="text" name="kerja" class="form-control form-control-sm  rounded-pill"
                        placeholder="Contoh : PNS, BUMN, Pegawai Swasta, Pelajar">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Nama Instansi /
                        Institusi / Usaha</label>
                    <input type="text" name="tempat_kerja" class="form-control form-control-sm  rounded-pill"
                        placeholder="Contoh : Kemenkominfo, Telkom Indonesia, Institut Teknologi Sepuluh Nopember">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Alamat Instansi /
                        Institusi / Usaha</label>
                    <input type="text" name="alamat_kerja" class="form-control form-control-sm  rounded-pill"
                        placeholder="Contoh : Jl. Dr. Ir. H. Soekarno No.175, Klampis Ngasem, Sukolilo, Surabaya">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Jabatan
                    </label>
                    <input type="text" name="jabatan" class="form-control form-control-sm  rounded-pill"
                        placeholder="Contoh : Direktur Utama, Manajer, Staff, Mahasiswa">
                </div>
            </div>
        </div>

    </div>
    <div class="container my-5 rounded-lg p-0">

        <input type="submit" name="submit" id="Submit" class=" col-sm-12 mr-0 btn btn-info shadow-lg" value="SUBMIT">

    </div>
</form>

<?= $this->endSection();
