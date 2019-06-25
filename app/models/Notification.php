<?php
    class Notification
    {
        private $db;
        public function __construct()
        {
            $this->db = new Database();

        }

        public function insertNotification($data)
        {
            $this->db->query('INSERT INTO parent_notifications (notification_content) VALUES (:notification_content)');

     
            $this->db->bind(':notification_content', $data['notification_content']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }

        public function getMessage()
        {
            $this->db->query('SELECT * FROM parent_notifications');
            $notification = $this->db->resultSet();
            return $notification;
    
        }

        

        public function editNotification()
        {
            $this->db->query('UPDATE parent_notifications SET  notification_content = :notification_content');

        }

       public function deleteNotification($id)
       {
           $this->db->query('DELETE FROM parent_notifications');
         

           if($this->db->execute()){
                return true;
            } else {
                return false;
            }

       }

    //    public function update($data)
    //    {
    //        $this->db->query('UPDATE parent_notifications SET id_parent_notification = :id_parent_notification, notification_content = :notification_content WHERE id_parent_notification = :id');

    //        $this->db->bind(':id_parent_notification', $data['id_parent_notification']);
    //        $this->db->bind(':notification_content', $data['notification_content']);
    //     }




    }
