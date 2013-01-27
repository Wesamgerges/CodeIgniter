<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class add_family_model extends CI_Model {

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
