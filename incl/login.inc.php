<?php
$loginErr = "";
$uid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include_once 'dbInfo.php';

    $uid = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);

    //Error handlers
    //Check if inputs are empty
    if (empty($uid) || empty($pwd)) {
        $loginErr = "Indtast en værdi i begge felter";
    } else {
        //Check if username exists USING PREPARED STATEMENTS
        $sql = "SELECT * FROM users WHERE username=?";
        //Create a prepared statement
        $stmt = mysqli_stmt_init($conn);
        //Check if prepared statement fails
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $loginErr = "Brugeren eksisterer ikke";
        } else {
            //Bind parameters to the placeholder
            mysqli_stmt_bind_param($stmt, "s", $uid);

            //Run query in database
            mysqli_stmt_execute($stmt);

            //Get results from query
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $hashedPwdCheck = password_verify($pwd, $row['username']);
                if ($hashedPwdCheck == true) {
                    //Set SESSION variables and log user in
                    session_start();
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['password'] = $row['password'];
                    header("Location: /admin/frontpage.php");
                } else {
                    $loginErr = "Forkert password";
                }
            }
        }
        //Close statement
    mysqli_stmt_close($stmt);
    }
}