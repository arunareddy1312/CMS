<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/AboutManager.php';
	class AboutController extends Controller
	{
		protected $aboutManager;
		public function __construct()
		{
			parent::__construct();
			$this->aboutManager = new aboutManager();
		}

		public function index()
		{
			$data = array();			
			$data["result"] = $this->aboutManager->getAboutDetails();
			$query = "SELECT * FROM footer";
			$footermodel = $this->load->model("footerModel");
			$data["footer"] = $footermodel->selectquery($query);
			$this->load->view("about",$data);
		}	
	}
?>