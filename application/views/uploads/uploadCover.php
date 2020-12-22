<?php echo $error ?>
<?php echo form_open_multipart('Upload/upload_cover/'.$id);?>

<h1>Cover Upload</h1>
<input class="form-control col-sm-3" type="file" name="cover_pic" />
<br /><br />
<input type="submit" class="btn-primary" value="upload" style="height: 2.5em; width: 4em; font-size: 20px;"/>

</form>
