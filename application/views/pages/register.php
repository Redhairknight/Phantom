<div class="col-md-8 offset-md-2">
	<span class="anchor" id="formUserEdit"></span>
	<hr class="my-5">

	<!-- form user info -->
	<div class="card card-outline-secondary">
		<div class="card-header">
			<h3 class="mb-0">Register</h3>
		</div>
		<div class="card-body">

			<?php echo validation_errors("<div class='alert alert-danger' style='font-size: 16px'>","</div>"); ?>

			<form method="post" action="<?php echo site_url('Login/create')?>"
				  class="form" role="form" autocomplete="off">
				<?php if($error = $this->session->flashdata('err_msg')){ ?>
					<p style="color: red"><strong>Sorry</strong> <?php echo $error; ?></p>
				<?php } ?>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label form-control-label">Last Name:</label>
					<div class="col-lg-6">
						<input class="form-control" name="lastName" type="text">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label form-control-label">First Name:</label>
					<div class="col-lg-6">
						<input class="form-control" name="firstName" type="text">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label form-control-label">Birth Date:</label>
					<div class="col-lg-6">
						<input class="form-control" name="birthdate" type="date">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label form-control-label">Username:</label>
					<div class="col-lg-6">
						<input class="form-control" name="username" type="text">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label form-control-label">Password:</label>
					<div class="col-lg-6">
						<input class="form-control" name="password" type="password" id="password">
						<div id="popover-password">
							<p>Password Strength: <span id="result"> </span></p>
							<div class="progress">
								<div id="password-strength" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
								</div>
							</div>
							<ul class="list-unstyled">
								<li class=""><span class="low-upper-case"><i class="fa fa-times" aria-hidden="true"></i></span>&nbsp; 1 lowercase &amp; 1 uppercase</li>
								<li class=""><span class="one-number"><i class="fa fa-times" aria-hidden="true"></i></span> &nbsp;1 number (0-9)</li>
								<li class=""><span class="eight-character"><i class="fa fa-times" aria-hidden="true"></i></span>&nbsp; Atleast 8 Character</li>
							</ul>
						</div>
					</div>

				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label form-control-label"></label>
					<div class="col-lg-6">
						<input type="reset" class="btn btn-secondary" value="Reset">
						<input type="submit" class="btn btn-success" value="Register!">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#password').keyup(function() {
			var password = $('#password').val();
			checkStrength(password);
		});

		function checkStrength(password) {
			var strength = 0;
			//If it has numbers and characters, increase strength value.
			if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
				strength += 1;
			}
			// If it has more than 7 character
			if (password.length > 7) {
				strength += 1;
			}
			// If it has lower case and upper case
			if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
				strength += 1;
			}
			// If invalid char
			if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
				strength = -1;
			}
			// If value is less than 2
			if (strength < 0) {
				$('#result').addClass('text-danger').text('Invalid Char');
				$('#password-strength').css('width', '0%');
			} else if (strength == 0) {
				$('#result').addClass('text-danger').text('Super Week');
				$('#password-strength').css('width', '0%');
			} else if (strength == 1) {
				$('#result').addClass('text-danger').text('Very Week');
				$('#password-strength').css('width', '10%');
			} else if (strength == 2) {
				$('#result').addClass('text-warning').text('Week');
				$('#password-strength').css('width', '60%');
			} else if (strength == 3) {
				$('#result').addClass('text-success').text('Strong');
				$('#password-strength').css('width', '100%');
			}

		}

	});
</script>
