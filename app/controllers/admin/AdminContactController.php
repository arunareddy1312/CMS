<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/contactManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/contactModel.php';
	class AdminContactController extends Controller
	{
		protected $contactManager;
		public function __construct()
		{
			parent::__construct();
			$this->contactManager = new contactManager();
		}

		public function index()
		{
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$data["result"] = $this->contactManager->getContactDetails();			
				$this->load->view("admin/contact/admin_contact",$data);
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}	

		public function create()
		{
			session_start();
			if(isset($_SESSION['user_id']))
			{

				$contactDetails = array();
				$contactDetails["content"] = $_POST['content'];
				$contactDetails["map_address"]=$_POST['map_address'];
				$contactDetails["location"]=$_POST['location'];
				$contactDetails["email"]=$_POST['email'];	
				$contactDetails["phone"]=$_POST['phone'];
				$contactModel = new contactModel($contactDetails);
				$this->contactManager->createContact($contactModel);
				header('location:http://localhost/CMS/admin/AdminContact');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function edit($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$data["result"] = $this->contactManager->editContact($id);;			
				$this->load->view("admin/contact/edit_contact",$data);
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
				$contactDetails = array();
				$contactDetails["content"] = $_POST['content'];
				$contactDetails["map_address"]=$_POST['map_address'];
				$contactDetails["location"]=$_POST['location'];
				$contactDetails["email"]=$_POST['email'];	
				$contactDetails["phone"]=$_POST['phone'];
				$contactModel = new contactModel($contactDetails);
				$this->contactManager->updateContact($contactModel,$id);		
				header('location:http://localhost/CMS/admin/AdminContact');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function delete($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$this->contactManager->deleteContact($id);			
				header('location:http://localhost/CMS/admin/AdminContact');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}
	}
?>