<?php 


class serviceModel extends Model
{
	private $name;
	private $heading;
	private $description;
	public function __construct($serviceDetails)
	{
		parent::__construct();
		$this->name = $serviceDetails["name"];
		$this->heading = $serviceDetails["heading"];
		$this->description = $serviceDetails["description"];
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

	public function getHeading()
	{
		return $this->heading;
	}

	//setter
	public function setHeading($heading)
	{
		$this->heading = $heading;
	}


	public function getDescription()
	{
		return $this->description;
	}

	//setter
	public function setDescription($description)
	{
		$this->description = $description;
	}

}
?>