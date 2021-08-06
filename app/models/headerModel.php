<?php 


class headerModel extends Model
{
	private $heading;
	private $text;
	public function __construct($headerDetails)
	{
		parent::__construct();
		$this->heading = $headerDetails["heading"];
		$this->text = $headerDetails["text"];
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

	public function getText()
	{
		return $this->text;
	}

	//setter
	public function setText($text)
	{
		$this->text = $text;
	}
}
?>