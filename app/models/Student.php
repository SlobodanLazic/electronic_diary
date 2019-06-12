<?php
    class Student  
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }


        public function insertStudent(){

            $this->db->query('INSERT INTO students (first_name , last_name , id_class) VALUES (:first_name , :last_name , :id_class)');

        }

        public function editStudent(){

            $this->db->query('UPDATE students SET first_name = :first_name , last_name = :last_name , id_class = :id_class');
            
        }


        public function deleteStudent(){

            $this->db->query('DELETE FROM students WHERE id_student = :id_student');
            
        }

        
        public  function showAllStudents(){

            $this->db->query('SELECT * FROM students');

            $users = $this->db->resultSet();

            return $users;

        
        }

        public function getStudentById($id_student){

            $this->db->query('SELECT * FROM students WHERE id_student = :id_student');

            $this->db->bind(':id_student', $id);

            $row = $this->db->single();

            return $row;

        }

    }

    
    
?>