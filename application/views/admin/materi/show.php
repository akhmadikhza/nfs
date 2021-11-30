<div class="row ">




    <div class="row no-gutters justify-content-center d-flex">
        <?php foreach ($materi as $materi) : ?>

            <div class="col-lg-3 mr-2  mb-2" style="border-radius: 12px;box-shadow: 0 3px 20px rgba(0, 0, 0, 0.3)">


                <div class="card bg-dark text-white">



                    <a href="<?= base_url('admin/artikel/read/') . $materi['slug_materi']; ?>">
                        <img src="<?= base_url('assets/image/artikel/thumbs/') . $materi['file_materi']; ?>" class="card-img" height="220px" alt="<?= $materi['judul_materi']; ?>">
                    </a>


                </div>


                <p class="card-text ml-3 font-weight-bold"><a href="<?= base_url('admin/artikel/read/') . $materi['slug_materi']; ?>" class="text-decoration-none" style="color: black;"><?= character_limiter($materi['judul_materi'], 71); ?></a></p>


                <p class="card-text ml-3" style="margin-top: -15px;"><small class="text-muted"><?= date('F j Y,H:i T', strtotime($materi['tanggal_post'])); ?></small></p>

                <!-- Start Hidding Element -->
                <div class="container d-none d-lg-block .d-xl-none ml-2" style="margin-top: -15px;">
                    <!-- <?= character_limiter($materi['isi_materi'], 100) ?> -->
                    <p class="text"><a href="<?= base_url('admin/artikel/read/') . $materi['slug_materi']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Read More...</a></p>
                </div> <!-- End Hidding Element Container -->



            </div>

        <?php endforeach; ?>



    </div>




    <!-- Start Paginnation -->
    <div class="col-lg-12">

        <div class="row justify-content-center mt-3">


            <?= $pagination;  ?>




        </div>
    </div>
    <!-- End Pagination -->









</div>