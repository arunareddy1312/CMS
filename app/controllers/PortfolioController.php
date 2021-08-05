<?php

	class PortfolioController extends Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$data = array();
			$query = "SELECT * FROM portfolio";
			$portfoliomodel = $this->load->model("portfolioModel");
			$data["result"] = $portfoliomodel->selectquery($query);	
			$query = "SELECT * FROM footer";
			$footermodel = $this->load->model("footerModel");
			$data["footer"] = $footermodel->selectquery($query);	
			$this->load->view("portfolio",$data);
		}	
	}
?>