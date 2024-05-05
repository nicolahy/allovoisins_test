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

        // Configure the pagination options
        $config['base_url'] = base_url() . 'users/index';
        $config['total_rows'] = $this->db->count_all('user');
        $config['per_page'] = 25;

        $this->pagination->initialize($config);

        // Get the current page number from the URL
        $page = ($this->uri->segment(4)) ? (int)$this->uri->segment(4) : 0;


        // Calculate the offset based on the page number
        $offset = ($page > 0) ? (($page - 1) * $config['per_page']) : 0;

        // Use limit and offset to get the records for the current page
        $this->db->limit($config['per_page'], $offset);
        $users = $this->db->get("user")->result();

        $data["status"] = 200;
        $data["message"] = $users; // Set "message" to the list of users
        $data["links"] = $this->pagination->create_links();

        return $this->respond($data);
    }

    public function respond($data)
    {
        $status = $data["status"];
        $message = $data["message"];
        $this->output->set_status_header($status)->set_content_type('application/json', 'utf-8')->set_output(json_encode($message, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
        exit;
    }

    public function show($id = null)
    {
        $tuples = $this->db->get_where("user", ['id' => $id])->row_array();
        if ($tuples) {
            $data["status"] = 200;
            $data["message"] = $tuples;
            return $this->respond($data);
        } else {
            $messages = array('success' => 'No tuple found');
            $data["status"] = 200;
            $data["message"] = $messages;
            return $this->respond($data);
        }
    }

    public function create()
    {
        $data = ['id' => $this->input->get('id'), 'name' => $this->input->get('name'), 'email' => $this->input->get('email')];
        $this->db->insert('user', $data);
        $messages = array('success' => 'Tuple created successfully');
        $data["status"] = 201;
        $data["message"] = $messages;
        return $this->respond($data);
    }

    public function update($id)
    {
        $data = $data = $this->db->get_where("user", ['id' => $id])->row_array();
        if ($data) {
            $this->db->where('id', $id);
            $data = ['name' => $this->input->get('name'), 'email' => $this->input->get('email')];
            $this->db->update('user', $data);
            $messages = array('success' => 'Tuple updated successfully');
            $data["status"] = 200;
            $data["message"] = $messages;
            return $this->respond($data);
        } else {
            $messages = array('success' => 'Tuple does not exist');
            $data["status"] = 200;
            $data["message"] = $messages;
            return $this->respond($data);
        }
    }

    public function delete($id)
    {
        $data = $data = $this->db->get_where("user", ['id' => $id])->row_array();
        if ($data) {
            $this->db->where('id', $id);
            $this->db->delete('user');
            $messages = array('success' => 'Tuple deleted successfully');
            $data["status"] = 200;
            $data["message"] = $messages;
            return $this->respond($data);
        } else {
            $messages = array('success' => 'Tuple does not exist');
            $data["status"] = 200;
            $data["message"] = $messages;
            return $this->respond($data);
        }
    }
}