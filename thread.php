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
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE thread_id=$id;";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
         $title =$row['thread_title'];
         $desc =$row['thread_desc'];
        
        }
    ?>

    <!-- comments -->
    <?php
        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){
            //Insert into comments database
            $comment =$_POST['comment'] ;       //$_POST - Predefined super global variable, title,desc from form.
            

            //write a sql for insertion          remove thread_id as it is on auto_increment
            $sql = "INSERT INTO `comments` ( `comment_text`, `thread_id`, `comment_by`,
             `comment_time`)
             VALUES (  '$comment', '$id', '0', current_timestamp());";
            $result = mysqli_query($conn,$sql);
            $showAlert = true;
            if($showAlert){
                echo '
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                       <strong>Success!</strong> Your comment has been added.
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
            <h3 class="display-6"><?php echo $title;?> forum</h3>
            <p class="small-lead"><?php echo $desc;?>
            </p>
            <hr class="my-4">
            <p>This forum is for interacting with your peers and having discussions. <br>
                Rules to be followed:<br>
                1.No Spam / Advertising / Self-promote in the forums. <br>
                2.Do not post “offensive” posts, links or images.
            </p>
            <p class="lead">
            <p><b>Posted by: Sejal</b></p>
            </p>
        </div>
    </div>

 <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    echo ' <div class="container my-0">
     <h4 class="py-2 my-0">Post a Comment</h4>
         <!-- form template from bootstrap -->
          <form action="' .$_SERVER['REQUEST_URI'] .'" method="post">
              <div class="form-group">
              <label for="exampleFormControlTextarea1">Type your comment:</label>
              <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
              </div>
                 <button type="submit" class="btn btn-primary btn-sm mb-4">Post Comment</button>
          </form>
     </div> ';
      }
      else {
         echo '<div class="container  ">
         <h4 class="py-2">Post a Comment</h4>
         <p class="lead  "><b>You must first log in before using the system!</b></p>
         </div>';
      }
 ?>


    <div class="container">
        <h4 class="py-0">Discussion:</h4> <!--  py-2 for spacing -->
        <!-- media object from bootstrap -->
        <?php                            
    //   page rendering (getting data from database for resp categories)
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE thread_id=$id;";
        $result = mysqli_query($conn,$sql);
        $noResult=true;
        while($row = mysqli_fetch_assoc($result)){
         $id = $row['comment_id'];
         $content =$row['comment_text'];
         $comment_time=$row['comment_time'];
         $noResult=false;

        echo ' <div class="media my-3">
         <img class="mr-4 mt-2" src="img\userdefault.jpg" width="34px" alt="Generic placeholder image">
         <div class="media-body">
               <p class="font-weight-bold my-0">Anonymous User at  ['. $comment_time .']</p>   
             '. $content .'
         </div>
     </div> ';
        
        }
         // echo var_dump($noResult);
         if($noResult){
            echo'<div class="alert alert-primary mt-4 mb-5" role="alert">
            No comments in this category. Be the first one to ask!<br>
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