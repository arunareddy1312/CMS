<?php 

 	class TestController extends Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function datapage()
		{
			$data = array();
			$query = "SELECT * FROM mvctable";
			$testmodel = $this->load->model("testModel");
			$data["testdata"] = $testmodel->dataList($query);
			print_r($data["testdata"]);
			$this->load->view("home",$data);
		}	
	}
?>