$(document).ready(function() {
			
	$('.add_cart').click(function(){
			
		var id = $(this).data("value"); 
			
		$.get("index.php/action_cart?action=add&kode=" + id, function(data){
			$('#jml_barang').html(data);	
			$('#sukses').modal();
		});
			
	});
			
});