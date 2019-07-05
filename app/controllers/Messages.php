<?php

class Messages extends Controller
{

    private $id_user; 

    public function __construct()
    {
       $this->id_user = $_SESSION['id_user']; 
       $this->messageModel = $this->model('Message');
    }

    public function query_messages() {
         $messages = $this->messageModel->get_messages($this->id_user); 

         $this->view('')
    }
}