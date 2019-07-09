<?php

class Message 
{

    private $db; 
    public function __construct()
    {
       $this->db = new Database(); 
    }

    //Read new messager 
    public function getMessage($data)
    {
       $this->db->query('SELECT messages.message_time, 
                         messages.message_content
                         FROM messages WHERE messages.to_id_user = :to_id_user and 
                         messages.from_id_user = :from_id_user AND messages.message_status = :message_status'); 

        $this->db->bind(':to_id_user', $data['to_id_user']); 
        $this->db->bind(':from_id_user', $data['from_id_user']);
        $this->db->bind(':message_status', $data['message_status']); 
        
        $messages = $this->db->resultSet(); 

        return $messages; 
    }


    //Read all messages from user
   public function getAll($data)
   {
      $this->db->query('SELECT messages.id_messages,
	   messages.message_time,
       messages.message_content,
       messages.message_status, 
       messages.from_id_user,
       messages.to_id_user 
       FROM messages WHERE messages.to_id_user = :to_user_id and messages.from_id_user = :from_user_id 
       or messages.from_id_user = :to_user_id and messages.to_id_user = :from_user_id 
       ORDER BY messages.message_time asc '); 

      $this->db->bind("to_user_id", $data['to_id_user']);
      $this->db->bind("from_user_id", $data['from_id_user']);  

      $messages = $this->db->resultSet(); 

      return $messages; 
   }

   //Insert new message 
   public function new_message($data)
   {
      $this->db->query('INSERT INTO messages( message_content, message_status, from_id_user, to_id_user) VALUE (:message_content, :message_status, :from_id_user, :to_id_user)');

      $this->db->bind(':message_content', $data['message_content']); 
      $this->db->bind(':message_status', $data['message_status']); 
      $this->db->bind(':from_id_user', $data['from_id_user']); 
      $this->db->bind(':to_id_user', $data['to_id_user']); 

       // Execute
       if ($this->db->execute()) {
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