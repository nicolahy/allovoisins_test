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

<?php echo validation_errors(); ?>

<?php echo form_open('users/create_user', ["class" => "form"]); ?>

<?php echo form_label('ID', 'id', ["class" => "form-label"]); ?>
<?php echo form_input('id', '', ["class" => "form-control"]); ?>

<?php echo form_label('Name', 'name', ["class" => "form-label"]); ?>
<?php echo form_input('name', '', ["class" => "form-control"]); ?>

    <?php echo form_label('Email', 'email', ["class" => "form-label"]); ?>
    <?php echo form_input('email', '', ["class" => "form-control"]); ?>


    <?php echo form_label('Phone Number', 'phoneNumber', ["class" => "form-label"]); ?>
    <?php echo form_input('phoneNumber', '', ["class" => "form-control"]); ?>

    <?php echo form_label('Postal Address', 'postalAddress', ["class" => "form-label"]); ?>
    <?php echo form_input('postalAddress', '', ["class" => "form-control"]); ?>


    <?php echo form_label('Professional Status', 'professionalStatus', ["class" => "form-label"]); ?>
    <?php echo form_input('professionalStatus', '', ["class" => "form-control"]); ?>

    <?php echo form_label('Last Login', 'lastLogin', ["class" => "form-label"]); ?>
    <?php echo form_input('lastLogin', '', ["class" => "form-control"]); ?>

<?php echo form_submit('submit', 'Create user'); ?>

<?php echo form_close(); ?>

</div>
</body>
</html>