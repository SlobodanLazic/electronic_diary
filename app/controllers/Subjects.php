<?php

class Subjects extends Controller
{

    public function __construct(){
        $this->subjectModel = $this->model('Subject');
    }
    public function index(){
        $subjects = $this->subjectModel->showallSubjects();

        $data = [
            'subjects' => $subjects
        ];

        $this->view('admin/subjects/index', $data);
    }
    public function insert(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitise post
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'name' => trim($_POST['name']),

            'name_err' => ''
    ];

    // Validate name
    if(empty($data['name'])){
        $data['name'] = 'Please enter subject name';
    }

    if(empty($data['name'])) {
        if($this->subjectModel->insertSubject($data)) {
            flash('subject_message', 'Subject added');
            redirect('/subjects');
        } else {
            die('Something went wrong');
        }
    }

        }
    }
    public function edit($id){
        $subject = $this->subjectModel->getSubjectId($id);

        $data = [
            'subject' => $subject
        ];

        $this->view('/admin/subjects/edit', $data);
    }
    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->subjectModel->deleteSubject($id)) {
                flash('subject_deleted_msg', 'Subject Deleted');
                redirect('subjects');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('pages');
        }
    }
    public function show($id){
        $subject = $this->subjectModel()->getSubjectId($id);
        
        $data = [
            'subject' => $subject
        ];
        $this->view();
    }
    public function update(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),

                'name_err' => ''
            ];

        // Validate for name
        if(empty($data['name'])) {
            $data['name_err'] = 'Please enter a subject';
        }

        if(empty($data['name_err'])) {
            if($this->subjectModel->update($data)) {
                flash('subject_updated', 'Subject Updated');
                redirect('subjects');
            } else {
                die('Something went wrong');
            }
        } else {
            $this->view('admin/subjects/update', $data);
        }

        }
    }

}
