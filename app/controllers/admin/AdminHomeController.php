<?php

	class AdminHomeController extends Controller
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
				$query = "SELECT * FROM header";
				$headermodel = $this->load->model("headerModel");
				$data["header"] = $headermodel->selectquery($query);	
				$query = "SELECT * FROM footer";
				$footermodel = $this->load->model("footerModel");
				$data["footer"] = $footermodel->selectquery($query);				
				$this->load->view("admin/home/admin_home",$data);
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}	

		public function header()
		{
			session_start();
			if(isset($_SESSION['user_id']))
			{	
				$heading=$_POST['heading'];	
				$text=$_POST['text'];	
				$insert_query = "insert into header(heading,text) values('$heading','$text')";
				$headermodel = $this->load->model("headerModel");
				$headermodel->insertquery($insert_query);
				header('location:http://localhost/CMS/admin/AdminHome');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function footer()
		{
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$heading=$_POST['heading'];	
				$text=$_POST['text'];	
				$insert_query = "insert into footer(heading,text) values('$heading','$text')";
				$footermodel = $this->load->model("footerModel");
				$footermodel->insertquery($insert_query);
				header('location:http://localhost/CMS/admin/AdminHome');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function edit_header($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$query = "SELECT * FROM header WHERE id ='$id'";
				$headermodel = $this->load->model("headerModel");
				$data["result"] = $headermodel->selectquery($query);			
				$this->load->view("admin/home/edit_header",$data);
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function edit_footer($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$query = "SELECT * FROM footer WHERE id ='$id'";
				$footermodel = $this->load->model("footerModel");
				$data["result"] = $footermodel->selectquery($query);			
				$this->load->view("admin/home/edit_footer",$data);
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}


		public function update_header()
		{			
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$id = $_POST['id'];					
				$heading=$_POST['heading'];
				$text=$_POST['text'];			
				$update_query = "update header set heading='$heading',text='$text'where id='$id'";			
				$headermodel = $this->load->model("headerModel");
				$headermodel->updatequery($update_query);			
				header('location:http://localhost/CMS/admin/AdminHome');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function update_footer()
		{			
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$id = $_POST['id'];					
				$heading=$_POST['heading'];
				$text=$_POST['text'];			
				$update_query = "update footer set heading='$heading',text='$text'where id='$id'";			
				$footermodel = $this->load->model("footerModel");
				$footermodel->updatequery($update_query);			
				header('location:http://localhost/CMS/admin/AdminHome');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function delete_header($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$query = "Delete FROM header WHERE id ='$id'";
				$headermodel = $this->load->model("headerModel");
				$headermodel->deletequery($query);			
				header('location:http://localhost/CMS/admin/AdminHome');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function delete_footer($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$query = "Delete FROM footer WHERE id ='$id'";
				$footermodel = $this->load->model("footerModel");
				$footermodel->deletequery($query);			
				header('location:http://localhost/CMS/admin/AdminHome');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}
	}
?>