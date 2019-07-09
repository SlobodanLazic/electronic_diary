<?php

class Message 
{

    private $db; 
    public function __construct()
    {
       $this->db = new Database(); 
    }


    //Read all messages from user
   public function getAll($to_user_id, $from_user_id)
   {
      $this->db->query('SELECT messages.id_messages,
	   messages.message_time,
       messages.message_content,
       messages.message_status, 
       messages.from_id_user,
       messages.to_id_user 
       FROM messages WHERE messages.to_id_user = :to_user_id and messages.from_id_user = :from_user_id 
       or messages.from_id_user = :to_user_id and messages.to_id_user = :from_user_id'); 

      $this->db->bind("to_user_id", $to_user_id);
      $this->db->bind("from_user_id", $from_user_id);  

      $messages = $this->db->resultSet(); 

      return $messages; 
   }

   //Insert new message 
   public function new_message($to_user_id, $from_user_id, $message_content, $message_staus)
   {
      $this->db->query('INSERT INTO messages(id_messages, message_content, message_status, from_id_user, to_id_user) VALUE (null, :message_content, :message_status, :from_id_user, :to_id_user)');

      $this->db->bind('message_content', $message_content); 
      $this->db->bind('message_status', $message_staus); 
      $this->db->bind('from_id_user', $from_user_id); 
      $this->db->dind('to_id_user', $to_user_id); 

      if($this->db->execut()) 
      {
          return true; 
      } else {
         return false; 
      }
   }


   //Update status message 
   public function update_status($id_message)
   {
      $this->db->query('UPDATE messages SET messages.message_status = 0 WHERE messages.id_messages = :id_message'); 

      $this->db->bind('id_message', $id_message); 
      
      if($this->db->execute())
      {
         return true; 
      } else {
         return false; 
      }
   }

   public function user_teacher()
   {

      $this->db->query("SELECT users.username , users.id_user FROM users WHERE users.id_user_role = 4 AND users.id_user IN
      
      
       (

      
         SELECT users_students.id_user FROM users_students WHERE users_students.id_student IN 
         
         (SELECT students.id_student FROM students WHERE students.id_school_class = :teacher_class_id)
         
         
         )
      
         
         ");

         $this->db->bind(':teacher_class_id' , $_SESSION['teacher_class_id']);

         $parents = $this->db->resultSet(); 

         return $parents; 

   }

}