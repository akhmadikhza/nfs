<div class="col-lg-6">

    <?php

    // echo validation_errors('<div class="alert alert-warning">','</div');

    //error upload
    if (isset($error_upload)) {
        echo '<div class="alert alert-warning">' . $error_upload . '</div>';
    }
    echo form_open_multipart(base_url('admin/artikel/reply_net/') . $komen['id_komen']);
    ?>

</div>


<div class="row">

    <div class="col-lg-6">
        <div class="form-group">


            <label class="text-success">Reply to <?= $komen['nama']; ?></label>

            <div class="card text-justify">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item border border-success"><?= htmlentities($komen['isi_komen']); ?></li>
                </ul>
            </div>


            <input type="hidden" value="<?= $komen['slug_materi']; ?>" name="slug_materi">
            <input type="hidden" value="<?= $komen['comment_status']; ?>" name="comment_status">
            <input type="hidden" value="<?= $komen['id_materi']; ?>" name="id_materi">
            <input type="hidden" value="<?= $komen['id_kelas']; ?>" name="id_kelas">
            <textarea class="form-control text-justify" spellcheck="false" style="height: 200px;" name="isi_komen" id="exampleFormControlTextarea1" rows="3" placeholder="Type something..." required></textarea>
            <?= form_error('isi_komen', '<small class="text-danger">', '</small>'); ?>


        </div>

    </div>
</div>




<div class="form-group">
    <button type="submit" name="submit" class="btn btn-success btn-sm">
        <i class="fa fa-save mr-1"></i>Save !
    </button>
    <a href="<?= base_url('admin/artikel/read/') . $komen['slug_materi']; ?> "><button type="button" class="btn btn-sm btn-danger">Back</button></a>


</div>

<?php
echo form_close();
?>