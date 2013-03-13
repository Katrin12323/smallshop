


<table id="product_list" base = "<?php echo base_url(); ?>">
<tr><td> ITEM: <td>  PRICE </tr>
		<?php
			
			if(is_array($list) && !empty($list))
			{	
				
				foreach($list as $item)
				{
					echo "<tr><td><a href='".base_url()."index.php/shop/product/".$item['item_id']."'>".$item['item_title']."</a><td>".$item['item_price'];
					echo "</tr>";			
				}
			}
			else
			{
				echo "<tr><td>no item found";
			}
		?>

</table>

