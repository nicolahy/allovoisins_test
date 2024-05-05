<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/../../vendor/autoload.php';

class Migration_add_user extends CI_Migration {

    public function up(): void
    {
        $professionalStatusValues = array_map(static fn($case) => $case->value, ProfessionalStatus::cases());
        $professionalStatusEnum = "'" . implode("', '", $professionalStatusValues) . "'";

        $sql = "
        CREATE TABLE `user` (
            `id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
            `uuid` CHAR(36) NOT NULL DEFAULT (UUID()),
            `firstName` VARCHAR(100) NOT NULL,
            `lastName` VARCHAR(100) NOT NULL,
            `email` VARCHAR(100) NOT NULL,
            `phoneNumber` VARCHAR(100) NOT NULL,
            `postalAddress` VARCHAR(100) NOT NULL,
            `professionalStatus` ENUM($professionalStatusEnum) NOT NULL,
            `lastLogin` DATETIME NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";

        $this->db->query($sql);

        // Load the User_model
        $this->load->model('User/User_model');

        // Create a Faker instance
        $faker = Faker\Factory::create();

        // Generate and insert 26 users
        for ($i = 0; $i < 26; $i++) {
            $user = array(
                'firstName' => $faker->firstName(),
                'lastName' => $faker->lastName(),
                'email' => $faker->email(),
                'phoneNumber' => $faker->phoneNumber(),
                'postalAddress' => $faker->address(),
                'professionalStatus' => $faker->randomElement($professionalStatusValues),
                'lastLogin' => $faker->boolean() ? $faker->dateTimeThisYear()->format('Y-m-d H:i:s') : null,
            );

            $this->User_model->create_user($user);
        }
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}