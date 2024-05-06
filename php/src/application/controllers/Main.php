<?php

defined('BASEPATH') || exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function index(): void
    {
        $this->load->helper('url');
        redirect('/front/user/create', 'refresh');
    }
}
