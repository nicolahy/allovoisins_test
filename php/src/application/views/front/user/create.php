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

<div class="container">
    <h2><?= $text ?? '' ?></h2>
    <?php require '_form.php'; ?>
</div>
</body>
</html>