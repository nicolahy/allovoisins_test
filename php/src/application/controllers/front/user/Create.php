<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/../../../../vendor/autoload.php';
require APPPATH . '/models/enum/ProfessionalStatus.php';

class Create extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/User_model');
        $this->load->library('session');
    }

    public function create_form(): void
    {
        $this->load->helper('form');
        $this->load->view('front/user/create', $this->getViewVariables());
    }

    public function index(): void
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


            $apiUrl = "http://host.docker.internal:7700/index.php/api/users/create"; // Replace with your API URL
            $response = $this->callApi($apiUrl, $data);

            if (201 === $response['status']) {
                $this->session->set_flashdata('success', 'User created successfully');
                redirect("front/user/update/{$response['user_id']}"); // Redirect to the update page
            } else {
                // Handle API error here
                $this->session->set_flashdata('error', 'Failed to create user');
            }
        }
        $this->create_form();
    }

    private function callApi(string $url, array $data): array
    {

        $ch = curl_init($url);
//        curl_setopt($ch, CURLOPT_PROXY, $_SERVER['SERVER_ADDR'] . ':' .  $_SERVER['SERVER_PORT']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        $response = curl_exec($ch);
        if (!$response) {
            die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return json_decode($response, true);
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

    private function getViewVariables(): array
    {
        $professionalStatusOptions = array_map(static fn($case) => $case->value, ProfessionalStatus::cases());
        return [
            'professionalStatusOptions' => $professionalStatusOptions,
            'action' => 'front/user/create',
            'text' => 'FO - Create User',
        ];
    }
}
