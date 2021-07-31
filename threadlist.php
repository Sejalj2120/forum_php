 <!-- helps in viewing all threads for respective categories  -->

 <!doctype html>
 <html lang="en">

 <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel='stylesheet' type='text/css' href='forum_php/style.php' />
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
         integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <style>
     #ques {
         min-height: 433px;
     }
     </style>

     <title> Cummins Discussion forum</title>
 </head>

 <body>
     <?php include 'partials/_header.php'; ?>
     <?php include 'partials/_dbconnect.php'; ?>
     <?php                            
    //   page rendering (getting data from database for resp categories)
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE category_id=$id;";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
         $catname =$row['category_name'];
         $catdesc =$row['category_description'];
        
        }
    
    ?>
     <?php
        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){
            //Insert into thread database
            $th_title =$_POST['title'] ;       //$_POST - Predefined super global variable, title,desc from form.
            $th_desc = $_POST['desc'] ;

            //write a sql for insertion          remove thread_id as it is on auto_increment
            $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`,
             `thread_user_id`, `timestamp`)
             VALUES ( '$th_title', '$th_desc', '$id', '0', current_timestamp()) ";
            $result = mysqli_query($conn,$sql);
            $showAlert = true;
            if($showAlert){
                echo '
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                       <strong>Success!</strong> Your question has been added. Please wait for the community to respond.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                    </button>
                </div>  ';
            }
        }
      ?>

     <!--  Category container starts here ,Jumbotron template from bootstrap -->
     <div class="container my-4" id="ques">
         <div class="jumbotron">
             <!-- added php echo below to get name and description dynamically -->
             <h3 class="display-6">Welcome to <?php echo $catname;?> forum</h3>
             <p class="small-lead"><?php echo $catdesc;?>
             </p>
             <hr class="my-4">
             <p>This forum is for interacting with your peers and having discussions. <br>
                 Rules to be followed:<br>
                 1.No Spam / Advertising / Self-promote in the forums. <br>
                 2.Do not post “offensive” posts, links or images.
             </p>
             <p class="lead">
                 <a class="btn btn-primary btn-sm " href="#" role="button">Learn more</a>
             </p>
         </div>
     </div>
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    echo ' <div class="container">
         <h4 class="py-2">Start a Discussion</h4>
         <!-- form template from bootstrap -->
         <form action="'. $_SERVER["REQUEST_URI"] .'" method="post">
             <!--REQUEST_URI for posting on same page  -->
             <div class="form-group">
                 <label for="exampleInputEmail1">Question:</label>
                 <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                 <small id="emailHelp" class="form-text text-muted">Keep it short and crisp.</small>
             </div>
             <div class="form-group">
                 <label for="exampleFormControlTextarea1">Elaborate your concern :</label>
                 <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
             </div>
             <button type="submit" class="btn btn-primary btn-sm mb-2">Submit</button>
         </form>
     </div> ';
      }
      else {
         echo '<div class="container  ">
         <h4 class="py-2">Start a Discussion</h4>
         <p class="lead  "><b>You must first log in before using the system!</b></p>
         </div>';
      }
    ?>
    

     <div class="container">
         <h4 class="py-0 mt-3">Browse Questions</h4> <!--  py-2 for spacing -->
         <!-- media object from bootstrap -->
         <?php                            
    //   page rendering (getting data from database for resp categories)
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id;";
        $result = mysqli_query($conn,$sql);
        $noResult =true;
        while($row = mysqli_fetch_assoc($result)){
         $noResult =false;
         $id = $row['thread_id'];
         $title =$row['thread_title'];
         $desc =$row['thread_desc'];
         $thread_time =$row['timestamp'];
         $thread_user_id =$row['thread_user_id'];
         $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
         $result2 = mysqli_query($conn,$sql2);
         $row2 = mysqli_fetch_assoc($result2);
         
         

        echo ' <div class="media my-3">
         <img class="mr-4 mt-2" src="img\userdefault.jpg" width="34px" alt="Generic placeholder image">
         <div class="media-body">
             <p class="font-weight-bold my-0">' . $row2['$user_email'] . ' at  ['. $thread_time .'] </p> 
             <h5 class="mt-2"><a class="text-dark" href="thread.php?threadid='. $id .'">'. $title .'</a></h5>
             '. $desc .'
         </div>
     </div> ';
        
        }
        // echo var_dump($noResult);
        if($noResult){
            echo'<div class="alert alert-primary mt-4 mb-5" role="alert">
            No questions in this category. Be the first one to ask!<br>
             <a href="index.php" class="alert-link mt-2">Back to Home</a>
          </div>';
        }
    
    ?>

     </div>


     <?php include 'partials/_footer.php'; ?>



     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
         integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
     </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
         integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
     </script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
         integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
     </script>


 </body>

 <script src="script.js" type="text/javascript"></script>

 </html>