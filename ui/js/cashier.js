/**
 * @author : Moch Deden (https://gihtub.com/selesdepselesnul)
 */
$(document).ready(function() {
	const BASE_API = 'http://127.0.0.1:8080/CAI/json/';

	$('#label').keyup(function() {
		const path = BASE_API + 'item/label/like/' 
		+ $('#label').val(); 
		$.getJSON(path)
		.done(function(xs) {
			const filteredLabels = $.map(xs, function(x) {
				return x.label;
			});
			$('#label').autocomplete({
				source : filteredLabels 
			});
		});
	});
});