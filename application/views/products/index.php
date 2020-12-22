<div class="col-lg-12 text-center">
	<!-- List all products -->
	<?php if(!empty($products)){ foreach($products as $row){ ?>
		<div class="col-sm-4 col-lg-4 col-md-4 text-center">
			<div class="thumbnail text-center">
				<div class="text-center" style="height: 200px; width: 200px;">
					<img src="<?php echo base_url('assets/images/'.$row['image']); ?>" style="max-width: 100%; max-height: 100%; margin-left: 8em;" class="text-center"/>
				</div>
				<div class="caption text-center">
					<h4 class="pull-right">$<?php echo $row['price']; ?> USD</h4>
					<h4><?php echo $row['name']; ?></h4>
				</div>
				<div class="ratings text-center">
					<a href="<?php echo base_url('products/buy/'.$row['id']); ?>">
						<div style="height: 75px; width: 75px;">
							<img src="<?php echo base_url('assets/images/paypal.png'); ?>" style="max-width: 100%; max-height: 100%; margin-left: 11em;" />
						</div>
					</a>
					<p>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
					</p>
				</div>
			</div>
		</div>
	<?php } }else{ ?>
		<p>Product(s) not found...</p>
	<?php } ?>
</div>
