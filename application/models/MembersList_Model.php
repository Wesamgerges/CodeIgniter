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
    * ChurchMangementSystem MembersList_Model Class
    * 
    * Extends CI_Model Class
    *
    * Get all members 
    * 
    * @package     ChurchMangementSystem
    * @subpackage  Models
    * @category    Model
    * @author      Wesam Gerges
    * @link        
    */
    class MembersList_Model extends CI_Model
    {
          
        /**
         * Method getMembersList
         *            
         * Get all members
         *
         * @access  public
         *
         * @return  Array   list of members 
         */
            public function getMembersList()
            {
                    $membersList = $this->db->get('person');
                    return $membersList ->result_array();
            }
    }
?>