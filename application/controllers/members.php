<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Members RESFUL CLASS
 *
 */
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class members extends REST_Controller {

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