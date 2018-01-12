<?php
require($_SERVER["DOCUMENT_ROOT"] . "/incl/dbInfo.php");


function validateData($connect, $data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_escape_string($connect, $data);
    return $data;
}

// Prepare BIG statement
$stmt = $dbConnect->prepare("SELECT *
	FROM shoes
	INNER JOIN color ON shoes.colorid = color.id
	INNER JOIN size ON shoes.sizeid = size.id
	INNER JOIN type ON shoes.typeid = type.id
	INNER JOIN gender ON shoes.genderid = gender.id
	INNER JOIN brand ON shoes.brandid = brand.id
	INNER JOIN collection ON shoes.collectionid = collection.id
	INNER JOIN model ON shoes.modelid = model.id

	WHERE
	color.name LIKE ? OR
	color.hex LIKE ? OR
	size.size LIKE ? OR
	type.name LIKE ? OR
	gender.gender LIKE ? OR
	brand.name LIKE ? OR
	collection.name LIKE ? OR
	model.name LIKE ?");

if(isset($_POST['search'])){
    $stmt->bind_param("ssssssss", $searchInput, $searchInput, $searchInput, $searchInput, $searchInput, $searchInput, $searchInput, $searchInput);
    $searchInput = validateData($dbConnect, "%" . $_POST['search'] . "%");
    if($stmt->execute()){
        // $stmt->store_result();
        // $stmt->bind_result($result);
        // $stmt-fetch();$
        $result = $stmt->get_result();
        $rows[] = $result->fetch_assoc();
        var_dump($rows);

        
    }
}
?>