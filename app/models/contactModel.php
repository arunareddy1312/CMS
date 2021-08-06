<?php 

class contactModel extends Model
{
	private $content;
	private $map;
	private $location;
	private $email;
	private $phone;
	public function __construct($contactDetails)
	{
		parent::__construct();
		$this->content = $contactDetails["content"];
		$this->map = $contactDetails["map_address"];
		$this->location = $contactDetails["location"];
		$this->email = $contactDetails["email"];
		$this->phone = $contactDetails["phone"];
	}

	public function getContent()
	{
		return $this->content;
	}

	//setter
	public function setContent($content)
	{
		$this->content = $content;
	}

	public function getMap()
	{
		return $this->map;
	}

	//setter
	public function setMap($map)
	{
		$this->map = $map;
	}

	public function getLocation()
	{
		return $this->location;
	}

	//setter
	public function setLocation($location)
	{
		$this->location = $location;
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

	public function getPhone()
	{
		return $this->phone;
	}

	//setter
	public function setPhone($phone)
	{
		$this->phone = $phone;
	}

}
?>