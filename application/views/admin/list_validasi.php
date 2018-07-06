<section>
	<div class="jumbotron jumbotron-fluid gradient">
		<div class="container text-center">
			<h1 class="display-4">Validasi Pembayaran</h1><br/>
		</div>
	</div>
</section>

<section>
	<div class="container-fluid">
		<div class="row">
		    <div class="table-responsive">
				<table class="table table-sm borderless">
					<thead class="thead-dark">	
						<tr>
							<th scope="col-sm-3">NoPJL</th>
							<th scope="col-sm-4">Tanggal</th>
							<th scope="col-sm-5">Nama</th>
							<th scope="col-sm-5">Alamat</th>
							<th scope="col-sm-4">HP</th>
							<th scope="col-sm-5">Tanggal Pembayaran</th>
							<th scope="col-sm-3">Jumlah Pembayaran</th>
							<th scope="col-sm-5">Validasi Pembayaran</th>
							<th scope="col-sm-4">Kode Barang</th>
							<th scope="col-sm-4">Harga Pembelian</th>
							<th scope="col-sm-3">Jumlah Barang</th>
                            <th scope="col-sm-4">Subtotal</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$tmp_nopjl = '';
							$tmp_warna = 'rgb(207, 223, 249, 0.7)';
							
							foreach ($listbrg as $barang) : 
							
								$subtotal = $barang->harga * $barang->jumlah; 	
								
								if($barang->nopjl !== $tmp_nopjl):
								    
									if(isset($tmp_jml)):
								
						?>
						            <tr style="background-color:<?=$tmp_warna;?>" class="text-center">
						                <td colspan="12">Grand Total Rp<?=number_format($tmp_jml,2,',','.');?></td>
						            </tr>
						<?php
								    endif;
								    
						            $tmp_jml = 0;
						            
									if($tmp_warna === 'rgb(207, 223, 249, 0.7)'):
										$tmp_warna = 'rgb(207, 242, 171, 0.6)';
									else:
										$tmp_warna = 'rgb(207, 223, 249, 0.7)';
									endif;
									
						?>
								<tr style="background-color:<?=$tmp_warna;?>">
									<td><?=$barang->nopjl;?></td>
									<td><?=$barang->tgl;?></td>
									<td><?=$barang->nama;?></td>
									<td><?=$barang->alamat;?></td>
									<td><?=$barang->hp;?></td>
									<td><?=$barang->tgl_bayar;?></td>
									<td>Rp<?=number_format($barang->jml_bayar,2,',','.');?></td>

									<td>
										<?php if(!$barang->status):?>
										<form action="<?=base_url('admin/validasi/valid')?>" method="post">
											<input type="hidden" class="form-control" value="<?=$barang->nopjl;?>" name="nopjl"/>
											<button type="submit" class="btn btn-primary">
												Validasi Pembayaran
											</button>
										</form>
										<?php else:?>
										<a class="h6">Pembayaran Valid!</a>
										<?php endif;?>
									</td>
						<?php	else: ?>
								<tr style="background-color:<?=$tmp_warna;?>">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
						
						<?php	endif;
								
								
								$tmp_jml += $subtotal; 
								
						?>
									<td><?=$barang->kodebrg;?></td>
									<td>Rp<?=number_format($barang->harga,2,',','.');?></td>
									<td><?=$barang->jumlah;?></td>
									<td>Rp<?=number_format($subtotal,2,',','.');?></td>
								</tr>

						<?php
								
								$tmp_nopjl = $barang->nopjl;
							
							endforeach;
						?>
						<tr style="background-color:<?=$tmp_warna;?>" class="text-center">
						    <td colspan="12">Grand Total Rp<?=number_format($tmp_jml,2,',','.');?></td>
						</tr>
					</tbody>		
				</table>
				<div>
					<p>Ket : Bagi yang jumlah pembayaran Rp0,00, artinya pelanggan belum melakukan konfirmasi pembayaran</p>
				</div>
			</div>
		</div>
	</div>
</section>

