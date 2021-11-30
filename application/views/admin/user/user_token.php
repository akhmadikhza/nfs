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
      <th>Email</th>
      <th>Token</th>
      <th>Date Created </th>
      <th>Action </th>
    </tr>
  </thead>
  <tbody>

    <?php $i = 1;
    foreach ($user_token as $user_token) { ?>



      <tr>
        <td><?= $i ?></td>
        <td><?= $user_token['email']; ?></td>
        <td><?= $user_token['token']; ?></td>
        <td><?= $user_token['date_created']; ?></td>
        <td>


          <?php
          include 'delete_token.php'
          ?>




        </td>
      </tr>



    <?php $i++;
    } ?>
  </tbody>

</table>