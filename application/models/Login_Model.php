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
    * ChurchMangementSystem Login_Model Class
    * 
    * Extends CI_Model Class
    *
    * This class used to authonticate users to the system
    * 
    * This class uses the Authentication library to handle the operations for 
    * checking the users creditials
    *
    * @package     ChurchMangementSystem
    * @subpackage  Models
    * @category    Model
    * @author      Wesam Gerges
    * @link        
    */
     
class Login_Model extends CI_Model {
    
     /**
      * Method Login
      * 
      * Checks the user creditials (User Name and Password) 
      * if it matches the information in the database.
      * 
      * The password is encripted using sha1 algorithm.
      *
      * @access  public
      * @param   string User Name
      * @param   string Password
      *
      * @return  string 
      */
    public function login( $UserName , $password )
    {
       $query = $this -> db -> query (
                "SELECT id,username,firstname,lastname 
                          FROM users 
                          WHERE username='{$UserName}' AND hashedpassword='".sha1($password)."';");
                          
      if($query->num_rows > 0)
      {
         $firstname = $query ->result(); 
         $firstname = $firstname[0];
           echo "<div class='TopMessage success'>Welcome ".$firstname->firstname ."</div>";
      }
        
        else 
            echo "<div class='TopMessage error'> invalid user name or passsword</div>";

        
    }
}

?>
