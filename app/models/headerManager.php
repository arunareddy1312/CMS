<?php 


class headerManager 
{
	protected $db = array();
    public function __construct()
    {
        $this->db = new Database();
    }

    public function createHeader($headermodel)
    {
        $heading = $headermodel->getHeading();
        $text= $headermodel->getText();
        $insert_query = "insert into header(heading,text) values('$heading','$text')";
        $this->db->insert($insert_query);
    }

    public function editHeader($id)
    {
        $query = "SELECT * FROM header WHERE id ='$id'";
        return $this->db->select($query);
    }

    public function updateHeader($headermodel, $id)
    {
        $heading = $headermodel->getHeading();
        $text= $headermodel->getText();
        $id = $id;
        $update_query = "update header set heading='$heading',text='$text'where id='$id'";
        $this->db->update($update_query);
    }

  

    public function deleteHeader($id)
    {
        $query = "Delete FROM header WHERE id ='$id'";
        $this->db->delete($query);
    }

    public function getHeaderDetails()
    {
        $query = "SELECT * FROM header";
        return $this->db->select($query);
    }
}
?>