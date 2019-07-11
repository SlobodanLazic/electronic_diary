<?php

class Grades extends Controller
{

    public function __construct(){
        $this->gradeModel = $this->model('Grade');
    }
    public function index(){
        if (isset($_SESSION['id_user'])) {
            if ($_SESSION['id_user_role'] == 3) {
                $this->view('grades/index');
            } else {
                $this->logout();
            }
        } else {
         $this->view('users/login');
        }
    }

    public function edit($id){
        $subject = $this->subjectModel->getSubjectId($id);

        $data = [
            'subject' => $subject
        ];

        $this->view('/admin/subjects/edit', $data);
    }
    // this method gets average grade of entire school from Grade model
    public function showSchoolStatistics()
    {
        # code...
    }
}