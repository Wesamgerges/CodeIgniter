<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
     * Church Managment System
     *
     * An online application to manage churches
     *
     * @package     Controllers
     * @author      Wesam Gerges
     * @copyright   
     * @license     
     * @link        
     * @since       Version 2.0
     * @filesource
     */
   
   // ------------------------------------------------------------------------
   
   /**
    * ChurchMangementSystem members Class
    *
    * Extends REST_Controller Class
    * 
    * This a RESTful API to access member information
    *  
    *
    * @package     ChurchMangementSystem
    * @subpackage  Controllers
    * @category    Controller
    * @author      Wesam Gerges
    * @link        
    */

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class members extends REST_Controller {
    /**
     * Method member_get
     * 
     * Retrieves the user information through
     * the get request 
     *
     * @access  public   
     * 
     * @return array a response to the request   
     */
    function member_get() {
        if (!$this->get('id')) {
            $this->response(NULL, 400);
        }

        $this->db->select('*');
        $this->db->join('relations', 'relations.memberid = person.id');
        $this->db->join('family', 'family.id = relations.familyid');
        $this->db->where("person.id = " . $this->get('id'));
        $arr = @$this->db->get("person")->result();
        
        if ($arr) {
            $this->response($arr[0], 200);  // 200 being the HTTP response code
        } else {
            $this->response(array('error' => 'User could not be found'), 404);
        }
    }

}