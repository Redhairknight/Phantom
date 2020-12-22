<?php echo $error; ?>
<?php echo form_open_multipart('Upload/upload_video');?>

	<h1>Video Upload</h1>
	<input class="form-control col-sm-3" type="file" name="userfile" />
	<br /><br />
    <input type="text" placeholder="Enter title here" name="title" class="col-sm-5">
	<br /><br />
	<input type="text" placeholder="Enter type here" name="type" class="col-sm-5">
	<br /><br />
	<input type="submit" class="btn-primary" value="upload" style="height: 2.5em; width: 4em; font-size: 20px;"/>

</form>
<br>
<style>
	.dropzone {
		background: #fff;
		border: 2px dashed #ddd;
		border-radius: 5px;
	}

	.dz-message {
		color: #999;
	}

	.dz-message:hover {
		color: #464646;
	}

	.dz-message h3 {
		font-size: 200%;
		margin-bottom: 15px;
	}
</style>
<div id="content">
	<div id="multi-upload" class="dropzone">
		<div class="dz-message">
			<h3>Drop files here</h3> or <strong>click</strong> to upload
		</div>
	</div>
</div>

<script src="<?php echo base_url(); ?>assets/js/dropzone.min.js"></script>

<script>
	Dropzone.autoDiscover = false;
	var myDropzone = new Dropzone("#multi-upload", {
		url: "<?php echo site_url("Upload/upload_drag") ?>",
		acceptedFiles: "image/*",
		addRemoveLinks: false,
		maxFilesize: 10, // MB
	});
</script>
