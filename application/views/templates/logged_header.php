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
<!--						<div class="col-md-12 col-md-offset-12 centered">-->
<!--							<h1 class="text-center">live Search</h1>-->
<!--							<input type="text" name="search" id="search_text" placeholder="Ajax Search" class="form-control" />-->
<!--							<div class="col-md-12 col-md-offset-6 centered" id="result">-->

						<div class="input-group">
							<input class="form-control" type="search" placeholder="Search" id="search_text" name="keyword">
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
				<a href="<?php echo site_url('Users/view') ?>" class="notification">
					<span></span>
					<span class="badge" id="message"></span>
				</a>
				<a href="<?php echo site_url('Login/logout') ?>">
					<button type="button" class="btn btn-success" id="log-out">Log out</button>
				</a>
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

			function show_message() {
				$.ajax({
					url: '<?php echo base_url() ?>Users/message',
					type: 'post',
					success: function(response){
						$('#message').text(response);
						console.log(response);
					}
				});
			}
			window.onload = function() {
				show_message();
			};
		});
	</script>
