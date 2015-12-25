/**
 * @author : Moch Deden (https://github.com/selesdepselesnul)
 */
 $(document).ready(function() {

    // konfigurasikan sesuai url 
    const BASE_API = 'http://127.0.0.1:8080/CAI/json/'

    function clearForm() {
    	$('#label').val(''); 
    	$('#price').val('');
    	$('#quantity').val('');
    	$('#discount').val('');
    }

    function clearTypes() {
    	console.log('clear all the types');
    	$('.type-input-class').remove();
    	$('.type-filter-class').remove();
    }

    function makeTableData (data) {
    	return '<td>' + data + '</td>'; 
    }

    function addOption(selector, className, item) { 
    	$(selector)
    	.append('<option value="' + item 
    		+ '" class="' + className + '">' 
    		+ item + '</option>');
    }

    function loadAllItems(action) {
    	$.getJSON( BASE_API + 'item/')
    	.done(function(xs) {
    		action(xs);
    	});
    }

    function addTypes(items) {
    	const types = $.map(items, function(x) {
    		return x.type;
    	});
    	$.each($.unique(types), function(index, value) {
    		addOption('#typeInput', 'type-input-class', value);
    		addOption('#typeFilter', 'type-filter-class', value);
    	});
    }

    function loadAllProperties() {
    	addOption('#typeFilter', 'type-filter-class', 'semua');
    	loadAllItems(function(xs) {
    		addTypes(xs);
    		addItemsToTable(xs);
    	});
    	$('#newTypeInputText').hide();
    	$('#alertSuccess').hide();
    };

    function appendItemToTable(item) {
    	$('#itemTable')
    	.append('<tr class="item-row-class" id="item_' + item.id 
    		+ '">' 
    		+ makeTableData(item.id)
    		+ makeTableData(item.label) 
    		+ makeTableData(item.price) 
    		+ makeTableData(item.quantity) 
    		+ makeTableData(item.discount)
    		+ makeTableData(item.type)
    		+ makeTableData('<button id="edit_'+ item.id 
    			+ '" class="edit-button btn btn-default">' 
    			+ '<span class="glyphicon glyphicon-edit"></span>' 
    			+ '</button>')
    		+ makeTableData('<button id="remove_'+ item.id 
    			+ '" class="remove-button btn btn-default">' 
    			+ '<span class="glyphicon glyphicon-trash"></span>' 
    			+ '</button>') 
    		+ '</tr>');

    	$('.remove-button').click(function() {
    		const itemId = $(this).attr('id').split('_')[1]; 
    		$.get(BASE_API + 'item/' 
    			+  itemId
    			+'/remove/').done(function() {
    				$('#item_' + itemId).remove();		
    			});
    		});

    	$('.edit-button').click(function() {
    		console.log('edit button clicked');
    		console.log($(this).attr('id'));
    	});
    }


    function addItemsToTable(items) {
    	$.each(items, function(index, value) {
    		appendItemToTable(value);
    	});
    }

    loadAllProperties();
    console.log('load cuuy!'); 

    $('#newTypeButton').click(function() {
    	$('#newTypeInputText').fadeIn('slow');
    });

    $('#typeFilter').click(function() {
    	$('.item-row-class').remove();
    	const filter = $('#typeFilter').val();
    	if(filter == 'semua')
    		loadAllItems(function(xs) {
    			addItemsToTable(xs);
    		});
    	else
    		$.getJSON(BASE_API + 'item/type/eq/' 
    			+ filter, function(xs) {
    				addItemsToTable(xs);
    			});
    });

    $('#newTypeInputText').keypress(function(e) {
    	const ENTER = 13;
    	if(e.which == ENTER) {
    		addOption('#typeInput', 'type-input-class', 
    			$('#newTypeInputText').val());
    		addOption('#typeFilter', 'type-filter-class', 
    			$('#newTypeInputText').val());
    		$('#newTypeInputText').val('');		
    		$('#newTypeInputText').fadeOut('slow');
    	}
    });

    $('#addItemButton').click(function() {
    	$.post( BASE_API + 'item/new/', { 
    		label: $('#label').val(), 
    		price: $('#price').val(), 
    		quantity : $('#quantity').val(), 
    		discount: $('#discount').val(), 
    		type: $('#typeInput').val() 
    	}).done(function() {
    		$('.item-row-class').remove();
    		clearForm();
    		clearTypes();
    		loadAllProperties();
    		$("#alertSuccess").fadeToggle( "slow", function() {
    			$( "#alertSuccess" ).fadeToggle();
    		});
    	});
    });
});
