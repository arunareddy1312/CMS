<?php 


class LoginModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getdetails($query)
	{
		return $this->db->select($query);
	}
}
?>