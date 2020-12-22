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
				<h5>You have <?php echo $sub_num ?> Subscribed.</h5>
				<a href="<?php echo base_url('Messages/history') ?>">
					<p>View history message</p>
				</a>
			</div>
		</div>
		<hr/>
		<div class="row">
			<?php foreach($subData as $row) {?>
				<div class="col-10">
					<!--Card-->
					<div class="card" id="video">
						<h5 class="card-header">Subscribed: <?php echo $row->uploader ?></h5>
						<div class="card-body">
							<p class="card-text">See his upload history:
								<a href="<?php echo base_url('Upload/history/'.$row->uploader) ?>">
									Click here
								</a>
							</p>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
