<?php
/**
 * Description of show_all_persons_model
 *
 * @author Wesam Gerges
 */
class show_all_persons_model extends CI_Model{
    
    function get_all(){
       return $this->db->query
                ("SELECT * FROM person,relations WHERE person.id=relations.MemberId ORDER BY FirstName");   
        
    }
}
?>


