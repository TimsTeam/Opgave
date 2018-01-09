<?php 
include $_SERVER["DOCUMENT_ROOT"]."/incl/header.php";

require("incl/dbInfo.php");

function validateData($connect, $data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_escape_string($connect, $data);
    return $data;
}

if(isset($_POST["submit"])){
    // Prepare and bind statement
    $stmt = $dbConnect->prepare("INSERT INTO user
	(username, password, dateCreated)
    VALUES (?, ?, NOW())");
    // Set parameters
    $username = validateData($dbConnect, $_POST["username"]);
    $password = validateData($dbConnect, $_POST["password"]);
            
    $passwordHash = password_hash($password, PASSWORD_DEFAULT); // Make hash out of selected password  
    
    
    $stmt->bind_param("ss", $username, $passwordHash); // Binding parameters with 2 strings
    
    // Execute statement
    if($stmt->execute()){
        // Ok
    } else {
        // Failure
    }

    
    $stmt->close(); // Close stmt connection
    $dbConnect->close(); // Close dbConnect connection

}
?>
    <div class="container">
       <h1>Register</h1>
        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="inputUsername">Username</label>
                <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary ml-auto">Register</button>
        </form>
    </div>
    
<?php include $_SERVER["DOCUMENT_ROOT"]."/incl/footer.php";?>
