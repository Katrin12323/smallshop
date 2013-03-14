<?php
	echo form_open('shop/add_product');
	echo form_label('Title:', 'title')." <br>";
	echo form_input('title', '')." <br>";
	echo form_label('Description:', 'desc')." <br>";
	echo form_textarea(Array('name' => 'desc', 'cols' => 20, 'rows'=> 4))." <br>";
	echo form_label('Price:', 'price')." <br>";
	echo form_input('price')." <br>";
	echo form_submit('submit', 'Add Product')." <br>";	
	echo form_close();	
?>

