<?php
class Student
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function insert($data)
    {
        $this->db->query('INSERT INTO subjects (name) VALUES (:name)');

        $this->db->bind(':name', $data['name']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function showallSubjects() {
        $this->db->query('SELECT name FROM subjects');

        $subjects = $this->db->resultSet();

        return $subjects;
    }
    public function edit()
    {
        $this->db->query('UPDATE subjects SET name = :name');
    }
    public function getSubjectId($id)
    {
        $this->db->query('SELECT * FROM subjects WHERE id_subject = :id_subject');

        $this->db->bind(':id_subject', $id);

        $row = $this->db->single();

        return $row;
    }


    public function delete($id)
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
        $this->db->query('UPDATE subjects name = :name WHERE id_subject = :id');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':id', $data['id_subject']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
