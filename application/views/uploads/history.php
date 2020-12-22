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
		<hr/>
		<h1>Uploaded Image:</h1>
		<div class="row">
			<?php foreach($historyImg as $row) {?>
				<div class="col-sm-3">
					<!--Card-->
					<div class="card" id="video">
						<h5 class="card-header"><?php echo $row->file_name ?></h5>
						<div class="row">
							<img src="<?php echo site_url('assets/images/'.$row->uploader.'/'.$row->file_name) ?>" alt="test"
								 class="card-img-top" style="width: 80%; height: 80%; margin-left: 3em;">
						</div>
						<div class="card-body">
							<h5 class="card-title">Uploader:<?php echo $row->uploader ?></h5>
							<p class="card-text">Upload Time:<?php echo $row->created_at ?></p>
						</div>
					</div>
					<button onclick="location.href='<?php echo site_url('Upload/deleteImg');?>/<?php echo $row->id; ?>'" type="button" class="btn btn-danger btn-xs" title="Delete" style="float: right;">
						<span class="glyphicon glyphicon-trash">delete</span>
					</button>
				</div>
			<?php } ?>
		</div>

		<hr/>
		<h1>Uploaded Video:</h1>
		<hr/>
		<div class="row">
			<?php foreach($historyVideo as $row) {?>
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
					<button onclick="location.href='<?php echo site_url('Upload/deleteVideo');?>/<?php echo $row->id; ?>'" type="button" class="btn btn-danger btn-xs" title="Delete" style="float: right;">
						<span class="glyphicon glyphicon-trash">delete</span>
					</button>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
