<?php

	class LoginController extends Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$this->load->view("admin/login");
		}	

		public function verify()
		{
			session_start();
			$data = array();
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if(!empty($_POST["email"]) && !empty($_POST["password"])) {
			        $email = $_POST["email"];
			        $password = $_POST["password"];

			        $query = "SELECT * FROM users WHERE email='" . $email . "'";
					$loginmodel = $this->load->model("loginModel");
					$data['result'] = $loginmodel->getdetails($query);

					if($data['result']->num_rows == 1){
						foreach($data['result'] as $res){
							$hash_password = $res['password'];
							$user_id = $res['id'];
							$role = $res['role'];
						}
							$verify = password_verify($password, $hash_password);
							if ($verify) {
								$_SESSION['user_id'] = $user_id;
								$_SESSION['authenticated'] = 'true';
								$_SESSION['role'] = $role;
						      	header('location:http://localhost/CMS/admin/Dashboard');
						  	} else {
						      	header('location:http://localhost/CMS/admin/Login');
						  	}
					}
					else{
				    	header('location:http://localhost/CMS/admin/Login');
				    }
			    }
			    else{
			    	header('location:http://localhost/CMS/admin/Login');
			    }
			}
			else
			{
				header('location:http://localhost/CMS/admin/Login');
			}
						
		}

		public function logout()
		{			
			session_start(); //to ensure you are using same session
			session_destroy(); //destroy the session
			header("location:http://localhost/CMS/admin/Login"); //to redirect back to "index.php" after logging out
			exit();
		}
	}
?>