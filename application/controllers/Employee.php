<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Employee_Model');
		$this->load->library('form_validation');
	}
	
	public function index() {
		$this->load->view('employee/login');
	}

	public function logging_in(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$result = $this->Employee_Model->check_login($username, $password);
		if($result)
		{
			$this->session->set_userdata('session_admin_login',$username);
			redirect('employee-list');
		}
		else
		{
			echo "<script>alert('Failed to login');window.history.back();</script>";
		}

	}

	public function logout() {
		$this->session->unset_userdata('session_admin_login');
		redirect(base_url());
	}

	//////////////////// employee ////////////////////////////

	public function employee_list() 
	{
		$data['employees'] = $this->Employee_Model->employee_list();
		$this->load->view('employee/employee-list', $data);
	}

	public function create_employee()
	{
		$this->load->view('employee/employee-add');
	}

	public function createemployee(){
		$check = $this->Employee_Model->check_empcode($this->input->post('employee_code'));
		if($check)
		{
			echo '<script>alert("Employee Code Exists");window.history.back();</script>';
			exit();
		}
		$data['employee_code'] = $this->input->post('employee_code');
		$data['employee_name'] = $this->input->post('employee_name');
		$data['department'] = $this->input->post('department');
		$data['age'] = $this->input->post('age');
		$data['experience'] = $this->input->post('experience');
		$data['date_of_birth'] = $this->input->post('date_of_birth');
		$data['join_date'] = $this->input->post('join_date');
		
		$result= $this->Employee_Model->createemployee($data);
		if($result)
		{
			echo '<script>alert("Employee Created");window.location.href="employee-list";</script>';
			exit();
		}
		else
		{
			echo '<script>alert("Failed to add");window.history.back();</script>';
			exit();
		}
	}

	public function edit_employee(){
		$id = $this->input->get('empcode');
		$data['employee'] = $this->Employee_Model->edit_employee($id);
		$this->load->view('employee/employee-edit', $data);
	}

	public function editemployee(){
		$id = $this->input->post('id');

		$check = $this->Employee_Model->check_empcode($this->input->post('employee_code'));
		if($check)
		{
			echo '<script>alert("Employee Code Exists");window.history.back();</script>';
			exit();
		}
		$data['employee_code'] = $this->input->post('employee_code');
		$data['employee_name'] = $this->input->post('employee_name');
		$data['department'] = $this->input->post('department');
		$data['age'] = $this->input->post('age');
		$data['experience'] = $this->input->post('experience');
		$data['date_of_birth'] = $this->input->post('date_of_birth');
		$data['join_date'] = $this->input->post('join_date');

		$result= $this->Employee_Model->editemployee($data,$id);
		if($result)
		{
			echo '<script>alert("Employee Updated");window.location.href="employee-list";</script>';
			exit();
		}
		else
		{
			echo '<script>alert("Failed to update");window.history.back();</script>';
			exit();
		}
	}

	public function deleteemployee()
	{
		$id = $this->input->get('id');
		$result= $this->Employee_Model->deleteemployee($id);
		if($result)
		{
			echo '<script>alert("Employee Deleted");window.location.href="employee-list";</script>';
			exit();
		}
		else
		{
			echo '<script>alert("Failed to delete");window.history.back();</script>';
			exit();
		}
	}

	// public function import_employee()
	// {
	// 	$column1 = $this->input->post('column1');
	// 	$column2 = $this->input->post('column2');
	// 	$column3 = $this->input->post('column3');
	// 	$column4 = $this->input->post('column4');
	// 	$column5 = $this->input->post('column5');

	//     $file = $_FILES['import']['tmp_name'];
	// 	$handle = fopen($file, "r");
	// 	$c = 0;
		
	// 	$filesop = fgetcsv($handle, 1000, ",");
	// 	while(($filesop = fgetcsv($handle)) !== false)
	// 	{
	// 	    if($column1 == "employee_code")
	// 	    {
	// 	    	$check = $this->Employee_Model->check_empcode($filesop[0]);
	// 			if($check)
	// 			{
	// 				echo '<script>alert("Employee Code Exists");window.history.back();</script>';
	// 				exit();
	// 			}
	// 	    }
	// 	    else if($column2 == "employee_code")
	// 	    {
	// 	    	$check = $this->Employee_Model->check_empcode($filesop[1]);
	// 			if($check)
	// 			{
	// 				echo '<script>alert("Employee Code Exists");window.history.back();</script>';
	// 				exit();
	// 			}
	// 	    }
	// 	    else if($column3 == "employee_code")
	// 	    {
	// 	    	$check = $this->Employee_Model->check_empcode($filesop[2]);
	// 			if($check)
	// 			{
	// 				echo '<script>alert("Employee Code Exists");window.history.back();</script>';
	// 				exit();
	// 			}
	// 	    }
	// 	    else if($column4 == "employee_code")
	// 	    {
	// 	    	$check = $this->Employee_Model->check_empcode($filesop[3]);
	// 			if($check)
	// 			{
	// 				echo '<script>alert("Employee Code Exists");window.history.back();</script>';
	// 				exit();
	// 			}
	// 	    }
	// 	    else if($column5 == "employee_code")
	// 	    {
	// 	    	$check = $this->Employee_Model->check_empcode($filesop[4]);
	// 			if($check)
	// 			{
	// 				echo '<script>alert("Employee Code Exists");window.history.back();</script>';
	// 				exit();
	// 			}
	// 	    }
	// 		$employeeData =  array(
 //                                $column1 => $filesop[0],
 //                                $column2 => $filesop[1],
 //                                $column3 => $filesop[2],
 //                                $column4 => $filesop[3],
 //                                $column5 => $filesop[4],
 //                            );
 //            // echo json_encode($employeeData);

 //            if($employeeData == "") continue;
 //            $insertData = $this->Employee_Model->insertData($employeeData);
 //            $c++;
	// 	}
		
	// 	if($insertData)
 //        {
 //            echo "<script>alert('Employees Added via CSV');window.location.href='employee-list'</script>";
 //            exit(0);
 //        }
 //        else
 //        {
 //            echo "<script>alert('Fail to add');window.history.back();</script>";
 //            exit(0);
 //        }
	// }

	public function import_employee()
	{
		$column1 = $this->input->post('column1');
		$column2 = $this->input->post('column2');
		$column3 = $this->input->post('column3');
		$column4 = $this->input->post('column4');
		$column5 = $this->input->post('column5');

	    $file = $_FILES['import']['tmp_name'];

		$row = 1;
		if (($handle = fopen($file, "r")) !== FALSE) {
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		    	if($column1 == "employee_code")
		    {
		    	$check = $this->Employee_Model->check_empcode($data[0]);
				if($check)
				{
					echo '<script>alert("Employee Code Exists");window.history.back();</script>';
					exit();
				}
		    }
		    else if($column2 == "employee_code")
		    {
		    	$check = $this->Employee_Model->check_empcode($data[1]);
				if($check)
				{
					echo '<script>alert("Employee Code Exists");window.history.back();</script>';
					exit();
				}
		    }
		    else if($column3 == "employee_code")
		    {
		    	$check = $this->Employee_Model->check_empcode($data[2]);
				if($check)
				{
					echo '<script>alert("Employee Code Exists");window.history.back();</script>';
					exit();
				}
		    }
		    else if($column4 == "employee_code")
		    {
		    	$check = $this->Employee_Model->check_empcode($data[3]);
				if($check)
				{
					echo '<script>alert("Employee Code Exists");window.history.back();</script>';
					exit();
				}
		    }
		    else if($column5 == "employee_code")
		    {
		    	$check = $this->Employee_Model->check_empcode($data[4]);
				if($check)
				{
					echo '<script>alert("Employee Code Exists");window.history.back();</script>';
					exit();
				}
		    }
		        $employeeData =  array(
                                $column1 => $data[0],
                                $column2 => $data[1],
                                $column3 => $data[2],
                                $column4 => $data[3],
                                $column5 => $data[4],
                            );
		        $row++;
		        $insertData = $this->Employee_Model->insertData($employeeData);
		    }
		    // fclose($handle);
		    if($insertData)
	        {
	            echo "<script>alert('Employees Added via CSV');window.location.href='employee-list'</script>";
	            exit(0);
	        }
	        else
	        {
	            echo "<script>alert('Fail to add');window.history.back();</script>";
	            exit(0);
	        }
		}
	}
	
	/////////////////// import export//////////////////////////
	
	public function import_export(){
		$this->load->view('employee/import_export');
	}
	
	public function exportdata()
	{
		$this->load->model('Web_Model');
		$merchant = $this->Web_Model->fetchmerchant();
		//csv file name
		$filename = $merchant[0]->merchant_name.' '.date('Y-m-d').'.csv';
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/csv; "); 

		// get data
		$productdatas = $this->Admin_Model->exportAllproducts();
		
		// file creation
		$file = fopen('php://output', 'w');

		$header = array("productId","sku","categoryname","productname","productimage","productdescription","price","offer_price","todayprice_status","todayprice","status","superstatus","createdon","updatedon");
		fputcsv($file, $header);

		foreach ($productdatas as $line){
		    
		    $this->db->select('categoryId,categoryname');
		    $this->db->where('categoryId',$line['categoryid']);
		    $query = $this->db->get('category');
            $result = $query->result_array();
		    
		    foreach($result as $val)
		    {
		        $categoryname = $val['categoryname'];
		    }
		    
		    $data['productId'] = $line['productId'];
		    $data['sku'] = $line['sku'];
		    $data['categoryname'] = $categoryname;
		    $data['productname'] = $line['productname'];
		    $data['productimage'] = $line['productimage'];
		    $data['productdescription'] = $line['productdescription'];
		    $data['price'] = $line['price'];
		    $data['offer_price'] = $line['offer_price'];
		    $data['todayprice_status'] = $line['todayprice_status'];
		    $data['todayprice'] = $line['todayprice'];
		    $data['status'] = $line['status'];
		    $data['superstatus'] = $line['superstatus'];
		    $data['createdon'] = $line['createdon'];
		    $data['updatedon'] = $line['updatedon'];
		    
		    fputcsv($file,$data);
        }

		fclose($file);
		exit;
	}
	
	
	
	


	/////////////////// category//////////////////////////

	public function category(){
		$data['catgory'] = $this->Admin_Model->catgory_listing();
		$this->load->view('backend/category-list',$data);
	}

	public function create_category(){
		
		$this->load->view('backend/category-add');
	}

	public function category_form(){
		$data['categoryname'] = $this->input->post('categoryname');
		$data['status'] = "active";
		$data['superstatus'] = "1";
		date_default_timezone_set('Asia/Kolkata');
		$data['createdOn'] = date('Y-m-d H:i:s');

		$config['upload_path'] = './uploads/category/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '1000000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('categoryimage');

		$data['categoryimage'] = $this->upload->data('file_name');

		$error = $this->upload->display_errors('','');
		if($error){
			echo '<script>alert("'.$error.'");window.history.back();</script>';
			exit();
		}

		$result= $this->Admin_Model->catgory_form($data);
		if($result){
			redirect('admin/category');
		}else{
			redirect('admin/create_category');
		}
	}

	public function edit_category(){
		$id = $this->uri->segment(3);
		$data['edit_category'] = $this->Admin_Model->edit_cat($id);
		$this->load->view('backend/category-edit', $data);
	}

	public function category_update(){
		$categoryId = $this->input->post('id');
		$data['categoryname'] = $this->input->post('categoryname');
		$oldcategoryimage = $this->input->post('oldcategoryimage');
		date_default_timezone_set('Asia/Kolkata');
		$data['updatedOn'] = date('Y-m-d H:i:s');

		$config['upload_path'] = './uploads/category/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '1000000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('categoryimage');
        $categoryimage = $this->upload->data('file_name');

        if($categoryimage)
		{
		    $error = $this->upload->display_errors('','');
    		if($error){
    			echo '<script>alert("'.$error.'");window.history.back();</script>';
    			exit();
    		}
    		else
    		{
    		    $data['categoryimage'] = $categoryimage;
    		}
    	}
		else
		{
		    $data['categoryimage'] = $oldcategoryimage;
		}

		$result= $this->Admin_Model->update_cat($data,$categoryId);
		if($result){
			redirect('admin/category');
		}else{
			redirect('admin/edit_category');
		}
	}

	public function category_status()
	{
		$status = $this->input->post('status');
		date_default_timezone_set('Asia/Kolkata');
		$updatedOn = date('Y-m-d H:i:s');
		if($status == "true")
		{
			$status = "active";
		}
		else if($status == "false")
		{
			$status = "inactive";
		}
		$id = $this->input->post('formid');

		$dlt = $this->Admin_Model->update_cat_status($id,$status,$updatedOn);
		if($dlt)
		{
		    $this->Admin_Model->update_catproduct_status($id,$status,$updatedOn);
		}
		echo $dlt;
	}

	/////////////////// products//////////////////////////

	public function products(){
	    $category = $this->input->get('category');
	    $data['category'] = $this->input->get('category');
		$data['products'] = $this->Admin_Model->productsbycategory($category);
		$this->load->view('backend/product-list',$data);
	}

	public function create_products(){
		$data['catgory'] = $this->Admin_Model->product_catgory();
		$this->load->view('backend/add-product',$data);
	}

	public function create_product(){
		$data['catgory'] = $this->Admin_Model->product_catgory();
		$this->load->view('backend/product-add',$data);
	}

	public function products_form(){
		
		$data['categoryId'] = $this->input->post('categoryId');
		$data['sku'] = $this->input->post('sku');
		$data['productname'] = $this->input->post('productname');
		$data['productdescription'] = $this->input->post('productdescription');
		$data['price'] = $this->input->post('price');
		$data['offer_price'] = $this->input->post('offerprice');
		$data['status'] = "active";
		$data['superstatus'] = "1";
		date_default_timezone_set('Asia/Kolkata');
		$data['createdon'] = date('Y-m-d H:i:s');
		$categoryname = $this->input->post('category');
		
		
		if($this->input->post('todayprice'))
		{
		    $data['todayprice'] = $this->input->post('todayprice');
		}
		else
		{
		    $data['todayprice'] = "";
		}
		
		$config['upload_path'] = './uploads/products/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '1000000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('productimage');

		$data['productimage'] = $this->upload->data('file_name');

		$error = $this->upload->display_errors('','');
		if($error){
			echo '<script>alert("'.$error.'");window.history.back();</script>';
			exit();
		}

		$result= $this->Admin_Model->products_form($data);
		if($result){
			echo "<script>window.location.href='products?category=$categoryname'</script>";
			exit(0);
		}else{
			echo "<script>window.history.back()'</script>";
			exit(0);
		}
	}
	
	public function product_status()
	{
		$status = $this->input->post('status');
		date_default_timezone_set('Asia/Kolkata');
		$updatedon = date('Y-m-d H:i:s');
		if($status == "true")
		{
			$status = "active";
		}
		else if($status == "false")
		{
			$status = "inactive";
		}
		$id = $this->input->post('formid');

		$dlt = $this->Admin_Model->update_product_status($id,$status,$updatedon);
		echo $dlt;
	}
	
	public function todayprice_status()
	{
		$status = $this->input->post('status');
		date_default_timezone_set('Asia/Kolkata');
		$updatedon = date('Y-m-d H:i:s');
		if($status == "true")
		{
			$status = "1";
		}
		else if($status == "false")
		{
			$status = "0";
		}
		$id = $this->input->post('formid');

		$dlt = $this->Admin_Model->todayprice_status($id,$status,$updatedon);
		echo $dlt;
	}

	public function edit_product(){
		$id = $this->input->get('Id');
		$data['category'] = $this->Admin_Model->product_catgory();
		$data['edit_product'] = $this->Admin_Model->edit_product($id);
		$this->load->view('backend/product-edit', $data);
	}

	public function product_update(){
		$productId = $this->input->post('id');
		$data['categoryId'] = $this->input->post('categoryId');
		$data['sku'] = $this->input->post('sku');
		$data['productname'] = $this->input->post('productname');
		$oldproductimage = $this->input->post('oldproductimage');
		$data['price'] = $this->input->post('price');
		$data['offer_price'] = $this->input->post('offerprice');
		$categoryname = $this->input->post('category');
		date_default_timezone_set('Asia/Kolkata');
		$data['updatedon'] = date('Y-m-d H:i:s');
		
		$status = $this->input->post('productstatus');
        if($status == "on")
		{
			$data['status'] = "active";
		}
		else
		{
			$data['status'] = "inactive";
		}
		
		if($this->input->post('todayprice'))
		{
		    $data['todayprice'] = $this->input->post('todayprice');
		}
		else
		{
		    $data['todayprice'] = "";
		}
		
		$config['upload_path'] = './uploads/products/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '1000000';
        $this->load->library('upload', $config);
        $this->upload->do_upload('productimage');
        $productimage = $this->upload->data('file_name');
		
		if($productimage)
		{
		    $error = $this->upload->display_errors('','');
    		if($error){
    			echo '<script>alert("'.$error.'");window.history.back();</script>';
    			exit();
    		}
    		else
    		{
    		    $data['productimage'] = $productimage;
    		}
    	}
		else
		{
		    $data['productimage'] = $oldproductimage;
		}
		
		$result= $this->Admin_Model->update_product($data,$productId);
		if($result){
			echo "<script>window.location.href='products?category=$categoryname'</script>";
		    exit(0);
		}else{
			echo "<script>window.history.back()</script>";
		    exit(0);
		}
	}
	
	public function deleteproduct()
	{
	    $id = $this->input->get('id');
	    $categoryname = $this->input->get('catname');
	    if($id)
	    {
	        $result= $this->Admin_Model->deleteproduct($id);
    		if($result){
    			echo "<script>window.location.href='products?category=$categoryname'</script>";
			    exit(0);
    		}else{
    			echo "<script>window.history.back()</script>";
			    exit(0);
    		}
	    }
	}
	
	/////////////////// orders//////////////////////////
	
	public function orders_list(){
	    $data['orders'] = $this->Admin_Model->fetchorders();
		$this->load->view('backend/order-list',$data);
	}
	
	
	
	public function view_order_details(){
	    $data['orderId'] = $this->input->get('orderId');
	    $data['orderdetails'] = $this->Admin_Model->fetchorderdetails($data['orderId']);
    	$this->load->view('backend/order-detail-list',$data);
	}
	
	public function filterbydate()
	{
	    $slno = 1;
	    $output = "";
	    if($this->input->post('fromdate'))
	    {
	        $fromdate = $this->input->post('fromdate');
	    }
	    if($this->input->post('todate'))
	    {
	        $todate = $this->input->post('todate');
	    }
	    $result = $this->Admin_Model->filterbydate($fromdate,$todate);
	    foreach($result as $val)
	    {
	        $output .= "<tr>
	        <td>".$slno++."</td>
	        <td><a href='".base_url()."admin/view_order_details?orderId=".$val->order_id."'>".$val->order_id."</a></td>
	        <td>".$val->customer_name."</td>
	        <td>".$val->customer_phone."</td>
	        <td style='width: 20%;'>".$val->customer_address."</td>
	        <td>".$val->order_type."</td>
	        <td>".$val->date_time."</td>
	        <td>".$val->order_time."</td>
	        </tr>";
	    }
	    $output .= "";
	   
	    echo $output;
	}
	
	public function invoice()
	{
	    $data['orderId'] = $this->input->get('orderId');
	    $data['orderdetails'] = $this->Admin_Model->fetchorderdetailsinvoice($data['orderId']);
	    $this->load->view('backend/invoice',$data);
	}
	
	public function invoice_download()
	{
	    $data['orderId'] = $this->input->get('orderId');
	    $data['orderdetails'] = $this->Admin_Model->fetchorderdetailsinvoice($data['orderId']);
	    $this->load->view('backend/invoice_download',$data);
	}
	
	public function category_report()
	{
	    $data['cat_report'] = $this->Admin_Model->category_report();
	    $this->load->view('backend/category_report',$data);
	}
	
	public function category_detail_report()
	{
	    $data['categoryid'] = $this->input->get('categoryId');
	    $data['cat_reportdetails'] = $this->Admin_Model->category_detail_report($data['categoryid']);
	   // echo json_encode($data['cat_reportdetails']);
	    $this->load->view('backend/category_detail_report',$data);
	}
	
	public function catfilterbydate()
	{
	    $slno = 1;
	    $output = "";
	    if($this->input->post('fromdate'))
	    {
	        $fromdate = $this->input->post('fromdate');
	    }
	    if($this->input->post('todate'))
	    {
	        $todate = $this->input->post('todate');
	    }
	    $result = $this->Admin_Model->catfilterbydate($fromdate,$todate);
	    foreach($result as $val)
	    {
	        $output .= "<tr>
	        <td>".$slno++."</td>
	        <td><a href='".base_url()."admin/filtercategory_detail_report?categoryId=".$val->itemCatid."&frmdate=".$fromdate."&todate=".$todate."'>".$val->categoryname."</a></td>
	        <td>".$val->totalitemQty."</td>
	        <td>".$val->date_time."</td>
	        </tr>";
	    }
	    $output .= "";
	   
	    echo $output;
	}
	
	public function filtercategory_detail_report()
	{
	    $data['fromdate'] = $this->input->get('frmdate');
	    $data['todate'] = $this->input->get('todate');
	    $data['categoryid'] = $this->input->get('categoryId');
	    $data['cat_reportdetails'] = $this->Admin_Model->filtercategory_detail_report($data['categoryid'],$data['fromdate'],$data['todate']);
	   // echo json_encode($data['cat_reportdetails']);
	    $this->load->view('backend/category_detail_report',$data);
	}
	
	public function card_customers()
	{
	    $data['cat_report'] = $this->Admin_Model->customers();
	    $this->load->view('backend/card_customers',$data);
	}
	
	public function customers()
	{
	    $data['cat_report'] = $this->Admin_Model->customers();
	    $this->load->view('backend/customer',$data);
	}
	
	public function saleorder()
	{
	    $this->load->view('backend/sale-order');
	}
}