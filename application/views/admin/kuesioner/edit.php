<?php


echo form_open(base_url('admin/kuesioner/edit/') . $question['id_question']);
?>



<div class="row">
    <div class="col-12 col-lg-6">
        <div class="form-group">
            <label for="ask">Pertanyaan</label>
            <input type="text" name="ask" class="form-control" id="ask" value="<?= $question['ask'] ?>">
            <small class="form-text text-danger"><?= form_error('ask'); ?></small>
        </div>



    </div>
</div>
<button type="submit" class="btn btn-success btn-sm">Save !</button>
<a href="<?= base_url('admin/kuesioner'); ?> "><button type="button" class="btn btn-sm btn-danger">Back</button></a>
<?php
echo form_close();
?>