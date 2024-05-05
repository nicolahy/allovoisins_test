<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?php base_url(); ?>../../../assets/vendor/bootstrap.min.css">
    <title>Create user</title>
</head>
<body>
<h2>Create User</h2>

<div class="container">

    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo validation_errors(); ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <?php echo form_open('Front/User/create', ["class" => "form"]); ?>

    <?php echo form_label('First Name', 'firstName', ["class" => "form-label"]); ?>
    <?php echo form_input('firstName', '', ["class" => "form-control"]); ?>

    <?php echo form_label('Last Name', 'lastName', ["class" => "form-label"]); ?>
    <?php echo form_input('lastName', '', ["class" => "form-control"]); ?>

    <?php echo form_label('Email', 'email', ["class" => "form-label"]); ?>
    <?php echo form_input('email', '', ["class" => "form-control"]); ?>


    <?php echo form_label('Phone Number', 'phoneNumber', ["class" => "form-label"]); ?>
    <?php echo form_input('phoneNumber', '', ["class" => "form-control"]); ?>

    <?php echo form_label('Postal Address', 'postalAddress', ["class" => "form-label"]); ?>
    <?php echo form_input('postalAddress', '', ["class" => "form-control"]); ?>


    <?php echo form_label('Professional Status', 'professionalStatus', ["class" => "form-label"]); ?>

    <?php echo form_dropdown('professionalStatus', $professionalStatusOptions ?? [], [], ["class" => "form-select"]); ?>

    <?php echo form_submit('submit', 'Create user'); ?>

    <?php echo form_close(); ?>

</div>
</body>
</html>