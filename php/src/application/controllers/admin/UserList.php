<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use JMS\Serializer\SerializerBuilder;
require __DIR__ . '/../../../vendor/autoload.php';

class UserList extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/User_model');
        $this->load->library('session');
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
        $apiUrl = "http://host.docker.internal:7700/index.php/api/users/index"; // Replace with your API URL
        $data = $this->callApi($apiUrl);
        $this->load->view('admin/list', array('data' => $data));
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

        // Deserialize only the "message" content
        return json_decode($response, true);
    }
}
