<div class="row">

    <div class="col-lg-8">


        <p><a href="#" class="text-white bg-success p-2 font-weight-bolder"><?= $namket['nama_kelas']; ?></a></p>

        <div class="row no-gutters">
            <?php foreach ($materi as $materi) : ?>
                <div class="col-lg-1 col-1">
                    <a href="<?= base_url('admin/materi/read/') . $materi['slug_materi']; ?>">
                        <img src="<?= base_url('assets/image/task.png'); ?>" class="card-img mt-1 img_icon">
                    </a>
                </div>

                <div class="col-lg-11 col-11">

                    <p class="card-text ml-3 font-weight-bold"><a href="<?= base_url('admin/artikel/read/') . $materi['slug_materi']; ?>" class="text-decoration-none" style="color: black;"><?= character_limiter($materi['judul_materi'], 71); ?></a></p>
                    <p class="card-text ml-3" style="margin-top: -15px;"><small class="text-muted"><?= date('F j Y,H:i T', strtotime($materi['tanggal_post'])); ?></small></p>

                    <!-- Start Hidding Element -->
                    <div class="container d-none d-lg-block ml-2" style="margin-top: -15px;">
                        <?= character_limiter($materi['isi_materi'], 100) ?>
                        <p class="text"><a href="<?= base_url('admin/artikel/read/') . $materi['slug_materi']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Read More...</a></p>
                    </div> <!-- End Hidding Element Container -->




                </div>
            <?php endforeach; ?>
        </div>


        <!-- Pagination -->
        <div class="row justify-content-center mt-3">



            <div class="">
                <?php echo $pagination;  ?>

            </div>


        </div>
        <!-- End Pagination -->



    </div><!-- End col-8 -->



</div>