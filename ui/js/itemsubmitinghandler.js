function clearForm() {
	$('#label').val(''); 
	$('#price').val('');
	$('#quantity').val('');
	$('#discount').val('');
}

function makeTableData (data) {
	return '<td>' + data + '</td>'; 
}

function addOption(selector, item) {
	$(selector)
	.append('<option value="' + item + '">' + item + '</option>');
}

function appendItemToTable(item) {
	$('#itemTable')
	.append('<tr class="itemRowClass">' 
		+ makeTableData(item.label) + makeTableData(item.price) 
		+ makeTableData(item.quantity) + makeTableData(item.discount)
		+ makeTableData(item.type)
		+ '</tr>');
}

function loadAllItems(action) {
	$.getJSON( "http://127.0.0.1:8080/CAI/json/item/", 
		function(xs) {
			action(xs);
		});
}

function addItemsToTable(items) {
	items.forEach(function(x) {
		appendItemToTable(x);
	});
}

$(window).load(function() {
	addOption('#typeFilter', 'semua');
	loadAllItems(function(xs) {
		addItemsToTable(xs);
		const types = $.map(xs, function(x) {
			return x.type;
		});
		$.unique(types).forEach(function(x) {
			addOption('.typeSelect', x);
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
		$('.itemRowClass').remove();
		const filter = $('#typeFilter').val();
		if(filter == 'semua')
			loadAllItems(function(xs) {
				addItemsToTable(xs);
			});
		else
			$.getJSON('http://127.0.0.1:8080/CAI/json/item/type/eq/' + filter,
				function(xs) {
					addItemsToTable(xs);
				});
	}
	);

	$('#addItemButton').click(function() {
		var label = $('#label').val(); 
		var price = $('#price').val();
		var quantity = $('#quantity').val();
		var discount = $('#discount').val();
		var type = $('#typeInput').val();
		const item = { 
			label: label, 
			price: price, 
			quantity : quantity, 
			discount: discount, 
			type: type 
		};
		$.post( "http://127.0.0.1:8080/CAI/json/item/new/", item)
		.done(function() {
			appendItemToTable(item);
			clearForm();
			$('#addItemButton')
			.after('<div class="alert alert-success" role="alert">sukses cyyn</div>');
		});
	});
});
