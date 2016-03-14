<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function show($subcat_id) {
		$products = $this->Product->get_all_products_by_subcat_id($subcat_id);
		$subcategories = $this->Subcategory->get_all_subcategories_in_that_category_by_subcategories_id($subcat_id);
		$this->load->view("products/show",array('products'=>$products,'subcat_id'=>$subcat_id,
			'subcategories'=>$subcategories));
	}

	public function edit($product_id) {
		$product = $this->Product->get_product_info_by_product_id($product_id);
		$subcat_id = explode(",",$product['subcategories_id'])[0];
		$product['subcategories'] = $this->Subcategory->get_all_subcategories_in_that_category_by_subcategories_id($subcat_id);
		$this->load->view("products/edit",$product);

	}

	public function delete($subcategory_id,$product_id) {
		$this->Product->delete_product_by_product_id($product_id);
		redirect("/products/show/".$subcategory_id);

	}
	public function update() {
		$field_array = array('name','unit_price','description');
		$changes_made = FALSE;
		$id = $this->input->post('id');
		foreach ($field_array AS $field) {
			if (!Empty($this->input->post($field))) {
				$product = array('field'=> $field,'field_value'=> $this->input->post($field),'id'=>$id);
				$this->Product->update_product_details($product);
				$changes_made = TRUE;
			}
		}
		if ($changes_made) {
			$this->session->set_flashdata("success","<div class='alert alert-success'><strong>
				Success! </strong> Changes to the product has been made!</div>");
		}
		redirect("/products/edit/".$this->input->post('id'));
	}

	public function create() {
		$product = array('name'=>$this->input->post('name'),'unit_price'=>$this->input->post('unit_price'),
			'description'=>$this->input->post('description'));
		$this->Product->add_product($product);
		$product_id = $this->Product->last_insert_product_id()['id'];
		foreach ($this->input->post('subcategories') AS $subcat_id) {
			$this->Product_subcategory->add_product_subcategory(array('id'=>$product_id,'sub_id'=>$subcat_id));
		}
		// upload product image
		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = '*';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['file_name'] = "'".$product_id.".jpeg'"; //rename it to the product id
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		
		
		redirect("/products/show/".$this->input->post('current_page'));
	}





	
}

?>