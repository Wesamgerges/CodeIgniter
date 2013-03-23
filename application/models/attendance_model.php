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
    * ChurchMangementSystem attendance_model Class
    * 
    * Extends CI_Model Class
    *
    * Get all members that attend a specific meeting
    * 
    * @package     ChurchMangementSystem
    * @subpackage  Models
    * @category    Model
    * @author      Wesam Gerges
    * @link        
    */
    class attendance_model extends CI_Model{
    
        /**
         * Method getMembers
         *            
         * Get all members that attend a specific meeting
         * using the GET -> Meetings and GET -> currentMeetingId
         *
         * @access  public
         *
         * @return  Array   list of members 
         */
        function getMembers()
        {
            $MeetingId = 2;
            $currentMeetingId = 40;

            if(isset($_GET["Meetings"])) $MeetingId = $_GET["Meetings"];
            if(isset($_GET["currentMeetingId"])) $currentMeetingId = $_GET["currentMeetingId"];

            $persons = $this->db->query("
                                SELECT * 
                                FROM (
                                        SELECT * FROM ". 			
                                         PersonsTable.",". MemberMeetingTable.
                                       " WHERE ".PersonsTable.".id = ".MemberMeetingTable.".memberid
                                         AND meetingid = {$MeetingId}
                                           ) AS t

                            LEFT OUTER JOIN ".AttendanceTable.
                                " ON
                                        t.MemberId =  ".AttendanceTable.".memberid 
                                        AND ".AttendanceTable.".weeklyMeetingId = {$currentMeetingId}
                                        order by t.FirstName    					 
                        ");
         return ($persons->result());
        }
    }

?>
