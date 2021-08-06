<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/portfolioManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/portfolioModel.php';
	class AdminPortfolioController extends Controller
	{
		protected $portfolioManager;
		public function __construct()
		{
			parent::__construct();
			$this->portfolioManager = new portfolioManager();
		}

		public function index()
		{
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$data["result"] = $this->portfolioManager->getPortfolioDetails();;			
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
				$portfolioDetails = array();
				$portfolioDetails["photo"] = "resources/img/portfolio" . $files;
				$portfolioDetails["filter"]=$_POST['filter'];
				$portfolioDetails["heading"]=$_POST['heading'];
				$portfolioDetails["text"]=$_POST['text'];
				$portfoliomodel = new teamModel($portfolioDetails);
				$this->portfolioManager->createPortfolio($portfoliomodel);
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
				$data["result"] = $this->portfolioManager->editPortfolio($id);;			
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
					$portfolioDetails = array();					
					$portfolioDetails["filter"]=$_POST['filter'];
					$portfolioDetails["heading"]=$_POST['heading'];
					$portfolioDetails["text"]=$_POST['text'];
					$portfoliomodel = new teamModel($portfolioDetails);					

				if(empty($_FILES["photo"]["name"]))
				{
					$this->portfolioManager->updatePortfolioWithOutImage($portfoliomodel,$id);
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
					$id = $_POST['id'];
					$portfolioDetails = array();
					$portfolioDetails["photo"] = "resources/img/portfolio" . $files;
					$portfolioDetails["filter"]=$_POST['filter'];
					$portfolioDetails["heading"]=$_POST['heading'];
					$portfolioDetails["text"]=$_POST['text'];
					$portfoliomodel = new teamModel($portfolioDetails);
					$this->portfolioManager->updatePortfolio($portfoliomodel,$id);
				}					
					
				header('location:http://localhost/CMS/admin/AdminPortfolio');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function delete($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$this->portfolioManager->deletePortfolio($id);				
				header('location:http://localhost/CMS/admin/AdminPortfolio');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}
	}
?>