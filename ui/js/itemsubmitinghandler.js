$(window).load(function() {
	$.getJSON( "http://127.0.0.1:8080/CAI/json/item", 
		function(items) {
			var types = $.map(items, function(x) {
				return x.type;
			});
			$.unique(types).forEach(function(x) {
				$('#type')
				.append('<option value="' + x + '">' + x + '</option>');
			});
		});
	$("#newType").fadeOut('slow');
});

$(document).ready(function() {
	$('#newTypeButton').click(function() {
		if($("#newTypeButton").text() === 'baru') {
			$('#newType').fadeIn('slow');
			$('#type').fadeOut('slow');
			$('#newTypeButton').text('lama');
		} else {
			$('#newType').fadeOut('slow');
			$('#type').fadeIn('slow');
			$('#newTypeButton').text('baru');
		}
	});

	$('#addItemButton').click(function() {
		var label = $('#label').val(); 
		var price = $('#price').val();
		var quantity = $('#quantity').val();
		var discount = $('#discount').val();
		var type = "";

		if($('#newType').text() === 'baru')
			type = $('#type').val();
		else
			type = $('#newType').val();

		$.post( "http://127.0.0.1:8080/CAI/json/item/new/", 
			{ label: label, 
				price: price, 
				quantity : quantity, 
				discount: discount, 
				type: type })
		.always(function(data) {
			console.log('nyimpen data cyyn');})
		.done(function( data ) {
			console.log(data);
		});
	});
});
