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


    public function deleteStudent($id)
    {
        $this->db->query('DELETE FROM students WHERE id_student = :id_student');

        $this->db->bind(':id_student', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function showAllStudentsJoinClasses()
    {
        $this->db->query('SELECT students.id_student , students.first_name , students.last_name , school_classes.name , school_classes.id_school_class FROM students JOIN school_classes ON students.id_school_class = school_classes.id_school_class ');

        $students = $this->db->resultSet();

        return $students;
    }

    


    public function getStudentById($id)
    {
        $this->db->query('SELECT * FROM students WHERE id_student = :id_student');

        $this->db->bind(':id_student', $id);

        $row = $this->db->single();

        return $row;
    }

    public function update($data)
    {
        $this->db->query('UPDATE students 
                          SET   first_name = :first_name, 
                                last_name = :last_name, 
                                id_school_class = :id_school_class 
                          WHERE id_student = :id'
                        );
             
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':id_school_class', $data['id_school_class']);
        $this->db->bind(':id', $data['student_id']);


             
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
