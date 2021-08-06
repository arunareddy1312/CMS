<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/headerManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/headerModel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/footerManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/footerModel.php';
	class AdminHomeController extends Controller
	{
		protected $headerManager;
		protected $footerManager;
		public function __construct()
		{
			parent::__construct();
			$this->headerManager = new headerManager();
			$this->footerManager = new footerManager();
		}

		public function index()
		{
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();			
				$data["header"] = $this->headerManager->getHeaderDetails();				
				$data["footer"] = $this->footerManager->getFooterDetails();				
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
				$headerDetails = array();
				$headerDetails["heading"] = $_POST['heading'];
				$headerDetails["text"]=$_POST['text'];				
				$headerModel = new headerModel($headerDetails);
				$this->headerManager->createHeader($headerModel);
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
				$footerDetails = array();
				$footerDetails["heading"] = $_POST['heading'];
				$footerDetails["text"]=$_POST['text'];				
				$footerModel = new footerModel($footerDetails);
				$this->footerManager->createFooter($footerModel);
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
				$data["result"] = $this->headerManager->editHeader($id);;			
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
				$data["result"] = $this->footerManager->editFooter($id);			
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
				$headerDetails = array();
				$headerDetails["heading"] = $_POST['heading'];
				$headerDetails["text"]=$_POST['text'];				
				$headerModel = new headerModel($headerDetails);
				$this->headerManager->updateHeader($headerModel,$id);			
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
				$footerDetails = array();
				$footerDetails["heading"] = $_POST['heading'];
				$footerDetails["text"]=$_POST['text'];				
				$footerModel = new footerModel($footerDetails);
				$this->footerManager->updateFooter($footerModel,$id);		
				header('location:http://localhost/CMS/admin/AdminHome');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function delete_header($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$this->headerManager->deleteHeader($id);		
				header('location:http://localhost/CMS/admin/AdminHome');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function delete_footer($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$this->footerManager->deleteFooter($id);			
				header('location:http://localhost/CMS/admin/AdminHome');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}
	}
?>