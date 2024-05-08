<?php

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function index()
    {
        // Load the pagination library
        $this->load->library('pagination');

        $page = ($this->uri->segment(4)) ? (int)$this->uri->segment(4) : 1;
        $offset = ($page > 1) ? (($page - 1) * 25) : 0;

        $config['base_url'] = base_url() . 'index.php/admin/UserList/';
        $config ['total_rows'] = $this->db->count_all('user');
        $config ['uri_segment'] = 4;
        $config ['per_page'] = 25;
        $config ['num_links'] = 10;
        $config['use_page_numbers'] = TRUE;

        $this->pagination->initialize($config);

        $this->db->limit($config['per_page'], $offset);
        $users = $this->db->get('user')->result();

        $data['status'] = 200;
        $data['message'] = $users;
        $data['links'] = $this->pagination->create_links();

        return $this->respond($data);
    }

    public function respond($data): void
    {
        $status = $data['status'];
        $message = $data['message'];
        $this->output->set_status_header($status)->set_content_type('application/json', 'utf-8')->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
        exit;
    }

    public function show($id = null)
    {
        $tuples = $this->db->get_where('user', ['id' => $id])->row_array();
        if ($tuples) {
            $data['status'] = 200;
            $data['message'] = $tuples;
            return $this->respond($data);
        } else {
            $messages = ['success' => 'No tuple found'];
            $data['status'] = 200;
            $data['message'] = $messages;
            return $this->respond($data);
        }
    }

    public function create()
    {
        $userData = [
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'email' => $this->input->post('email'),
            'phoneNumber' => $this->input->post('phoneNumber'),
            'postalAddress' => $this->input->post('postalAddress'),
            'professionalStatus' => $this->input->post('professionalStatus'),
        ];
        $this->db->insert('user', $userData);
        $messages = ['success' => 'Tuple created successfully'];
        $data['status'] = 201;
        $data['message'] = $messages;
        $data['user_id'] = $this->db->insert_id();
        return $this->respond($data);
    }

    public function update($id)
    {
        $data = $this->db->get_where('user', ['id' => $id])->row_array();
        if ($data) {
            $this->db->where('id', $id);
            $userData = [
                'firstName' => $this->input->post('firstName'),
                'lastName' => $this->input->post('lastName'),
                'email' => $this->input->post('email'),
                'phoneNumber' => $this->input->post('phoneNumber'),
                'postalAddress' => $this->input->post('postalAddress'),
                'professionalStatus' => $this->input->post('professionalStatus'),
            ];
            $this->db->update('user', $userData);
            $messages = ['success' => 'Tuple updated successfully'];
            $data['status'] = 200;
            $data['message'] = $messages;
            return $this->respond($data);
        } else {
            $messages = ['success' => 'Tuple does not exist'];
            $data['status'] = 200;
            $data['message'] = $messages;
            return $this->respond($data);
        }
    }

    public function delete($id)
    {
        $data = $this->db->get_where('user', ['id' => $id])->row_array();
        if ($data) {
            $this->db->where('id', $id);
            $this->db->delete('user');
            $messages = ['success' => 'Tuple deleted successfully'];
            $data['status'] = 200;
            $data['message'] = $messages;
            return $this->respond($data);
        } else {
            $messages = ['success' => 'Tuple does not exist'];
            $data['status'] = 200;
            $data['message'] = $messages;
            return $this->respond($data);
        }
    }
}
