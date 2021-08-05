<?php

	class AdminPortfolioController extends Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$query = "SELECT * FROM portfolio";
				$portfoliomodel = $this->load->model("portfolioModel");
				$data["result"] = $portfoliomodel->selectquery($query);			
				$this->load->view("admin/portfolio/admin_portfolio",$data);
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}	

		public function add()
		{
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$this->load->view("admin/portfolio/add_portfolio");
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function create()
		{
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$target_dir = "resources/img/portfolio";
				$target_file = $target_dir . date("dmYhis") . basename($_FILES["photo"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				 
				if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg" || $imageFileType != "gif" ) {
				if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
				$files = date("dmYhis") . basename($_FILES["photo"]["name"]);
				}else{
				echo "Error Uploading File";
				exit;
				}
				}else{
				echo "File Not Supported";
				exit;
				}
				
				$location = "resources/img/portfolio" . $files;
				$filter = $_POST['filter'];	
				$heading = $_POST['heading'];
				$text = $_POST['text'];

				$insert_query ="insert into portfolio(image,filter_class,heading,text) values('$location','$filter','$heading','$text')";
				$portfoliomodel = $this->load->model("portfolioModel");
				$portfoliomodel->insertquery($insert_query);
				header('location:http://localhost/CMS/admin/AdminPortfolio');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function edit($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$query = "SELECT * FROM portfolio WHERE id ='$id'";
				$portfoliomodel = $this->load->model("portfolioModel");
				$data["result"] = $portfoliomodel->selectquery($query);			
				$this->load->view("admin/portfolio/edit_portfolio",$data);
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function update()
		{	
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$id = $_POST['id'];
				$filter = $_POST['filter'];	
				$heading = $_POST['heading'];
				$text = $_POST['text'];

				if(empty($_FILES["photo"]["name"]))
				{
					$update_query = "update portfolio set filter_class='$filter',heading='$heading',text='$text'where id='$id'";	
				}
				else{
					$target_dir = "resources/img/portfolio";
					$target_file = $target_dir . date("dmYhis") . basename($_FILES["photo"]["name"]);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					 
					if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg" || $imageFileType != "gif" ) {
					if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
					$files = date("dmYhis") . basename($_FILES["photo"]["name"]);
					}else{
					echo "Error Uploading File";
					exit;
					}
					}else{
					echo "File Not Supported";
					exit;
					}			
					$location = "resources/img/portfolio" . $files;
					$update_query = "update portfolio set photo='$location',filter_class='$filter',heading='$heading',text='$text'where id='$id'";
				}					
				
				$portfoliomodel = $this->load->model("portfolioModel");
				$portfoliomodel->updatequery($update_query);			
				header('location:http://localhost/CMS/admin/AdminPortfolio');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function delete($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$query = "Delete FROM portfolio WHERE id ='$id'";
				$portfoliomodel = $this->load->model("portfolioModel");
				$portfoliomodel->deletequery($query);			
				header('location:http://localhost/CMS/admin/AdminPortfolio');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}
	}
?>