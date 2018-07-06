<section>
	<div class="jumbotron jumbotron-fluid">
		<div class="container text-center">
			<h1 class="display-4">Ups, Ada Kesalahan!</h1><br/>
			<a class="h-4">
				Pembelian gagal. Mohon coba lagi.
			</a>
			<div class="alert alert-danger">
				<?=implode('</div><div class="alert alert-danger" role="alert">', $this->message ?? []);?>
			</div>
			<br/><br/>
		</div>
	</div>
</section>