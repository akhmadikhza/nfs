<div class="col-lg-11">


    <div class="row">
        <div class="col-lg-6">

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>


            <?php if ($this->session->flashdata('flash')) : ?>

            <?php endif; ?>

            <?php

            echo validation_errors('<div class="alert alert-warning">', '</div>');

            include('tambah.php');
            ?>


        </div>
    </div>





    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Question</th>
                <th>Created By</th>
                <th>Date</th>
                <th width="16%">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php $i = 1;
            foreach ($kuesioner as $kuesioner) { ?>



                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $kuesioner['ask']; ?></td>
                    <td><?php echo $kuesioner['nama']; ?></td>
                    <td><?php echo $kuesioner['date_created']; ?></td>
                    <td>


                        <a href="<?= base_url('admin/kuesioner/edit/') . $kuesioner['id_question']; ?>" title="Edit Materi" class="btn btn-warning btn-sm ">
                            <i class="fa fa-edit"></i>Edit</a>
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