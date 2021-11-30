<div class="row no-gutters">
    <?php foreach ($courses as $courses) : ?>
        <div class="col-lg-6">
            <a href="<?= base_url('admin/materi/kelas/') . $courses['slug_kelas']; ?>">
                <img src="<?= base_url('assets/image/task.png'); ?>" class="card-img mt-1 img_icon">
            </a>
            <a href="<?= base_url('admin/materi/kelas/') . $courses['slug_kelas']; ?>" class="text-decoration-none font-weight-bold ml-2" style="color: black;font-size:18px"><?= $courses['nama_kelas']; ?></a>
        </div>

        <div class="col-lg-6 mt-2">

        </div>
    <?php endforeach; ?>




</div>