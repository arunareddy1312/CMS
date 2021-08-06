<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/portfolioManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/footerManager.php';
	class PortfolioController extends Controller
	{
		protected $portfolioManager;
		protected $footerManager;
		public function __construct()
		{
			parent::__construct();
			$this->portfolioManager = new portfolioManager();
			$this->footerManager = new footerManager();
		}

		public function index()
		{
			$data = array();
			$data["result"] = $this->portfolioManager->getPortfolioDetails();	
			$data["footer"] = $this->footerManager->getFooterDetails();
			$this->load->view("portfolio",$data);
		}	
	}
?>