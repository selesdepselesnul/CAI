/**
 * @author : Moch Deden (https://github.com/selesdepselesnul)
 */
 $(document).ready(function() {

    // konfigurasikan sesuai url 
    const BASE_API = 'http://127.0.0.1:8080/CAI/json/';

    function splitId(id) {
      return {
        label : id.split('_')[0],
        number : id.split('_')[1]
      }
    }

    function clearForm() {
      $('#label').val(''); 
      $('#price').val('');
      $('#quantity').val('');
      $('#discount').val('');
    }

    function clearTypes() {
      $('.type-input-class').remove();
      $('.type-filter-class').remove();
    }

    function makeTableData(data, id) {
      if(id)
        return '<td id="' + id + '">' + data + '</td>';
      else
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

    loadAllProperties();

    function appendItemToTable(item) {
      $('#itemTable')
      .append('<tr class="item-row-class" id="item_' + item.id 
        + '">' 
        + makeTableData(item.id)
        + makeTableData(item.label,'label_'+item.id)
        + makeTableData(item.price, 'price_' + item.id) 
        + makeTableData(item.quantity, 'quantity_' + item.id) 
        + makeTableData(item.discount, 'discount_' + item.id)
        + makeTableData(item.type, 'type_' + item.id)
        + makeTableData('<button id="edit_'+ item.id 
          + '" class="edit-button btn btn-default">' 
          + '<span class="glyphicon glyphicon-pencil" id="editButton_'+ item.id 
          + '"></span>' 
          + '</button>')
        + makeTableData('<button id="remove_'+ item.id 
          + '" class="remove-button btn btn-default">' 
          + '<span class="glyphicon glyphicon-trash"></span>' 
          + '</button>') 
        + '</tr>');

      $('#remove_'+ item.id).click(function() {
        const itemId = splitId($(this).attr('id')).number;
        console.log('cucok remove is great bro sumpeh dah coy!');
        $.when($.get(BASE_API + 'item/' 
          +  itemId
          +'/remove/')).done(function() {
          clearTypes();
          $('.item-row-class').remove();
          loadAllProperties();    
        });
        });

      $('#edit_'+ item.id).click(function() {
        const editorButton = $(this).children().get(0);
        const id = splitId(editorButton.id);
        const editorKind = id.label;
        const itemId = id.number;

        const wrapInsideInput = function(name, type) {
          const nameId = name + '_' + itemId;
          const textContent = $('#' + nameId).text(); 
          return makeTableData('<input id="' + nameId  + '_input" value="' 
            + textContent + '" type="' + type + '" class="form-control"/>', nameId);
        };

        if(editorKind == 'editingButton') {
          $('#label_'+ itemId).replaceWith(
            wrapInsideInput('label', 'text'));
          $('#price_'+ itemId).replaceWith(
            wrapInsideInput('price', 'number'));
          $('#quantity_'+ itemId).replaceWith(
            wrapInsideInput('quantity', 'number'));
          $('#discount_'+ itemId).replaceWith(
            wrapInsideInput('discount', 'number'));
          $('#type_'+ itemId).replaceWith(
            wrapInsideInput('type', 'text'));


          $(editorButton).replaceWith(
           '<span class="glyphicon glyphicon-ok" id="resubmitingButton_' 
           + itemId + '"></span>');
        } else {
          const label = '#label_'+itemId+'_input';
          const price = '#price_'+itemId+'_input'; 
          const quantity = '#quantity_'+itemId+'_input';
          const discount = '#discount_'+itemId+'_input';
          const type = '#type_'+itemId+'_input';
          $(editorButton).replaceWith(
            '<span class="glyphicon glyphicon-pencil" id="editingButton_' 
            + itemId + '"></span>');

          const unwrap = function(name) {
            return makeTableData($(name).val(), name.split()[0]+'_'+itemId);
          };
          console.log('cucok cyyaobbbbo!');
          $.when($.post( BASE_API + 'item/' + itemId + '/edit/', { 
            label: $(label).val(), 
            price: $(price).val(), 
            quantity : $(quantity).val(), 
            discount: $(discount).val(), 
            type: $(type).val() 
          })).done(function(_) {
            $(label).replaceWith(unwrap(label));
            $(price).replaceWith(unwrap(price));
            $(quantity).replaceWith(unwrap(quantity));
            $(discount).replaceWith(unwrap(discount));
            $(type).replaceWith(unwrap(type));  
          });

        }
      });
}

function addItemsToTable(items) {
 $.each(items, function(index, value) {
  appendItemToTable(value);
});
}


$('#newTypeButton').click(function() {
 $('#newTypeInputText').fadeIn('slow');
});

$('#typeFilter').click(function() {
 $('.item-row-class').remove();
 const filter = $('#typeFilter').val();
 if(filter == 'semua') {
  loadAllItems(function(xs) {
   addItemsToTable(xs);
 });
} else {
  $.getJSON(BASE_API + 'item/type/eq/' 
   + filter, function(xs) {
    addItemsToTable(xs);
  });
}
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
