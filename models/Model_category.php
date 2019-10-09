<?php 

class Model_category extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
    
    public function fecthCategory($cat='')
    {
        $query = $this->db->select('*')
                            ->from('products_categories')
                            ->where('name', $cat)
                            ->get();
        return $query->row_array();
    }

	public function fecthActiveCategoryData()
	{
		$query = $this->db->select()
							->from('products_categories')
							->where('status', 'active')
							->get();
		return $query->result();
	}

	public function fecthAllCategoryData()
	{
		$query = $this->db->select('*')
							->from('products_categories')
							->get();
		return $query->result();
	}

	public function create($data = array())
	{
		if($data) {
			// print_r($data);exit();
			$this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('products_categories', $data);
			return ($create == true) ? true : false;
		}
	}

	public function updateCategory($data = array())
	{
		// print_r($data); exit();
		if($data) {
			$this->db->set('modified','NOW()', FALSE);

			$this->db->set('name', $data['name']);
			$this->db->set('status', $data['status']);

			$this->db->where('id', $data['id']);
			return $result = $this->db->update('products_categories');
		}
	}

	public function deleteCategory($id = "")
	{
		$this->db->where('id', $id);
		return $result=$this->db->delete('products_categories');
	}

	// for sub catgory
	public function fecthAllSubCategoryData()
	{
		$query = $this->db->select()
							->from('products_subcategories')
							// ->where('status', 'active')
							->get();
		return $query->result();
	}
	
	public function fecthSubCategory($subcat)
	{
	    	$query = $this->db->select()
							->from('products_subcategories')
							->where('name', $subcat)
							->get();
		return $query->row_array();
	}

	public function fecthAllSubCategoryActiveData()
	{
		$query = $this->db->select()
							->from('products_subcategories')
							->where('status', 'active')
							->get();
		return $query->result();
	}

	public function createSubCategory($data = array())
	{
		if($data) {
			// print_r($data);exit();
			$this->db->set('created','NOW()', FALSE);
			$create = $this->db->insert('products_subcategories', $data);
			return ($create == true) ? true : false;
		}
	}

	public function updateSubCategory($data = array())
	{
		if($data) {
			$this->db->set('modified','NOW()', FALSE);

			$this->db->set('name', $data['name']);
			$this->db->set('status', $data['status']);
			$this->db->set('category_id', $data['category_id']);

			$this->db->where('id', $data['id']);
			return $result = $this->db->update('products_subcategories');
		}
	}

	public function deleteSubCategory($id = "")
	{
		$this->db->where('id', $id);
		return $result=$this->db->delete('products_subcategories');
	}

	public function fecthActiveSubCategoryData($id='')
	{
		$query = $this->db->select()
							->from('products_subcategories')
							->where('status', 'active')
							->where('category_id', $id)
							->get();
		return $query->result();
	}


	
}