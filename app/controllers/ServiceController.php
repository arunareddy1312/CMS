<?php

	class ServiceController extends Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$data = array();
			$query = "SELECT * FROM service";
			$servicemodel = $this->load->model("serviceModel");
			$data["result"] = $servicemodel->selectquery($query);
			$query = "SELECT * FROM footer";
			$footermodel = $this->load->model("footerModel");
			$data["footer"] = $footermodel->selectquery($query);
			$this->load->view("services",$data);
		}	
	}
?>