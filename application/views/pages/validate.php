
<div class="col-md-8 offset-md-2">
	<span class="anchor" id="formUserEdit"></span>
	<hr class="my-5">

	<!-- form user info -->
	<div class="card card-outline-secondary">
		<div class="card-header">
			<h3 class="mb-0">Answer Security Question</h3>
		</div>
		<div class="card-body">

			<form method="post" action="<?php echo site_url('Validation/resetPass')?>"
				  class="form" role="form" autocomplete="off">
				<div class="form-group row">
					<label class="col-lg-3 col-form-label form-control-label">Username:</label>
					<div class="col-lg-9">
						<input class="form-control" name="username" type="text" placeholder="Enter your username">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-3 col-form-label form-control-label">Question 1:</label>
					<div class="col-lg-9">
						<select class="form-control" id="exampleFormControlSelect1">
							<option>What is your pet's name?</option>
							<option>What is your school's name?</option>
							<option>What is your mom's middle name?</option>
							<option>What is your favourite game?</option>
							<option>What is your favourite movie?</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label form-control-label">Answer:</label>
					<div class="col-lg-9">
						<input class="form-control" name="answerOne" type="text">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label form-control-label">Question 2:</label>
					<div class="col-lg-9">
						<select class="form-control" id="exampleFormControlSelect1">
							<option>What is your pet's name?</option>
							<option>What is your school's name?</option>
							<option>What is your mom's middle name?</option>
							<option>What is your favourite game?</option>
							<option>What is your favourite movie?</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label form-control-label">Answer:</label>
					<div class="col-lg-9">
						<input class="form-control" name="answerTwo" type="text">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label form-control-label">Question 3:</label>
					<div class="col-lg-9">
						<select class="form-control" id="exampleFormControlSelect1">
							<option>What is your pet's name?</option>
							<option>What is your school's name?</option>
							<option>What is your mom's middle name?</option>
							<option>What is your favourite game?</option>
							<option>What is your favourite movie?</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label form-control-label">Answer:</label>
					<div class="col-lg-9">
						<input class="form-control" name="answerThree" type="text">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-2 col-form-label form-control-label">Captcha</label>
					<div class="col-lg-2">
						<?php echo $captchaImg; ?>
					</div>
					<div class="col-lg-8">
						<input class="form-control" name="captcha" type="text" placeholder="Please enter number in picture">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-3 col-form-label form-control-label"></label>
					<div class="col-lg-9">
						<input type="reset" class="btn btn-secondary" value="Cancel">
						<input type="submit" class="btn btn-primary" value="Reset Password">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

	<div class="col-md-8 offset-md-2">
		<span class="anchor" id="formUserEdit"></span>
		<hr class="my-5">

		<!-- form user info -->
		<div class="card card-outline-secondary">
			<div class="card-header">
				<h3 class="mb-0">Send validation email</h3>
			</div>
			<div class="card-body">
					<?php if($error = $this->session->flashdata('err_msg')){ ?>
					<p style="color: red"><strong>Caution!</strong> <?php echo $error; ?></p>
					<?php } ?>
					<?php if($error = $this->session->flashdata('msg')){ ?>
					<p style="color: green"><strong>Success!</strong> <?php echo $error; ?></p>
					<?php } ?>
				<form method="post" action="<?php echo site_url('Validation/sendEmail')?>"
					  class="form" role="form" autocomplete="off">
<!--					get username-->
					<div class="form-group row">
						<label class="col-lg-3 col-form-label form-control-label">Username:</label>
						<div class="col-lg-9">
							<input class="form-control" name="username" type="text">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-lg-12 col-form-label form-control-label">This will send to your registered email</label>
					</div>
					<div class="form-group row">
						<div class="col-lg-9">
							<input type="reset" class="btn btn-secondary" value="Cancel">
							<input type="submit" class="btn btn-primary" value="Send">
						</div>
					</div>
				</form>
			</div>
		</div>
