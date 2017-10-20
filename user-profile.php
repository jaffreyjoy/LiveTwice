<?php
  session_start();
        $conn = new mysqli("localhost","id3320560_root_lol","lol1234","id3320560_organd");

      $un = $_SESSION['username'];

      $sql = "SELECT * FROM user WHERE username='$un'";

      $result = $conn->query($sql);

      $row = $result->fetch_assoc();
      $name = $row["name"];

       $_SESSION['name'] = $name;

      $email = $row["email"];
      //  echo "<script>alert('".$email."');</script>";
      $dob = $row["dob"];
      $don_type = $row["don_type"];
      $blood_type = $row["blood_type"];
      $med_cer = $row["med_cer"];

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Profile</title>
  <link rel="icon" type="image/x-icon" href="favicon.ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <!-- *****************************************NAVBAR STARTS HERE **************************************************-->
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <ul  style="padding-top:5%;font-size:100px;">
        <a class="navbar-brand" href="index.php">LiveTwice!</a>
      </ul>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" style="padding-top:0.4%; font-size:15px;">
        <li><a href="#">&emsp;&emsp;&emsp;Home</a></li>
        <li><a href="laws.html">Laws</a></li>
        <li><a href="index.php#below">Helplines</a></li>
        <li><a href="forum.php">Forum</a></li>
        <li><a href="donorc.php">Donor Card</a></li>
      </ul>


    <?php

          if(isset($_SESSION["logged"]) && $_SESSION["logged"]!=TRUE)
          echo '<ul class="nav navbar-nav navbar-right">
             <li><a href="login.html">Login/Sign Up</a></li>
           </ul>';

           else{
             echo '<ul class="nav navbar-nav navbar-right"><li class="active" style="padding-top:4%;"><a href="user-profile.php"><span class="glyphicon glyphicon-user"></span>&emsp;';
                echo $_SESSION["name"];
                echo ' </a></li>
                <li><a href="index.php"><form method="POST"><li><button class="btn btn-danger" name="destroy" type="submit" >Log Out</button></li></form></a></li>
              </ul>';
           }

          if(isset($_POST["destroy"])){
            $_SESSION["logged"] = FALSE;
            echo '<script>window.location.replace("index.php")</script>';
            exit();
          }

    ?>


     <!--   <ul class="nav navbar-nav navbar-right">
        <li><a href="login.html">Login/Sign Up</a></li>
      </ul>  -->

</div>
</nav>
 <form class="" action="update.php" enctype="multipart/form-data" method="post">
    <div class="card" style="padding-left:10%">
      <h1 class="card-header">Your Profile :-</h1><br>
      <div class="card-block">
        <div class="col-md-4">
          <u><h4 class="card-title">Personal details :-</h4></u><br>
          <label class="card-text">Name : </label><br>
            <input style="width:60%;" id="name" type="text" name="name" class="form-control" value=""><br>
          <label class="card-text">Username :</label>
             <input style="width:60%;" id="un" type="text" name="username" class="form-control" value="" readonly><br>
          <label class="card-text">Email : </label><br>
            <input style="width:60%;" id="email" type="text" name="email" class="form-control" value=""><br>
          <label class="card-text">DOB : </label><br>
            <input style="width:60%;" id="dob" type="date" name="dob" class="form-control" value=""><br>
          <br><br>
        </div>

        <div class="col-md-4">
          <u><h4 class="card-title">Donation details :-</h4></u><br>
          <label class="card-text">Donor type :</label><br>
            <input style="width:60%;" id="don_type"  type="text" name="don_type"  class="form-control" value=""><br>
          <label class="card-text">Blood Type :</label><br>
           <input style="width:60%;" id="blood_type"  type="text"  name="blood_type" class="form-control" value=""><br>
          <label class="card-text">Medical Certificate :</label><br>
          <p>Previously uploaded file :- <label id="med_cername"></label></p>
          <input style="width:60%;" id="med_cer" name="file" type="file" class="form-control" value=""><br><br><br>
          <button class="btn btn-primary" type="submit" name="button">Update Details</button>
        </div>
    </div>
    

  </form>
  <script>
      document.getElementById('name').value="<?php echo $name?>"
      document.getElementById('un').value="<?php echo $un?>";
      document.getElementById('email').value="<?php echo $email?>";
      document.getElementById('dob').value="<?php echo $dob?>";
      document.getElementById('don_type').value="<?php echo $don_type?>";
      document.getElementById('blood_type').value="<?php echo $blood_type?>";
      document.getElementById('med_cername').innerHTML="<?php echo $med_cer?>";
	</script>

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
