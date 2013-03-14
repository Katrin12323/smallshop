
$('.delButton').click( function(){
	
	
	var id = $(this).attr('item_id');
	var base = $('#products').attr('base')+"index.php/ajax/del_item";
	del(id, base);
	$(this).parent().parent().hide();
	
});

function del (id, base){

	$.post(
		base, 
		{'id':id},
		function(data){
			
			$('#total').html(data);
			
			});
}

