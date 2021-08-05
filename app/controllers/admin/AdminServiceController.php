<?php

	class AdminServiceController extends Controller
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
				$query = "SELECT * FROM service";
				$servicemodel = $this->load->model("serviceModel");
				$data["result"] = $servicemodel->selectquery($query);			
				$this->load->view("admin/service/admin_service",$data);
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}	

		public function create()
		{
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$name=$_POST['name'];	
				$heading=$_POST['heading'];	
				$description=$_POST['description'];	
				$insert_query = "insert into service(classname,heading,description) values('$name','$heading','$description')";
				$servicemodel = $this->load->model("serviceModel");
				$servicemodel->insertquery($insert_query);
				header('location:http://localhost/CMS/admin/AdminService');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function edit($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$query = "SELECT * FROM service WHERE id ='$id'";
				$servicemodel = $this->load->model("serviceModel");
				$data["result"] = $servicemodel->selectquery($query);			
				$this->load->view("admin/service/edit_service",$data);
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
				$name=$_POST['name'];	
				$heading=$_POST['heading'];
				$description=$_POST['description'];			
				$update_query = "update service set classname='$name',heading='$heading',description='$description'where id='$id'";			
				$servicemodel = $this->load->model("serviceModel");
				$servicemodel->updatequery($update_query);			
				header('location:http://localhost/CMS/admin/AdminService');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function delete($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$query = "Delete FROM service WHERE id ='$id'";
				$servicemodel = $this->load->model("serviceModel");
				$servicemodel->deletequery($query);			
				header('location:http://localhost/CMS/admin/AdminService');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}
	}
?>