<div class="col-md-8 offset-md-2">
	<span class="anchor" id="formUserEdit"></span>
	<hr class="my-5">

		<?php if($error = $this->session->flashdata('error_msg')){ ?>
			<p style="color: red"><strong>Sorry</strong> <?php echo $error; ?></p>
		<?php } ?>
		<?php echo validation_errors("<div class='alert alert-danger' style='font-size: 16px'>","</div>"); ?>
		<form method="post" action="<?php echo site_url('Validation/updatePass') ?>">

			<div class="form-group">
				<label for="password">New Password</label>
				<input type="password" class="form-control" name="newPass">
			</div>
			<div class="form-group">
				<label for="newPassword">Confirm Password</label>
				<input type="password" class="form-control" name="rePass">
			</div>
			<button type="submit" class="btn btn-success" value="submit">Update</button>
		</form>
</div>
