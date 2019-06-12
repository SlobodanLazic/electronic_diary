<?php
    class Student  
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

       
        // // Find user by email
        // public function findUserByEmail($email)
        // {
        //     $this->db->query('SELECT * FROM users WHERE email = :email');
        //     // Bind value
        //     $this->db->bind(':email', $email);

        //     $row = $this->db->single();

        //     // Check row
        //     if ($this->db->rowCount() > 0) {
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }

        // // Get User by ID
        // public function getUserById($id)
        // {
        //     $this->db->query('SELECT * FROM users WHERE id_user = :id');
        //     // Bind value
        //     $this->db->bind(':id', $id);

        //     $row = $this->db->single();

        //     return $row;
        // }


        public function insertStudent(){

            $this->db->query('INSERT INTO students (first_name , last_name , id_class) VALUES (:first_name , :last_name , :id_class)');

        }

        public function editStudent(){

            $this->db->query('UPDATE students SET first_name = :first_name , last_name = :last_name , id_class = :id_class');
            
        }


        public function deleteStudent(){

            $this->db->query('DELETE FROM students WHERE id_student = :id_student');
            
        }

        
        public  function showStudents(){



            
        }

    }

    
    
?>