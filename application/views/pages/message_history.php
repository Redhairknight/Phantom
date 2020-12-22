<div class="banner">
</div>

<nav class="navbar navbar-light" id="nav-menu" style="background-color: whitesmoke;">
	<ul class='main-menu'>
		<li>
			<a href='#'>Game</a>
		</li>
		<li>
			<a href='#'>Music</a>
		</li>
		<li>
			<a href='#'>Sport</a>
		</li>
		<li class='log-in'>
			<a href = '#'>Movie</a>
		</li>
		<li>
			<a href = '#'>Tech</a>
		</li>
		<li>
			<a href = '#'>Article</a>
		</li>
	</ul>
</nav>

<div class="row">
	<div class="col-sm-2" id="side-bar">
		<div class="card">
			<div class="card-header">Sidebar</div>
			<ul class="list-group list-group-flush">
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

	<div class="col-sm-10 container" id="video-block">
		<div class="row">
			<div class="col-sm-8">
				<h5>History Messages</h5>
			</div>
		</div>
		<hr/>
		<div class="row">
			<?php foreach($messageData as $row) {?>
				<div class="col-10">
					<!--Card-->
					<div class="card" id="video">
						<h5 class="card-header">Sender: <?php echo $row->username ?></h5>
						<div class="card-body">
							<h5 class="card-title">Uploader:<?php echo $row->message ?></h5>
							<p class="card-text">Upload Time:<?php echo $row->created_at ?></p>
							<a data-toggle="modal" data-target="#message2" class="card-text">Send message back</a>
							<div class="modal fade" id="message2" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="modalLabel4">Send Message to the sender</h5>
											<button type="button" class="close" data-dismiss="modal">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form method="post" action="<?php echo site_url('Videos/message/'.$row->username) ?>">
												<div class="form-group">
													<label for="Password">Messages:</label>
													<input type="text" class="form-control" name="message">
												</div>
												<button type="submit" class="btn btn-success" value="submit">Update</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
