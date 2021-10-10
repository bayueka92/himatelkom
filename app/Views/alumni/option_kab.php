<option value="">Pilih</option>
<?php
foreach ($kab as $data) {
    ?>
<option value="<?= $data["id_kab"]?>"><?= $data["nama"]; ?>
</option>
<?php
}
