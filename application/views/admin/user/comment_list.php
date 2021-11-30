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





<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Slug Materi</th>
      <th>Komentar</th>
      <th>Action </th>
    </tr>
  </thead>
  <tbody>

    <?php $i = 1;
    foreach ($comment_list as $comment_list) { ?>



      <tr>
        <td><?= $i ?></td>
        <td><?= character_limiter($comment_list['nama'], 10); ?></td>
        <td><?= $comment_list['slug_materi']; ?></td>
        <td><?= character_limiter($comment_list['isi_komen'], 10); ?></td>

        <td>

          <?php
          include 'del_comment.php'
          ?>




        </td>
      </tr>



    <?php $i++;
    } ?>
  </tbody>

</table>