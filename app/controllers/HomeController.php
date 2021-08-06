<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/AboutManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/headerManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/footerManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/serviceManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/portfolioManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/teamManager.php';
	class HomeController extends Controller
	{
		protected $aboutManager;
		protected $headerManager;
		protected $footerManager;
		protected $teamManager;
		protected $portfolioManager;
		protected $serviceManager;
		public function __construct()
		{
			parent::__construct();
			$this->aboutManager = new aboutManager();
			$this->headerManager = new headerManager();
			$this->footerManager = new footerManager();
			$this->serviceManager = new serviceManager();
			$this->portfolioManager = new portfolioManager();
			$this->teamManager = new teamManager();
		}

		public function home()
		{
			$data = array();
			$data["result"] = $this->aboutManager->getAboutDetails();	
			$data["team"] = $this->teamManager->getTeamDetails();
			$data["portfolio"] = $this->portfolioManager->getPortfolioDetails();		
			$data["service"] = $this->serviceManager->getServiceDetails();
			$data["header"] = $this->headerManager->getHeaderDetails();
			$data["footer"] = $this->footerManager->getFooterDetails();
			$this->load->view("home",$data);
		}	
	}
?>