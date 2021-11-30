<div class="row">
    <div class="col-lg-6">

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>


        <?php if ($this->session->flashdata('flash')) : ?>

        <?php endif; ?>


    </div>
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


<!-- 
<div class="row">
    <div class="col-lg-12 d-flex justify-content-center">
        <h5 class="text-center text-success font-weight-bold"><?= $title; ?></h5>
    </div>
</div> -->



<div class="row d-flex justify-content-center">
    <div class="col-lg-8">

        <img src="<?= base_url('assets/image/artikel/thumbs/') . $materi['file_materi']; ?>" class="card-img image_read mb-2">


    </div>
</div>








<div class="row ">
    <div class="col-lg-1 d-none d-lg-block .d-xl-none">
        <img src="<?= base_url('assets/image/profile/thumbs/') . $materi['image']; ?>" class="card-img mt-2 icon_read img-thumbnail">
    </div>


    <div class="col-lg-11">
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
    $query = $this->db->query("SELECT * FROM komen LEFT JOIN user ON komen.id_user = user.id_user WHERE  comment_status='0' AND slug_materi = '$slug'");
    foreach ($query->result_array() as $utama) :
    ?>



        <div class="col-lg-1 col-2">
            <img src="<?= base_url('assets/image/profile/thumbs/') . $utama['image']; ?>" class="card-img mt-1  img-thumbnail">
        </div>




        <div class="col-lg-11 col-10">
            <div class="card" style="padding: 10px;">

                <p class="font-weight-bold  mr-1"><?= $utama['nama']; ?> </p>
                <span class="small" style="margin-top: -15px;"><?= $utama['nama']; ?> | <?= date(' F j Y,H:i', strtotime($utama['tanggal_post'])); ?></span>

                <?php if ($this->session->userdata('id_user') == $utama['id_user']) { ?>

                    <div class="row mt-2">
                        <div class="col-lg-6">
                            <div class="form-group">


                                <a href="<?= base_url('admin/artikel/edit_komen/') . $utama['id_komen']; ?>" title="Edit Materi" class="btn btn-warning btn-xs">
                                    <i class=" fa fa-edit"></i>Edit</a>
                                <a href="<?= base_url('admin/artikel/delete_komen/') . $utama['id_komen']; ?>" class="btn btn-danger btn-xs  mr-2 tombol-hapus">
                                    <i class="fa fa-trash"></i> Delete</a>

                            </div>
                        </div>

                    </div>
                <?php } ?>


                <p style="margin-top:5px" class="text-justify"><?= $utama['isi_komen']; ?></p>

                <div class="row mb-3">
                    <div class="col-lg-6">
                        <a href="<?= base_url('admin/artikel/reply_komen/') . $utama['id_komen']; ?>" title="Edit Materi" class="btn btn-primary btn-xs">
                            <i class=" fa fa-reply"></i> Reply</a>
                    </div>
                </div>

                <!-- Button Edit -->

                <!-- Reply Commentar -->



                <div class="row ml-5">

                    <?php
                    $slug =  $slug;
                    $comment_id = $utama['id_komen'];
                    $query = $this->db->query("SELECT * FROM komen LEFT JOIN user ON komen.id_user = user.id_user WHERE comment_status='$comment_id' AND slug_materi = '$slug'");
                    foreach ($query->result_array() as $balasan) :
                    ?>




                        <div class="col-lg-1 d-none d-lg-block .d-xl-none">
                            <img src="<?= base_url('assets/image/profile/thumbs/') . $balasan['image']; ?>" class="card-img mt-1  img-thumbnail">
                        </div>



                        <div class="col-lg-11">
                            <div class="card" style="padding: 10px;">

                                <p class="font-weight-bold  mr-1"><?= $balasan['nama']; ?> </p>
                                <span class="small" style="margin-top: -15px;"><?= $balasan['nama']; ?> | <?= date(' F j Y,H:i', strtotime($balasan['tanggal_post'])); ?></span>

                                <?php if ($this->session->userdata('id_user') == $balasan['id_user']) { ?>

                                    <div class="row mt-2">
                                        <div class="col-lg-6">
                                            <div class="form-group">


                                                <a href="<?= base_url('admin/artikel/edit_komen/') . $balasan['id_komen']; ?>" title="Edit Materi" class="btn btn-warning btn-xs">
                                                    <i class=" fa fa-edit"></i>Edit</a>
                                                <a href="<?= base_url('admin/artikel/delete_komen/') . $balasan['id_komen']; ?>" class="btn btn-danger btn-xs  mr-2 tombol-hapus">
                                                    <i class="fa fa-trash"></i> Delete</a>

                                            </div>
                                        </div>

                                    </div>
                                <?php } ?>


                                <p style="margin-top:5px" class="text-justify"><?= $balasan['isi_komen']; ?></p>


                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <a href="<?= base_url('admin/artikel/reply_net/') . $balasan['id_komen']; ?>" title="Edit Materi" class="btn btn-primary btn-xs">
                                            <i class=" fa fa-reply"></i> Reply</a>
                                    </div>
                                </div>


                                <!-- Button Edit -->



                                <!-- End Button Edit -->

                            </div>

                        </div>


                    <?php endforeach; ?>


                </div>

                <!-- End Reply Commentar -->



                <!-- End Button Edit -->

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
                <textarea class="form-control" spellcheck="false" style="height: 150px;" name="isi_komen" id="exampleFormControlTextarea1" rows="3" placeholder="Type something..." required=""></textarea>

                <?= form_error('isi_komen', '<small class="text-danger">', '</small>'); ?>
            </div>


            <button type="submit" name="submit" class="btn btn-primary">Send</button>





        </form>
    </div>
    <!-- End Komentar -->

</div>