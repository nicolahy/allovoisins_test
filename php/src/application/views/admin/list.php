<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap.min.css">
    <title>Allovoisins - Test</title>
</head>

<body class="m-3">

<h1 class="text-success">
    Allovoisins - Test
</h1>
<h4>
    BO - Liste & Suppression
</h4>

<div class="col-12">

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <?php if (empty($data['message'])) : ?>
        <div class="alert alert-danger" role="alert">Data is empty.</div>
    <?php else : ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
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
                <?php foreach ($data['message'] as $user) : ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['uuid'] ?></td>
                        <td><?= $user['firstName'] ?></td>
                        <td><?= $user['lastName'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['phoneNumber'] ?></td>
                        <td><?= $user['postalAddress'] ?></td>
                        <td><?= $user['professionalStatus'] ?></td>
                        <td><?= $user['lastLogin'] ?? '-' ?></td>
                        <td>
                            <form method="get" action="/index.php/admin/UserDelete/index/<?= $user['id'] ?>" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                <button class="btn btn-danger">Delete</button>
                            </form>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?= $data['links'] ?>
        </div>
    <?php endif; ?>
</div>

</body>

</html>