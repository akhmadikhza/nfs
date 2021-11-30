<?php




//form opeb
echo form_open(base_url('user/tambah'));
?>
<div class="row">
    <div class="col-md-6">

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="nama" class="form-control" value="<?= set_value('nama') ?>">
            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= set_value('email') ?>">
            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
        </div>


        <div class="form-group">
            <label>Level Hak Akses*</label>
            <select name="akses_level" class="form-control" class="form-control">
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select>


        </div>

    </div>


    <div class="col-md-6">

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?= set_value('username') ?>">
            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
        </div>



        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" value="<?= set_value('password') ?>">
            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
        </div>




        <div class="form-group mt-5">

            <input type="submit" name="submit" class="btn btn-success" value="Save">
            <input type="reset" name="reset" class="btn btn-danger " value="Reset">
        </div>




    </div>

</div>

<?php
//form close

echo form_close();
?>