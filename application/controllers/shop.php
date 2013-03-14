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
	
	/**The method showing the insert form*/
	public function product_insert()
	{
		$this->load->view('includes/header');
		$this->load->view('product_insert');
		$this->load->view('includes/footer');	
	}
	
	/**This method will add the product to the database and forward to hte list page*/
	public function add_product()
	{
		//Form values
		$title = $this->input->post('title');
		$desc = $this->input->post('desc');
		$price = $this->input->post('price');
		
		if(isset($title) && isset($desc) && is_numeric($price))
		{
			$this->load->model('product');
			
			//ToDo: May be check for success
			$this->product->insert($title, $desc, floatval($price));
		}
		
		redirect('/shop/products_list/', 'location');
	}
	
	/**This method will display the users cart content*/
	public function cart_content()
	{
		$this->load->view('includes/header');
			
		//This is just for test, so our cart won't be empty
		$test = array(
               array(
                       'id'      => 'sku_123ABC',
                       'qty'     => 1,
                       'price'   => 39.95,
                       'name'    => 'T-Shirt',
                       'options' => array('Size' => 'L', 'Color' => 'Red')
                    ),
               array(
                       'id'      => 'sku_567ZYX',
                       'qty'     => 2,
                       'price'   => 9.95,
                       'name'    => 'Coffee Mug'
                    ),
               array(
                       'id'      => 'sku_965QRS',
                       'qty'     => 1,
                       'price'   => 29.95,
                       'name'    => 'Shot Glass'
                    )
            );

		$this->cart->insert($test); 
		
		$data['content'] = $this->cart->contents();
		$this->load->view('cart_content', $data);

		$this->load->view('includes/footer');
	}
}