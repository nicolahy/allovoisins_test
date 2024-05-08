<?php

class DeleteInactiveUsers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/User_model');
    }

    public function index(): void
    {
        echo '==========================' . PHP_EOL;
        echo 'Deleting inactive users...' . PHP_EOL;
        echo '==========================' . PHP_EOL;
        $this->User_model->deleteInactiveUsers();
        echo 'Done! 🥳🎉🎉' . PHP_EOL;
    }
}