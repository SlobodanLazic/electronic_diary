<?php
class Student
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
        $this->db->ind(':id_subject', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function update($data)
    {
        
    }
}
