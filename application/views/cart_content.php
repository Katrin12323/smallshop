
<div id="products" base = "<?php echo base_url(); ?>">
			<?php
				
				if(is_array($content) && !empty($content))
				{	
					$total=0;
			?>
<table>
			<tr><td>Product: <td> Quantity: <td> Prce: </tr>
			<?php
					foreach($content as $prod)
					{
						echo "	<tr class='prod_row'>	\n		<td>".$prod['name'];
						echo "\n		<td class='qty_col'>".$prod['qty'];
						echo "\n		<td class='price_col'>".$prod['qty']*$prod['price'];
						echo "\n		<td><input type = 'button' class = 'delButton' value = 'DELETE' item_id = ".$prod['id']." /></tr>\n";
						$total+=$prod['qty']*$prod['price'];
					}
					
					echo "	<tr><td>Total: <td id='total'>".$total."<tr>\n";
				}
				else
				{
					echo "\n</br>Nothing ordered</br>\n";
				}
			?>
</table>
</div>

<script type="text/javascript" src="<?php echo base_url();?>js/delcart.js"></script>
