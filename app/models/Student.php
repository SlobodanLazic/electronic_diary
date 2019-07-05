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
        $this->db->query('SELECT students.id_student , 
                                 students.first_name , 
                                 students.last_name , 
                                 school_classes.name , 
                                 school_classes.id_school_class 
                          FROM students 
                          JOIN school_classes 
                                ON students.id_school_class = school_classes.id_school_class ');

        $students = $this->db->resultSet();

        return $students;
    }

    /* this method is showing all students for perticular teacher */
    public function showStudentsToTeacher()
    {

    
        $id_teacher = (int)htmlspecialchars($_SESSION['id_user']);

    
        $this->db->query(' SELECT students.id_student,
                                 students.first_name,
                                 students.last_name
                            FROM students 
                                JOIN users ON users.teacher_class_id = students.id_school_class WHERE users.id_user = :id_teacher');

        $this->db->bind(':id_teacher', $id_teacher);

        $students = $this->db->resultSet();

        return $students;
    }
    
    /* this method is showing all students for perticular parent */
    public function showStudentsToParent()
    {
    
        $id_parent = (int)htmlspecialchars($_SESSION['id_user']);

        $this->db->query(' SELECT students.id_student,
                                    students.first_name,
                                    students.last_name
                            FROM students 
                                JOIN users_students ON students.id_student = users_students.id_student
                                JOIN users ON users_students.id_user = users.id_user
                            WHERE users_students.id_user = :id_parent');

        $this->db->bind(':id_parent', $id_parent);

        $students = $this->db->resultSet();

        return $students;
    }  

    public function getStudentById($id)

      // removed *

    {
        $this->db->query('SELECT students.id_student,  students.first_name , students.last_name , students.id_school_class FROM students WHERE id_student = :id_student');

        $this->db->bind(':id_student', $id);

        $row = $this->db->single();

        return $row;
    }

    public function update($data)
    {
        $this->db->query(
            'UPDATE students 
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
