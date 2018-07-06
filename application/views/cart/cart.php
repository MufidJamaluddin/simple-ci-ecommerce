<section>
	<div class="jumbotron jumbotron-fluid putih" style="margin-bottom: 0">
		<div class="container">
			<div class="row">
				<div class="col-md-7 text-center">
					<h1 class="display-4">LaptopQ</h1>
					<p>Belanja Mudah & Murah</p>
				</div>
				<div class="col-md-5">
					<img class="img-responsive h-100" src="<?=base_url()?>/assets/img/foto/Apple-MacBook-Air-MMGF2.jpg" alt="">
				</div>
			</div>
		</div>
	</div>
</section>
		
<section>
	<div class="jumbotron jumbotron-fluid gradient">
		<div class="text-center">
			<h3>Keranjang Belanja</h3>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
		    <div class="table-responsive">

				<table class="table table-sm">
					<thead class="thead-dark">	
						<tr>
							<th scope="col-sm-2">Kode Barang</th>
							<th scope="col-sm-8">Nama Barang</th>
							<th scope="col-sm-6">Harga</th>
							<th scope="col-sm-2">Jumlah</th>
							<th scope="col-sm-3">Total</th>
							<th scope="col-sm-3">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							
							// Harga selalu diupdate jika belum di checkout
							// Mengapa disimpan di session? 
							// Karena jika beli Pukul 23.59, dan data harga update pukul 00.00,
							// Maka tercatat harga ketika checkout
							
							$_SESSION['grand_total'] = 0;
							
							foreach($listbrg as $barang):
								
						?>
								<tr>
									<td><?=$barang->kodebrg;?></td>
									<td><?=$barang->nama;?></td>
									<td>Rp<?=number_format($barang->harga,2,",",".");?></td>	
									<td>
										<?=$_SESSION['shp_cart'][$barang->kodebrg]['jml'];?>
									</td>
									<td>
										Rp
										<?php
											$subtotal = $_SESSION['shp_cart'][$barang->kodebrg]['jml'] * $barang->harga;
											echo number_format($subtotal,2,",",".");
											$_SESSION['grand_total'] += $subtotal;
										?>
									</td>
									<td>
										<a href="<?=base_url('cart/b_add/'.$barang->kodebrg);?>">
											<button class="btn btn-default">
												+
											</button>
										</a>
										
										<a href="<?=base_url('cart/min/'.$barang->kodebrg);?>">
											<button class="btn btn-default">
												-
											</button>
										</a>
										<a href="<?=base_url('cart/remove/'.$barang->kodebrg);?>">
											<button class="btn btn-danger">
												Hapus
											</button>
										</a>
									</td>
								</tr>

						<?php
								
								$_SESSION['shp_cart'][$barang->kodebrg]['harga'] = $barang->harga;
						
							endforeach;
						
						?>
					</tbody>		
				</table>
				
			</div>
			<div>
				<h4>Total Tagihan Belanja Anda Rp<?=number_format($_SESSION['grand_total'],2,",",".");?></h4>	
					
				<br/>
					
				<a href="<?=base_url('cart/removeall')?>">
					<button class="btn btn-danger">
						Hapus Semua Barang
					</button>
				</a>
			
				<br/>
				<br/>
					
				<h3 style="text-center">Check Out</h3>
				
				<form action="<?=base_url('checkout/save')?>" method="post">
					<div class="form-group row">
						<label for="nama" class="col-sm-2 col-form-label">Nama</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="nama" name="nama"/>
						</div>
					</div>
					<div class="form-group row">
						<label for="HP" class="col-sm-2 col-form-label">HP</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="HP" name="hp"/>
						</div>
					</div>
					<div class="form-group row">
						<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="alamat" name="alamat"/>
						</div>
					</div>
						
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="email" name="email"/>
						</div>
					</div>
							
					<hr/>
							
					<button type="submit" class="btn btn-primary">Check Out</button>

				</form>		
				<br/><br/>
			</div>
		</div>
	</div>
</section>