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
            <h5 class="card-title mt-0 mb-0">ADMIN HIMA TELKOM PENS</h5>
            <small class="text-muted">Halaman khusus Admin Website HIMA TELKOM PENS</small>
            <hr class="my-4">
            <form method="post" action="/admin/login">
                <div class="form-group">
                    <input required type="email" name="email"
                        class="form-control form-control-sm text-center rounded-pill" placeholder="Email">
                </div>
                <div class="form-group form-group-sm">
                    <input required type="password" name="password"
                        class="form-control form-control-sm text-center rounded-pill" id="exampleInputPassword1"
                        placeholder="Password">
                </div>
                <button type="submit" class="btn btn-info btn-block rounded-pill btn-sm">Masuk</button>
            </form>
            <hr class="mt-4">

        </div>
    </div>
</div>


<?= $this->endSection();
