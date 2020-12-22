<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>

<div class="row">
	<div class="col-sm-2" id="side-bar">
		<div class="card">
			<div class="card-header">Sidebar</div>
			<ul class="list-group list-group-flush">
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

			<div class="card">
				<div class="card-header">
					Happy coding
				</div>
				<?php foreach($check_video as $row) {?>
				<div class="card-body">
					<blockquote class="blockquote mb-1">
<!--						<div class="embed-responsive embed-responsive-16by9">-->
<!--							<video width="320" height="240" controls>-->
<!--								<source src="--><?php //echo base_url("assets/videos/");?><!--/--><?php //echo $file_name; ?><!--" type="video/mp4">-->
<!--								<script>-->
<!--									document.getElementsByTagName('video')[0].volume = 0.2;-->
<!--								</script>-->
<!--							</video>-->
<!--						</div>-->
						<div class="row">
							<div id = "danmup" class="col-sm-9">
							</div>
							<div class="col-sm-3">
								<h5 style="color: grey; margin-left: 2em;">Bullet comments:</h5>
								<p onclick="show_danmu(<?php echo $row->id; ?>)" style="color: #9fcdff; size:5px;">refresh</p>
								<div id="danmupool" class="col-12" style="margin-left: 2em;">

								</div>
							</div>
						</div>
						<script type="text/javascript">
							$("#danmup").DanmuPlayer({
								src: "<?php echo base_url("assets/videos/");?>/<?php echo $file_name; ?>", //source
								height: "600px",
								width: "800px",
								urlToGetDanmu:"<?php echo base_url("Danmu/getDanmu/".$row->id) ?>",  //featch data from backend
								urlToPostDanmu:"<?php echo base_url("Danmu/sendDanmu/".$row->id) ?>"
								//send data to backend
							});
							//$("#danmup .danmu-div").danmu("addDanmu",[
							//	<?php //echo base_url("Danmu/getDanmu") ?>//,
							//	{ "text":"这是滚动弹幕" ,color:"white",size:1,position:0,time:2},
							//	{ "text":"我是帽子绿" ,color:"green",size:1,position:0,time:3},
							//	{ "text":"哈哈哈啊哈" ,color:"#f30",size:1,position:0,time:10},
							//	{ "text":"大家好，我是打不死的小强" ,color:"orange",size:1,position:0,time:23}
							//]);
						</script>
<!--						-->
					</blockquote>
					<div>
						Title: <strong style="color: darkcyan"><?php echo $row->title ?></strong>
						<br>
						Uploader: <strong style="color: darkcyan"><?php echo $row->uploader ?></strong>
						<a data-toggle="modal" data-target="#message1">
							<img src="<?php echo base_url("assets/images/message_icon.png");?>" alt="message"
							style="width: 20px; height: 20px;">
						</a>
<!--Message-->
						<div class="modal fade" id="message1" tabindex="-1" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="modalLabel3">Send Message to the uploader</h5>
										<button type="button" class="close" data-dismiss="modal">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form method="post" action="<?php echo site_url('Videos/message/'.$row->uploader) ?>">
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

						<br>
						Time Upload: <strong style="color: darkcyan"><?php echo $row->created_at ?></strong>
					</div>
					<a href="<?php echo site_url('Upload/download_video/'.$row->file_name) ?>">
						<button type="button" class="btn btn-success" style="float:right;">Download</button>
					</a>
<!--					<a href="--><?php //echo site_url('Messages/subscribe/'.$row->uploader) ?><!--">-->
						<button type="button" onclick="subscribe(<?php echo $row->id; ?>)" class="btn btn-secondary" style="float:right; margin-right: 10px;">
							<div id="subscribed_area">
								Subscribe
							</div>
						</button>
<!--					</a>-->
					<script async src="https://platform-api.sharethis.com/js/sharethis.js#property=5ed3bda81254a4001214b979&product=sticky-share-buttons"></script>
<!--					--><?php
//						$count_like = $this->Video_model->count_like($row->id);
//					?>
					<div class="row">
						<div class="col-md-11" style="float: right">
							<span style="cursor: pointer; float: right;" onclick="unlike_post(<?php echo $row->id; ?>)">
								<img class="img-rounded img-responsive" style="width: 36px; height: 36px; margin-top: 5px;" src="<?php echo base_url() ?>assets/images/unlike.jpg" alt="unlike">
							</span>

							<span style="cursor: pointer; float: right;" onclick="like_post(<?php echo $row->id; ?>)">
								<img class="img-rounded img-responsive" style="width: 45px; height: 45px;" src="<?php echo base_url() ?>assets/images/icon.png" alt="like">
							</span>
						</div>
						<span id="like_count" style="padding-top: 10px; width: 5em;"> </span>
					</div>

				</div>
				<?php } ?>
			</div>

			<div class="container" style="margin:20px 0">
				<div class="row">
					<div class="panel panel-default widget" style="width: 100%">
						<div class="panel-heading">
							<span class="glyphicon glyphicon-comment"></span>
							<h3 class="panel-title">Recent Comments</h3>
							<span class="label label-info"></span>
						</div>
						<div class="panel-body">
							<ul class="list-group">
								<?php foreach($results as $row) {?>
								<li class="list-group-item">
									<div class="row">
										<div class="col-sm-2">
											<img src="http://placehold.it/80" class="img-circle img-responsive" alt="" />

											<div class="mic-info">
												By: <a href="#"><?php echo $row->username ?></a> on <?php echo $row->created_at ?>
											</div>

										</div>
										<div class="col-sm-10" style="font-size: 20px">
											<div class="comment-text">
												<?php echo $row->comment;?>
											</div>
										</div>
									</div>
									<div class="action" style="float: right">
										<button type="button" id="btnEdit" onclick="validateUser()" class="btn btn-primary btn-xs" title="Edit" data-toggle="modal" data-target="#myModal">
											<span class="glyphicon glyphicon-pencil">edit</span>
										</button>

										<!--todo-->
										<script type="text/javascript">
											var CurrentUser="{:session('username')}";
											function validateUser() {
												if (CurrentUser !== <?php echo $row->username ?>) {
													 $('#myModal').modal('show');
												} else {
													alert('Access denied');
												}
											}
										</script>

											<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="modalLabel1">Update Comment</h5>
															<button type="button" class="close" data-dismiss="modal">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form action="<?php echo site_url('Videos/update') ?>/<?php echo $row->id; ?>" method="post" class="comment">
																<textarea class="form-control"  name="content" placeholder="please type here" id="editor1" cols="75" rows="5"></textarea>
																<button type="submit" class="btn btn-success float-right" value="submit">Submit</button>
															</form>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>
										<button onclick="location.href='<?php echo site_url('Videos/delete');?>/<?php echo $row->id; ?>'" type="button" class="btn btn-danger btn-xs" title="Delete">
											<span class="glyphicon glyphicon-trash">delete</span>
										</button>
									</div>
								</li>

								<?php } ?>
							</ul>
							<a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a>
						</div>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					Comment
				</div>
				<div class="card-body">
					<form action="<?php echo site_url('Videos/create/'.$file_name) ?>" method="post" class="comment">
						<textarea name="content" id="editor" cols="50" rows="50" placeholder="please type here">
						</textarea>
						<button type="submit" class="btn btn-success float-right" value="submit">Submit</button>
					</form>
					<script>
						ClassicEditor
							.create( document.querySelector( '#editor' ) )
							.catch( error => {
								console.error( error );
							} );

						var CurrentUser = "<?php echo $this->session->userdata('id') ?>";
					</script>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function like_post(v_id) {
			$.ajax({
				url: '<?php echo base_url() ?>Videos/like',
				type: 'post',
				data: {v_id: v_id},
				success: function(response){
					$('#like_count').text("Likes: " + response);
					console.log(response);
				}
			});
		}

		function unlike_post(v_id) {
			$.ajax({
				url: '<?php echo base_url() ?>Videos/unlike',
				type: 'post',
				data: {v_id: v_id},
				success: function(response){
					$('#like_count').text("Likes: " + response);
					console.log(response);
				}
			});
		}

		function show_danmu(v_id) {
			$.ajax({
				url: '<?php echo base_url() ?>Danmu/getPool',
				type: 'post',
				data: {v_id: v_id},
				success: function (response) {
					// var str = response.split('"');
					$('#danmupool').text(response);
					console.log(response);
				}
			});
		}

		function subscribe(v_id) {
			$.ajax({
				url: '<?php echo base_url() ?>Videos/subscribed',
				type: 'post',
				data: {v_id: v_id},
				success: function (response) {
					$('#subscribed_area').text(response);
					console.log(response);
				}
			});
		}
	</script>


