<?php 

class userModel extends Model
{
	private $name;
	private $email;
	private $username;
	private $password;
	private $role;
	
	public function __construct($userDetails)
	{
		parent::__construct();
		$this->name = $userDetails["name"];
		$this->email = $userDetails["email"];
		$this->username = $userDetails["username"];
		$this->password = $userDetails["password"];
		$this->role = $userDetails["role"];
	}

	public function getName()
	{
		return $this->name;
	}

	//setter
	public function setName($name)
	{
		$this->name = $name;
	}


	public function getEmail()
	{
		return $this->email;
	}

	//setter
	public function setEmail($email)
	{
		$this->email = $email;
	}


	public function getUsername()
	{
		return $this->username;
	}

	//setter
	public function setUsername($username)
	{
		$this->username = $username;
	}


	public function getPassword()
	{
		return $this->password;
	}

	//setter
	public function setPassword($password)
	{
		$this->password = $password;
	}


	public function getRole()
	{
		return $this->role;
	}

	//setter
	public function setRole($role)
	{
		$this->role = $role;
	}

}
?>