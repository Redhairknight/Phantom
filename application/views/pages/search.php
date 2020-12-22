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
				Search result for <h4><?php echo $keyword ?></h4>
			</div>
			<div class="dropdown col-sm-4">
				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Order
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="<?php echo base_url('Search/recent/'.$keyword) ?>">Most recent</a>
					<a class="dropdown-item" href="<?php echo base_url('Search/liked/'.$keyword) ?>">Most liked</a>
				</div>
			</div>
		</div>
		<hr/>
		<div class="row">
			<?php foreach($searchData as $row) {?>
				<div>
					<!--Card-->
					<div class="card" id="video">
						<h5 class="card-header"><?php echo $row->title ?></h5>
						<div class="row">
							<a class="col-sm-3" href="<?php echo site_url('Videos/view/'.$row->file_name) ?>">
								<img src="<?php echo base_url('assets/images/videoCover/'.$row->profile_pics);?>" alt="test"
									 class="card-img-top" style="width: 100%; height: 12em;">
							</a>
							<div class="col-sm-9">
								<h5><?php echo $row->description ?></h5>
							</div>
						</div>
						<div class="card-body">
							<h5 class="card-title">Uploader:<?php echo $row->uploader ?></h5>
							<p class="card-text">Upload Time:<?php echo $row->created_at ?></p>
							<p class="card-text">Likes:<?php echo $row->recommend ?></p>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
