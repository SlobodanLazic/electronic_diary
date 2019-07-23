<?php

class Meetings extends Controller
{
    public function __construct()
    {
        $this->meetingModel = $this->model('Meeting');

        $this->studentModel = $this->model('Student');
    }

    public function responses()  // teacner
    {

        $this->view('teacher/responses/index');
    }


    public function updateTeacher()
    {

        $status = (int) htmlspecialchars($_POST['message']);

        $id_meeting = (int) htmlspecialchars($_POST['id_meeting']);

        $this->meetingModel->updateTeacher($message, $id_meeting);
    }
}
