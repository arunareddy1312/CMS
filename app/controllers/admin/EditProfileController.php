<?php

	class EditProfileController extends Controller
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
				$user_id = $_SESSION['user_id'];
				$data = array();
				$query = "SELECT * FROM users WHERE id='" . $user_id . "'";
				$usermodel = $this->load->model("userModel");
				$data["result"] = $usermodel->selectquery($query);
				$this->load->view("admin/edit_profile",$data);
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
						
				$update_query = "update users set name='$name' ,email='$email' , username='$username'where id='$id'";
				$userModel = $this->load->model("userModel");
				$userModel->updatequery($update_query);			
				header('location:http://localhost/CMS/admin/EditProfile');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}
	}
?>