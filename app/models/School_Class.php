<?php
class School_class
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }



    public function showAllClasses()
    {

        $this->db->query('SELECT * FROM school_classes');

        $classes = $this->db->resultSet();

        return $classes;
    }
}