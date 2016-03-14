<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carts extends CI_Controller {
	public function all_items_html() {

		$this->load->view("partials/carts");

	}

	public function create() {
		$added = false;
		if ($this->session->userdata('list')) {
			$list = $this->session->userdata('list');
			foreach ($list AS &$item) {
				if ($item['product_id'] == $this->input->post('product_id')) {
					$item['qty'] += $this->input->post('qty');
					$added = true;
				}
			}
		} else {
			$list = array();
		}
		if (!$added) {
			$list[] = $this->input->post();
		}
		$this->session->set_userdata('list',$list);
		$qty = $this->input->post('qty');
		if($this->session->userdata('total_qty')) {
			$total_qty = $this->session->userdata('total_qty');
			$this->session->set_userdata('total_qty',$total_qty+$qty);
		} else {
			$this->session->set_userdata('total_qty',$qty);
		}
		$this->all_items_html();
	}

	


	public function delete() {
		$cart_items = $this->session->userdata('list');
		$product_qty = 0;
		for ($i = 0; $i < count($cart_items); $i++) {
			if ($cart_items[$i]['product_id'] == $this->input->post("product_id")) {
				$product_qty = $cart_items[$i]['qty'];
				unset($cart_items[$i]);
			}
		}
		$cart_items = array_values($cart_items);
		$this->session->set_userdata('list',$cart_items);
		$qty = $this->session->userdata('total_qty');
		$this->session->set_userdata('total_qty',$qty - $product_qty);
		$this->all_items_html();
	}


	



	
}

?>