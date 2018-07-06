<nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-trans navbar-shadow">
	<a class="navbar-brand" href="<?=base_url();?>">
		<img class="img-responsive" style="width:50px" src="<?=base_url();?>assets/img/logo/logo-kpi9.png"/>
	</a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		<?php foreach($left_menu as $link => $item) : ?>
			<li class="nav-item active">
				<a class="nav-link" href="<?=base_url($link);?>"><?=$item; ?></a>
			</li>
		<?php endforeach; ?>
		</ul>
						
		<ul class="navbar-nav ml-auto">
		<?php foreach($right_menu as $link => $item) : ?>
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url($link);?>"><?=$item; ?></a>
			</li>
		<?php endforeach; ?>
		<?php if(!isset($_SESSION['is_login'])):?>
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url('cart');?>">
					Shopping Cart 
					<span class="badge badge-secondary" id="jml_barang">
						<?=isset($_SESSION['shp_cart']) ? sizeof($_SESSION['shp_cart']) : '0';?>
					</span> 
				</a>
			</li>
		<?php endif;?>
		</ul>
	</div>
</nav>