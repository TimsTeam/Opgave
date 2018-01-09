<?php
    require("dbInfo.php");
    $bannerSql = "SELECT bannerName
	FROM banner ORDER BY id DESC LIMIT 1";
    $bannerQuery = mysqli_query($dbConnect, $bannerSql) or die(mysqli_error($dbConnect)); // Connect or die if error
    $bannerCheck = mysqli_num_rows($bannerQuery); //Save how many rows detected
    
    
    if($bannerCheck < 1){ // If rows less than 1, output error
      echo ('Something went wrong :[');
    } else {
    echo ('<figure class="container-fluid banner">');
    if($row = mysqli_fetch_assoc($bannerQuery)){
        echo ('<img src="assets/images/' . $row["bannerName"] . '" class="img-fluid" >');
    } else {
        echo "Something went wrong, no banner file found";
    }
    echo ('</figure>');
    }
?>