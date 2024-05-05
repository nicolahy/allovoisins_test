<!-- user_form.php -->
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

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

<?php echo form_open($action ?? '', ["class" => "form"]); ?>

<?php echo form_label('First Name', 'firstName', ["class" => "form-label"]); ?>
<?php echo form_input('firstName', set_value('firstName', $user['firstName'] ?? ''), ["class" => "form-control"]); ?>

<?php echo form_label('Last Name', 'lastName', ["class" => "form-label"]); ?>
<?php echo form_input('lastName', set_value('lastName', $user['lastName'] ?? ''), ["class" => "form-control"]); ?>

<?php echo form_label('Email', 'email', ["class" => "form-label"]); ?>
<?php echo form_input('email', set_value('email', $user['email'] ?? ''), ["class" => "form-control"]); ?>

<?php echo form_label('Phone Number', 'phoneNumber', ["class" => "form-label"]); ?>
<?php echo form_input('phoneNumber', set_value('phoneNumber', $user['phoneNumber'] ?? ''), ["class" => "form-control"]); ?>

<?php echo form_label('Postal Address', 'postalAddress', ["class" => "form-label"]); ?>
<?php echo form_input('postalAddress', set_value('postalAddress', $user['postalAddress'] ?? ''), ["class" => "form-control"]); ?>

<?php echo form_label('Professional Status', 'professionalStatus', ["class" => "form-label"]); ?>
<?php echo form_dropdown('professionalStatus', $professionalStatusOptions ?? [], set_value('professionalStatus', $user['professionalStatus'] ?? ''), ["class" => "form-select"]); ?>

<?php echo form_submit('submit', 'Submit', ["class" => "btn btn-primary mt-3"]); ?>
<?php echo form_reset('reset', 'Reset', ["class" => "btn btn-secondary mt-3"]); ?>

<?php echo form_close(); ?>