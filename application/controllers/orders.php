<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function new_order() {


		$this->load->view("orders/checkout");
	}

	public function charge() {
		\Stripe\Stripe::setApiKey("sk_test_UAlnU8CPVoBkKFT6FyWL3UbU");

		$token = $_POST['stripeToken'];
		try {
		  $charge = \Stripe\Charge::create(array(
		    "amount" => $this->input->post('amount'), // amount in cents, again
		    "currency" => "usd",
		    "source" => $token,
		    "description" => "Example charge"
		    ));
		  	redirect('/orders/create');
		} catch(\Stripe\Error\Card $e) {

		}

	}

	
	public function create() {
		$this->Order->new_order($this->session->userdata('id'));
		$order_id = $this->Order->last_insert_order_id()['id'];
		$cart_items = $this->session->userdata('list');;
		for ($i = 0; $i < count($cart_items); $i++) {
			$order = array('order_id'=>$order_id,'product_id'=>$cart_items[$i]['product_id'],'qty'=>$cart_items[$i]['qty']);
			$this->Order->create_order_details($order);
			
		}
		$this->session->unset_userdata('list');
		$this->session->unset_userdata('total_qty');
		$this->complete($order_id);
	}

	public function pay_html() {
		$this->load->view("partials/pay");
	}

	public function complete($order_id) {
		$id = array('id'=>$order_id);
		$this->load->view("orders/complete",$id);
	}

	public function history() {
		$order_history =$this->Order->get_all_orders_by_user_id($this->session->userdata('id'));
		$order = array('order_history'=>$order_history);
		$this->load->view("orders/history",$order);
	}


	


	
}

?>