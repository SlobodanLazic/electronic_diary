<?php
class Notifications extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');

    }

}