<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shop extends CI_Controller {

	public function index()
	{
		echo "Welcome to my small shop!";		
	}
	
	/**The method showing one product*/
	public function product()
	{
		//$prod product id or title, or description or price
		$prod = urldecode($this->uri->segment(3));
		
		$this->load->model('product');
		
		if(is_numeric($prod))
		{
			if(preg_match("/^[1-9][0-9]{0,15}$/", $prod))
			{
				$data['info'] = $this->product->get_by_id((int)$prod);
			}
			else
			{
				$data['info'] = $this->product->get_by_price(floatval($prod));
			}
		}
		else if(strlen($prod) < 26)
		{
			$data['info'] = $this->product->get_by_title($prod);	
		}
		else
		{
			$data['info'] = $this->product->get_by_desc($prod);	
		}
		
		$this->load->view('includes/header');
		$this->load->view('product_view', $data);
		$this->load->view('includes/footer');
	}
	
	/**The method showing the list of products*/
	public function products_list()
	{
		$this->load->model('product');
			
		$data['list'] =  $this->product->get_all();
		
		$this->load->view('includes/header');
		$this->load->view('product_list', $data);
		$this->load->view('includes/footer');
	
	}
}