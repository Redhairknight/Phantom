<div class="row">
	<div class="col-sm-2" id="side-bar">
		<div class="card">
			<div class="card-header">Sidebar</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<div class="profile-pic">
						<img src="https://static.change.org/profile-img/default-user-profile.svg" class="img-responsive" alt="">
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
					<a href="#">Subscriptions</a>
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
						<h2><?php echo 'Welcome, user '.$username ?></h2>
						<p>Today is a good day!</p><br>
						<p>You have <a href="">0</a> new messages</p>
						<footer class="blockquote-footer">
							Chang Liu
						</footer>
					</blockquote>
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					Become Prime Member
				</div>
				<div class="card-body">
					<blockquote class="blockquote mb-1">
						<p>Become our Prime member and upload your video!</p><br>
						<a href="<?php echo site_url('Products/index') ?>">
							<button class="btn-success btn-sm">Upgrade</button>
						</a>
					</blockquote>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					Update your personal information and set security questions
				</div>
				<div class="card-body">
					<blockquote class="blockquote mb-1">
						<p>Today is a good day!</p><br>

						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update</button>
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
										<button type="button" class="btn btn-primary" onclick="<?php echo site_url('Users/security') ?>">Security</button>
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
