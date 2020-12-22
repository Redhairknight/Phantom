<?php echo $error; ?>
<?php echo form_open_multipart('Upload/upload_image');?>

	<h1>Picture Upload</h1>
	<input class="form-control col-sm-3" type="file" name="userfile" />
	<br /><br />
	<input type="submit" class="btn-primary" value="upload" style="height: 2.5em; width: 4em; font-size: 20px;"/>

</form>
