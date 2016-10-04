jQuery(document).ready(function($) {
	
	$(document).on('click', '.add-porcentagem', function(e){
		e.preventDefault();
		
		let item = $(this).parents('.item').clone();
		let input = item.find('input');

		// Limpa os valores do clone
		input.val('');
		item.find('option:selected').removeAttr('selected');

		let last_input = $('.items').find('.item').last().find('input');
		let name 	= last_input.attr('name');

		name 	 	= name.replace('custom_porcentagem[item][', '').replace('][nome]', '');
		novo_name 	= name.replace(name, 'custom_porcentagem[item][' + ( parseInt(name) + 1 ) + '][nome]');

		// Altera os names com os indices certos
		item.find('select').attr('name', 'custom_porcentagem[item]['+ ( parseInt(name) + 1 ) + '][porcentagem]');
		input.attr('name', novo_name);

		// Coloca o elemento após o ultimo .item
		$('.items').find('.item').last().after(item);
	});

	$(document).on('click', '.remove-porcentagem', function(e){
		e.preventDefault();
		console.log($('.items').find('.item').length);
		if($('.items').find('.item').length > 1){
			let item = $(this).parents('.item').remove();
		};

	});

});