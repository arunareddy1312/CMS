<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/serviceManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/serviceModel.php';
	class AdminServiceController extends Controller
	{
		protected $serviceManager;
		public function __construct()
		{
			parent::__construct();
			$this->serviceManager = new serviceManager();
			
		}

		public function index()
		{
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$data["result"] =  $this->serviceManager->getServiceDetails();			
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
				$serviceDetails = array();
				$serviceDetails["name"] = $_POST['name'];
				$serviceDetails["heading"]=$_POST['heading'];
				$serviceDetails["description"]=$_POST['description'];
				$serviceModel = new serviceModel($serviceDetails);
				$this->serviceManager->createService($serviceModel);
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
				$data["result"] = $this->serviceManager->editService($id);;			
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
				$serviceDetails = array();
				$serviceDetails["name"] = $_POST['name'];
				$serviceDetails["heading"]=$_POST['heading'];
				$serviceDetails["description"]=$_POST['description'];
				$serviceModel = new serviceModel($serviceDetails);
				$this->serviceManager->updateService($serviceModel,$id);			
				header('location:http://localhost/CMS/admin/AdminService');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function delete($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$this->serviceManager->deleteTeam($id);		
				header('location:http://localhost/CMS/admin/AdminService');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}
	}
?>