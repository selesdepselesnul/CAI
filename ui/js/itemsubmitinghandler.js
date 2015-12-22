function makeTableData (data) {
	return '<td>' + data + '</td>'; 
}

function loadAllItems(action) {
	$.getJSON( "http://127.0.0.1:8080/CAI/json/item/", 
		function(xs) {
			action(xs);
		});
}

function addItemsToTable(items) {
	items.forEach(function(x) {
		$('#itemTable')
		.append('<tr>' 
			+ makeTableData(x.label) + makeTableData(x.price) 
			+ makeTableData(x.quantity) + makeTableData(x.discount)
			+ makeTableData(x.type)
			+ '</tr>');
	});
}

$(window).load(function() {
	loadAllItems(function(xs) {
		addItemsToTable(xs);
		const types = $.map(xs, function(x) {
			return x.type;
		});
		$.unique(types).forEach(function(x) {
			$('.typeSelect')
			.append('<option value="' + x + '"' + 'class="itemClass' + '"' + '>' 
				+ x + '</option>');
		});
	});
	$("#newType").fadeOut();
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

	$('#typeFilter').click(function() {
		console.log($('#typeFilter').val());
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
