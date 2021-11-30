<div class="row">
    <div class="col-lg-6">


        <?= $this->session->flashdata('sukses'); ?>

        <div class="alert" style="background-color: #133469; color:white" role="alert">Welcome, <?= $user['nama']; ?> !</div>

        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/image/profile/') . $user['image']; ?>" class="card-img profile-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['nama']; ?></h5>
                        <p class="card-text"><?= $user['email']; ?></p>
                        <p class="card-text"><small class="text-muted">Created on <?= date('d F Y,H:i T', strtotime($user['date_created'])); ?></small></p>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>