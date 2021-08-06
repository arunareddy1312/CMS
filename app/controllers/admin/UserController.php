<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/userManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/userModel.php';
	class UserController extends Controller
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
				$userDetails = array();
				$userDetails["name"] = $_POST['name'];
				$userDetails["email"] = $_POST['email'];
				$userDetails["username"] = $_POST['username'];
				$userDetails["password"] = $_POST['password'];
				$userDetails["role"] = $_POST['role'];
				$userDetails = new userModel($userDetails);				
				$this->userManager->createUser($userDetails);
				header('location:http://localhost/CMS/admin/User');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function edit($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{			
				$data["result"] = $this->userManager->editUser($id);			
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
				$userDetails = array();
				$userDetails["name"] = $_POST['name'];
				$userDetails["email"] = $_POST['email'];
				$userDetails["username"] = $_POST['username'];
				$userDetails["role"] = $_POST['role'];
				$userDetails = new userModel($userDetails);				
				$this->userManager->updateUser($userDetails,$id);		
				header('location:http://localhost/CMS/admin/User');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function delete($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$this->userManager->deleteUser($id);			
				header('location:http://localhost/CMS/admin/User');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}
	}
	?>
