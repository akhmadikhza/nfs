<button type="button" class="btn btn-success fa mb-3" data-toggle="modal" data-target="#Tambah">
    <i class="fa fa-plus"></i> Add New
</button>



<div class="modal fade" id="Tambah">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php
                $attribut = 'class="form-horizontal"';

                echo form_open(base_url('admin/kuesioner'), $attribut);
                ?>

                <div class="form-group row">
                    <label class="col-lg-12 form-label">Pertanyaan</label>
                    <div class="col-lg">
                        <input type="text" class="form-control" name="ask" placeholder="Pertanyaan..." required="">
                    </div>
                </div>








            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light">Save !</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<?php
echo form_close();
?>