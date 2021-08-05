<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/AboutManager.php';
	class HomeController extends Controller
	{
		protected $aboutManager;
		public function __construct()
		{
			parent::__construct();
			$this->aboutManager = new aboutManager();
		}

		public function home()
		{
			$data = array();
			$data["result"] = $this->aboutManager->getAboutDetails();	
			$query = "SELECT * FROM team";
			$teammodel = $this->load->model("teamModel");
			$data["team"] = $teammodel->selectquery($query);
			$query = "SELECT * FROM portfolio";
			$portfoliomodel = $this->load->model("portfolioModel");
			$data["portfolio"] = $portfoliomodel->selectquery($query);		
			$query = "SELECT * FROM service";
			$servicemodel = $this->load->model("serviceModel");
			$data["service"] = $servicemodel->selectquery($query);
			$query = "SELECT * FROM header";
			$headermodel = $this->load->model("headerModel");
			$data["header"] = $headermodel->selectquery($query);
			$query = "SELECT * FROM footer";
			$footermodel = $this->load->model("footerModel");
			$data["footer"] = $footermodel->selectquery($query);
			$this->load->view("home",$data);
		}	
	}
?>