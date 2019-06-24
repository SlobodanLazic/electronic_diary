<?php
class School_class
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function update($data)
    {


        $this->db->query('UPDATE school_classes SET name = :name WHERE id_school_class = :id');

        $this->db->bind(':id', $data['id_school_class']);

        $this->db->bind(':name', $data['name']);



        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



    public function showAllClasses()
    {

        $this->db->query('SELECT * FROM school_classes');

        $classes = $this->db->resultSet();

        return $classes;
    }

    public function getClassById($id)
    {
        $this->db->query('SELECT * FROM school_classes WHERE id_school_class = :id_class');

        $this->db->bind(':id_class', $id);

        $row = $this->db->single();

        return $row;
    }

    public function deleteClass($id)
    {

        $this->db->query('DELETE FROM school_classes WHERE id_school_class = :id_school_class');

        $this->db->bind(':id_school_class', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Insert class

    public function insertClass($data)
    {
        $this->db->query('INSERT INTO school_classes(name) VALUES (:name)');
        // Bind values
        $this->db->bind(':name', $data['name']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
