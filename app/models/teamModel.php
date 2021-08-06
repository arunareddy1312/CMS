<?php 


class teamModel extends Model
{
	private $image;
	private $name;
	private $designation;
	public function __construct($teamDetails)
	{
		parent::__construct();
		$this->image = $teamDetails["photo"];
		$this->name = $teamDetails["name"];
		$this->designation = $teamDetails["designation"];
	}

	public function getImage()
	{
		return $this->image;
	}

	//setter
	public function setImage($image)
	{
		$this->image = $image;
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

	public function getDesignation()
	{
		return $this->designation;
	}

	//setter
	public function setDesignation($designation)
	{
		$this->designation = $designation;
	}

}
?>