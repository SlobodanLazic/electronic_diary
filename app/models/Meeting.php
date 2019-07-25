<?php
/* this class(model of the Meetings) deals with data from meetings table in database */
class Meeting
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    //Insert Consultation
    public function insertConsultation($data)
    {
        $this->db->query("INSERT INTO meetings(meetings.meetings, meetings.meetings_status, meetings.meeting_view, meetings.teacher) 
                          VALUES (:datatime, 0, 0, :teacher)");
    
        $id_teacher = $_SESSION['id_user']; 
        $this->db->bind(':teacher', $id_teacher); 
        $this->db->bind(':datatime', $data);
        
        if($this->db->execute()) {
             return true; 
        } else {
            return false; 
        }
    }

    public function updateParent($data) 
    {
        $this->db->query("UPDATE meetings 
                          SET meetings.parent = :parent , meetings.meetings_status = 1 
                          WHERE meetings.id_meetings = :id_meetings"); 
        $this->db->bind(':parent', $data->parent); 
        $this->db->bind(':id_meetinds', $data->meetings);

        if($this->db->execute()) {
            return true;
        } else {
            return false; 
        }
    }


    public function updateTeacher($message, $id_meeting) 
    {
        $this->db->query("UPDATE meetings
                          SET meetings.meetings_status = 2, meetings.message = :message");

        $this->db->bind(':message', $message);
        $this->db->bind(':message', $id_meeting); 
        if($this->db->execute()) {
            return true; 
        } else {
            return false; 
        }                 
    }

    public function getUserId($id)
    {
        $this->db->query("SELECT * FROM users WHERE id_user = :id_user"); 
        $this->db->bind(':id_user', $id); 
        $row = $this->db->single(); 
        return $row; 
    }

    public function selectTeacher($id_user)
    {
        $this->db->query("SELECT id_meetings, meetings, parent, meetings_status
                          FROM meetings 
                          WHERE teacher = :teacher AND meetings > now() 
                          ORDER BY meetings.meetings ASC"); 
        
        $this->db->bind(':teacher', $id_user); 
        $result = $this->db->resultSet(); 
        return $result; 
    }
     /*
    public function selectParent($data) 
    {
        $this->db->query("");
        
        $this->db->bind();
        
        $this->db->
    }
    */
}
