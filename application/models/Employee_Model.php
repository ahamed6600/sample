<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee_Model extends CI_Model
{   
	public function check_login($username, $password){
		$this->db->select('*');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('admin');
		$result = $query->result();
		if($query->num_rows() == 0)
		{
			return false;
		}
		else
		{
			return $result;
		}
	}

//////////////////////////////////////////////////////

public function employee_list()
{
	$this->db->select('*');
	$query = $this->db->get('employee_details');
	$result = $query->result();
	return $result;
}

public function check_empcode($empcode)
{
	$this->db->select('*');
	$this->db->where('employee_code', $empcode);
	$query = $this->db->get('employee_details');
	$rows = $query->num_rows();
	if($rows >= 1)
	{
		return true;
	}
	else
	{
		return false;
	}
}	

public function createemployee($data)
{
	return $this->db->insert('employee_details', $data);
}

public function edit_employee($id)
{
	$this->db->select('*');
	$this->db->where('employee_code', $id);
	$query = $this->db->get('employee_details');
	$result = $query->result();
	return $result;
}

public function editemployee($data,$id)
{
	$this->db->where('id', $id);
	return $this->db->update('employee_details',$data);
}

public function deleteemployee($id)
{
	$this->db->where('id', $id);
	return $this->db->delete('employee_details');
}

public function insertData($data)
    {
        return $this->db->insert('employee_details', $data);
    }
	
//////////////////////////////////////////////////////

    public function exportAllproducts()
    {
        $this->db->select('*');
		$query = $this->db->get('product');
		$result = $query->result_array();
		return $result;
    }
    
    public function importproducts($data)
    {
        return $this->db->insert_batch('product', $data);
    }    
    
    public function truncateData()
    {
        return $this->db->truncate('product');
    }
    
    

//////////////////////////////////////////////////////

	public function count_category() {
		$this->db->select('*');
		$query = $this->db->get('category');
		$result = $query->num_rows();
		return $result;
	}

	public function count_products() {
		$this->db->select('*');
		$query = $this->db->get('product');
		$result = $query->num_rows();
		return $result;
	}

//////////////////////// category/////////////////////////

    public function fetch_category() {
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('status', "active");
		$this->db->where('superstatus', "1");
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function catgory_form($data) {
		if ($this->db->insert('category', $data)){
			return true;
		} else{
			return false;
		}
	}

	public function catgory_listing() {
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('superstatus', "1");
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function edit_cat($id)
	{
		$this->db->select('*');
		$this->db->where('categoryId', $id);
		$this->db->where('superstatus', "1");
		$query = $this->db->get('category');
		$result = $query->result();
		return $result;
	}

	public function update_cat($data,$categoryId)
	{
		$this->db->where('categoryId', $categoryId);
		$this->db->where('superstatus', "1");
		$res = $this->db->update('category',$data);
		return true;
	}

	public function update_cat_status($id,$status,$updatedOn)
	{
		$this->db->set('status',$status);
		$this->db->set('updatedOn',$updatedOn);
		$this->db->where('categoryId', $id);
		$this->db->where('superstatus', "1");
		$res = $this->db->update('category');
		return true;
	}

//////////////////////// products/////////////////////////

	public function products_form($data) {
		if ($this->db->insert('product', $data)){
			return true;
		} else{
			return false;
		}
	}
	
	public function productsbycategory($category) {
		$this->db->select('category.categoryId,category.categoryname,product.productId,product.categoryId,product.productname,product.productimage,product.price,product.offer_price,product.todayprice_status,product.todayprice,product.status');
		$this->db->join('category','category.categoryId=product.categoryId');
		$this->db->where('product.superstatus', "1");
		$this->db->where('category.categoryname', $category);
		$query = $this->db->get('product');
		$result = $query->result();
		return $result;
	}

	public function products() {
		$this->db->select('category.categoryId,category.categoryname,product.productId,product.categoryId,product.productname,product.productimage,product.price,product.offer_price,product.todayprice_status,product.todayprice,product.status');
		$this->db->join('category','category.categoryId=product.categoryId');
		$this->db->where('product.superstatus', "1");
		$query = $this->db->get('product');
		$result = $query->result();
		return $result;
	}

	public function product_catgory() {
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('status',"active");
		$this->db->where('superstatus', "1");
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function update_product_status($id,$status,$updatedon)
	{
		$this->db->set('status',$status);
		$this->db->set('updatedon',$updatedon);
		$this->db->where('productId', $id);
		$this->db->where('superstatus', "1");
		$res = $this->db->update('product');
		return true;
	}
	
	public function todayprice_status($id,$status,$updatedon)
	{
		$this->db->set('todayprice_status',$status);
		$this->db->set('updatedon',$updatedon);
		$this->db->where('productId', $id);
		$this->db->where('superstatus', "1");
		$res = $this->db->update('product');
		return true;
	}
	
	public function update_catproduct_status($id,$status,$updatedOn)
	{
		$this->db->set('status',$status);
		$this->db->set('updatedOn',$updatedOn);
		$this->db->where('categoryId', $id);
		$this->db->where('superstatus', "1");
		$res = $this->db->update('product');
		return true;
	}
	
	public function edit_product($id)
	{
		$this->db->select('*');
		$this->db->where('productId', $id);
		$this->db->where('superstatus', "1");
		$query = $this->db->get('product');
		$result = $query->result();
		return $result;
	}

	public function update_product($data,$Id)
	{
        $this->db->where('productId', $Id);
		$this->db->where('superstatus', "1");
		$res = $this->db->update('product',$data);
		return true;
	}
	
	public function deleteproduct($Id)
	{
        $this->db->where('productId', $Id);
		$this->db->delete('product');
		return true;
	}
	
	//////////////////////// orders/////////////////////////
	
	public function fetchorders()
	{
	    $this->db->select('*');
	    $this->db->group_by('order_id');
	    $this->db->order_by('date_time','DESC');
	    $this->db->order_by('order_time','DESC');
		$query = $this->db->get('user_details');
		$result = $query->result();
		return $result;
	}
	
	public function export_orderreport()
	{
	    $this->db->select('order_id,customer_name,customer_phone,customer_address,order_type,date_time,order_time,itemQty,itemPrice');
	    $this->db->group_by('order_id');
	    $this->db->order_by('date_time','DESC');
	    $this->db->order_by('order_time','DESC');
		$query = $this->db->get('user_details');
		$result = $query->result_array();
		return $result;
	}
	
	public function fetchorderdetails($id)
	{
	    $this->db->select('*');
	    $this->db->join('product','productId=itemId');
	    $this->db->where('order_id',$id);
	    $query = $this->db->get('user_details');
		$result = $query->result();
		return $result;
	}
	
	public function fetchorderdetailsinvoice($id)
	{
	    $this->db->select('*');
	    $this->db->group_by('order_id');
	    $this->db->join('product','productId=itemId');
	    $this->db->where('order_id',$id);
	    $query = $this->db->get('user_details');
		$result = $query->result();
		return $result;
	}
	
	public function filterbydate($fromdate,$todate)
	{
	    $this->db->select('*');
	    $this->db->group_by('order_id');
	    $this->db->where('date_time BETWEEN "'. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).'"');  
	    $query = $this->db->get('user_details');
		$result = $query->result();
		return $result;
	}
	
	public function category_report()
	{
	    $this->db->select('*,sum(itemQty) as totalitemQty');
	    $this->db->join('category','categoryId=itemCatid');
	    $this->db->join('product','productId=itemId');
	    $this->db->group_by('itemCatid');
	    $query = $this->db->get('user_details');
		$result = $query->result();
		return $result;
	}
	
	public function category_detail_report($id)
	{
	    $this->db->select('*,sum(itemQty) as itemqty');
	    $this->db->join('category','categoryId=itemCatid');
	    $this->db->join('product','productId=itemId');
	    $this->db->group_by('itemid');
	    $this->db->where('itemCatid',$id);
	    $query = $this->db->get('user_details');
		$result = $query->result();
		return $result;
	}
	
	public function catfilterbydate($fromdate,$todate)
	{
	    $this->db->select('*,sum(itemQty) as totalitemQty');
	    $this->db->join('category','categoryId=itemCatid');
	    $this->db->join('product','productId=itemId');
	    $this->db->group_by('itemCatid');
	    $this->db->where('date_time BETWEEN "'. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).'"');  
	    $query = $this->db->get('user_details');
		$result = $query->result();
		return $result;
	}
	
	public function filtercategory_detail_report($id,$fromdate,$todate)
	{
	    $this->db->select('*,sum(itemQty) as itemqty');
	    $this->db->join('category','categoryId=itemCatid');
	    $this->db->join('product','productId=itemId');
	    $this->db->group_by('itemid');
	    $this->db->where('date_time BETWEEN "'. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).'"');
	    $this->db->where('itemCatid',$id);
	    $query = $this->db->get('user_details');
		$result = $query->result();
		return $result;
	}
	
	public function customers()
	{
	    $this->db->select('*');
	    $this->db->group_by('customer_name');
	    $query = $this->db->get('user_details');
		$result = $query->result();
		return $result;
	}
}
?>