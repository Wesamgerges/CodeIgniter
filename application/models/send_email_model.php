<?php
/**
 * Description of send_email_model
 *
 * @author Wesam Gerges
 */
class Send_email_model extends CI_Model {

    function getAllMeetings() {
        return $this->db->order_by("Mname")
                        ->get("meetings")
                        ->result();
    }

    function getWeeklyMeetings($meetingid = 2) {
        return $this->db->order_by("Date", "DESC")
                        //->where("meetingid",$meetingid)
                        ->get_where("weeklymeeting", array("meetingid" => $meetingid))
                        ->result();
    }

    function getAttendees() {
        $this->db->select('*');
        $this->db->from('person');
        $this->db->join('meetingattendance', ' person.id=meetingattendance.MemberId');
        $this->db->where(array("meetingattendance.weeklyMeetingId"=>$this->input->post("weeklymeeting")));
        $this->db->order_by("FirstName","ASC");
        $query = $this->db->get();
        return $query->result();
    }

    function getServants() {
        $this->db->select('*');
        $this->db->from(ServantsTable);
        $this->db->join(PersonsTable, ServantsTable.".Memberid = ".PersonsTable.".id");
        $this->db->where(array("meetingId"=>$this->input->post("Meetings")));
        $this->db->order_by("FirstName","ASC");
        $query = $this->db->get();
        return $query->result();
    }

        function getabsence() {
                 return $this->db->query(" SELECT * FROM membermeeting, person 
                           WHERE  membermeeting.meetingId = ".$this->input->post("Meetings")." AND  
                                    person.id = memberid  AND memberid  
                            NOT IN (
                                        SELECT memberid FROM meetingattendance 
                                        WHERE  meetingattendance.weeklyMeetingId = ".$this->input->post("weeklymeeting")."
                                     )
                                    ORDER BY FirstName;")->result();
    }

}

?>
