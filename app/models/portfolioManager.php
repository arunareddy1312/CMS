<?php 


class portfolioManager 
{
	protected $db = array();
    public function __construct()
    {
        $this->db = new Database();
    }

    public function createPortfolio($portfoliomodel)
    {
        $location = $portfoliomodel->getImage();
        $filter = $portfoliomodel->getFilter();
        $heading = $portfoliomodel->getHeading();
        $text= $portfoliomodel->getText();
        $insert_query ="insert into portfolio(image,filter_class,heading,text) values('$location','$filter','$heading','$text')";
        $this->db->insert($insert_query);
    }

    public function editPortfolio($id)
    {
        $query = "SELECT * FROM portfolio WHERE id ='$id'";
        return $this->db->select($query);
    }

    public function updatePortfolio($portfoliomodel, $id)
    {
        $location = $portfoliomodel->getImage();
        $filter = $portfoliomodel->getFilter();
        $heading = $portfoliomodel->getHeading();
        $text= $portfoliomodel->getText();
        $id = $id;
        $update_query = "update portfolio set photo='$location',filter_class='$filter',heading='$heading',text='$text'where id='$id'";
        $this->db->update($update_query);
    }

    public function updatePortfolioWithOutImage($portfoliomodel, $id)
    {
        $filter = $portfoliomodel->getFilter();
        $heading = $portfoliomodel->getHeading();
        $text= $portfoliomodel->getText();
        $id = $id;
        $update_query = "update portfolio set filter_class='$filter',heading='$heading',text='$text'where id='$id'";
        $this->db->update($update_query);
    }

    

    public function deletePortfolio($id)
    {
        $query = "Delete FROM portfolio WHERE id ='$id'";
        $this->db->delete($query);
    }

    public function getPortfolioDetails()
    {
        $query = "SELECT * FROM portfolio";
        return $this->db->select($query);
    }


}
