<?php

	class ContactController extends Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$data = array();
			$query = "SELECT * FROM contact";
			$contactmodel = $this->load->model("contactModel");
			$data["result"] = $contactmodel->selectquery($query);
			$query = "SELECT * FROM footer";
			$footermodel = $this->load->model("footerModel");
			$data["footer"] = $footermodel->selectquery($query);
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