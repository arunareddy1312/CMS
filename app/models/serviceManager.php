<?php 


class serviceManager
{
	protected $db = array();
    public function __construct()
    {
        $this->db = new Database();
    }

    public function createService($servicemodel)
    {
        $name = $servicemodel->getName();
        $heading = $servicemodel->getHeading();
        $description = $servicemodel->getDescription();
        $insert_query = "insert into service(classname,heading,description) values('$name','$heading','$description')";
        $this->db->insert($insert_query);
    }

    public function editService($id)
    {
        $query = "SELECT * FROM service WHERE id ='$id'";
        return $this->db->select($query);
    }

    public function updateService($servicemodel, $id)
    {
        $name = $servicemodel->getName();
        $heading = $servicemodel->getHeading();
        $description = $servicemodel->getDescription();
        $id = $id;
        $update_query = "update service set classname='$name',heading='$heading',description='$description'where id='$id'";	
        $this->db->update($update_query);
    }

  

    public function deleteService($id)
    {
        $query = "Delete FROM service WHERE id ='$id'";
        $this->db->delete($query);
    }

    public function getServiceDetails()
    {
        $query = "SELECT * FROM service";
        return $this->db->select($query);
    }

}
?>