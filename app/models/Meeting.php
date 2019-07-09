<?php
    /* this class(model of the Meetings) deals with data from meetings table in database */
    class Meeting  
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }
        //Insert Request
        public function insertRequest($inputData)
        {
            $this->db->query('INSERT INTO meetings(meetings, meetings_status, from_id_user, to_id_user) 
                              VALUES (:meetings, :meetings_status, :from_id_user, :to_id_user)');
            // Bind values
            $this->db->bind(':meetings',$inputData['datetime']);
            $this->db->bind('meetings_status',$inputData['student']);
            $this->db->bind(':from_id_user',$inputData['id_user']);
            
            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
    
?>