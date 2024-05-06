<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?php base_url(); ?>../../../assets/vendor/bootstrap.min.css">
    <title>Create user</title>
</head>

<body class="m-3">
<h1 class="text-success">
    Allovoisins - Test
</h1>
<h4>
    <?= $text ?? '' ?>
</h4>
<?php require '_form.php'; ?>
</body>


</html>