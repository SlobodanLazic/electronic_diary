<?php
    class User extends Controller
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }
    }
    
?>