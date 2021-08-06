<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/AboutManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CMS/app/models/aboutModel.php';
class AdminAboutController extends Controller
{
	protected $aboutManager;
	public function __construct()
	{
		parent::__construct();
		$this->aboutManager = new aboutManager();
	}

	public function index()
	{
		session_start();
		if (isset($_SESSION['user_id'])) {
			$data = array();
			$data["result"] = $this->aboutManager->getAboutDetails();
			$this->load->view("admin/about/admin_about", $data);
		} else {
			header('location:http://localhost/CMS/admin/Login');
		}
	}

	public function create()
	{
		session_start();
		if (isset($_SESSION['user_id'])) {
			$aboutDetails = array();
			$aboutDetails["description"] = $_POST['description'];
			$aboutModel = new aboutModel($aboutDetails);
			$this->aboutManager->insertAboutDetails($aboutModel);
			header('location:http://localhost/CMS/admin/AdminAbout');
		} else {
			header('location:http://localhost/CMS/admin/Login');
		}
	}

	public function edit($id)
	{
		session_start();
		if (isset($_SESSION['user_id'])) {
			$data["result"] = $this->aboutManager->getAboutDetailsId($id);		
			$this->load->view("admin/about/edit_about",$data);
		} else {
			header('location:http://localhost/CMS/admin/Login');
		}
	}

	public function update()
	{
		session_start();
		if (isset($_SESSION['user_id'])) {
			$aboutDetails = array();
			$aboutDetails["description"] = $_POST['description'];
			$aboutDetails["id"] = $_POST['id'];
			$aboutModel = new aboutModel($aboutDetails);
		 	$this->aboutManager->updateAboutDetails($aboutModel);			
			header('location:http://localhost/CMS/admin/AdminAbout');
		} else {
			header('location:http://localhost/CMS/admin/Login');
		}
	}

	public function delete($id)
	{
		session_start();
		if (isset($_SESSION['user_id'])) {
			$this->aboutManager->deleteAboutDetails($id);			
			header('location:http://localhost/CMS/admin/AdminAbout');
		} else {
			header('location:http://localhost/CMS/admin/Login');
		}
	}
}
?>