<?php

class Classes extends Controller
{

  public function __construct()
  {

    $this->classModel = $this->model('School_Class');

  }


  public function index(){

    $classes = $this->classModel->showAllClasses();

    $data = [

        'classes' => $classes
  
      ];
  
      $this->view('admin/classes/index', $data);
  }


  
  public function edit($id)
  {


    $classes = $this->classModel->getClassById($id);


    $data = [


      'classes' => $classes

    ];

    $this->view('/admin/classes/edit', $data);
  }

  public function update()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [

        'name' => trim($_POST['name']),

        'id_school_class' => trim($_POST['id_school_class']),
        
        'name_err' => '',

      ];

      
      // Validate first name
      if (empty($data['name'])) {
        $data['name_err'] = 'Please enter name';
      }


      // Make sure there are no errors
      if (empty($data['name_err'])) {
        // Validation passed
        //Execute
        if ($this->classModel->update($data)) {
          // Redirect to login
          flash('class_updated', 'Class Updated');
          redirect('classes');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors

        $this->view('admin/classes/update', $data);
      }
    } else {
      $data = [

        'name' => '',

   
      ];


      $this->view('admin/classes/update', $data);
    }
  }



}