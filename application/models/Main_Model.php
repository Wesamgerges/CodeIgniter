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
    * ChurchMangementSystem Main_Model Class
    * 
    * Extends CI_Model Class
    *
    * Builds the Main page menus
    *
    * @package     ChurchMangementSystem
    * @subpackage  Models
    * @category    Model
    * @author      Wesam Gerges
    * @link        
    */
     
class Main_Model extends CI_Model {
    
     /**
      * Method get_Menus
      * 
      * Get all the active pages to be build in the main menu
      *
      * @access  public
      *
      * @return  Array List Pages
      */
    public function get_Menus()
    {
	$GetMenuItems =  $this 
                            -> db 
                            -> query(
                                        "SELECT * 
                                         FROM ". Pages . 
                                        " WHERE showinmenu = 1;"
                                    );
	return $GetMenuItems -> result();
    }
}

?>
