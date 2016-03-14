<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index() {
		
	

		$this->load->view("users/index");
	}

	public function new_user() {
		$this->load->view("users/new");
	}

	public function create() {
		$validation_result = $this->User->validate($this->input->post());
		if ($validation_result == TRUE) {
			$user = $this->input->post();
			if (Empty($this->User->get_all_users())){
				$user['is_admin'] = 1; 
			} else {
				$user['is_admin'] = 0;
			}
			$this->User->add_user($user);
			$this->session->set_flashdata("success","<div class='col-md-9 col-md-offset-1 alert alert-success'><strong>
				Success! </strong> You have successfully registered, please user your credentials to log in!</div>");
			redirect("/users/new");

		} else {
			$this->session->set_flashdata("errors",validation_errors());
			redirect("/users/new");
		}



	}






	
}

?>