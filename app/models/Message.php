<?php

class Message 
{

    private $db; 
    public function __construct()
    {
       $this->db = new Database(); 
    }


    public function get_messages($data)
    {
       $this->db->query('SELECT messages.id_messages,
                                messages.messages_time, 
                                messages.messages.content,
                                messages.from_id_user, 
                                messages.to_id_user 
                                FROM messages 
                                WHERE messages.message_status = 1 AND to_id_user = $data');
       
      $messages = $this->db->resultSet();

      return $messages; 
}