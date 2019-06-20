<?php

class Notifications extends Controller
{

  public function __construct()
  {
    $this->notificationModel = $this->model('Notification');
 
  }

  public function insert()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
        $data = [
          'notification_content' => trim($_POST['notification_content']),
    
          'notification_content_err' => '',
        ];


        if (empty($data['notification_content_err'])) {
           
            if ($this->notificationModel->insertNotification($data)) {
            
              flash('notification_message', 'Notification Added');
              redirect('/notification');
            } else {
              die('Something went wrong');
            }
          } else {
            
            $this->view('notification/insert', $data);
          }
        } else {
          $data = [
            'notification_content' => '',
          ];

    
          $this->view('notification/insert', $data);
        }
      }



      public function edit($id)
      {

            $notifications = $this->notificationModel->showAllNotifications();


            $data = [

              'notifications' => $notifications

            ];

        }

        public function delete($id)
        {
      
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
            if ($this->notificationModel->deleteNotification($id)) {
      
              flash('notification_deleted_msg', 'Notification Deleted');
      
              redirect('notifications');
            } else {
      
              die('Something went wrong');
            }
          } else {
      
            redirect('notification/insert.php');
          }
        }

        public function update()
        {
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
              'notification_content' => trim($_POST['notification_content']),

              'notification_content_err' => ''
            ];

           
            if (empty($data['notification_content'])) {
              $data['notification_content_err'] = 'Please enter your message';
            }


        
            if (empty($data['notification_content_err'])) {
              if ($this->notificationModel->update($data)) {
                flash('notification_updated', 'Notification Updated');
                redirect('notification/insert.php');
              } else {
                die('Something went wrong');
              }
            } else {

              $this->view('notification/insert.php', $data);
            }
          } else {
            $data = [

              'notification_content' => '',
              'notification_content_err' => '',

            ];


       
          }
        }
          
    }
  
  
  

