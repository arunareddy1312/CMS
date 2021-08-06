<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/teamManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/teamModel.php';
	class AdminTeamController extends Controller
	{
		protected $teamManager;
		public function __construct()
		{
			parent::__construct();
			$this->teamManager = new teamManager();
		}

		public function index()
		{
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$data["result"] = $this->teamManager->getTeamDetails();		
				$this->load->view("admin/team/admin_team",$data);
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}	

		public function add()
		{
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$this->load->view("admin/team/admin_add_team");
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function create()
		{
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$target_dir = "resources/img/team";
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
				
				$teamDetails = array();
				$teamDetails["photo"] = "resources/img/team" . $files;
				$teamDetails["name"]=$_POST['name'];
				$teamDetails["designation"]=$_POST['designation'];
				$teamModel = new teamModel($teamDetails);
				$this->teamManager->createTeam($teamModel);
				header('location:http://localhost/CMS/admin/AdminTeam');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function edit($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$data["result"] = $this->teamManager->editTeam($id);			
				$this->load->view("admin/team/edit_team",$data);
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
				$teamDetails = array();
				$teamDetails["name"]=$_POST['name'];
				$teamDetails["designation"]=$_POST['designation'];
				$teamModel = new teamModel($teamDetails);
				if(empty($_FILES["photo"]["name"]))
				{
						$this->teamManager->updateTeam($teamModel,$id);	
				}
				else{
					$target_dir = "resources/img/team";
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
					$teamDetails = array();
					$teamDetails["photo"] = "resources/img/team" . $files;
					$teamDetails["name"]=$_POST['name'];
					$teamDetails["designation"]=$_POST['designation'];
					$teamModel = new teamModel($teamDetails);
					$this->teamManager->updateTeam($teamModel,$id);
				}					
			
				header('location:http://localhost/CMS/admin/AdminTeam');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function delete($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$this->teamManager->deleteTeam($id);				
				header('location:http://localhost/CMS/admin/AdminTeam');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}
	}
