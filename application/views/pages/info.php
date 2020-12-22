<div class="col-md-8 offset-md-2">
	<span class="anchor" id="formUserEdit"></span>
	<hr class="my-5">

	<!-- form user info -->
	<div class="card card-outline-secondary">
		<div class="card-header">
			<h3 class="mb-0">Personal Info</h3>
		</div>
		<div class="card-body">
			<form class="form" role="form" autocomplete="off">

				<div class="form-group row">
					<label class="col-lg-4 col-form-label form-control-label">First Name:</label>
					<div class="col-lg-5">
						<?php echo $firstName ?>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-4 col-form-label form-control-label">Last Name:</label>
					<div class="col-lg-5">
						<?php echo $lastName ?>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-4 col-form-label form-control-label">Birthdate:</label>
					<div class="col-lg-5">
						<?php echo $birthdate ?>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-4 col-form-label form-control-label">Username:</label>
					<div class="col-lg-5">
						<?php echo $username ?>
					</div>
				</div>
			</form>

<!--		button  to go back for multilevel user	todo-->
		</div>
	</div>
	<div class="card card-outline-secondary">
		<div class="card-header">
			<h3 class="mb-0">Contact Info</h3>
		</div>
		<div class="card-body">
			<form class="form" role="form" autocomplete="off">

				<div class="form-group row">
					<label class="col-lg-4 col-form-label form-control-label">Email:</label>
					<div class="col-lg-5">
						<?php echo $email ?>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-4 col-form-label form-control-label">Phone:</label>
					<div class="col-lg-5">
						<?php echo $phone ?>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="card card-outline-secondary">
		<div class="card-header">
			<h3 class="mb-0">Personal Info</h3>
		</div>
		<div class="card-body">
			<form class="form" role="form" autocomplete="off">

				<div class="form-group row">
					<label class="col-lg-4 col-form-label form-control-label">Security Answer1:</label>
					<div class="col-lg-5">
						<?php echo $answerOne ?>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-4 col-form-label form-control-label">Security Answer2:</label>
					<div class="col-lg-5">
						<?php echo $answerTwo ?>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-4 col-form-label form-control-label">Security Answer3:</label>
					<div class="col-lg-5">
						<?php echo $answerThree ?>
					</div>
				</div>
			</form>
		</div>
	</div>
