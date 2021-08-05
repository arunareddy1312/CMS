<?php 


class headerManager 
{
	protected $db = array();
    public function __construct()
    {
        $this->db = new Database();
    }
}
?>