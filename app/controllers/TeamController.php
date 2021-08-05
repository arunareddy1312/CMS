<?php

	class TeamController extends Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$data = array();
			$query = "SELECT * FROM team";
			$teammodel = $this->load->model("teamModel");
			$data["result"] = $teammodel->selectquery($query);
			$query = "SELECT * FROM footer";
			$footermodel = $this->load->model("footerModel");
			$data["footer"] = $footermodel->selectquery($query);
			$this->load->view("team",$data);
		}	
	}
?>