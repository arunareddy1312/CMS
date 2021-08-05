<?php 


class aboutModel extends Model
{
	private $description;
	private $id;
	public function __construct($aboutDetails)
	{
		parent::__construct();
		$this->id = $aboutDetails["id"];
		$this->description = $aboutDetails["description"];
	}



	//getter
	public function getDescription()
	{
		return $this->description;
	}

	//setter
	public function setDescription($description)
	{
		$this->description = $description;
	}

	//getter
	public function getId()
	{
		return $this->id;
	}

	//setter
	public function setId($id)
	{
		$this->id = $id;
	}

}
?>