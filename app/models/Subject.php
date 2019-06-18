<?php
class Subject
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function insertSubject($data)
    {
        $this->db->query('INSERT INTO subjects (name) VALUES (:name)');

        $this->db->bind(':name', $data['name']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editSubject()
    {
        $this->db->query('UPDATE subjects SET name = :name');
    }


    public function deleteSubject($id)
    {
        $this->db->query('DELETE FROM subjects WHERE id_subject = :id_subject');

        $this->db->bind(':id_subject', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function showAllSubjects()
    {
        $this->db->query('SELECT name FROM subjects ');

        $subjects = $this->db->resultSet();

        return $subjects;
    }


    public function getSubjectById($id)
    {
        $this->db->query('SELECT * FROM subjects WHERE id_student = :id_student');

        $this->db->bind(':id_student', $id);

        $row = $this->db->single();

        return $row;
    }

    public function update($data)
    {
        $this->db->query('UPDATE subjects SET name = :name WHERE id_student = :id');
             
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':id', $data['student_id']);


             
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
