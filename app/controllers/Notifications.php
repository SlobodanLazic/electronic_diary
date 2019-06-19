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
  }

  

}