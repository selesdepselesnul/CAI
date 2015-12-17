function makeTableData (data) {
	return '<td>' + data + '</td>'; 
}

var loadData = function() {
	$.getJSON( "http://127.0.0.1:8080/CAI/json/item", 
		function(items) {
			var types = $.map(items, function(x) {
				return x.type;
			});
			$.unique(types).forEach(function(x) {
				$('#type')
				.append('<option value="' + x + '">' + x + '</option>');
			});

			items.forEach(function(x) {
				
				
				$('#itemTable')
				.append('<tr>' 
					+ makeTableData(x.label) + makeTableData(x.price) 
					+ makeTableData(x.quantity) + makeTableData(x.discount)
					+ makeTableData(x.type)
					+ '</tr>');
			})
		});
	$("#newType").fadeOut('slow');
};

$(window).load(loadData);

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
			$('#itemTable')
			.append("<tr>" + makeTableData(label) + makeTableData(price)
				+ makeTableData(quantity) + makeTableData(discount)
				+ makeTableData(type) + "</tr>");
			$('#label').val(''); 
			$('#price').val('');
			$('#quantity').val('');
			$('#discount').val('');
			$('#addItemButton')
			.after('<div class="alert alert-success" role="alert">sukses cyyn</div>');
		});
	});
});
