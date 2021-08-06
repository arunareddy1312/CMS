<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/userManager.php';
	class DashboardController extends Controller
	{
		protected $userManager;
		public function __construct()
		{
			parent::__construct();
			$this->userManager = new userManager();
		}

		public function index()
		{
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();			
				$data["result"] = $this->userManager->getUserDetails();
				$this->load->view("admin/dashboard",$data);
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}	
	}
?>