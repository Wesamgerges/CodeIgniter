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
    * ChurchMangementSystem show_all_persons_model Class
    * 
    * Extends CI_Model Class
    *
    *  Retrieves all Memebers Information.
    * 
    * @package     ChurchMangementSystem
    * @subpackage  Models
    * @category    Model
    * @author      Wesam Gerges
    * @link        
    */
     
class show_all_persons_model extends CI_Model{
    
     /**
      * Method get_all
      * 
      * Retrieves all Memebers Information.
      *
      * @access  public
      *
      * @return  Array List of members 
      */
    function get_all()
    {
       return $this
                ->db
                ->query(
                        "SELECT * 
                         FROM person, relations 
                         WHERE person.id = relations.MemberId 
                         ORDER BY FirstName"
                      );           
    }
}
?>


