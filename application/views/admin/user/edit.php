<?php




//form opeb
echo form_open(base_url('admin/user_list/edit/' . $user['id_user']));
?>
<div class="row">
	<div class="col-md-4">

		<div class="form-group">
			<label>Full Name</label>
			<input type="text" name="nama" class="form-control" value="<?= $user['nama']; ?>">
			<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
		</div>
	</div>


	<div class="col-lg-4">
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" class="form-control" value="<?= $user['email']; ?>" readonly>
			<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
		</div>
	</div>


</div>







<div class="row">
	<div class="col-lg-4">
		<div class="form-group">
			<label>Role Access</label>
			<select name="role_id" class="form-control" class="form-control">
				<option value=1>Admin</option>

				<option value=2 <?php if ($user['role_id'] == 2) {
									echo "selected";
								} ?>>User</option>



			</select>
		</div>
	</div>


	<div class="col-lg-4">
		<div class="form-group">
			<label>Is Active</label>
			<select name="is_active" class="form-control" class="form-control">
				<option value=1>Active</option>
				<option value=0 <?php if ($user['is_active'] == 0) {
									echo "selected";
								} ?>>Unactive</option>

			</select>
		</div>
	</div>



</div>






<div class="form-group mt-2">

	<input type="submit" name="submit" class="btn btn-success" value="Save">
	<a href="<?= base_url('admin/user_list'); ?>"> <button type="button" class="btn btn-danger ">Back </button>
	</a>
</div>






<?php
//form close

echo form_close();
?>