<?php
	class User extends CI_Model {
		public function validate($post) {
			$this->form_validation->set_rules("first_name","First Name","required");
			$this->form_validation->set_rules("last_name","Last Name","required");
			$this->form_validation->set_rules("email","Email","required|valid_email|is_unique[users.email]");
			$this->form_validation->set_rules("password","Password","required|matches[conf_password]|min_length[6]");
			$this->form_validation->set_rules("conf_password","Password Confirmation","required");
			$this->form_validation->set_error_delimiters("<div class='col-md-9 col-md-offset-1 alert alert-danger'><strong>Error! </strong>", "</div>");
			return $this->form_validation->run();
		}

		public function get_all_users(){
			return $this->db->query("SELECT * FROM users")->result_array();
		}

		public function add_user($user) {
			$query = "INSERT INTO users(first_name,last_name,email,password,created_at,updated_at,is_admin) 
			VALUES(?,?,?,?,?,?,?)";
			$values = array($user['first_name'],$user['last_name'],$user['email'],password_hash($user['password'],
				PASSWORD_BCRYPT),date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$user['is_admin']);
			return $this->db->query($query,$values);
		}

		public function add_customer($customer) {
			$query = "INSERT INTO users(first_name,last_name,email,created_at,updated_at,is_admin) 
			VALUES(?,?,?,?,?,?)";
			$values = array($customer['first_name'],$customer['last_name'],$customer['email'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),0);
			return $this->db->query($query,$values); 
		}

		public function get_user_by_email($email) {
			return $this->db->query("SELECT * FROM users where email=?",array($email))->row_array();

		}

	}

?>