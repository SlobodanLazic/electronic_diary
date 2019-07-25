<?php

class Meetings extends Controller
{
    public function __construct()
    {
        $this->meetingModel = $this->model('Meeting');

        $this->studentModel = $this->model('Student');

        $this->userModel = $this->model('User');
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

    public function showTeacher()
    {
        $id_user = $_SESSION['id_user'];

        $meetings = $this->meetingModel->selectTeacher($id_user);


        $arreyMeetings = array();

<<<<<<< HEAD
        $arreyMeetings = array(); 
 
        foreach($meetings as $value) {
            
            if($value->parent !== null){    
                $user = $this->meetingModel->getUserId($value->parent); 
                $name = $user->username;
            } else {
                $user = ""; 
                $name = ""; 
            }
                $div = "<button class='btn btn-danger  btn-sm' onclick='m_casel(".$value->id_meetings.")' type='button'>Cansel</button>"; 
                
=======
        foreach ($meetings as $value) {

            $user = $this->userModel->getUserById($value->parent);

            $div = "<button class='btn btn-danger  btn-sm' onclick='m_casel(" . $value->id_meetings . ")' type='button'>Cansel</button>";
            $name = $user->username;
>>>>>>> fbac48d9b367b91bc85b61b9a44e65800b669b25
            array_push($arreyMeetings, [
                "id" => $value->id_meetings,
                "meetings" => $value->meetings,
                "status" => $value->meetings_status,
                "parent" => $value->parent,
                "div" => $div,
                "name" => $name
            ]);
        }
<<<<<<< HEAD
        $json = json_encode($arreyMeetings);
        echo $json; 
        return; 
    }

    public function add_meetings() 
    {   
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $date = $_POST['date']; 
            $time = $_POST['time']; 
            $datas = $date." ".$time.":00"; 
            
=======

        echo (json_encode($arreyMeetings));
        return;
    }

    public function add_meetings()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $date = $_POST['date'];
            $time = $_POST['time'];
            $datas = $date . " " . $time . ":00";


>>>>>>> fbac48d9b367b91bc85b61b9a44e65800b669b25
            $result = $this->meetingModel->insertConsultation($datas);

            echo $datas;

            return;
        }
    }
}
