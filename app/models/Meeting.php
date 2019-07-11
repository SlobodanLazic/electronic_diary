<?php
/* this class(model of the Meetings) deals with data from meetings table in database */
class Meeting
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    //Insert Request
    public function insertRequest($inputData)
    {
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
                              WHERE users.id_user_role = 3 AND students.id_student = :id_student');
        // Bind values
        $this->db->bind(':id_student', $id_student);

        $id_teacher =  $this->db->single();

        return $id_teacher;
    }


    public function getMeetingsByTeacherId()
    {

        $this->db->query('SELECT meetings.id_meetings , meetings.meetings , meetings.meetings_status, users.username , meetings.to_id_user FROM meetings JOIN users ON users.id_user = meetings.from_id_user WHERE meetings.to_id_user = :id_teacher AND meetings.meetings_status = 0');

        $id_teacher = (int) htmlspecialchars($_SESSION['id_user']);

        // Bind values
        $this->db->bind(':id_teacher', $id_teacher);

        $meetings = $this->db->resultSet();

        return $meetings;
    }
}
