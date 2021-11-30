<div class="col-lg-6">

    <?php

    // echo validation_errors('<div class="alert alert-warning">','</div');

    //error upload
    if (isset($error_upload)) {
        echo '<div class="alert alert-warning">' . $error_upload . '</div>';
    }
    echo form_open_multipart(base_url('admin/artikel/edit_komen/') . $komen['id_komen']);
    ?>

</div>


<div class="row">

    <div class="col-lg-6">
        <div class="form-group">


            <label for="exampleFormControlTextarea1">Edit Komentar</label>


            <input type="hidden" value="<?= $komen['slug_materi']; ?>" name="slug_materi">
            <input type="hidden" value="<?= $komen['id_materi']; ?>" name="id_materi">
            <input type="hidden" value="<?= $komen['id_kelas']; ?>" name="id_kelas">
            <textarea class="form-control text-justify" spellcheck="false" style="height: 200px;" spellcheck="false" name="isi_komen" id="isi_komen" rows="3"><?= htmlentities($komen['isi_komen']); ?></textarea>
            <?= form_error('isi_komen', '<small class="text-danger">', '</small>'); ?>


        </div>

    </div>
</div>




<div class="form-group">
    <button type="submit" name="submit" class="btn btn-sm btn-success">
        <i class="fa fa-save mr-1"></i>Save !
    </button>
    <a href="<?= base_url('admin/artikel/read/') . $komen['slug_materi']; ?> "><button type="button" class="btn btn-sm btn-danger">Back</button></a>


</div>

<?php
echo form_close();
?>