<?php

defined('BASEPATH') || exit('No direct script access allowed');
require __DIR__ . '/../../../vendor/autoload.php';class UserDelete extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/User_model');
        $this->load->library('session');
    }

    public function index($id): void
    {
        $apiUrl = 'http://host.docker.internal:7700/index.php/api/users/delete/' . $id;

// Replace with your API URL
        $response = $this->callApi($apiUrl);
        if (200 === $response['status']) {
            $this->session->set_flashdata('success', 'User deleted successfully');
            redirect('admin/UserList/');

        // Redirect to the update page
        } else {
        // Handle API error here
            $this->session->set_flashdata('error', 'Failed to delete user');
        }
    }

    private function callApi(string $url): array
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if (!$response) {
            die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
        }

        curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
// end if
        return json_decode($response, true);
    }
}
