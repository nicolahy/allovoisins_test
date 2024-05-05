<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use JMS\Serializer\SerializerBuilder;
require __DIR__ . '/../../vendor/autoload.php';


class Main extends CI_Controller {

//    public function __construct()
//    {
//        parent::__construct();
//        $this->load->model('user/User_model');
//    }

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
        $this->load->helper('url');
        redirect('/front/user/create', 'refresh');



//        $users = $this->getUsersData();
//        $this->load->view('users', array('users' => $this->db->get('user')->result()));
	}


//    private function getUsersData()
//    {
//        // Initialisez cURL
//        $ch = curl_init();
//
//        // Configurez les options de cURL
//        curl_setopt($ch, CURLOPT_URL, base_url() . 'index.php/api/users/index');
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//
//        // Exécutez la requête cURL
//        $response = curl_exec($ch);
//
//        // Fermez cURL
//        curl_close($ch);
//
//        // Créez le sérialiseur
//        // Désérialisez la réponse JSON en objets User
//        return SerializerBuilder::create()->build()->deserialize($response, 'array<'. User_model::class .'>', 'json');
//    }
//
//    public function create_form()
//    {
//        $this->load->helper('form');
//        $this->load->view('create_user');
//    }
//
//    public function create_user(): void
//    {
//        $this->load->library('form_validation');
//
//        $this->form_validation->set_rules('name', 'Name', 'required');
//        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
//
//        if (!$this->form_validation->run()) {
//            $this->create_form();
//        } else {
//            $data = ['name' => $this->input->post('name'), 'email' => $this->input->post('email')];
//            $this->db->insert('user', $data);
//            redirect('users/index');
//        }
//    }
}
