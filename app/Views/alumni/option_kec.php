<option value="">Pilih</option>
<?php
foreach ($kec as $data) {
    ?>
<option value="<?= $data["id_kec"]?>"><?= $data["nama"]; ?>
</option>
<?php
}
