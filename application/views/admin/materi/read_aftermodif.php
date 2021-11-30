<div class="col-lg-6">

    <?php

    //error upload
    if (isset($error_upload)) {
        echo '<div class="alert alert-warning">' . $error_upload . '</div>';
    }
    ?>

</div>

<div class="row">
    <div class="col-lg-4">

        <?php
        $user_aktif = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $email             = $this->input->post('email');
        $password         = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($this->session->flashdata('sukses')) {
            echo '<div class="alert alert-success">';
            echo $this->session->flashdata('sukses');
            echo '</div>';
        }





        ?>

    </div>
</div>



<div class="row">
    <div class="col-lg-12 d-flex justify-content-center">
        <h5 class="text-center text-success font-weight-bold "><?= $title; ?></h5>
    </div>
</div>



<div class="row d-flex justify-content-center">
    <div class="col-lg-8">

        <img src="<?= base_url('assets/image/artikel/thumbs/') . $materi['file_materi']; ?>" class="card-img image_read mb-2">


    </div>
</div>








<div class="row ">
    <div class="col-lg-1 d-none d-lg-block .d-xl-none">
        <img src="<?= base_url('assets/image/profile/') . $materi['image']; ?>" class="card-img mt-2 icon_read img-thumbnail">
    </div>


    <div class="col-lg-10">
        <div class="card" style="padding: 15px;">
            <p class="text-success font-weight-bold"><?= $materi['nama']; ?></p>


            <?= $materi['isi_materi']; ?>
            <br />

            <p><i class="far fa-calendar text-secondary" style="margin-right: 10px; font-size: 13px;"> <?= date('F j Y,H:i T', strtotime($materi['tanggal_post'])); ?></i></p>
        </div>
    </div>
</div>




<!-- Personal Komentar -->
<div class="row">

    <?php
    $slug =  $slug;
    $query = $this->db->query("SELECT * FROM komen LEFT JOIN user ON komen.id_user = user.id_user WHERE comment_status='0' AND slug_materi = '$slug'");
    foreach ($query->result_array() as $utama) :
    ?>



        <div class="col-lg-1 col-2">
            <img src="<?= base_url('assets/image/profile/') . $utama['image']; ?>" class="card-img mt-1  img-thumbnail">

        </div>

        <div class="col-lg-10 col-10">
            <div class="card" style="padding: 10px;">

                <p class="font-weight-bold  mr-1"><?= $utama['nama']; ?> </p>
                <span class="small" style="margin-top: -15px;"><?= $utama['nama']; ?> | <?= date(' F j Y,H:i', strtotime($utama['tanggal_post'])); ?></span>

                <p style="margin-top:5px"><?= $utama['isi_komen']; ?></p>
                <a href="<?= base_url('assets/upload/lampiran/' . $utama['file_baru']); ?>" class="text-success font-italic" style="font-size:15px;" target="_blank"><?= $utama['file_baru']; ?></a>

                <!-- Button Edit -->





                <div class="row">
                    <div class="col-lg-6">

                        <form action="<?= base_url('admin/artikel/balas'); ?>" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="slug_materi" value="<?php echo $utama['slug_materi'] ?>">
                            <input type="hidden" value="<?= $materi['id_materi']; ?>" name="id_materi">
                            <input type="hidden" value="<?= $materi['id_kelas']; ?>" name="id_kelas">
                            <textarea type="hidden" class="form-control" name="isi_komen"></textarea>

                            <button type="submit" class="btn btn-success btn-sm btn-komen" value="<?= $utama['id_komen']; ?>">
                                <i class="fa fa-reply"></i> Reply
                            </button>

                        </form>


                    </div>
                </div>



                <?php if ($this->session->userdata('id_user') == $utama['id_user']) { ?>

                    <div class=" row mt-2">
                        <div class="col-lg-6">
                            <div class="form-group">


                                <a href="<?= base_url('admin/materi/edit_komen/') . $utama['id_komen']; ?>" title="Edit Materi" class="btn btn-warning btn-sm">
                                    <i class=" fa fa-edit"></i>Edit</a>
                                <?php
                                include 'delete_komen.php'
                                ?>

                            </div>
                        </div>

                    </div>
                <?php } ?>


                <!-- End Button Edit -->

                <!-- Start Balas -->

                <?php
                $slug = $slug;
                $id_komen = $utama['id_komen'];
                $query = $this->db->query("SELECT * FROM komen LEFT JOIN user ON komen.id_user = user.id_user WHERE comment_status='$id_komen' AND slug_materi = '$slug'");
                foreach ($query->result_array() as $balasan) :
                ?>
                    <div class="container">

                        <p>
                            <b><?php echo $balasan['nama']; ?></b>
                            <br><?php echo $balasan['isi_komen']; ?>
                        </p>

                    </div>



                <?php endforeach; ?>
                <!-- End Balas -->





            </div>

        </div>


    <?php endforeach; ?>









</div>



<!--End Personal Komentar  -->




<div class=" row">
    <!-- Kolom Komentar -->
    <div class="col-lg-1">

    </div>


    <div class="col-lg-8">
        <form action="<?= base_url('admin/artikel/komentar'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">


                <label for="exampleFormControlTextarea1">Komentar</label>
                <input type="hidden" value="<?= $materi['slug_materi']; ?>" name="slug_materi">
                <input type="hidden" value="<?= $materi['id_materi']; ?>" name="id_materi">
                <input type="hidden" value="<?= $materi['id_kelas']; ?>" name="id_kelas">
                <textarea class="form-control" name="isi_komen" id="exampleFormControlTextarea1" rows="3" required=""></textarea>

                <?= form_error('isi_komen', '<small class="text-danger">', '</small>'); ?>
            </div>


            <button type="submit" name="submit" class="btn btn-primary ">Send</button>
            <input type="file" name="file_baru" style="font-size: 13px;">



        </form>
    </div>
    <!-- End Komentar -->

</div>