<?php
require($_SERVER["DOCUMENT_ROOT"] . "/incl/dbInfo.php");


// Update current text shown to current text

$stmt = $dbConnect->prepare("SELECT adress, phone, email FROM contactadress, contactphone, contactemail");

if($stmt->execute()){
    $stmt->store_result();
    $stmt->bind_result($adress, $phone, $email);
    $stmt->fetch();
} else {
    echo "Fail in show text";
}

if(isset($_POST['updateText'])){
    // Statements
    $stmt2 = $dbConnect->prepare("UPDATE contactadress
	SET
		adress=?
	WHERE id = 1");
    $stmt3 = $dbConnect->prepare("UPDATE contactphone
	SET
		phone=?
	WHERE id = 1");
    $stmt4 = $dbConnect->prepare("UPDATE contactemail
	SET
		email=?
	WHERE id = 1");

    //Input content
    $adress = validateData($dbConnect, $_POST['inputAdress']);
    $phone = validateData($dbConnect, $_POST['inputPhone']);
    $email = validateData($dbConnect, $_POST['inputEmail']);

    // Bind param
    $stmt2->bind_param("s", $adress);
    $stmt3->bind_param("i", $phone);
    $stmt4->bind_param("s", $email);

    if($stmt2->execute() && $stmt3->execute() && $stmt4->execute()){

    } else {
        echo "Fail in update text";
    }
}


?>



<section class="container">
    <div class="row">
        <form action="" method="POST" class="col">
            <div class="form-group">
                <label for="inputAdress">Adress</label>
                <input type="text" class="form-control" id="inputAdress" name="inputAdress" aria-describedby="inputAdress" placeholder="Enter Adress" value="<?php echo $adress?>">
            </div>
            <div class="form-group">
                <label for="inputPhone">Phone</label>
                <input type="Number" class="form-control" id="inputPhone" name="inputPhone" placeholder="Enter Number" value="<?php echo $phone?>">
            </div>
            <div class="form-group">
              <label for="inputEmail">Email</label>
              <input type="text" class="form-control" name="inputEmail" id="inputEmail" aria-describedby="helpId" placeholder="Enter Email" value="<?php echo $email?>">
            </div>
            <button type="submit" class="btn btn-primary" name="updateText">Update Text</button>
        </form>
    </div>
</section>