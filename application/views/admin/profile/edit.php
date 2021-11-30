<div class="row">
    <div class="col-lg-6">

        <?php

        if (isset($error_upload)) {
            echo '<div class="alert alert-warning">' . $error_upload . '</div>';
        }

        ?>

    </div>
</div>





<div class="row">
    <div class="col-lg-8">

        <?= form_open_multipart('admin/profile/edit'); ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="flash-profile" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>

            </div>
        </div>


        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="no_telp" class="col-sm-2 col-form-label">No Telp</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $user['no_telp']; ?>">
            </div>
        </div>





        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Full name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">Picture</div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-3">
                        <img src="<?= base_url('assets/image/profile/') . $user['image']; ?>" class="img-thumbnail profile-img">

                    </div>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row justify-content-end">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-success">Edit</button>
                <a href="<?= base_url('admin/route'); ?> "><button type="button" class="btn btn-danger">Back</button></a>
            </div>
        </div>


        </form>


    </div>
</div>