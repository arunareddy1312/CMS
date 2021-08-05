<?php 


class headerModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function selectquery($query)
	{
		return $this->db->select($query);
	}

	public function insertquery($query)
	{
		return $this->db->insert($query);
	}

	public function updatequery($query)
	{
		return $this->db->update($query);
	}

	public function deletequery($query)
	{
		return $this->db->delete($query);
	}
}
?>