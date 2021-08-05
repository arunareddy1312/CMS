<?php

	class DashboardController extends Controller
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
				$this->load->view("admin/dashboard",$data);
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}	
	}
?>