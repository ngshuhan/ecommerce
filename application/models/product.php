<?php
	class Product extends CI_Model {
		public function get_all_products_by_subcat_id($id) {
			$query = "SELECT products.id,products.name,products.description,products.unit_price FROM products
			JOIN product_subcategories ON product_subcategories.product_id = products.id 
			JOIN subcategories ON subcategories.id = product_subcategories.subcategory_id
			WHERE subcategory_id = ?";
			$value = array($id);
			return $this->db->query($query,$value)->result_array();
		}

		public function get_product_info_by_product_id($id) {
			$query = "SELECT products.id,products.name,products.description,products.unit_price,GROUP_CONCAT(subcategories.name) AS 
			subcategories_name, GROUP_CONCAT(subcategories.id) AS subcategories_id 
			FROM products JOIN product_subcategories ON product_subcategories.product_id = products.id 
			JOIN subcategories ON product_subcategories. subcategory_id = subcategories.id WHERE products.id=?";
			$value = array($id);
			return $this->db->query($query,$value)->row_array();
		}

		public function delete_product_by_product_id($id) {
			$query = "DELETE FROM products WHERE id = ?";
			$value = array($id);
			return $this->db->query($query,$value);
		}

		public function update_product_details($product) {
			$field = $product['field'];
			$query = "UPDATE products SET `".$field."` =?,updated_at  = ? WHERE id=?";
			$value = array($product['field_value'],date("Y-m-d H:i:s"),$product['id']);
			return $this->db->query($query,$value);
		}

		public function add_product($product) {
			$query = "INSERT INTO products(name,description,unit_price,created_at,updated_at) VALUES (?,?,?,?,?)";
			$value = array($product['name'],$product['description'],$product['unit_price'],date("Y-m-d H:i:s"),date("Y-m-d H:i:s"));
			return $this->db->query($query,$value);
		}

		public function last_insert_product_id() {
			return $this->db->query("SELECT LAST_INSERT_ID() AS id")->row_array();
		}






	}








?>