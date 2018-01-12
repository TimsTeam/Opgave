<?php
include $_SERVER["DOCUMENT_ROOT"]."/incl/dbInfo.php";


if (isset($_POST['submit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fileNew = false;
        if (!empty($_FILES['newimageupload'])) {
            $file = $_FILES['newimageupload'];

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
                        //Check if file size is over 2mb
                    if ($fileSize < 2000000) {
                            //Make uniqiue name, so files dont replace each other
                        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                        $fileNameWithoutExt = substr($fileNameNew, 0, strpos($fileNameNew, '.', strpos($fileNameNew, '.') + 1));
                            //Move file to folder
                        $fileDestinationBase = 'assets/images/shoes/' . $fileNameNew;
                        $fileDestination = '/assets/images/shoes/' . $fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $fileNew = true;
                    }
                }
            }
        }
        
        $id = mysqli_real_escape_string($dbConnect, $_POST['id']);
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
            $sql = "UPDATE `shoes` SET `id`='$id',`name`=?,`description`=?,`imgPath`=?,`colorname`=?,`colorhex`=?,`type`=?,`gender`=?,`model`=?,`collection`=?,`size`=?,`brand`=? WHERE id = $id";
                //Create second prepared statement
            $stmt2 = mysqli_stmt_init($dbConnect);

                //Check if prepared statement fails
            if (!mysqli_stmt_prepare($stmt2, $sql)) {
                header("Location: ../shoes.php?error2");
                exit();
            } else {
                    //Bind parameters to the placeholder
                mysqli_stmt_bind_param($stmt2, "sssssssssss", $shoename, $shoedesc, $fileDestinationBase, $colorname, $colorhex, $shoetype, $shoegender, $shoemodel, $shoecollection, $shoesize, $shoebrand);

                    //Run query in database
                mysqli_stmt_execute($stmt2);
            }


        } elseif ($fileNew == false) {
            //Insert the user into the database
            $sql = "UPDATE `shoes` SET `id`='$id',`name`=?,`description`=?,`imgPath`=?,`colorname`=?,`colorhex`=?,`type`=?,`gender`=?,`model`=?,`collection`=?,`size`=?,`brand`=? WHERE id = $id";
            //Create second prepared statement
            $stmt2 = mysqli_stmt_init($dbConnect);

            //Check if prepared statement fails
        if (!mysqli_stmt_prepare($stmt2, $sql)) {
            header("Location: ../shoes.php?error2");
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
$dbConnect->close();
header("Location: ../shoes.php?edited");
?>