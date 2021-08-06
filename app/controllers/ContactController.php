<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/footerManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/contactManager.php';

	class ContactController extends Controller
	{
		protected $contactManager;
		protected $footerManager;
		public function __construct()
		{
			parent::__construct();
			$this->contactManager = new contactManager();
			$this->footerManager = new footerManager();
		}

		public function index()
		{
			$data = array();
			$data["result"] = $this->contactManager->getContactDetails();
			$data["footer"] = $this->footerManager->getFooterDetails();
			$this->load->view("contact",$data);
		}	

		public function send()
		{
			$receiver = "urgmailaddress@gmail.com";
			$subject = $_POST['subject'];
			$body = $_POST['message'];
			$sender = $_POST['email'];
			if(mail($receiver, $subject, $body, $sender)){
			    header('location:http://localhost/CMS/Contact');
			}else{
			    header('location:http://localhost/CMS/Contact');
			}
		}
	}
?>