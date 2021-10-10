<div class="modal-header px-4">
    <h6 class="modal-title" style="line-height: 1.15;"><span class="text-info ">
            <?= $alumni->nama;?>
        </span><br>
        <small class="text-muted mt-0"><?= $alumni->email;?></small>
    </h6>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body px-4" id="hehe">
    <small class="text-muted mt-2 mb-0 ">Nama
        Lengkap</small>
    <h6 class="mb-2  font-weight-normal"><?= $alumni->nama;?>
    </h6>
    <small class="text-muted mb-0 ">Nama
        Panggilan</small>
    <h6 class="mb-2  font-weight-normal"><?= $alumni->nick;?>
    </h6>
    <small class="text-muted mb-0 ">Tempat dan
        Tanggal Lahir</small>
    <h6 class="mb-2  font-weight-normal"><?= $alumni->tempat_lahir;?>,
        <?= toDate($alumni->tanggal_lahir);?>
    </h6>
    <small class="text-muted mb-0 ">Jenis
        Kelamin</small>
    <h6 class="mb-2  font-weight-normal"><?php if($alumni->jk==1){echo "Laki-laki";}elseif($alumni->jk==2){echo "Perempuan";}?>
    </h6>
    <small class="text-muted mb-0 ">Agama</small>
    <h6 class="mb-2  font-weight-normal"><?= $alumni->agama;?>
    </h6>
    <small class="text-muted mb-0 ">Alamat</small>
    <h6 class="mb-2  font-weight-normal"><?= $alumni->alamat;?>, Kec.
        <?= $alumni->nama_kec;?>, Kab. <?= $alumni->nama_kab;?>, <?= $alumni->nama_prov;?> <?= $alumni->kode_pos;?>
    </h6>
    <hr class="mt-4">
    <small class="text-muted mb-0 ">Email</small>
    <h6 class="mb-2  font-weight-normal"><?= $alumni->email;?>
    </h6>
    <small class="text-muted mb-0 ">Nomor
        WhatsApp</small>
    <h6 class="mb-2  font-weight-normal"><?= $alumni->no_wa;?>
    </h6>
    <small class="text-muted mb-0 ">Nomor
        Telepon</small>
    <h6 class="mb-2  font-weight-normal"><?= $alumni->no_telp;?>
    </h6>
    <small class="text-muted mb-0 ">Username
        LinkedIn</small>
    <h6 class="mb-2  font-weight-normal"><?= $alumni->linked;?>
    </h6>
    <hr class="mt-4">
    <small class="text-muted mb-0 ">Jenjang
        Terakhir</small>
    <h6 class="mb-2  font-weight-normal"><?= $alumni->jurusan;?>
    </h6>
    <small class="text-muted mb-0 ">NRP
        Terakhir</small>
    <h6 class="mb-2  font-weight-normal"><?= $alumni->NRP;?>
    </h6>
    <small class="text-muted mb-0 ">Tahun
        Masuk</small>
    <h6 class="mb-2  font-weight-normal"><?= $alumni->masuk;?>
    </h6>
    <small class="text-muted mb-0 ">Tahun
        Lulus</small>
    <h6 class="mb-2  font-weight-normal"><?= $alumni->lulus;?>
    </h6>
    <small class="text-muted mb-0 ">Judul Tugas
        Akhir</small>
    <h6 class="mb-2  font-weight-normal"><?= $alumni->TA;?>
    </h6>
    <hr class="mt-4">
    <small class="text-muted mb-0 ">Status
        Pekerjaan</small>
    <h6 class="mb-2  font-weight-normal"><?= $alumni->status;?>
    </h6>
    <small class="text-muted mb-0 ">Pekerjaan</small>
    <h6 class="mb-2  font-weight-normal"><?= $alumni->kerja;?>
    </h6>
    <small class="text-muted mb-0 ">Nama
        Institusi</small>
    <h6 class="mb-2  font-weight-normal"><?= $alumni->tempat_kerja;?>
    </h6>
    <small class="text-muted mb-0 ">Alamat
        Institusi</small>
    <h6 class="mb-2  font-weight-normal"><?= $alumni->alamat_kerja;?>
    </h6>
    <small class="text-muted mb-0 ">Jabatan</small>
    <h6 class="mb-2  font-weight-normal">
        <?= $alumni->jabatan;?>
    </h6>
    <hr class="mt-4">
</div>
<div class="modal-footer" style="text-align:center;">
    <small class="text-muted text-center" style="margin:0 auto;">Data terakhir diubah pada tanggal <?= toDate($alumni->created_at);?><br>
        Silakan kirimkan laporan ke alamat email <a href="mailto:f.ikhsanta@gmail.com"
            class="text-decoration-none text-info">himatel.pens@gmail.com</a> ke jika terdapat
        kesalahan
        data</small>
</div>

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
