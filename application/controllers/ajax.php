<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajax extends CI_Controller {
	
	/**Deletes product from the session */
	public function del_item()
	{
		//The item id
		$item_id = $this->input->post('id');
		
		//Cart content needed to find rowid 
		$cart = $this->cart->contents();
		
		//To delete item first need to get rowid brrr....
        foreach($cart as $item)
		{
            if($item['id'] == $item_id)    
            {
				$row_id = $item['rowid'];
            }       
        }	
		
		$this->cart->update(Array('rowid' => $row_id, 'qty' => 0));
		
		$total = $this->cart->total();
		echo json_encode($total);
	}

}