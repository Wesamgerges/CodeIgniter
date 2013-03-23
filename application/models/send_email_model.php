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
    * ChurchMangementSystem Send_email_model Class
    * 
    * Extends CI_Model Class
    *
    *  Send Emails to members
    * 
    * @package     ChurchMangementSystem
    * @subpackage  Models
    * @category    Model
    * @author      Wesam Gerges
    * @link        
    */
    class Send_email_model extends CI_Model {

        /**
        * Method getAllMeetings
        *
        * Get all Meetings
        * 
        * @access  public
        *
        * @return  Array List of all meetings
        */
        function getAllMeetings() {
            return $this
                    ->db
                    ->order_by("Mname")
                    ->get("meetings")
                    ->result();
        }
        //--------------------------------------------------------------------     
       /**
        * Method getWeeklyMeetings
        *
        * Get all weekly Meetings
        * 
        * @access  public
        * @param Integer $meeting id 
        *
        * @return  Array List of the meetings
        */
        function getWeeklyMeetings($meetingid = 2) {
            return $this->db->order_by("Date", "DESC")                            
                            ->get_where("weeklymeeting", array("meetingid" => $meetingid))
                            ->result();
        }
//-----------------------------------------------------------------------------        
        /**
         * Method getAttendees
         * 
         * Get all atteded members in a given meeting
         * 
         * @access  public
         *
         * @return  Array List of attendees
         */
        function getAttendees() {
            $this->db->select('*');
            $this->db->from('person');
            $this->db->join('meetingattendance', ' person.id=meetingattendance.MemberId');
            $this->db->where(array("meetingattendance.weeklyMeetingId"=>$this->input->post("weeklymeeting")));
            $this->db->order_by("FirstName","ASC");
            $query = $this->db->get();
            return $query->result();
        }
        //-------------------------------------------------------------------  
        
        /**
         * Method getServants
         *
         * Get all servants
         * 
         * @access  public
         *
         * @return  Array List of servants
         */
        function getServants() {
            $this->db->select('*');
            $this->db->from(ServantsTable);
            $this->db->join(PersonsTable, ServantsTable.".Memberid = ".PersonsTable.".id");
            $this->db->where(array("meetingId"=>$this->input->post("Meetings")));
            $this->db->order_by("FirstName","ASC");
            $query = $this->db->get();
            return $query->result();
        }
        //-----------------------------------------------------------------
        /**
         * Method getabsence
         * 
         * Get the list of members that did not attend the meeting
         *
         * @access  public
         *
         * @return  Array List of absent members 
         */
        function getabsence() {
            return $this
                   ->db
                    ->query("
                               SELECT * FROM membermeeting, person 
                               WHERE  membermeeting.meetingId = "
                                        .$this->input->post("Meetings")." AND  
                                      person.id = memberid  AND memberid  
                               NOT IN (
                                   SELECT memberid FROM meetingattendance 
                                   WHERE  meetingattendance.weeklyMeetingId = "
                                           .$this->input->post("weeklymeeting")."
                                )
                               ORDER BY FirstName;"
                            )->result();
       }

    }

?>
