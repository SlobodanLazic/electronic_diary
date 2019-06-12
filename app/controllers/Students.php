<?php

class Students extends Controller
{

  public function __construct()
  {
    $this->studentModel = $this->model('Student');
  }



  public function index()
  {

    $students = $this->studentModel->showAllStudents();

    $data = [

      'students' => $students

    ];

    $this->view('admin/students/index', $data);
  }

  public function insert()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'first_name' => trim($_POST['first_name']),
        'last_name' => trim($_POST['last_name']),
        'id_school_class' => trim($_POST['id_school_class']),

        'first_name_err' => '',
        'last_name_err' => '',
        'id_school_class_err' => ''
      ];

      // Validate first name
      if (empty($data['first_name'])) {
        $data['first_name_err'] = 'Please enter first name';
      }

      // Validate last name
      if (empty($data['last_name'])) {
        $data['last_name_err'] = 'Please enter last name';
      }

      // Validate class 

      if (empty($data['id_school_class'])) {
        $data['id_school_class_err'] = 'Please select class';
      }

      // Make sure there are no errors
      if (empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['id_school_class_err'])) {
        // Validation passed
        //Execute
        if ($this->studentModel->insertStudent($data)) {
          // Redirect to login
          // flash('post_added', 'Student Added');
          redirect('admin/students/index');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors

        $classes = $this->studentModel->showAllClasses();

        $data['classes'] = $classes;

        $this->view('admin/students/insert', $data);
      }
    } else {
      $data = [
        'first_name' => '',
        'last_name' => '',
        'id_school_class' => '',
        'first_name_err' => '',
        'last_name_err' => '',
        'id_school_class_err' => '',
      ];

      $classes = $this->studentModel->showAllClasses();

      $data['classes'] = $classes;

      $this->view('admin/students/insert', $data);
    }
  }

  public function edit()
  {

    $this->view('admin/students/edit');
  }

  public function delete()
  {

    $this->view('admin/students/delete');
  }
}
