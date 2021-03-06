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
    * ChurchMangementSystem MemberSearch_Model Class
    * 
    * Extends CI_Model Class
    *
    * Member search
    * 
    * @package     ChurchMangementSystem
    * @subpackage  Models
    * @category    Model
    * @author      Wesam Gerges
    * @link        
    */
     
class MemberSearch_Model extends CI_Model {

     /**
      * Method Search
      * 
      * Redirects to the right function
      * according to the criteria
      * 
      * Name    :   SearchByName
      * Native  :   SearchByNativeName
      * Phone   :   SearchByPhone
      * Email   :   SearchByEmail
      * 
      * @access  public
      * @param   string Word
      * @param   string Criteria
      *
      * @return  string 
      */
    public function Search($word, $criteria) 
    {
        if ($word == "")
            return "";

        switch ($criteria) {
            case "Name":
                return $this->SearchByName($word);
            case "Native":
                return $this->SearchByNativeName($word);                
            case "Phone":
                return $this->SearchByPhone($word);
            case "Email":
                return $this->SearchByEmail($word);
        }
    }
//------------------------------------------------------------------------------
    
     /**
      * Method SearchByPhone
      * 
      * Searches for the members using phone number
      * 
      * @access  public
      * @param   string Phone Number
      *
      * @return  string Search results
      */
    public function SearchByPhone($PhoneNo) {
        $results = $this->db->query
                (
                "SELECT id,firstname,lastname,phone 
                FROM person 
                WHERE Phone like ? 
                "
                , '%' . $PhoneNo . '%'
        );

        if ($results->num_rows < 1)
            return "";

        $htmlResults = "";
        $i = 1;
        foreach ($results->result() as $row) {
            $htmlResults .= '<li id = "' . $i++ . '" type = "none" value = "' . $row->id . '" onClick="getSelectedItem($(this).val());" onmouseover = "setSelectItem($(this).attr(\'id\'));"> ' .
                    '<table valign="TOP" border="0" class="SearchItemResult" >
                        <tr>
                             <td align = "center" width = "50px" rowspan = "2" >' .
                                '<img src = "include/images/cross-icon.png" width = "50px" height = "50px" style="width:50px;height:50px;" align = "middle" />                                
                            </td>
                            <td align = "left" style="font-weight : 100; color:#999">' 
                               . str_replace_occurance($PhoneNo,'<strong style="color:black;">'.$PhoneNo.'</strong>',$row->phone,1) .
                            '</td>
                        </tr>
                        <tr>
                            <td width = "150px">
                                <span style = "font-size: 16px;align:right; border:solid 0px black;" >' . $row->firstname . ' ' . $row->lastname . '</span>'.                                               
                    '</td>                                                                               
                          </tr>
                       </table> ' .
                    '</li><hr>';
        }
        return $htmlResults;
    }
//------------------------------------------------------------------------------
    
     /**
      * Method SearchByEmail
      * 
      * Searches for the members by Email address
      * 
      * @access  public
      * @param   string Email
      *
      * @return  string Search results
      */    
    public function SearchByEmail($Email) {
        $results = $this->db->query
                (
                "SELECT id,firstname,lastname,Email 
                FROM person 
                 WHERE Email like ? 
                "
                , $Email . '%'
        );

        if ($results->num_rows < 1)
            return "";

        $htmlResults = "";
        $i = 1;
        foreach ($results->result() as $row) {
            $htmlResults .= '<li id="' . $i++ . '" type="none" value="' . $row->id . '" onClick="getSelectedItem($(this).val());" onmouseover = "setSelectItem($(this).attr(\'id\'));"> ' .
                    '<table valign="TOP" border="0" class="SearchItemResult" style="font-size: 14px;" ><tr><td width="150px">' . $row->Email . '</td><td align="left" > <span style="font-size: 14px;align:right; border:solid 0px black;" >' . $row->firstname . ' ' . $row->lastname . '</span></td><td align="right" width="50px">' .
                    '<img src="include/images/cross-icon.png" width= "50px" height = "50px" align = "middle" /></td></tr></table> ' .
                    '</li>';
        }
        return $htmlResults;
    }
//------------------------------------------------------------------------------
    
     /**
      * Method SearchByName
      * 
      * Searches for the members by Name
      * 
      * You can search using either the first name or last name or both
      * 
      * @access  public
      * @param   string Name
      *
      * @return  string Search results
      */    
    public function SearchByName($word) {

        $words = explode(" ", $word);
        if (count($words) < 2)
            $words[1] = "";

        $results = $this->db->query
                (
                "SELECT id,firstname,lastname 
                FROM person 
                WHERE firstname LIKE ? 
                AND   lastname  LIKE ? 
                "
                , array($words[0] . '%', $words[1] . '%')
        );
        if ($results->num_rows < 1)
            return "";

        $htmlResults = ""; 
        $i = 1;
        foreach ($results->result() as $row) {
            $htmlResults .= '<li id="' . $i++ . '" type="none" value="' . $row->id . '" onClick="getSelectedItem($(this).val());" onmouseover = "setSelectItem($(this).attr(\'id\'));"> ' .
                    '<table valign="TOP"  class="SearchItemResult" >
                        <tr>
                        <td style="font-weight : 100; color:#999"> &nbsp;' .  str_replace_occurance($words[0],'<strong style="color:black;">'.ucfirst($words[0]).'</strong>',$row->firstname ,1). ' ' . str_replace_occurance($words[1],'<strong style="color:black;">'.ucfirst($words[1]).'</strong>',$row->lastname ,1). '</td>
                            <td align="right" width="50px">' .
                    '<img src="include/images/cross-icon.png" style="width:50px;height:50px;" width = "50px" height = "50px" align = "middle" />
                        </td>
                      </tr>
                     </table> ' .
                    '</li>';
        }
        
        return $htmlResults;
    }
//------------------------------------------------------------------------------
    
     /**
      * Method SearchByNativeName
      * 
      * Searches for the members by native Name
      * 
      * Search for members using their native names in their native language
      * 
      * @access  public
      * @param   string Name
      *
      * @return  string Search results
      */    
        public function SearchByNativeName($word) {

        $words = explode(" ", $word);
        if (count($words) < 2)
            $words[1] = "";

        $results = $this->db->query
                (
                "SELECT id,firstname,lastname , native_name
                FROM person 
                WHERE native_name LIKE ? 
                "
                , array($words[0] . '%' . $words[1] . '%')
        );
        if ($results->num_rows < 1)
            return "";

        $htmlResults = ""; 
        $i = 1;
        foreach ($results->result() as $row) {
             $name = explode(" ", $row->native_name);
             if (count($name) < 2)
            $name[1] = "";
            
            $str = str_replace_occurance2($words[0],array('<strong style="color:black;">','</strong>'),$name[0] ,1);
            $htmlResults .= '<div dir="rtl" style="margin:auto 7px auto auto;"><li dir="rtl" id="' . $i++ . '" type="none" value="' . $row->id . '" onClick="getSelectedItem($(this).val());" onmouseover = "setSelectItem($(this).attr(\'id\'));"> ' .
                    '<table valign="TOP" class="SearchItemResult" dir="rtl">
                        <tr>
                        <td align="right" style="font-weight : 100; color:#999">  &nbsp;' . $str.' ' . str_replace_occurance2($words[1],array('<strong style="color:black;">','</strong>'),$name[1] ,1). '</td>
                            <td align="right" width="50px">' .
                    '<img src="include/images/cross-icon.png" style="width:50px;height:50px;" width = "50px" height = "50px" align = "middle" />
                        </td>
                      </tr>
                     </table> ' .
                    '</li></div>';
        }
        
        return $htmlResults;
    }
//------------------------------------------------------------------------------
    
     /**
      * Method SearchByNativeName
      * 
      * Searches for the members by native Name
      * 
      * Search for members using their native names in their native language
      * 
      * @access  public
      * @param   string Name
      *
      * @return  string Search results
      */  
    public function GetMemberInformation($memberId) {
        $results = $this
                    ->db
                    ->query(
                                "SELECT id,firstname,lastname,phone,Email
                                FROM person 
                                WHERE id = {$memberId}
                                "
                           );

        $htmlResults = ""; 
        foreach ($results->result() as $row) {
            $htmlResults .= '
               <table valign="TOP" border=0 width = "700px" cellpadding=0 cellspacing=0 class="displayInfo"  >
                <tr style="background: #AAA;font-size:18px;color:blue;font-weight: 200;">    	
                    <td>
                         Id
                    </td>
                    <td >
                        First Name
                    </td>
                    <td >
                        Last Name
                    </td>

                    <td >
                        Phone
                    </td>
                    <td >
                        Email
                    </td>
                    <td >
                        Picture
                    </td>
                </tr>' .
                    '<tr>
                   <td>' . $row->id . '</td>
                   <td>' . $row->firstname . '</td>
                   <td> ' . $row->lastname . ' </td>
                   <td>' . $row->phone . '</td>
                   <td >' . str_replace(',','<br/>',$row->Email) . '</td>
                   <td align="right" width="50px">' .
                    '<img src="include/images/cross-icon.png" style="width:50px;height:50px;" width= "50px" height = "50px" align = "middle" />
                   </td>
                </tr>
             </table> ';
        }

        return $htmlResults;
    }

}
//------------------------------------------------------------------------------
    
     /**
      * Method str_replace_occurance
      * 
      * Replaces the first occurance of a string.
      * 
      * Used to highlight the seaching word in the search result
      * 
      * 
      * @access  public
      * @param   string Search
      * @param   string $replace
      * @param   string $subject
      * @param   Integer $occurance
      * 
      * @return  string The highlighted string
      */  
    function str_replace_occurance($search, $replace, $subject, $occurance) {
       $pos = 0;
       for ($i = 0; $i <= $occurance; $i++) {
           $pos = stripos($subject, $search, $pos);
       }
       /*
        * if($pos == strlen($subject)-1)// so this the end of the string no more charaters after is
        * 
        * || 
        * 
        *  if( $subject[$pos+1] == ' ') // also nothing to be done;
        * 
        * ||
        * if ($subject[$pos+1] is in the array of the non-conecting charcters)in_array)[اوذرزةءد]
        * 
        * else add '_'
        * {
        *   
        *
        * }
        */
       return substr_replace($subject, $replace, $pos, strlen($search));
    }
//------------------------------------------------------------------------------
    
     /**
      * Method str_split_unicode
      * 
      * Split strings contains unicode charchters
      * 
      * This function used when dealing with languages other than English
      * 
      * To split a string contains unicode charchters the str_split function
      * build in PHP does not work. So you need to use this function
      * 
      * @access  public
      * @param   string  str
      * @param   Integer Lenght
      *
      * @return  string The splited string
      */  
    function str_split_unicode($str, $l = 0) {
        if ($l > 0) {
            $ret = array();
            $len = mb_strlen($str, "UTF-8");
            for ($i = 0; $i < $len; $i += $l) {
                $ret[] = mb_substr($str, $i, $l, "UTF-8");
            }
            return $ret;
        }
        return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
    }
//------------------------------------------------------------------------------
        
     /**
      * Method str_replace_occurance2
      * 
      * Replaces the first occurance of a string contains a unicode charchters.
      * 
      * Used to highlight the seaching word in the search result
      * 
      * @access  public
      * @param   string Search
      * @param   string $replace
      * @param   string $subject
      * @param   Integer $occurance
      * 
      * @return  string The highlighted string
      */  
    function str_replace_occurance2($search, $replace, $subject, $occurance) {
       $pos = 0;
       for ($i = 0; $i <= $occurance; $i++) {
           $pos = stripos($subject, $search, $pos);
       }
       /*
        * if($pos == strlen($subject)-1)// so this the end of the string no more charaters after is
        * 
        * || 
        * 
        *  if( $subject[$pos+1] == ' ') // also nothing to be done;
        * 
        * ||
        * if ($subject[$pos+1] is in the array of the non-conecting charcters)in_array)[اوذرزةءد]
        * 
        * else add '_'
        * {
        *   
        *
        * }
        */  
       $arr1 = str_split_unicode( $subject);

       $ar = array('د','ء','ة','ز','ر','ذ','و','ا');

       if(      strlen($search)<1                           || 
               ($pos+strlen($search)) == strlen($subject)   ||
               $arr1[$pos+(strlen($search)/2)-1] == ' '     || 
               in_array($arr1[$pos+strlen($search)/2-1],$ar)
         )

           return substr_replace(
                                    $subject, 
                                    $replace[0].$search.$replace[1], 
                                    $pos, strlen($search)
                                );
       else
           return substr_replace(
                                    $subject, 
                                    $replace[0].$search."ـ".$replace[1], 
                                    $pos, strlen($search)
                                );

    }

?>
