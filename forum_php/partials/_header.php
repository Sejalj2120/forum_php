<?php
echo '
<!-- nav bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="\forum_php">Cummins Forum</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
    <div class="row mx-2 ">   <!--  Login/signup          mx-2 for spacing in x axis , row for seperate rown inline struc-->  
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    </form>     
     <button class ="btn btn-primary ml-2" style="margin-right:300px" data-toggle="modal" data-target="#loginModal">Login</button>   <!-- ml - left spacing -->
     <button class ="btn btn-primary mx-2" style="margin-right:3px" data-toggle="modal" data-target="#signupModal">SignUp</button>
    </div>
</div>
</nav>';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';

?>