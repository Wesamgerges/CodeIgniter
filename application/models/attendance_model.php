<?php
/**
 * Description of attendance_model
 *
 * @author Owner
 */
class attendance_model extends CI_Model{
    
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
