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

    $this->view('admin/students/insert');
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
