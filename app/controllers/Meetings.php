<?php

    class Meetings extends Controller
    {
        public function __construct()
        {
            $this->meetingModel = $this->model('Meeting');

            $this->studentModel = $this->model('Student');
        }

        /* this method will show the view for parent open door requests page */
        /* PARENT PART BEGGINING */
        public function requests()
        {
            if(isset($_POST['date'],$_POST['time'],$_POST['student']))
            {
                $inputData = [
                    'datetime' => $_POST['date'] . ' ' . $_POST['time'],
                    'student' => $_POST['student'],
                    'id_user' => $_SESSION['id_user']
                ];
                
                $requestMsg = $this->meetingModel->insertRequest($inputData);
                
                echo $requestMsg;
            }            
            
            $students = $this->studentModel->showStudentsToParent();

            $data = [
                'students' => $students,
                'requestMsg' => $requestMsg
            ];
            
            $this->view('parent/requests/index', $data);    
        }
        /* PARENT PART END */

        /*TEACHER RESPONSE BEGGINING*/

        public function responses()
        {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form 
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $id_user = $_POST['id_user'];

                $time = $_POST['time'];

                $date = $_POST['date'];
            }

            $this->view('teacher/responses/index');
        }

        /*END TEACHER RESPONSE */

        public function index()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['id_user'])) {
                print_r($_POST);
            }
            
        }
    }
    

?>