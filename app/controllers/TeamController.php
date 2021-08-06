<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/teamManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/footerManager.php';
	class TeamController extends Controller
	{
		protected $teamManager;
		protected $footerManager;
		public function __construct()
		{
			parent::__construct();
			$this->teamManager = new teamManager();
			$this->footerManager = new footerManager();
		}

		public function index()
		{
			$data = array();
			$data["result"] = $this->teamManager->getTeamDetails();
			$data["footer"] = $this->footerManager->getFooterDetails();
			$this->load->view("team",$data);
		}	
	}
?>