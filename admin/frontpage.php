<?php
$pageTitle = "Admin | Projekt Afrika";
include '../incl/admin-header.inc.php';
?>

<?php if (!empty($_SESSION)) : ?>

<?php elseif (empty($_SESSION)) : ?>
    <?= header("Location: ../login.php") ?>
<?php endif; ?>
