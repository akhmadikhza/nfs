<?php


echo form_open(base_url('admin/category/edit/') . $kelas['id_kelas']);
?>



<div class="row">
  <div class="col-12 col-lg-6">
    <div class="form-group">
      <label for="name">Nama Kelas</label>
      <input type="text" name="nama_kelas" class="form-control" id="name" value="<?= $kelas['nama_kelas'] ?>">
      <small class="form-text text-danger"><?= form_error('name'); ?></small>
    </div>



  </div>
</div>
<button type="submit" class="btn btn-success btn-sm">Save !</button>
<?php
echo form_close();
?>