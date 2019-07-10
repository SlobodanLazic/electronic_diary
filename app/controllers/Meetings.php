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
            $students = $this->studentModel->showStudentsToParent();

            $data = [
                'students' => $students
            ];

           $this->view('parent/requests/index', $data);
        
        }
        /* PARENT PART END */

        public function add_meeting()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                if (isset($_POST['date'],$_POST['time'],$_POST['student']) && $_POST['student'] != '') {
                    $inputData = [
                        'datetime' => trim($_POST['date']) . ' ' . trim($_POST['time']),
                        'student' => trim($_POST['student']),
                        'id_user' => trim($_SESSION['id_user'])
                    ];
                    
                    $requestMsg = $this->meetingModel->insertRequest($inputData);

                    if ($requestMsg) {
                        echo "Successfully submitted the request";
                    } else {
                        echo "Request is not sent";
                    }
                } else {
                    echo "Request is not sent";
                }
            }
         }

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