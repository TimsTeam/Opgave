<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/incl/dbInfo.php";


if (isset($_POST['submit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        echo "Billedet uploades. Opdatér siden (F5) hvis du ikke bliver sendt videre indenfor 5 sekunder";

        $fileNew = false;
        if (!empty($_FILES['file'])) {
            $file = $_FILES['file'];

            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            $fileType = $file['type'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'png', 'gif', 'jpeg');

            if (in_array($fileActualExt, $allowed)) {
                    //Checks for errors
                if ($fileError === 0) {
                   
                    //Make uniqiue name, so files dont replace each other
                    $fileNameRaw = "raw." . $fileActualExt;
                    $fileNameLarge = uniqid('', true) . "." . $fileActualExt;
                    $fileNameMedium = uniqid('', true) . "." . $fileActualExt;
                    $fileNameSmall = uniqid('', true) . "." . $fileActualExt;

                    //Paths for database
                    $fileDestinationLargeBase = 'assets/images/shoes/' . $fileNameLarge;
                    $fileDestinationMediumBase = 'assets/images/shoes/' . $fileNameMedium;
                    $fileDestinationSmallBase = 'assets/images/shoes/' . $fileNameSmall;

                    //Paths to move files
                    $fileDestinationRaw = '../assets/images/shoes/' . $fileNameRaw;
                    $fileDestinationLarge = '../assets/images/shoes/' . $fileNameLarge;
                    $fileDestinationMedium = '../assets/images/shoes/' . $fileNameMedium;
                    $fileDestinationSmall = '../assets/images/shoes/' . $fileNameSmall;
                    
                    //Move raw file
                    move_uploaded_file($fileTmpName, $fileDestinationRaw);

                    //Resize images from raw file
                    $image = WideImage::load($fileDestinationRaw);
                    $resizedSmall = $image->resize(400, 300);
                    $resizedMedium = $image->resize(600, 700);
                    $resizedLarge = $image->resize(1920, 1080);
                    $resizedSmall->saveToFile($fileDestinationSmall);
                    $resizedMedium->saveToFile($fileDestinationMedium);
                    $resizedLarge->saveToFile($fileDestinationLarge);

                    //Delete raw file
                    unlink($fileDestinationRaw);

                    $fileNew = true;
                }
            }
        }
        $productId = $_POST['id'];
        $shoename = mysqli_real_escape_string($dbConnect, $_POST['name']);
        $shoedesc = mysqli_real_escape_string($dbConnect, $_POST['description']);
        $colorname = mysqli_real_escape_string($dbConnect, $_POST['colorname']);
        $colorhex = mysqli_real_escape_string($dbConnect, $_POST['hex']);
        $shoetype = mysqli_real_escape_string($dbConnect, $_POST['type']);
        $shoegender = mysqli_real_escape_string($dbConnect, $_POST['gender']);
        $shoemodel = mysqli_real_escape_string($dbConnect, $_POST['model']);
        $shoecollection = mysqli_real_escape_string($dbConnect, $_POST['collection']);
        $shoesize = mysqli_real_escape_string($dbConnect, $_POST['size']);
        $shoebrand = mysqli_real_escape_string($dbConnect, $_POST['brand']);

        if ($fileNew == true) {
                //Insert the user into the database
            $sql = "UPDATE `shoes` SET `id`=?,`name`=?,`description`=?,`imgPath`=?,`colorname`=?,`colorhex`=?,`type`=?,`gender`=?,`model`=?, `collection`=?, `size`=?, `brand`=? WHERE id = $productId";
                //Create second prepared statement
            $stmt2 = mysqli_stmt_init($conn);

                //Check if prepared statement fails
            if (!mysqli_stmt_prepare($stmt2, $sql)) {
                header("Location: ../index.php?login=error2");
                exit();
            } else {
                    //Bind parameters to the placeholder
                mysqli_stmt_bind_param($stmt2, "sssssssssss", $shoename, $shoedesc, $fileDestinationBase, $colorname, $colorhex, $shoetype, $shoegender, $shoemodel, $shoecollection, $shoesize, $shoebrand);

                    //Run query in database
                mysqli_stmt_execute($stmt2);
            }


        } elseif ($fileNew == false) {
            //Insert the user into the database
            $sql = "UPDATE `shoes` SET `id`=?,`name`=?,`description`=?,`imgPath`=?,`colorname`=?,`colorhex`=?,`type`=?,`gender`=?,`model`=?, `collection`=?, `size`=?, `brand`=? WHERE id = $productId";
            //Create second prepared statement
            $stmt2 = mysqli_stmt_init($dbConnect);

            //Check if prepared statement fails
            if (!mysqli_stmt_prepare($stmt2, $sql)) {
                header("Location: ../index.php?login=error2");
                exit();
            } else {
                //Bind parameters to the placeholder
                mysqli_stmt_bind_param($stmt2, "sssssssssss", $shoename, $shoedesc, $fileDestinationBase, $colorname, $colorhex, $shoetype, $shoegender, $shoemodel, $shoecollection, $shoesize, $shoebrand);

                //Run query in database
                mysqli_stmt_execute($stmt2);
            }
        }
    }
}
$conn->close();
header("Location: ". $doc_root ."/admin/products.php?edited");
?>