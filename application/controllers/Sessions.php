<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sessions extends CI_Controller {

	public function create() {
		$user = $this->User->get_user_by_email($this->input->post('email'));
		if ($user && password_verify($this->input->post('password'),$user['password'])) {
			$user_info = array(
				'id'=> $user['id'],
				'first_name'=> $user['first_name'],
				'last_name'=>$user['last_name'],
				'is_admin' => $user['is_admin'],
				'email' => $user['email'],
				'is_logged_in'=>TRUE);
			$this->session->set_userdata($user_info);
			redirect("/sessions/success");
		} else {
			$this->session->set_flashdata("errors","<div class='col-md-9 col-md-offset-1 alert alert-danger'><strong>Error! </strong>Either the email
				or password is invalid. Please try again!</div>");
			redirect("/users/new");
		}
	}

	public function success() {
		if ($this->session->userdata('is_logged_in') == FALSE) {
			redirect("/users/new");
		}
		redirect("/");
	}

	public function destroy() {
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('first_name');
		$this->session->unset_userdata('last_name');
		$this->session->unset_userdata('is_admin');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('is_logged_in');
		redirect("/");
	}

	
}

?>