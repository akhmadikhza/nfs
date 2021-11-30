<div class="row">
    <div class="col-lg-6">

        <?php
        if ($this->session->flashdata('sukses')) {
            echo '<div class="alert alert-success">';
            echo $this->session->flashdata('sukses');
            echo '</div>';
        }
        ?>

    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>

        <a href="<?= base_url('user/tambah') ?>" title="Add User" class="btn btn-success">
            <i class="fa fa-plus"></i>Add New</a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Username</th>

                        <th width="15%">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($user as $user) {  ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $user['nama']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td><?= $user['username']; ?> | <?= $user['akses_level']; ?> </td>



                            <td>


                                <a href="<?= base_url('user/edit/') . $user['id_user']; ?>" title="Edit User" class="btn btn-warning btn-md">
                                    <i class="fa fa-edit"></i></a>
                                <?php
                                include 'delete.php'
                                ?>


                            </td>


                        </tr>
                    <?php $i++;
                    } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>