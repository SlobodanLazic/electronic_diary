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
    public function insertConsultation()
    {
<<<<<<< HEAD
        $this->db->query("INSERT INTO meetings(meetings.meetings, meetings.meetings_status, meetings.meetings_view, meetings.teacher)
                          VALUES (now(), :status, 0, 0, :teacher)");
        
        $id_teacher = $_SESSION['id_user']; 
        $this->db->bind(':teacher', $id_teacher); 
        
        if($this->db->execute()) {
             return true; 
        } else {
            return false; 
        }
    }
=======
        $meetings_status = 0;
        $to_id_user = $this->getTeacherOfStudent($inputData['student']);

        $this->db->query('INSERT INTO meetings(meetings, meetings_status, from_id_user, to_id_user) 
                          VALUES (:meetings, :meetings_status, :from_id_user, :to_id_user)');

        // Bind values
        $this->db->bind(':meetings', $inputData['datetime']);
        $this->db->bind('meetings_status', $meetings_status);
        $this->db->bind(':from_id_user', $inputData['id_user']);

        if (!empty($to_id_user) && is_object($to_id_user)) {
            $this->db->bind(':to_id_user', $to_id_user->id_user);

            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else if ($to_id_user === false) {
            return false;
        }
    }
    // This method gets teacher of perticular student
    protected function getTeacherOfStudent($id_student = '')
    {
        $this->db->query('SELECT users.id_user
                              FROM users JOIN students ON users.teacher_class_id = students.id_school_class
                              WHERE users.id_user_role = 3 
                              AND students.id_student = :id_student');
        // Bind values
        $this->db->bind(':id_student', $id_student);
>>>>>>> 321a15fc985f40a4d8ae65f1c2097b5c5196e62d

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

<<<<<<< HEAD
        $this->db->bind(':message', $message);
        $this->db->bind(':message', $id_meeting); 
        if($this->db->execute()) {
            return true; 
        } else {
            return false; 
        }                 
=======
        $this->db->query('SELECT meetings.id_meetings , meetings.meetings , meetings.meetings_status, users.username , meetings.to_id_user 
                          FROM meetings 
                          JOIN users ON users.id_user = meetings.from_id_user 
                          WHERE meetings.to_id_user = :id_teacher AND meetings.meetings > now()
                          ORDER BY meetings.meetings ASC');

        $id_teacher = (int) htmlspecialchars($_SESSION['id_user']);

        // Bind values
        $this->db->bind(':id_teacher', $id_teacher);

        $meetings = $this->db->resultSet();

        return $meetings;
>>>>>>> 321a15fc985f40a4d8ae65f1c2097b5c5196e62d
    }


    public function selectTeacher($data)
    {
<<<<<<< HEAD
        $this->db->query("SELECT id_meetings, meetings, parent, meetings_status
                          FROM meetings 
                          WHERE teacher = :teacher AND meetings > now() "); 
        
        $this->db->bind(':teacher', $data->id_user); 
        $result = $this->db->resultSet(); 
        return $result; 
    }
     ///// Odraditi select da se ispise kod parenta....    
}
=======

        $this->db->query('UPDATE meetings
                          SET meetings.meetings_status = :meeting_status
                          WHERE meetings.id_meetings = :id_meeting');

        $this->db->bind(':meeting_status', $meetingStatus);
        $this->db->bind(':id_meeting', $id_meeting);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    //Parent
    public function showAllStatus() {
        $this->db->query('SELECT meetings.meetings_status,meetings.to_id_user, meetings.meetings
                          FROM meetings 
                          WHERE meetings.from_id_user = :id_user 
                          AND meetings.meetings > now()
                          ORDER BY meetings.meetings DESC');

        $id_user = (int)$_SESSION['id_user']; 
        $this->db->bind(':id_user', $id_user); 
        $meetings = $this->db->resultSet();
        return $meetings;
    }

        // SHOW NEXT MEETING TIME

        public function showNextMeeting(){

            $this->db->query('SELECT meetings.meetings
            
                              FROM meetings 
                              
                              ORDER BY meetings DESC
                              
                              LIMIT 1');
    
            $nextMeeting = $this->db->single(PDO::FETCH_ASSOC);
    
            return $nextMeeting;
    
        }
}
>>>>>>> 321a15fc985f40a4d8ae65f1c2097b5c5196e62d
