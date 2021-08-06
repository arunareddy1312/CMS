<?php 


class teamManager
{
	protected $db = array();
    public function __construct()
    {
        $this->db = new Database();
    }

    public function createTeam($teammodel)
    {
        $location = $teammodel->getImage();
        $name = $teammodel->getName();
        $designation = $teammodel->getDesignation();
        $insert_query ="insert into team(photo,name,designation) values('$location','$name','$designation')";  
        $this->db->insert($insert_query);
    }

    public function editTeam($id)
    {
        $query = "SELECT * FROM team WHERE id ='$id'";
        return $this->db->select($query);
    }

    public function updateTeam($teammodel, $id)
    {
        $location = $teammodel->getImage();
        $name = $teammodel->getName();
        $designation = $teammodel->getDesignation();
        $id = $id;
        $update_query = "update team set photo='$location',name='$name',designation='$designation'where id='$id'";
        $this->db->update($update_query);
    }

    public function updateTeamWithOutImage($teammodel, $id)
    {
        $name = $teammodel->getName();
        $designation = $teammodel->getDesignation();
        $id = $id;
        $update_query = "update team set name='$name',designation='$designation'where id='$id'";
        $this->db->update($update_query);
    }

    

    public function deleteTeam($id)
    {
        $query = "Delete FROM team WHERE id ='$id'";
        $this->db->delete($query);
    }

    public function getTeamDetails()
    {
        $query = "SELECT * FROM team";
        return $this->db->select($query);
    }

}
?>