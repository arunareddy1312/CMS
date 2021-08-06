<?php

class portfolioModel extends Model
{
	private $image;
	private $filter;
	private $heading;
	private $text;

	public function __construct($portfolioDetails)
	{
		parent::__construct();
		$this->image = $portfolioDetails["photo"];
		$this->filter = $portfolioDetails["filter"];
		$this->heading = $portfolioDetails["heading"];
		$this->text = $portfolioDetails["text"];
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

	public function getFilter()
	{
		return $this->filter;
	}

	//setter
	public function setFilter($filter)
	{
		$this->filter = $filter;
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