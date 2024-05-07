<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

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

<?php echo form_open($action ?? '', ["class" => "row g-3"]); ?>

<div class="col-md-6">
    <?php echo form_label('First Name', 'firstName', ["class" => "form-label"]); ?>
    <?php echo form_input('firstName', set_value('firstName', $user['firstName'] ?? ''), ["class" => "form-control", "required" => true]); ?>
</div>
<div class="col-md-6">
    <?php echo form_label('Last Name', 'lastName', ["class" => "form-label"]); ?>
    <?php echo form_input('lastName', set_value('lastName', $user['lastName'] ?? ''), ["class" => "form-control", "required" => true]); ?>
</div>

<div class="col-md-6">
    <?php echo form_label('Email', 'email', ["class" => "form-label"]); ?>
    <?php echo form_input('email', set_value('email', $user['email'] ?? ''), ["class" => "form-control", "required" => true]); ?>
</div>
<div class="col-md-6">
    <?php echo form_label('Phone Number', 'phoneNumber', ["class" => "form-label"]); ?>
    <?php echo form_input('phoneNumber', set_value('phoneNumber', $user['phoneNumber'] ?? ''), ["class" => "form-control", "required" => true]); ?>
</div>

<div class="col-12">
    <?php echo form_label('Postal Address', 'postalAddress', ["class" => "form-label"]); ?>
    <?php echo form_input('postalAddress', set_value('postalAddress', $user['postalAddress'] ?? ''), ["class" => "form-control", "required" => true]); ?>
</div>

<div class="col-12">
    <?php echo form_label('Professional Status', 'professionalStatus', ["class" => "form-label"]); ?>
    <?php echo form_dropdown('professionalStatus', $professionalStatusOptions ?? [], $user['professionalStatus'] ?? '', ["class" => "form-select", "required" => true]); ?>
</div>

<div class="col-12">
    <?php echo form_submit('submit', 'Submit', ["class" => "btn btn-primary mt-3"]); ?>
</div>

<?php echo form_close(); ?>