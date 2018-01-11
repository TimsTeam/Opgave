<?php
if (isset($_POST['submit'])) {
    require $_SERVER["DOCUMENT_ROOT"]."/incl/dbInfo.php";
    $productId = $_POST['id'];

    $sql = "DELETE FROM shoes WHERE id = $productId";
    $result = $dbConnect->query($sql);
    header("Location: ../admin/shoes.php?deleted");
    $dbConnect->close();
    exit();
}
?>