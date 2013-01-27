<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login_Model
 *
 * @author Wesam Gerges
 */
class Login_Model extends CI_Model {
    
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
