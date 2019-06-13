<?php
class Student
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function insertStudent($data)
    {

        $this->db->query('INSERT INTO students (first_name , last_name , id_school_class) VALUES (:first_name , :last_name , :id_school_class)');

        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':id_school_class', $data['id_school_class']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editStudent()
    {

        $this->db->query('UPDATE students SET first_name = :first_name , last_name = :last_name , id_class = :id_class');
    }


    public function deleteStudent()
    {

        $this->db->query('DELETE FROM students WHERE id_student = :id_student');
    }


    public  function showAllStudents()
    {

        $this->db->query('SELECT students.first_name , students.last_name , school_classes.name FROM students JOIN school_classes ON students.id_school_class = school_classes.id_school_class ');

        $students = $this->db->resultSet();

        return $students;
    }

    public function showAllClasses()
    {

        $this->db->query('SELECT * FROM school_classes');

        $classes = $this->db->resultSet();

        return $classes;
    }

    public function getStudentById($id_student)
    {

        $this->db->query('SELECT * FROM students WHERE id_student = :id_student');

        $this->db->bind(':id_student', $id);

        $row = $this->db->single();

        return $row;
    }
}
