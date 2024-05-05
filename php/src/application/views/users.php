<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="<?php base_url(); ?>assets/vendor/bootstrap.min.css">
    <title>Allovoisins - TEST</title>
</head>

<body>

<div id="container">
    <h1>Home</h1>

    <?php if (empty($users)) : ?>
        <div class="alert alert-danger" role="alert">Data is empty.</div>
    <?php else : ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Uuid</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>PhoneNumber</th>
                <th>PostalAddress</th>
                <th>ProfessionalStatus</th>
                <th>LastLogin</th>
                <th>actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->uuid ?></td>
                    <td><?= $user->firstName ?></td>
                    <td><?= $user->lastName ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->phoneNumber ?></td>
                    <td><?= $user->postalAddress ?></td>
                    <td><?= $user->professionalStatus ?></td>
                    <td><?= $user->lastLogin ?></td>
                    <td>
                        <a href="<?= '/index.php/api/users/show/' . $user->id ?>">show</a>
                        <a href="<?= '/index.php/api/users/edit/' . $user->id ?>">edit</a>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

</body>

</html>