<?php 


class footerManager
{
	protected $db = array();
    public function __construct()
    {
        $this->db = new Database();
    }
    public function createFooter($footermodel)
    {
        $heading = $footermodel->getHeading();
        $text= $footermodel->getText();
        $insert_query = "insert into footer(heading,text) values('$heading','$text')";
        $this->db->insert($insert_query);
    }

    public function editFooter($id)
    {
        $query = "SELECT * FROM footer WHERE id ='$id'";
        return $this->db->select($query);
    }

    public function updateFooter($footermodel, $id)
    {
        $heading = $footermodel->getHeading();
        $text= $footermodel->getText();
        $id = $id;
        $update_query = "update footer set heading='$heading',text='$text'where id='$id'";
        $this->db->update($update_query);
    }

  

    public function deleteFooter($id)
    {
        $query = "Delete FROM footer WHERE id ='$id'";
        $this->db->delete($query);
    }

    public function getFooterDetails()
    {
        $query = "SELECT * FROM footer";
        return $this->db->select($query);
    }
}
?>