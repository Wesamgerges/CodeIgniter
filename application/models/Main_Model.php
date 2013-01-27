<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main_Model
 *
 * @author Wesam Gerges
 */
class Main_Model extends CI_Model {
    
    public function get_Menus()
    {
	$GetMenuItems =  $this -> db -> query("SELECT * FROM ". Pages . " WHERE showinmenu = 1;");
	return $GetMenuItems -> result();
    }
}

?>
