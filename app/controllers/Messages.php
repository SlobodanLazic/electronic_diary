<?php

class Messages extends Controller
{

    private $to_id_user; 

    public function __construct()
    {
       $this->to_id_user = $_SESSION['id_user']; 
       $this->messageModel = $this->model('Message');
    }

    public function get_messages() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $from_id_user = $_POST['from'];
        } else {
             $from_id_user = 0; 
        }
         $messages = $this->messageModel->getAll($this->to_id_user, $from_id_user); 

         $data = ['messages' => $messages ];

         $this->view('teacher/messages/index', $data);
    }
}