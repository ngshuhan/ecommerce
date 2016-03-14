<?php
	class Product_subcategory extends CI_Model {
		public function add_product_subcategory($product) {
			$query = "INSERT INTO product_subcategories(product_id,subcategory_id) VALUES(?,?)";
			$value = array($product['id'],$product['sub_id']);
			return $this->db->query($query,$value);
		}

	}








?>