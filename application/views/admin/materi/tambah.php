<div class="row">
	<div class="col-lg-6">

		<?php

		// echo validation_errors('<div class="alert alert-warning">','</div');

		//error upload
		if (isset($error_upload)) {
			echo '<div class="alert alert-warning">' . $error_upload . '</div>';
		}
		echo form_open_multipart(base_url('admin/artikel/tambah'));
		?>

	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		<div class="form-group form-group-lg">
			<label>Judul Artikel</label>
			<input type="text" name="judul_materi" class="form-control" placeholder="Judul Materi" value="<?= set_value('judul_materi') ?>">
			<?= form_error('judul_materi', '<small class="text-danger">', '</small>'); ?>
		</div>
	</div>


	<div class="col-lg-4">
		<div class="form-group form-group-lg">
			<label>Ketegori</label>
			<select name="id_kelas" class="form-control">
				<?php foreach ($kelas as $kelas) {  ?>
					<option value="<?= $kelas['id_kelas']; ?>">
						<?= $kelas['nama_kelas'] ?>
					</option>

				<?php	} ?>

			</select>
		</div>
	</div>


</div>






<div class="row">
	<div class="col-lg-10">
		<div class="form-group">
			<label>Isi Artikel</label>
			<textarea id="editor1" class="form-control" name="isi_materi" id="exampleFormControlTextarea1" rows="3"><?= set_value('isi_materi') ?></textarea>

			<script>
				var config = {
					extraPlugins: 'codesnippet,colorbutton,colordialog,liststyle,table,tableresize,font',
					codeSnippet_languages: {
						html: 'HTML',
						javascript: 'JavaScript',
						php: 'PHP'

					},
					codeSnippet_theme: 'monokai_sublime',
					height: 356,
					colorButton_colors: 'CF5D4E,454545,FFF,CCC,DDD,CCEAEE,66AB16',
					colorButton_enableAutomatic: false

				};
				CKEDITOR.replace('editor1', config);
			</script>

			<?= form_error('isi_materi', '<small class="text-danger">', '</small>'); ?>
		</div>
	</div>
</div>



<div class="row">
	<div class="col-lg-4">
		<div class="form-group">
			<label>Pilih Gambar</label>
			<div class="custom-file">
				<input type="file" class="custom-file-input" id="file_materi" name="file_materi">
				<label class="custom-file-label" for="file_materi">Choose file</label>
			</div>

		</div>
	</div>
</div>










<div class="form-group">
	<button type="submit" name="submit" class="btn btn-success">
		<i class="fa fa-save mr-1"></i>Save !
	</button>
	<a href="<?= base_url('admin/materi'); ?> "><button type="button" class="btn btn-danger">Back</button></a>

</div>


<?php
//form close

echo form_close();
?>