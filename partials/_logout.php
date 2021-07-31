<?php 

session_start();
echo "Logging you out! Please wait...";
$_SESSION["user_id"] = "";
session_destroy();
header("Location: /forum_php/index.php");

?>