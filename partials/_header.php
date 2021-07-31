<?php

session_start();
echo '
<!-- nav bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="\forum_php">Cummins Forum</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="\forum_php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="C:\xampp\htdocs\forum_php\partials\about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="C:\xampp\htdocs\forum_php\partials\contact.php" tabindex="-1" >Contact</a>
      </li>
    </ul>
    <div class="row mx-2  ">  ';  //  Login/signup          mx-2 for spacing in x axis , row for seperate rown inline struc-->  
 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
    echo '<form class="form-inline my-2 my-lg-0 ">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    <p class ="text-light my-0 mx-2"> Welcome  '. $_SESSION['useremail'] .'</p>
    <a href="/forum_php/partials/_logout.php" class ="btn btn-primary ml-2 float-right">Logout</a> 
    </form> ';
}
else {

     echo '<form class="form-inline my-2 my-lg-0 ">
     <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
     <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
     </form>
     <button class ="btn btn-primary ml-2 float-right"  data-toggle="modal" data-target="#loginModal">Login</button>   <!-- ml - left spacing -->
     <button class ="btn btn-primary mx-2 float-right"  data-toggle="modal" data-target="#signupModal">SignUp</button> ';


}
    
       
     
   echo ' </div>
       </div>
      </nav>';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true" )
{
   echo '<div class="alert alert-primary alert-dismissible fade show my-0" role="alert">
           <strong>Success!</strong> You can now login using your email-Id.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}

?>