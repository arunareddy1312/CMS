<?php

	class AdminTeamController extends Controller
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
				$query = "SELECT * FROM team";
				$teammodel = $this->load->model("teamModel");
				$data["result"] = $teammodel->selectquery($query);			
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
				
				$location = "resources/img/team" . $files;
				$name = $_POST['name'];	
				$designation = $_POST['designation'];
				$insert_query ="insert into team(photo,name,designation) values('$location','$name','$designation')";
				$teammodel = $this->load->model("teamModel");
				$teammodel->insertquery($insert_query);
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
				$query = "SELECT * FROM team WHERE id ='$id'";
				$teammodel = $this->load->model("teamModel");
				$data["result"] = $teammodel->selectquery($query);			
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
				$name = $_POST['name'];	
				$designation = $_POST['designation'];	
				if(empty($_FILES["photo"]["name"]))
				{
					$update_query = "update team set name='$name',designation='$designation'where id='$id'";	
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
					$location = "resources/img/team" . $files;
					$update_query = "update team set photo='$location',name='$name',designation='$designation'where id='$id'";
				}					
				
				$teammodel = $this->load->model("teamModel");
				$teammodel->updatequery($update_query);			
				header('location:http://localhost/CMS/admin/AdminTeam');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}

		public function delete($id){
			session_start();
			if(isset($_SESSION['user_id']))
			{
				$data = array();
				$query = "Delete FROM team WHERE id ='$id'";
				$teammodel = $this->load->model("teamModel");
				$teammodel->deletequery($query);			
				header('location:http://localhost/CMS/admin/AdminTeam');
			}else{
				header('location:http://localhost/CMS/admin/Login');
			}
		}
	}
?>