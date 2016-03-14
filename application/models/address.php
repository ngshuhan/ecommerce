<?php
	class Address extends CI_Model{
		public function get_address_by_user_id($id) {
			$query = "SELECT * FROM addresses WHERE user_id = ?";
			$value = array($id);
			return $this->db->query($query,$value)->row_array();
		}

		public function add_address($address) {
			$query = "INSERT INTO addresses(street,apt_suite,city,state,zip_code,user_id)
						VALUES (?,?,?,?,?,?)";
			$value = array($address['street'],$address['apt_suite'],$address['city'],$address['state'],
				$address['zip_code'],$address['id']);
			return $this->db->query($query,$value);
		}

	
		public function update_address_details($address) {
			$field = $address['field'];
			$query = "UPDATE addresses SET `".$field."`=? WHERE id=?";
			$value = array($address['field_value'],$address['id']);
			return $this->db->query($query,$value);
		}

	}
?>