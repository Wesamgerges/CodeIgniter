<?php

 /**
     * Church Managment System
     *
     * An online application to manage churches
     *
     * @package     Models
     * @author      Wesam Gerges
     * @copyright   
     * @license     
     * @link        
     * @since       Version 2.0
     * @filesource
     */
   
   // ------------------------------------------------------------------------
   
   /**
    * ChurchMangementSystem add_family_model Class
    * 
    * Extends CI_Model Class
    *
    * Add Family Class
    * 
    * @package     ChurchMangementSystem
    * @subpackage  Models
    * @category    Model
    * @author      Wesam Gerges
    * @link        
    */

class add_family_model extends CI_Model {

     /**
        * Method add_family
        * 
        * Add family to the database, base on the information passed from the
        * controller
        * 
        * @access  public
        *
        * @return  stirng Confirmation 
        */
    function add_family() {
        // save the family and return the family id
        if (!( $this->input->post("FirstName1") == "" )) {
            $this->db->query
                    ("INSERT INTO family (HouseNo,Floor,street,City,State,ZIP)
	                            VALUES('" . $this->input->post("HouseNo") . "','" . $this->input->post("Floor") . "','" . $this->input->post("Street") . "',
	                            '" . $this->input->post("City") . "','" . $this->input->post("State") . "','" . $this->input->post("ZIP") . "')");
          
            $FamilyID =  $this->db->insert_id();
            // ITERATE FOR EACH PERSON
            for ($NoPersons = 1; $NoPersons <= $this->input->post("NoPersons"); $NoPersons++) {
                if (( $this->input->post("FirstName" . $NoPersons) == ""))
                    break;
            
                $this->db->query
                        ("INSERT INTO person (FirstName,LastName,native_name,Phone,DOF,Email,status)
		                       VALUES ('" . $this->input->post("FirstName" . $NoPersons) . "','" . $this->input->post("LastName" . $NoPersons) . "','" . $_POST["native_name" . $NoPersons] . "','" . $_POST["Phone" . $NoPersons] . "',
		                       '','" . $this->input->post("Email" . $NoPersons) . "'," . $this->input->post("Status" . $NoPersons) . ");");
              $MemberId =  $this->db->insert_id();
                $this->db->query("INSERT INTO relations (FamilyId,MemberId,MemberShipType)
		                      VALUES (" . $FamilyID . "," . $MemberId . "," . $NoPersons . ");");
            }
            
            
            //$result = mysql_query("SET NAMES utf8");//the main 
            echo "Saved";
        }
    }

}

?>
