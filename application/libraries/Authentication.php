<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
     * Church Managment System
     *
     * An online application to manage churches
     *
     * @package     Library
     * @author      Wesam Gerges
     * @copyright   
     * @license     
     * @link        
     * @since       Version 2.0
     * @filesource
     */
   
   // ------------------------------------------------------------------------
   
   /**
    * ChurchMangementSystem Authentication Class
    *
    * This class used to authonticate users to the system
    *
    * @package     ChurchMangementSystem
    * @subpackage  Library
    * @category    Library
    * @author      Wesam Gerges
    * @link        
    */
class Authentication {
        
    /**
      * Method get_userdata
      * 
      * Retrives the user information using the "user_id"      
      * from the session object.
      *
      * @access  public
      *
      * @return  Array user informaion
      */
    function get_userdata()
    {
        $CI =& get_instance();
        if(!$this->logged_in())
            return false;
        else {
          $query = $CI->db->query("SELECT firstname, lastname, email FROM users WHERE id = ? ",$CI->session->userdata("user_id") ) ;
          return $query->row();
        }
    }
    // ------------------------------------------------------------------------
    
    /**
      * Method logged_in
      * 
      * Checks if the user is loged in 
      *
      * @access  public
      *
      * @return  boolean 
      */
    function logged_in()
    {
      $CI =& get_instance();
      return ( $CI->session->userdata("user_id")) ? true : false;      
    }

    // ------------------------------------------------------------------------
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
    function login($username, $password)
    {
        $CI =& get_instance();
        $query = $CI->db->query("SELECT id,firstname, lastname FROM users WHERE username=? AND hashedpassword=?",array($username,sha1($password)));
        if($query->num_rows != 1 )
        {
            return "FALSE";
        }
        else
        {
            $CI->session->set_userdata("user_id",$query->row()->id);
            $CI->session->set_userdata("user_firstname",$query->row()->firstname);
            $CI->session->set_userdata("user_lastname",$query->row()->lastname);
            return $query->row()->firstname;
        }
    }
    // ------------------------------------------------------------------------
    /**
      * Logs out the current user
      * 
      * Clears the current session
      *        
      * @access  public
      *     
      */
    function logout()
    {
       // session_destroy();
        $CI =& get_instance();
        $CI->session->unset_userdata("user_id");
    }
}

?>
