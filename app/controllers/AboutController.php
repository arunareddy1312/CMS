<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/AboutManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/footerManager.php';
	class AboutController extends Controller
	{
		protected $aboutManager;
		protected $footerManager;
		public function __construct()
		{
			parent::__construct();
			$this->aboutManager = new aboutManager();
			$this->footerManager = new footerManager();
		}

		public function index()
		{
			$data = array();			
			$data["result"] = $this->aboutManager->getAboutDetails();
			$data["footer"] = $this->footerManager->getFooterDetails();;
			$this->load->view("about",$data);
		}	
	}
?>