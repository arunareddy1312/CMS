<?php


class userManager
{
    protected $db = array();
    public function __construct()
    {
        $this->db = new Database();
    }

    public function createUser($usermodel)
    {
        $name = $usermodel->getName();
        $email = $usermodel->getEmail();
        $username = $usermodel->getUsername();
        $role = $usermodel->getRole();
        $password = $usermodel->getPassword();
        $enc_password = password_hash($password, PASSWORD_DEFAULT);
        $insert_query = "insert into users(name,email,password,username,role) values('$name','$email','$enc_password','$username','$role')";
        $this->db->insert($insert_query);
    }

    public function editUser($id)
    {
        $query = "SELECT * FROM users WHERE id ='$id'";
        return $this->db->select($query);
    }

    public function updateUser($usermodel, $id)
    {
        $name = $usermodel->getName();
        $email = $usermodel->getEmail();
        $username = $usermodel->getUsername();
        $role = $usermodel->getRole();
        $id = $id;
        $update_query = "update users set name='$name' ,email='$email' , username='$username',role='$role' where id='$id'";
        $this->db->update($update_query);
    }

    public function deleteUser($id)
    {
        $query = "Delete FROM users WHERE id ='$id'";
        $this->db->delete($query);
    }

    public function getUserDetails()
    {
        $query = "SELECT * FROM users";
        return $this->db->select($query);
    }

    public function getUserDetailsByUsername($user_id)
    {
        $query = "SELECT * FROM users WHERE id='" . $user_id . "'";
        return $this->db->select($query);
    }

    public function updateUserProfile($usermodel, $id)
    {
        $name = $usermodel->getName();
        $email = $usermodel->getEmail();
        $username = $usermodel->getUsername();
        $id = $id;
        $update_query = "update users set name='$name' ,email='$email' , username='$username'where id='$id'";
        $this->db->update($update_query);
    }
}
