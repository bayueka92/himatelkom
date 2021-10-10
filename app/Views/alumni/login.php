<?= $this->extend('main_layout'); ?>

<?= $this->section('main_content'); ?>
<?php
if($status!=""){
   ?>
<div class="alert alert-danger mx-4 text-center" role="alert">
   <?= $status;?>
</div>   
   <?php 
}
?>

<div class="container-fluid d-flex justify-content-center" style="margin-bottom:100px;">
    <div class="card border-0" style="margin:5%;">
        <div class="card-body border-0 text-center">
            <h5 class="card-title mt-0 mb-0">Database Alumni</h5>
            <small class="text-muted">Platform ini ditujukan untuk para alumni Teknik Telekomunikasi PENS</small>
            <hr class="my-4">
            <form method="post" action="/alumni/login">
                <div class="form-group">
                    <input required type="email" name="email"
                        class="form-control form-control-sm text-center rounded-pill" placeholder="Email Anda" value="<?= $email?>"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group form-group-sm">
                    <input required type="password" name="password"
                        class="form-control form-control-sm text-center rounded-pill" id="exampleInputPassword1"
                        placeholder="Tahun Masuk Anda">
                </div>
                <button type="submit" class="btn btn-info btn-block rounded-pill btn-sm">Masuk</button>
            </form>
            <hr class="mt-4">

            <small class="mt-0 card-text text-center text-muted">Belum mendaftarkan diri sebagai alumni?<br>
                <b><a href="/alumni/daftar" class=" mt-0 text-info">Daftar Sekarang</a></b></small>
        </div>
    </div>
</div>


<?= $this->endSection();
