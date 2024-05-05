<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/../../vendor/autoload.php';

class Migration_add_user extends CI_Migration {

    public function up(): void
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'uuid' => array(
                'type' => 'VARCHAR',
                'constraint' => '36',
            ),
            'firstName' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'lastName' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'phoneNumber' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
            ),
            'postalAddress' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'professionalStatus' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
            ),
            'lastLogin' => array(
                'type' => 'DATETIME',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('user');

        // Load the User_model
        $this->load->model('User_model');

        // Create a Faker instance
        $faker = Faker\Factory::create();

        // Generate and insert 26 users
        for ($i = 0; $i < 26; $i++) {
            $user = array(
                'uuid' => $faker->uuid,
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'email' => $faker->email,
                'phoneNumber' => $faker->phoneNumber,
                'postalAddress' => $faker->address,
                'professionalStatus' => $faker->randomElement(['employed', 'unemployed', 'student', 'retired']),
                'lastLogin' => $faker->dateTimeThisYear->format('Y-m-d H:i:s'),
            );

            $this->User_model->create_user($user);
        }
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}