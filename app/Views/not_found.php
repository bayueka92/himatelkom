<?= $this->extend('main_layout'); ?>

<?= $this->section('main_content'); ?>

<div class="text-center" style="margin-top:10%;margin-bottom:8%;">
  <img src="<?= base_url();?>/img/not-found.png" class="img-fluid rounded" style="width:400px;height:auto;" alt="...">
  <h5 class="text-info">Oops!! Halaman Tidak Ditemukan</h5>
</div>

<?= $this->endSection();
