$(document).ready(function() {

	$.get('/index.php/addresses/new_address_html',function(res) {
		$('#address').html(res);
	});

	$(document).on('submit','form#shipping',function(){
		$.post('index.php/addresses/process_customer',$(this).serialize(),function(res) {
			$('#address').html(res);
		});
		return false;
	});

	


});
