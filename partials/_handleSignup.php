<?php
$showError = false;    //false is a string variable
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];

    //Check whether this email exists
    $existsSql = "SELECT * FROM `users` WHERE user_email= '$user_email'";
    $result = mysqli_query($conn, $existSql);                           //to execute query
    $numRows = mysqli_num_rows($result);

    if ($numRows > 0) {
        $showError = "This Email-Id is already in use";
    } else {
        if ($pass == $cpass) {     //if password is confirmed
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` ( `user_email`, `user_pass`, `timestamp`, `first_name`, `last_name`)
            VALUES ( '$user_email', '$hash', current_timestamp(), '$first_name', '$last_name') ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                header("Location: /forum_php/index.php?signupsuccess=true");   //redirect to home
                exit();
            }
        } else {
            $showError = "Passwords do not match";    //The default algorithm to use for hashing if no algorithm is provided. 
        }
        header("Location: /forum_php/index.php?signupsuccess=false&error=$showError");
    }
}
