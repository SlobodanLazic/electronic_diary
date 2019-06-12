<?php

 Class Students extends Controller {

    public function __construct()
    {
        $this->studentModel = $this->model('Student');
    }



public function about(){

      $data = [
        'title' => 'About Us'
      ];

      $this->view('pages/about', $data);
    }



}