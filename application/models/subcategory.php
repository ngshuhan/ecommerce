<?php
	class Subcategory extends CI_Model {
		public function get_all_subcategories_by_category_id($id) {
			return $this->db->query("SELECT * FROM subcategories WHERE category_id=?",array($id))->result_array();
		}

		public function get_all_subcategories_in_that_category_by_subcategories_id($id) {
			$query = "SELECT subcategories.name,subcategories.id FROM subcategories
					JOIN categories ON categories.id = subcategories.category_id
					WHERE categories.id = (SELECT categories.id from categories 
										JOIN subcategories ON subcategories.category_id = categories.id
 											WHERE subcategories.id = ?)";
			$value = array($id);
			return $this->db->query($query,$value)->result_array();
		}

		public function get_subcategories_name_by_subcategory_id($id) {
			$query = "SELECT subcategories.name FROM subcategories WHERE id = ?";
			$value = array($id);
			return $this->db->query($query,$value)->row_array();
		}

	}







?>