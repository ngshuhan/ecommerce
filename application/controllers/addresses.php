<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addresses extends CI_Controller {

	public function new_address_html() {
		if ($this->session->userdata('is_logged_in') == TRUE || $this->session->userdata('id')) {
			$id = $this->session->userdata('id');
			$result = $this->Address->get_address_by_user_id($id);
			if (Empty($result)) {
				$result['new_address'] = TRUE; 
			} else {
				$result['new_address'] = FALSE;
			}
		} else {
			$result['new_address'] = TRUE;
		}
		$this->load->view("partials/address_form",$result);
	}

	public function process_customer() {
		$email = $this->input->post('email');
		//use email provided to check if it is an old customer
		$customer = $this->User->get_user_by_email($email);
		if (Empty($customer)) { 
			//create this new customer
			$new_customer = array('first_name'=>$this->input->post('first_name'),'last_name'=>$this->input->post('last_name'),
				'email'=>$email);
			$this->User->add_customer($new_customer);
			$id = $this->User->get_user_by_email($email)['id'];
			$this->session->set_userdata('id',$id);
			$this->session->set_userdata('first_name',$this->input->post('first_name'));
			$this->session->set_userdata('last_name',$this->input->post('last_name'));
			$this->session->set_userdata('email',$this->input->post('email'));

			$this->create($id,$this->input->post()); //then add the address to this newly added customer
		} else {
			//check if this customer has saved address
			$result = $this->Address->get_address_by_user_id($customer['id']);
			if (Empty($result)) { 
				$this->create($customer['id'],$this->input->post()); //add the address to this customer
			} else {
				$this->update($customer['id'],$this->input->post(),$result); //see if there is a need to update it
			}
		}
		$this->show_html($this->input->post());

	}

	public function create($id,$post) {
		$address = $post;
		$address['id'] = $id;
		$this->Address->add_address($address);
	}
		

	public function update($id,$post,$result) {
		foreach ($result AS $key=>$value) { //to see which field needs to be updated
			if (isset($post[$key])) {
				if ($value !== $post[$key]) { 
					$address = array('field'=>$key,'field_value'=>$post[$key],
						'id'=>$result['id']);
					$this->Address->update_address_details($address);
				}
			}	
		}

	}

	public function show_html($post) { 
		$this->load->view("partials/address",$post);
	}


	
}

?>