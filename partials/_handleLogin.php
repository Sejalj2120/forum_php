<?php 
$showError= false;    //false is a string variable
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];

    $sql = "SELECT * FROM `users` WHERE user_email= '$email'";
    $result = mysqli_query($conn, $sql);                           //to execute query
    $numRows = mysqli_num_rows($result);
    
    if($numRows == 1){
        
     $row = mysqli_fetch_assoc($result);
       
        if(password_verify($pass , $row['user_pass'])){

            session_start();
            $_SESSION['loggedin'] =true;
            $_SESSION['useremail'] = $email;
            echo "loggedin" . $email ;
           // header("Location: /forum_php/index.php");
            //exit();
        }
             header("Location: /forum_php/index.php");
     }
      echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
         <strong>Invalid user details. </strong> Please try again!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
     header("Location: /forum_php/index.php");
    
    }

?>