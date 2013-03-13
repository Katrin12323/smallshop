
		<div id="single_product" base = "<?php echo base_url(); ?>">
		<?php
			
			if(is_array($info) && !empty($info))
			{	
				echo "\n</br>Title: ".$info[0]['item_title']."</br>\n";
				echo "Description: ".$info[0]['item_desc']."</br>\n";
				echo "Price: ".$info[0]['item_price']."$</br>\n";
			}
			else
			{
				echo "\n</br>no item found</br>\n";
			}
		?>

		</div>



