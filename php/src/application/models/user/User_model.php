<?php

class User_model extends CI_Model
{
    public ?int $id = null;

    public string $uuid = '';

    public string $firstName = '';

    public string $lastName = '';

    public string $email = '';

    public string $phoneNumber = '';

    public string $postalAddress = '';

    public string $professionalStatus = '';

    public ?DateTime $lastLogin = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_users($page, $segment)
    {
        $this->db->select();
        $this->db->limit($page, $segment);
        return $this->db->get('user')->result();
    }

    public function create_user($user)
    {
        return $this->db->insert('user', $user);
    }

    public function update_user($id, $user)
    {
        $this->db->where('id', $id);
        return $this->db->update('user', $user);
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }

    public function delete_inactive_users($months)
    {
        $date = date('Y-m-d H:i:s', strtotime(sprintf('-%s months', $months)));
        $this->db->where('last_login <', $date);
        return $this->db->delete('user');
    }

    public function get_user($id)
    {
        $query = $this->db->get_where('user', ['id' => $id]);
        return $query->row_array();
    }
}
