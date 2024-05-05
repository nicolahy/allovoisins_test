<?php

require APPPATH . '/models/enum/ProfessionalStatus.php';

class Migrate extends CI_Controller
{

    public function index(): void
    {
        $this->load->library('migration');

        if (false === $this->migration->current())
        {
            show_error($this->migration->error_string());
        }
    }

}