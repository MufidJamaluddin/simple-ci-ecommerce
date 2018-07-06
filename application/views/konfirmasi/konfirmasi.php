<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="marg">
	<div class="col-md-8 mx-auto">
		<div class="card rounded-0 border-dark">
			<div class="card-header text-center rounded-0 bg-dark text-white">
				<h2>Konfirmasi Pembelian</h2>
			</div>
			<div class="card-body">

				<form action="<?=base_url('konfirmasi/konfirmasi'); ?>" method="post">
					<input type="hidden" name="nopjl" value="<?=$nopjl;?>"/>
					<div class="form-group">
						<label for="jml_bayar">Jumlah Transfer</label>
						<div class="col-sm-10 float-right">
							<input type="text" name="jml_bayar" class="rounded-0 form-control" id="jml_bayar"/>
						</div>
					</div>
					<div class="card-footer bg-transparent">
						<button type="submit" class="btn btn-primary float-right">Konfirmasi</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>
</div>