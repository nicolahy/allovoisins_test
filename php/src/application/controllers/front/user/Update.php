<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/../../../../vendor/autoload.php';
require APPPATH . '/models/enum/ProfessionalStatus.php';

class Update extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/User_model');
        $this->load->library('session');
    }

    public function create_form($id): void
    {
        $this->load->helper('form');
        $user = $this->User_model->get_user($id); // Get the user from the database
        $this->load->view('front/user/update', $this->getViewVariables($user));
    }

    public function index($id): void
    {
        $this->setFormRules();

        if ($this->form_validation->run()) {
            $data = [
                'firstName' => $this->input->post('firstName'),
                'lastName' => $this->input->post('lastName'),
                'email' => $this->input->post('email'),
                'phoneNumber' => $this->input->post('phoneNumber'),
                'postalAddress' => $this->input->post('postalAddress'),
                'professionalStatus' => $this->input->post('professionalStatus')
            ];

            $this->db->update('user', $data);
            $this->session->set_flashdata('success', 'User updated successfully');
        }
        $this->create_form($id);
    }

    public function setFormRules(): void
    {
        $this->load->library('form_validation');
        $this->form_validation
            ->set_rules('firstName', 'First Name', 'trim|required')
            ->set_rules('lastName', 'Last Name', 'trim|required')
            ->set_rules('email', 'Email', 'trim|required|valid_email')
            ->set_rules('phoneNumber', 'Phone Number', 'trim|required')
            ->set_rules('postalAddress', 'Postal Address', 'trim|required')
            ->set_rules('professionalStatus', 'Professional Status', 'trim|required');
    }

    private function getViewVariables($user): array
    {
        $professionalStatusOptions = array_map(static fn($case) => $case->value, ProfessionalStatus::cases());
        return [
            'user' => $user,
            'professionalStatusOptions' => $professionalStatusOptions,
            'action' => "front/user/update/{$user['id']}",
            'text' => 'FO - Update User',
        ];
    }
}