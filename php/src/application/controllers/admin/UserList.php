<?php

class UserList extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/User_model');
        $this->load->library('session');
        $this->load->library('pagination'); // Load the pagination library
    }

    public function index(): void
    {
        $config['base_url'] = base_url() . 'UserList/index';
        $config ['total_rows'] = $this->db->get('user')->num_rows();
        $config ['uri_segment'] = 3;
        $config ['per_page'] = 25;
        $config ['num_links'] = 10;

        $this->pagination->initialize($config);

        $page = $config ['per_page']; // how many number of records on page
        $segment = $this->uri->segment ( 4 ); // from which index I have to count $page number of records

        $data['products']= $this->User_model->get_users($page, $segment);





        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? (int)$this->uri->segment(3) : 0;

        $offset = ($page > 0) ? (($page - 1) * $config['per_page']) : 0;

        $apiUrl = 'http://host.docker.internal:7700/index.php/api/users/index/' . $offset . '/' . $config['per_page'];

        $data = $this->callApi($apiUrl);
        $this->load->view('admin/list', ['data' => $data]);
    }

    private function callApi($apiUrl): array
    {
        // Add the offset and limit to the API URL

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