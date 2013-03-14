$('.addCart').click(	function(){
	
	var id = $(this).attr('item_id');
	var base = $('#product_list').attr('base')+"index.php/ajax/add_item";
	add(id, base);

});

function add (id, base){

	$.post(
		base, 
		{'id':id},
		function(data){
			
			var cart = "Cart items("+data+")";
			$('#cart').html(cart);
			
			});
}