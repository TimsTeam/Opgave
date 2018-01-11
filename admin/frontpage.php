<?php
$pageTitle = "Admin | Footsteps";
include '../incl/admin-header.inc.php';
include '../incl/dbInfo.php';
?>

<?php if (!empty($_SESSION)) : ?>

<?php elseif (empty($_SESSION)) : ?>
    <?= header("Location: ../login.php") ?>
<?php endif; ?>

<?php include('../incl/bannerUpload.php') ?>
<?php include('../incl/dynamicText.php') ?>



</body>
</html>