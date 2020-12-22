
				<div class="col-md-8 offset-md-2">
					<span class="anchor" id="formUserEdit"></span>
					<hr class="my-5">

					<!-- form user info -->
					<div class="card card-outline-secondary">
						<div class="card-header">
							<h3 class="mb-0">Update Security Question</h3>
						</div>
						<div class="card-body">

						<?php echo validation_errors("<div class='alert alert-danger' style='font-size: 16px'>","</div>"); ?>

							<form method="post" action="<?php echo site_url('Users/security')?>"
								  class="form" role="form" autocomplete="off">
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
									<label class="col-lg-3 col-form-label form-control-label"></label>
									<div class="col-lg-9">
										<input type="reset" class="btn btn-secondary" value="Cancel">
										<input type="submit" class="btn btn-primary" value="Save Changes">
									</div>
								</div>
							</form>
						</div>
					</div>
