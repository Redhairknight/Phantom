<div class="row">
	<div class="col-sm-2" id="side-bar">
		<div class="card">
			<div class="card-header">Sidebar</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<div class="profile-pic">
						<img src="<?php echo base_url('assets/images/'.$profile_pics) ?>" class="img-responsive" style="border-radius: 100%;">
					</div>
				</li>
				<div class="profile-title">
					<div class="profile-username">
						<?php echo $username ?>
					</div>
					<div class="profile-level">
						<?php echo $level ?>
					</div>
				</div>
				<div class="profile-buttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				<li class="list-group-item">
					<a href="#">Home</a>
				</li>
				<li class="list-group-item">
					<a href="<?php echo base_url('Videos/view_subs') ?>">Subscriptions</a>
				</li>
				<li class="list-group-item">
					<a href="#">Your videos</a>
				</li>
				<li class="list-group-item">
					<a href="#">History</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-sm-10" id="user-profile">
		<div class="container">
			<div class="profile-usermenu">
				<ul class="nav">
					<li class="active">
						<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
					</li>
					<li>
						<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
					</li>
					<li>
						<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
					</li>
					<li>
						<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
					</li>
				</ul>
			</div>

			<div class="card">
				<div class="card-header">
					Notification
				</div>
				<div class="card-body">
					<blockquote class="blockquote mb-1">
						<h2><?php echo 'Welcome, Prime user '.$username ?></h2>
						<p>Today is a good day!</p><br>
						<a href="<?php echo site_url('Third_party/position') ?>">Find interesting around you!</a>
						<footer class="blockquote-footer">
							Chang Liu
						</footer>
					</blockquote>
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					Share your video here!
				</div>
				<div class="card-body">
					<blockquote class="blockquote mb-1">
						<p>Upload your video!</p><br>
						<p>You have <a href="<?php echo site_url('Messages/view') ?>"><?php echo $message_num ?></a> new messages</p>
						<a href="<?php echo site_url('Upload/video')?>">
							<button type="button" class="btn btn-primary" style="float:right;">Upload</button>
						</a>
						<a href="<?php echo site_url('Upload/history')?>">
							<button type="button" class="btn btn-success" style="float:right; margin-right: 20px;">History</button>
						</a>
						<footer class="blockquote-footer">
							Chang Liu
						</footer>
					</blockquote>
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					View your personal info
				</div>
				<div class="card-body">

					<div class="content-panel">
						<h2 class="title">User Status: <span class="pro-label label label-warning"><?php echo $level?></span></h2>
						<form class="form-horizontal">
							<fieldset class="fieldset">
								<h3 class="fieldset-title">Personal Info</h3>
								<div class="form-group avatar">
									<a href="<?php echo site_url('Upload/image')?>">
										<figure class="figure col-md-2 col-sm-3 col-xs-12">
											<img class="img-rounded img-responsive" src="<?php echo base_url('assets/images/'.$profile_pics) ?>" alt="Test Image" style="border-radius: 100%; max-width: 100%; max-height: 100%;">
										</figure>
									</a>
								</div>

								<form method="post" action="<?php echo site_url('Users/security')?>"
									  class="form" role="form" autocomplete="off">
									<div class="form-group row">
										<label class="col-lg-2 col-form-label form-control-label">First Name</label>
										<label class="col-lg-2 col-form-label form-control-label"><?php echo $firstName?></label>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label form-control-label">Last Name</label>
										<label class="col-lg-2 col-form-label form-control-label"><?php echo $lastName?></label>
									</div>
								</form>
							</fieldset>
							<fieldset class="fieldset">
								<h3 class="fieldset-title">Contact Info</h3>
								<form method="post" action="<?php echo site_url('Users/updateInfo')?>"
								<?php if (isset($error)) {
									echo '<p class="alert alert-danger"><strong>Error: </strong>'.$error.'</p>';
								}?>
									<div class="form-group">
										<label class="col-md-2  col-sm-3 col-xs-12 control-label">Email</label>
										<div class="col-md-10 col-sm-9 col-xs-12">
											<input type="email" name="email" class="form-control" placeholder="example@gmail.com">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2  col-sm-3 col-xs-12 control-label">PhoneNumber</label>
										<div class="col-md-10 col-sm-9 col-xs-12">
											<input type="text" name="phoneNum" class="form-control" placeholder="0498111111">
										</div>
									</div>
									<button type="submit" class="btn btn-success" value="submit" style="float: bottom">Update</button>
								</form>
<!--								onclick="location.href='--><?php //echo site_url('Users/viewInfo');?><!--'"-->
<!--													implement for ajax-->
						<button class="btn-secondary" style="margin-top: 5px;" onclick="loadRealTime()">Click to see time</button>
									<div id="myDiv" style="font-style: italic">
									</div>
								</button>
								<!--					This is divide line									-->
									<button class="btn btn-secondary" value="submit" data-toggle="modal" data-target="#myModal2" style="float:right">
										View detail
									</button>
									<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="modalLabel2">Prove yourself</h5>
													<button type="button" class="close" data-dismiss="modal">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form method="post" action="<?php echo site_url('Users/viewInfo') ?>">
														<div class="form-group">
															<label for="Password">Your Password</label>
															<input type="password" class="form-control" name="cpass">
														</div>
														<button type="submit" class="btn btn-success" value="submit">Update</button>
													</form>
												</div>
											</div>
										</div>
									</div>
							</fieldset>
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					Update your personal information or initial your security questions
				</div>
				<div class="card-body">
					<blockquote class="blockquote mb-1">
						<p>You can revise your password, or initial the security questions.</p><br>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="float:right;">Update</button>
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="modalLabel1">Update Password</h5>
										<button type="button" class="close" data-dismiss="modal">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form method="post" action="<?php echo site_url('Users/update') ?>">
											<div class="form-group">
												<label for="password">Original Password</label>
												<input type="password" class="form-control" name="oldPass">
											</div>
											<div class="form-group">
												<label for="newPassword">New Password</label>
												<input type="password" class="form-control" name="newPass">
											</div>
											<button type="submit" class="btn btn-success" value="submit">Update</button>
										</form>
									</div>
									<div class="modal-footer">
										<a href="<?php echo site_url('Users/security') ?>">
											<button type="button" class="btn btn-primary">Set Security Question</button>
										</a>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>

						<footer class="blockquote-footer">
							Chang Liu
						</footer>
					</blockquote>
				</div>
			</div>
		</div>
	</div>

<!--	ajax function test-->
		<script type="text/javascript">
			function loadRealTime()
			{
				var httpxml;
				try
				{
					// Google Chrome
					httpxml=new XMLHttpRequest();
				}
				catch (e)
				{
					alert("Your browser did not support Ajax")
				}
				function stateck()
				{
					if(httpxml.readyState==4 && httpxml.status==200)
					{
						document.getElementById("myDiv").innerHTML=httpxml.responseText;
						document.getElementById("myDiv").style.background='#f1f1f1';
					}
				}
				var url="https://infs3202-487f973c.uqcloud.net/phantom/application/views/pages/ajax.php";
				httpxml.onreadystatechange=stateck;
				httpxml.open("GET",url,true);
				httpxml.send();
				refresh_function();
			}
			// loop the function by a refresh rate
			function refresh_function(){
				var refresh = 1000; // Refresh rate in milli seconds
				setTimeout('loadRealTime();',refresh)
			}
		</script>

<!--		<script type="text/javascript">-->
<!--			function loadXMLDoc() {-->
<!--				var xmlhttp = new XMLHttpRequest();-->
<!---->
<!--				xmlhttp.open("GET", "https://infs3202-487f973c.uqcloud.net/phantom/Videos/userDetails", true);-->
<!--				xmlhttp.send();-->
<!---->
<!--				xmlhttp.onreadystatechange = function () {-->
<!--					if (this.readyState == 4 && this.status == 200) {-->
<!--						var myObj = JSON.parse(this.responseText);-->
<!--						document.getElementById("myDiv").innerHTML = myObj[0].total;-->
<!--					}-->
<!--				};-->
<!--			}-->
<!--		</script>-->

