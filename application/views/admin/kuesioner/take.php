<div class="row">
    <div class="col-lg-6">

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

        <?php if ($this->session->flashdata('flash')) : ?>

        <?php endif; ?>




    </div>
</div>


<form action="<?= base_url('admin/kuesioner/take'); ?>" method="post" enctype="multipart/form-data">


    <?php foreach ($kuesioner as $row) : ?>


        <div class="col-lg-8">



            <div class="card">




                <div class="card text-justify">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo $row['ask']; ?> </li>
                    </ul>
                </div>


                <div class="radio">
                    <label>
                        <input type="radio" name="p1" value="Sangat Baik">
                        Sangat Baik </label>
                </div>








                <!-- </div> -->



            </div>
        </div>

    <?php endforeach; ?>


    <p>Ruang kuliah tertata dengan bersih, dan rapi ?</p>

    <div class="radio">
        <label>
            <input type="radio" name="p1" value="Sangat Baik">
            Sangat Baik </label>
    </div>

    <div class="radio">
        <label>
            <input type="radio" name="p1" value="Sangat Baik">
            Baik </label>
    </div>


    <p>Sarana pembelajaran yang tersedia di ruang kuliah ?</p>

    <div class="radio">
        <label>
            <input type="radio" name="p2" value="Sangat Baik">
            Sangat Baik </label>
    </div>

    <div class="radio">
        <label>
            <input type="radio" name="p2" value="Baik">
            Baik </label>
    </div>







    <button type="submit" name="submit" class="btn btn-primary btn-sm ml-2">Save</button>
</form>