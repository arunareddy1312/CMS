<?php


class aboutManager
{
    protected $db = array();
    public function __construct()
    {
        $this->db = new Database();
    }
    public function insertAboutDetails($aboutmodel)
    {
        $description = $aboutmodel->getDescription();
        $insert_query = "insert into about(description) values('$description')";
        $this->db->insert($insert_query);
    }

    public function getAboutDetailsId($id)
    {
        $query = "SELECT * FROM about WHERE id ='$id'";
        return $this->db->select($query);
    }
    public function getAboutDetails()
    {
        $query = "SELECT * FROM about";
        return $this->db->select($query);
    }
    public function updateAboutDetails($aboutmodel)
    {
        $description = $aboutmodel->getDescription();
        $id = $aboutmodel->getId();
        $update_query = "update about set description='$description'where id='$id'";
        $this->db->update($update_query);
        
    }
    public function deleteAboutDetails($id)
    { 
        $query = "Delete FROM about WHERE id ='$id'";
        $this->db->delete($query);
    }
}
