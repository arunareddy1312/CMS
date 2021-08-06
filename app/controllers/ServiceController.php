<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/footerManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/serviceManager.php';
	class ServiceController extends Controller
	{
		protected $serviceManager;
		protected $footerManager;
		public function __construct()
		{
			parent::__construct();
			$this->serviceManager = new serviceManager();
			$this->footerManager = new footerManager();
		}

		public function index()
		{
			$data = array();
			$data["result"] = $this->serviceManager->getServiceDetails();
			$data["footer"] = $this->footerManager->getFooterDetails();
			$this->load->view("services",$data);
		}	
	}
?>