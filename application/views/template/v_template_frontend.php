<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>
            Shopping Cart PPL 1
        </title>
		<link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet"/>
		<link href="<?=base_url();?>assets/css/style.css" rel="stylesheet"/>
	<head>
	<body>
		<section>
			<?php $this->load->view($header_view); ?>
		</section>
		
		<?php $this->load->view($content_view); ?>
		
		<section>
			<?php $this->load->view($footer_view); ?>
		</section>
		
		<section>
			<div class="modal" id="sukses">
				<div class="modal-dialog">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Sukses</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body">
							Barang Telah Ditambahkan ke Cart
						</div>

						<!-- Modal footer -->
						<div class="modal-footer">
							<a href="index.php/cart">
								<button type="button" class="btn btn-primary">Buka Cart</button>
							</a>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
						</div>

					</div>
				</div>
			</div>
		</section>
		
		<script src="<?=base_url();?>assets/js/jquery.min.js"></script>
		<script>
		$(document).ready(function() {

			$('.add_cart').click(function(){
				
				var id = $(this).data("value"); 
				
				$.get("<?=base_url('index.php/cart/add/')?>" + id, function(data){
					$('#jml_barang').html(data);	
					$('#sukses').modal();
				});
				
			});
			
		});
		</script>
		<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
	</body>
</html>