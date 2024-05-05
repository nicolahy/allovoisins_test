<?php

class User_model extends CI_Model {
    private readonly int $id;
    private string $uuid;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $phoneNumber;
    private string $postalAddress;
    private string $professionalStatus;
    private DateTime $lastLogin;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPostalAddress(): string
    {
        return $this->postalAddress;
    }

    public function setPostalAddress(string $postalAddress): void
    {
        $this->postalAddress = $postalAddress;
    }

    public function getProfessionalStatus(): string
    {
        return $this->professionalStatus;
    }

    public function setProfessionalStatus(string $professionalStatus): void
    {
        $this->professionalStatus = $professionalStatus;
    }

    public function getLastLogin(): DateTime
    {
        return $this->lastLogin;
    }

    public function setLastLogin(DateTime $lastLogin): void
    {
        $this->lastLogin = $lastLogin;
    }

    public function get_users($page, $size) {
        $this->db->limit($size, ($page - 1) * $size);
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function create_user($user) {
        return $this->db->insert('user', $user);
    }

    public function update_user($id, $user) {
        $this->db->where('id', $id);
        return $this->db->update('user', $user);
    }

    public function delete_user($id) {
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }

    public function delete_inactive_users($months) {
        $date = date('Y-m-d H:i:s', strtotime("-$months months"));
        $this->db->where('last_login <', $date);
        return $this->db->delete('user');
    }
}