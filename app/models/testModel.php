<?php 


class testModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function dataList($query)
	{
		return $this->db->select($query);
	}
}
?>