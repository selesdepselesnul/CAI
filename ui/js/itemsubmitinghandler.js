/**
 * @author : Moch Deden (https://github.com/selesdepselesnul)
 */
 $(document).ready(function() {

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
 		.append('<option value="' + item + '" class="option-class">' 
 			+ item + '</option>');
 	}

 	function appendItemToTable(item) {
 		$('#itemTable')
 		.append('<tr class="itemRowClass">' 
 			+ makeTableData(item.id)
 			+ makeTableData(item.label) 
 			+ makeTableData(item.price) 
 			+ makeTableData(item.quantity) 
 			+ makeTableData(item.discount)
 			+ makeTableData(item.type)
 			+ makeTableData('<button id="edit_'+ item.id + '" class="edit-button btn btn-default">' 
 				+ '<span class="glyphicon glyphicon-edit"></span>' 
 				+ '</button>')
 			+ makeTableData('<button id="remove_'+ item.id + '" class="remove-button btn btn-default">' 
 				+ '<span class="glyphicon glyphicon-trash"></span>' 
 				+ '</button>') 
 			+ '</tr>');

 		$('.remove-button').click(function() {
 			console.log('remove button clicked');
 			console.log($(this).attr('id'));
 		});

 		$('.edit-button').click(function() {
 			console.log('edit button clicked');
 			console.log($(this).attr('id'));
 		});
 	}

 	function loadAllItems(action) {
 		$.getJSON( "http://127.0.0.1:8080/CAI/json/item/", 
 			function(xs) {
 				console.log(xs);
 				action(xs);
 			});
 	}

 	function addItemsToTable(items) {
 		$.each(items, function(index, value) {
 			appendItemToTable(value);
 		});
 	}
 	function loadAllProperties() {
 		addOption('#typeFilter', 'semua');
 		loadAllItems(function(xs) {
 			const types = $.map(xs, function(x) {
 				return x.type;
 			});
 			$.each($.unique(types), function(index, value) {
 				addOption('.typeSelect', value);
 			});
 			addItemsToTable(xs);
 		});
 		$('#newTypeInputText').hide();
 		$('#alertSuccess').hide();
 	};

 	loadAllProperties();

 	$('#newTypeButton').click(function() {
 		$('#newTypeInputText').fadeIn('slow');
 	});

 	$('#typeFilter').click(function() {
 		$('.itemRowClass').remove();
 		const filter = $('#typeFilter').val();
 		if(filter == 'semua')
 			loadAllItems(function(xs) {
 				addItemsToTable(xs);
 			});
 		else
 			$.getJSON('http://127.0.0.1:8080/CAI/json/item/type/eq/' 
 				+ filter, function(xs) {
 					addItemsToTable(xs);
 				});
 	});

 	$('#newTypeInputText').keypress(function(e) {
 		const ENTER = 13;
 		if(e.which == ENTER) {
 			addOption('#typeInput', $('#newTypeInputText').val());
 			$('#newTypeInputText').val('');		
 			$('#newTypeInputText').fadeOut('slow');
 		}
 	});

 	$('#addItemButton').click(function() {
 		$.post( "http://127.0.0.1:8080/CAI/json/item/new/", { 
 			label: $('#label').val(), 
 			price: $('#price').val(), 
 			quantity : $('#quantity').val(), 
 			discount: $('#discount').val(), 
 			type: $('#typeInput').val() 
 		}).done(function() {
 			loadAllProperties();
 			clearForm();
 			$('.option-class').remove();
 			$("#alertSuccess").fadeToggle( "slow", function() {
 				$( "#alertSuccess" ).fadeToggle();
 			});
 		});
 	});
 });
