<?php
defined('BASEPATH') || exit('No direct script access allowed');
?>

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
        <?= $text ?? '' ?>
    </h4>
    <?php require '_form.php'; ?>

    <div class="col-12">
        <p class="text-center">
            <a href="<?php echo base_url(); ?>index.php/front/user/create">Accueil</a>
            -
            <a href="<?php echo base_url(); ?>index.php/admin/UserList">Liste des utilisateurs</a>
        </p>
    </div>
</body>

</html>