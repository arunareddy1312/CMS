<?php

	class UserController extends Controller
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
				$query = "SELECT * FROM users";
				$usermodel = $this->load->model("userModel");
				$data["result"] = $usermodel->selectquery($query);			
				$this->load->view("admin/user/users",$data);
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
				$email=$_POST['email'];
				$username=$_POST['username'];
				$password=$_POST['password'];
				$role = $_POST['role'];	
				$enc_password = password_hash($password,PASSWORD_DEFAULT);		
				
				$insert_query = "insert into users(name,email,password,username,role) values('$name','$email','$enc_password','$username','$role')";
				$userModel = $this->load->model("userModel");
				$userModel->insertquery($insert_query);
				header('location:http://localhost/CMS/admin/User');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function edit($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$query = "SELECT * FROM users WHERE id ='$id'";
				$usermodel = $this->load->model("userModel");
				$data["result"] = $usermodel->selectquery($query);			
				$this->load->view("admin/user/edit_user",$data);
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
				$email=$_POST['email'];
				$username=$_POST['username'];			
				$role = $_POST['role'];			
				$update_query = "update users set name='$name' ,email='$email' , username='$username',role='$role' where id='$id'";			
				$userModel = $this->load->model("userModel");
				$userModel->updatequery($update_query);			
				header('location:http://localhost/CMS/admin/User');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function delete($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$query = "Delete FROM users WHERE id ='$id'";
				$usermodel = $this->load->model("userModel");
				$usermodel->deletequery($query);			
				header('location:http://localhost/CMS/admin/User');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}
	}
?>