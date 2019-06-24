<?php

class Schedules extends Controller
{

    public function __construct()
    {

        $this->schedulesModel = $this->model('Schedule');

        $this->classModel = $this->model('School_Class');
    }



    public function index()
    {


        $classes = $this->classModel->showAllClasses();



        $data = [

            'classes' => $classes

         ];

        $this->view('admin/schedules/index', $data);
    }

    public function insert()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


            $data = [

                //monday
                'a1' => trim($_POST['a1']),
                'a2' => trim($_POST['a2']),
                'a3' => trim($_POST['a3']),
                'a4' => trim($_POST['a4']),
                'a5' => trim($_POST['a5']),
                'a6' => trim($_POST['a6']),
                'a7' => trim($_POST['a7']),
                'day1' => trim($_POST['day1']),


                //tuesday
                'b1' => trim($_POST['b1']),
                'b2' => trim($_POST['b2']),
                'b3' => trim($_POST['b3']),
                'b4' => trim($_POST['b4']),
                'b5' => trim($_POST['b5']),
                'b6' => trim($_POST['b6']),
                'b7' => trim($_POST['b7']),
                'day2' => trim($_POST['day2']),


                //wednesday
                'c1' => trim($_POST['c1']),
                'c2' => trim($_POST['c2']),
                'c3' => trim($_POST['c3']),
                'c4' => trim($_POST['c4']),
                'c5' => trim($_POST['c5']),
                'c6' => trim($_POST['c6']),
                'c7' => trim($_POST['c7']),
                'day3' => trim($_POST['day3']),

                //tuesday
                'd1' => trim($_POST['d1']),
                'd2' => trim($_POST['d2']),
                'd3' => trim($_POST['d3']),
                'd4' => trim($_POST['d4']),
                'd5' => trim($_POST['d5']),
                'd6' => trim($_POST['d6']),
                'd7' => trim($_POST['d7']),
                'day4' => trim($_POST['day4']),

                //friday

                'e1' => trim($_POST['e1']),
                'e2' => trim($_POST['e2']),
                'e3' => trim($_POST['e3']),
                'e4' => trim($_POST['e4']),
                'e5' => trim($_POST['e5']),
                'e6' => trim($_POST['e6']),
                'e7' => trim($_POST['e7']),
                'day5' => trim($_POST['day5']),


                'class_num1' => trim($_POST['class_num1']),
                'class_num2' => trim($_POST['class_num2']),
                'class_num3' => trim($_POST['class_num3']),
                'class_num4' => trim($_POST['class_num4']),
                'class_num5' => trim($_POST['class_num5']),
                'class_num6' => trim($_POST['class_num6']),
                'class_num7' => trim($_POST['class_num7']),
                'class_id' => trim($_POST['id_school_class']),
                'a1_err' => '',
                'a2_err' => '',
                'a3_err'  => '',
                'a4_err' => '',
                'a5_err' => '',
                'a6_err' => '',
                'a7_err' => '',
                'monday1_err' => '',
                'monday2_err' => '',
                'monda3_err' => '',
                'monday4_err' => '',
                'monday5_err' => '',
                'monday6_err' => '',
                'monday7_err' => '',
                'class_num1_err' => '',
                'class_num2_err' => '',
                'class_num3_err' => '',
                'class_num4_err' => '',
                'class_num5_err' => '',
                'class_num6_err' => '',
                'class_num7_err' => '',
            ];

            // // Validate first name
            // if (empty($data['first_name'])) {
            //     $data['first_name_err'] = 'Please enter first name';
            // }

            // // Validate last name
            // if (empty($data['last_name'])) {
            //     $data['last_name_err'] = 'Please enter last name';
            // }

            // // Validate class 

            // if (empty($data['id_school_class'])) {
            //     $data['id_school_class_err'] = 'Please select class';
            // }

            // Make sure there are no errors
            if (
                empty($data['a1_err']) && empty($data['a2_err'])

                && empty($data['a4_err']) && empty($data['a5_err']) && empty($data['a6_err']) && empty($data['a7_err'])
            ) {
                // Validation passed
                //Execute
                if ($this->schedulesModel->insertSchedule($data)) {
                    // Redirect to login
                    flash('schedule_message', 'Schedule Created');
                    redirect('schedules');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors

                $classes = $this->classModel->showAllClasses();

                $data['classes'] = $classes;

                $this->view('admin/schedules/insert', $data);
            }
        } else {
            $data = [
                'a1' => '',
                'a2' => '',
                'a3' => '',
                'a4' => '',
                'a5' => '',
                'a6' => '',
                'a7' => '',
                'day1' => '',

                'b1' => '',
                'b2' => '',
                'b3' => '',
                'b4' => '',
                'b5' => '',
                'b6' => '',
                'b7' => '',
                'day2' => '',

                'c1' => '',
                'c2' => '',
                'c3' => '',
                'c4' => '',
                'c5' => '',
                'c6' => '',
                'c7' => '',
                'day3' => '',

                'd1' => '',
                'd2' => '',
                'd3' => '',
                'd4' => '',
                'd5' => '',
                'd6' => '',
                'd7' => '',
                'day4' => '',

                'e1' => '',
                'e2' => '',
                'e3' => '',
                'e4' => '',
                'e5' => '',
                'e6' => '',
                'e7' => '',
                'day5' => ''

            ];

            $classes = $this->classModel->showAllClasses();


            $data['classes'] = $classes;

            $this->view('admin/schedules/insert', $data);
        }
    }
}
