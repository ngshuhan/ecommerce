$(document).ready(function() {

	$.get('/index.php/carts/all_items_html',function(res) {
		$('#list').html(res);
	});

	$('form#cart').submit(function() {
		$.post('/index.php/carts/create',$(this).serialize(),function(res){
			$('#list').html(res);
		});
		return false;
	});

	$(document).on('submit','form#delete',function(){
		$.post('/index.php/carts/delete',$(this).serialize(),function(res) {
			$('#list').html(res);
		});
		return false;
	});


})

