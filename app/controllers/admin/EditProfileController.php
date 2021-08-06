<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/userManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/userModel.php';
	class EditProfileController extends Controller
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
				$user_id = $_SESSION['user_id'];
				$data = array();
				$data["result"] = $this->userManager->getUserDetailsByUsername($user_id);	
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
				$userDetails = array();
				$userDetails["name"] = $_POST['name'];
				$userDetails["email"] = $_POST['email'];
				$userDetails["username"] = $_POST['username'];
				$userDetails = new userModel($userDetails);				
				$this->userManager->updateUserProfile($userDetails,$id);		
				header('location:http://localhost/CMS/admin/EditProfile');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}
	}
?>