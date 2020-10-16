$(document).ready(function() {
	$('#products').pinterest_grid({
		no_columns: 4,
		padding_x: 10,
		padding_y: 10,
		margin_bottom: 50,
		single_column_breakpoint: 700
	});


	// Actualizar las unidades del mismo artículo elegidas por el usuario
	$(".btn-update-item").on('click', function(e){
		//evitar la navegación hacia un sitio por defecto...
		e.preventDefault();
		
		//variable id recoge el dato del id del producto en cuestión...
		var id = $(this).data('id');
		//variable href recoge la dirección web del producto en cuestión...
		var href = $(this).data('href');
		//variable quantity_item recoge el valor contenido en el campo de un producto...
		//este valor se obtiene mediante el id del producto...
		var quantity_item = $("#product_" + id).val();

		//redireccionar la nueva dirección web junto a la nueva cantidad de items seleccionados...
		window.location.href = href + "/" + quantity_item;
	});


});
