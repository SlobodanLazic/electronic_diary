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
        $statuslist = $this->meetingModel->showAllStatus();

        $data = [
            'students' => $students,
            'lists_s' => $statuslist
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

            if (isset($_POST['date'], $_POST['time'], $_POST['student']) && $_POST['student'] != '') {
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

        $meetings = $this->meetingModel->getMeetingsByTeacherId();

        $data = [
            'meetings' => $meetings
        ];

        $this->view('teacher/responses/index', $data);
    }

    /*END TEACHER RESPONSE */

    /*TEACHER UPDATE MEETING STATUS BEGGINING*/

    public function updateMeetingStatus()
    {

        $status = (int) htmlspecialchars($_POST['status']);

        $id_meeting = (int) htmlspecialchars($_POST['id_meeting']);

        $this->meetingModel->updateMeetingStatus($status, $id_meeting);
    }


    /*TEACHER UPDATE MEETING STATUS END*/



    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['id_user'])) { }
    }

    // SHOW NEXT MEETING TIME

    public function showNextMeeting(){

        $this->db->query('SELECT meetings.meetings
        
                          FROM meetings 
                          
                          ORDER BY meetings 
                          
                          LIMIT 1');

        $nextMeeting = $this->db->single();

        return $nextMeeting;

    }
}
