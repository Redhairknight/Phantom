<!doctype html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Phantom</title>
		<link rel="stylesheet" type="text/css"
			  href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/logged_header.css">

		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

		<!--	multifile upload dropzone-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dropzone.min.css">
		<!--弹幕-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
		<!--	prevent favico error-->
		<link rel="icon" href="data:;base64,=">

		<script src="<?php echo base_url('assets/js/jquery-3.4.1.min.js') ?>" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" type="text/javascript"></script>
		<!--	弹幕-->
		<script src="<?php echo base_url('assets/js/jquery.danmu.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/main.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.shCircleLoader.js') ?>"></script>



	</head>
	<body>
		<header>
			<nav class="navbar navbar-light bg-white">
				<!--redirect back to default homepage-->
				<a class="navbar-brand" href="<?php echo site_url()?>">
				</a>
				<div id="nav-search">
					<form method="post" action="<?php echo site_url('Search/search') ?>">
						<div class="col-xs-8">
							<div class="input-group">
								<input class="form-control" type="search" placeholder="Search" name="keyword" id="search_text">
								<span class="input-group-btn">
									<button class="btn btn-danger" type="submit">
										Search
									</button>
								</span>
							</div>
						</div>
					</form>
				</div>
				<div class="login">
<!--					Login function-->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Login</button>
					<a href="<?php echo base_url('Login/register') ?>">
						<button type="button" class="btn btn-success">Register</button>
					</a>
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="modalLabel1">Login</h5>
									<button type="button" class="close" data-dismiss="modal">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form method="post" action="<?php echo site_url('Login/auth') ?>">
										<div class="form-group">
											<label for="username">Username</label>
											<input type="text" class="form-control" name="username" value="<?php if (get_cookie('uname'))
											{ echo get_cookie('uname'); } ?>">
										</div>
										<div class="form-group">
											<label for="password">Password</label>
											<input type="password" class="form-control" name="password" value="<?php if (get_cookie('upassword'))
											{ echo get_cookie('upassword'); } ?>">
										</div>
										<div class="form-group">
											<td><input type="checkbox" name="remember_me" value="Remember me" <?php if (get_cookie('uname')) { ?> checked="checked" <?php } ?>>Remember me</td>
										</div>
										<div class="form-group">
											<a href="<?php echo site_url('Validation/index') ?>">
												<td style="font-size: 10px;"> Forget Password?</td>
											</a>
										</div>
										<button type="submit" class="btn btn-danger" value="submit">Login</button>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>

<!--					Button trigger for modal -->
<!--					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal2">Register</button>-->
<!--					Modal-->
<!--					<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">-->
<!--						<div class="modal-dialog" role="document">-->
<!--							<div class="modal-content">-->
<!--								<div class="modal-header">-->
<!--									<h5 class="modal-title" id="modelLabel2">Registration</h5>-->
<!--									<button type="button" class="close" data-dismiss="modal">-->
<!--										<span aria-hidden="true">&times;</span>-->
<!--									</button>-->
<!--								</div>-->
<!--								<div class="modal-body">-->
<!--									<form method="post" action="--><?php //echo site_url('Login/create') ?><!--">-->
<!--										<div class="form-group">-->
<!--											<label for="lastName">Last Name</label>-->
<!--											<input type="text" class="form-control" name="lastName" aria-describedby="emailHelp">-->
<!--										</div>-->
<!--										<div class="form-group">-->
<!--											<label for="firstName">First Name</label>-->
<!--											<input type="text" class="form-control" name="firstName" aria-describedby="emailHelp">-->
<!--										</div>-->
<!--										<div class="form-group">-->
<!--											<label for="birthdate">Birth Date</label>-->
<!--											<input type="date" class="form-control" name="birthdate" aria-describedby="emailHelp">-->
<!--										</div>-->
<!--										<div class="form-group">-->
<!--											<label for="username">Username</label>-->
<!--											<input type="text" class="form-control" name="username" aria-describedby="emailHelp">-->
<!--										</div>-->
<!--										<div class="form-group">-->
<!--											<label for="password">Password</label>-->
<!--											<input type="password" class="form-control" name="password">-->
<!--										</div>-->
<!--										<button type="submit" class="btn btn-success" value="save">Register!</button>-->
<!--									</form>-->
<!--								</div>-->
<!--								<div class="modal-footer">-->
<!--									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
				</div>
			</nav>
		</header>

		<script>

			$(document).ready(function(){

				// Initialize
				$( "#search_text" ).autocomplete({
					source: function( request, response ) {
						// Fetch data
						$.ajax({
							url:"<?php echo base_url(); ?>Search/userList",
							type: 'post',
							dataType: "json",
							data: {
								search: request.term
							},
							success: function( data ) {
								response( data );
							}
						});
					},
					select: function (event, ui) {
						// Set selection
						$('#search_text').val(ui.item.label); // display the selected text
						return false;
					}
				});

			});
		</script>
