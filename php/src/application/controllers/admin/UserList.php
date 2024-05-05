<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use JMS\Serializer\SerializerBuilder;
require __DIR__ . '/../../../vendor/autoload.php';

class UserList extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/User_model');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index(): void
    {
        $users = $this->getUsersData(base_url() . 'index.php/api/users/index');
        print(__FILE__);var_dump($users);die();
        $this->load->view('users', array('users' => $this->db->get('user')->result()));
    }


    private function getUsersData(string $url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_PROXYPORT, "7700"); // your proxy port number
        curl_setopt($ch, CURLOPT_PROXY, $_SERVER['SERVER_ADDR'] . ':' .  $_SERVER['SERVER_PORT']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        if (!$response) {
            die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
        }
        curl_close($ch);

        // Créez le sérialiseur
        // Désérialisez la réponse JSON en objets User
        return SerializerBuilder::create()->build()->deserialize($response, 'array<'. User_model::class .'>', 'json');
    }
}
