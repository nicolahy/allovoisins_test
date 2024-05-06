<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="<?php base_url(); ?>../../assets/vendor/bootstrap.min.css">
    <title>Allovoisins - TEST</title>
</head>

<body>

<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<div id="container">
    <h1>Home</h1>

    <?php if (empty($data['message'])) : ?>
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
    <?php endif; ?>
</div>

</body>

</html>