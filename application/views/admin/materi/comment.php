<div class="col-lg-12">
    <h4 class="text-center text-success font-weight-bold "><?= $title; ?></h4>
</div>




<div class="row ">



    <div class="col-lg-1">
        <img src="<?= base_url('assets/image/user.png'); ?>" class="card-img mt-1 img_icon">
    </div>


    <div class="col-lg-11">
        <div class="card" style="padding: 15px;">
            <p class="text-success font-weight-bold"><?= $materi['nama']; ?></p>


            <?= $materi['isi_materi']; ?>
            <br />
            <i class="fas fa-paperclip"><label>Attachment : </label> </i>
            <a href="<?= base_url('assets/upload/file/' . $materi['file_materi']); ?>" class="text-success font-italic" style="font-size:12px;" target="_blank"><?= $materi['file_materi']; ?></a>

            <p><i class="far fa-calendar text-secondary" style="margin-right: 10px; font-size: 13px;"> <?= date('F j Y,H:i T', strtotime($materi['tanggal_post'])); ?></i></p>
        </div>
    </div>
</div>




<!-- Personal Komentar -->
<div class="row">

    <div class="col-lg-1 col-2">
        <img src="<?= base_url('assets/image/user.png'); ?>" class="card-img mt-1 img_icon">

    </div>

    <div class="col-lg-11 col-10">
        <div class="card" style="padding: 10px;">

            <p class="font-weight-bold  mr-1">Ari <i class="text-secondary float-none" style="font-size: 12px;margin-top:2px "> <?= date(' F j Y,H:i ', strtotime($materi['tanggal_post'])); ?> </i> </p>

            <p style="margin-top:-15px">Ari Purwaningsih - 18.11.0269</p>
        </div>

    </div>



    <div class="col-lg-1 col-2">
        <img src="<?= base_url('assets/image/user.png'); ?>" class="card-img mt-1 img_icon">

    </div>

    <div class="col-lg-11 col-10">
        <div class="card" style="padding: 10px;">

            <p class="font-weight-bold  mr-1">Ella <i class="text-secondary float-none" style="font-size: 12px;margin-top:2px "> <?= date(' F j Y,H:i ', strtotime($materi['tanggal_post'])); ?> </i> </p>
            <p style="margin-top:-15px"> Pipit Ella Fianti - 18.11.0041</p>
        </div>

    </div>


    <div class="col-lg-1 col-2">
        <img src="<?= base_url('assets/image/user.png'); ?>" class="card-img mt-1 img_icon">

    </div>

    <div class="col-lg-11 col-10">
        <div class="card" style="padding: 10px;">

            <p class="font-weight-bold  mr-1">Afe <i class="text-secondary float-none" style="font-size: 12px;margin-top:2px "> <?= date(' F j Y,H:i ', strtotime($materi['tanggal_post'])); ?> </i> </p>
            <p style="margin-top:-15px"> Radhwa Shafa Iftinan - 18.11.0086</p>
        </div>

    </div>







</div>



<!--End Personal Komentar  -->




<div class=" row">
    <!-- Kolom Komentar -->
    <div class="col-lg-1">

    </div>

    <div class="col-lg-8">
        <form method="post" action="<?= base_url('admin/materi/comment')  ?>">
            <div class="form-group">


                <label for="exampleFormControlTextarea1">Komentar</label>
                <textarea class="form-control" name="isi_komen" id="exampleFormControlTextarea1" rows="3"></textarea>

                <?= form_error('isi_komen', '<small class="text-danger">', '</small>'); ?>
            </div>

            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
    <!-- End Komentar -->

</div>