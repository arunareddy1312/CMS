<?php 
class contactManager 
{
	protected $db = array();
    public function __construct()
    {
        $this->db = new Database();
    }
    public function createContact($contactmodel)
    {
        $content = $contactmodel->getContent();
        $map = $contactmodel->getMap();
        $location = $contactmodel->getLocation();
        $email =$contactmodel->getEmail();
        $phone=$contactmodel->getPhone();
        $insert_query = "insert into contact(heading_content,map_address,location_address,email,phone) values('$content','$map','$location','$email','$phone')";
        $this->db->insert($insert_query);
    }

    public function editContact($id)
    {
        $query = "SELECT * FROM contact WHERE id ='$id'";
        return $this->db->select($query);
    }

    public function updateContact($contactmodel, $id)
    {
        $content = $contactmodel->getContent();
        $map = $contactmodel->getMap();
        $location = $contactmodel->getLocation();
        $email =$contactmodel->getEmail();
        $phone=$contactmodel->getPhone();
        $id = $id;
        $update_query = "update contact set heading_content='$content',map_address='$map',location_address='$location',email='$email',phone='$phone'where id='$id'";			
        $this->db->update($update_query);
    }

  

    public function deleteContact($id)
    {
        $query = "Delete FROM contact WHERE id ='$id'";
        $this->db->delete($query);
    }

    public function getContactDetails()
    {
        $query = "SELECT * FROM contact";
        return $this->db->select($query);
    }
}
