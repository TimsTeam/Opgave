<?php

require($_SERVER["DOCUMENT_ROOT"] . "/incl/dbInfo.php");
$galleryPath = $_SERVER["DOCUMENT_ROOT"] . "/assets/images/"; // Path for the gallery folder

function validateData($connect, $data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_escape_string($connect, $data);
    return $data;
}


// Banner delete
if(!empty(($_POST['deleteBanner']))){
    // Prepare statement
    $stmt = $dbConnect->prepare("DELETE from banner WHERE id = ?");
    $stmtDeleteFile = $dbConnect->prepare("SELECT bannerName FROM banner where id = ?");
    $id = $_POST['deleteBanner'];

    // Bind param
    $stmt->bind_param("i", $id);
    $stmtDeleteFile->bind_param("i", $id);
    if($stmtDeleteFile->execute()){
        $stmtDeleteFile->store_result();
        $stmtDeleteFile->bind_result($bannerName);
        $stmtDeleteFile->fetch();
        unlink($_SERVER['DOCUMENT_ROOT'] . "/assets/images/" . $bannerName);
        if($stmt->execute()){
        //Okay
        } else {
            // Failure
        }
    } else {
        // Failure
    }

}

// Banner upload
if (isset($_POST["uploadImage"])) {
    $imgFile = $_FILES["imgFile"]; // Get file from submitted data

    // All information from file
    $fileName = $_FILES['imgFile']['name']; // Get the name of file asctotiacito array
    $fileTmpName = $_FILES["imgFile"]["tmp_name"]; // Temporary file before upload
    $fileSize = $_FILES["imgFile"]["size"]; // Size of file
    $fileType = $_FILES["imgFile"]["type"]; // Type of file
    $fileError = $_FILES["imgFile"]["error"]; // Error status

    if(exif_imagetype($fileTmpName) == IMAGETYPE_JPEG || exif_imagetype($fileTmpName) == IMAGETYPE_PNG){ // Checks for some standard requirements
        if($fileError === 0){
            if($fileSize <= 2000000){
                if(!file_exists($galleryPath . $fileName)){
                    move_uploaded_file($fileTmpName, $galleryPath . $fileName);
                    // Prepare and bind statement
                    $stmt = $dbConnect->prepare("INSERT INTO banner
	                    (bannerName)
	                    VALUES (?)");
                    // Set parameters
                    
                    $stmt->bind_param("s", $fileName); // Binding parameters with 1 strings
                    
                    // Execute statement
                    if($stmt->execute()){
                        // Ok
                    } else {
                        // Failure
                    }

                    
                    // $stmt->close(); // Close stmt connection
                    // $dbConnect->close(); // Close dbConnect connection
                } else {
                    echo "File already exist!";
                }

            } else {
                echo "File to big, try compressing it";
            }
        } else {
            echo "Something went wrong in the upload process";
        }
    } else {
        echo "Wrong image format";
    }   
}

?>

    <section class="container bannerUpload">
        <div class="row">
            <form class="col" method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="imgFile">Upload image</label>
                    <input type="file" name="imgFile" class="form-control-file" id="imgFile">
                    <button type="submit" name="uploadImage" class="btn btn-primary">Upload</button>
                </div>
            </form>
            <form class="table-responsive col" method="POST" action="">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Banner overview
                        $query2 = "SELECT * from banner ORDER BY id DESC";
                        $result2 = mysqli_query($dbConnect, $query2);
                        $result2Check = mysqli_num_rows($result2);
                        if($result2Check > 0){
                            while($row = mysqli_fetch_assoc($result2)){
                                echo ('<tr>');
                                echo ('<th scope="row">'. $row['id'] . '</th>');
                                echo ('<td>' . $row['bannerName'] . '</td>');
                                echo ('<td><img src="/assets/images/' . $row['bannerName'] . '"></td>');
                                echo ('<td><button type="submit" name="deleteBanner" value="' . $row['id'] . '" class="btn btn-danger">Delete</button></td>');
                                echo ('</tr>');
                            }
                        }
                        
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </section>