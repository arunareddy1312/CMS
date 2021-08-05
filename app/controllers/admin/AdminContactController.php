<?php

	class AdminContactController extends Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$query = "SELECT * FROM contact";
				$contactmodel = $this->load->model("contactModel");
				$data["result"] = $contactmodel->selectquery($query);			
				$this->load->view("admin/contact/admin_contact",$data);
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}	

		public function create()
		{
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$content=$_POST['content'];	
				$map=$_POST['map_address'];	
				$location=$_POST['location'];	
				$email=$_POST['email'];	
				$phone=$_POST['phone'];

				$insert_query = "insert into contact(heading_content,map_address,location_address,email,phone) values('$content','$map','$location','$email','$phone')";
				$contactmodel = $this->load->model("contactModel");
				$contactmodel->insertquery($insert_query);
				header('location:http://localhost/CMS/admin/AdminContact');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function edit($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$query = "SELECT * FROM contact WHERE id ='$id'";
				$contactmodel = $this->load->model("contactModel");
				$data["result"] = $contactmodel->selectquery($query);			
				$this->load->view("admin/contact/edit_contact",$data);
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function update()
		{		
			session_start();
			if(isset($_SESSION['user_id']))
			{	
				$id = $_POST['id'];
				$content=$_POST['content'];	
				$map=$_POST['map_address'];	
				$location=$_POST['location'];	
				$email=$_POST['email'];	
				$phone=$_POST['phone'];

				$update_query = "update contact set heading_content='$content',map_address='$map',location_address='$location',email='$email',phone='$phone'where id='$id'";			
				$contactmodel = $this->load->model("contactModel");
				$contactmodel->updatequery($update_query);			
				header('location:http://localhost/CMS/admin/AdminContact');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function delete($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$query = "Delete FROM contact WHERE id ='$id'";
				$contactmodel = $this->load->model("contactModel");
				$contactmodel->deletequery($query);			
				header('location:http://localhost/CMS/admin/AdminContact');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}
	}
?>