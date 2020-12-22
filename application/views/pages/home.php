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
		Recommendation
		<hr/>
		<div class="row">
			<?php foreach($videoData as $row) {?>
			<div class="col-sm-3">
				<!--Card-->
				<div class="card" id="video">
					<a href="<?php echo site_url('Videos/view/'.$row->file_name) ?>">
						<img src="<?php echo base_url('assets/images/videoCover/'.$row->profile_pics);?>" alt="test"
						 class="card-img-top" style="width: 100%; height: 12em;">
					</a>
					<div class="card-body">
						<h5 class="card-title"><?php echo $row->title ?></h5>
						<p class="card-text"><?php echo $row->uploader ?></p>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		Most Liked
		<hr/>
		<div class="row">
			<?php foreach($likeData as $row) {?>
				<div class="col-sm-3">
					<!--Card-->
					<div class="card" id="video">
						<a href="<?php echo site_url('Videos/view/'.$row->file_name) ?>">
							<img src="<?php echo base_url('assets/images/videoCover/'.$row->profile_pics);?>" alt="test"
								 class="card-img-top" style="width: 100%; height: 12em;">
						</a>
						<div class="card-body">
							<h5 class="card-title"><?php echo $row->title ?></h5>
							<p class="card-text"><?php echo $row->uploader ?></p>
							<p class="card-text" style="float: right">Likes:<?php echo $row->recommend ?></p>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>



