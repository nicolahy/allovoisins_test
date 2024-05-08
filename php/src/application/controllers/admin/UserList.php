<?php

class UserList extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/User_model');
        $this->load->library('session');
    }

    public function index($offset = null): void
    {
//        $page = ($this->uri->segment(3)) ? (int)$this->uri->segment(3) : 0;
        $page = ($this->uri->segment(3)) ? (int)$this->uri->segment(3) : 1;
        $offset = (0 !== $offset && $page > 0) ? (($page - 1) * 25) : 0;

        $apiUrl = 'http://host.docker.internal:7700/index.php/api/users/index/' . $page;

//        print(__FILE__);var_dump($apiUrl);die();

        $data = $this->callApi($apiUrl);
        $this->load->view('admin/list', ['data' => $data]);
    }

    private function callApi($apiUrl): array
    {
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if (!$response) {
            die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
        }

        curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return json_decode($response, true);
    }
}