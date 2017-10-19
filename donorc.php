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
  <link rel="icon" type="image/x-icon" href="favicon.ico" />
  <title>Donor Card</title>
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
        <li><a href="index.php">&emsp;&emsp;&emsp;Home</a></li>
        <li><a href="laws.html">Laws</a></li>
        <li><a href="index.php#below">Helplines</a></li>
        <li><a href="forum.php">Forum</a></li>
        <li class="active"><a href="donorc.php">Donor Card</a></li>
      </ul>


    <?php

          if(isset($_SESSION["logged"]) && $_SESSION["logged"]!=TRUE)
          echo '<ul class="nav navbar-nav navbar-right">
             <li><a href="login.html">Login/Sign Up</a></li>
           </ul>';

           else{
             echo '<ul class="nav navbar-nav navbar-right"><li style="padding-top:4%;"><a href="user-profile.php"><span class="glyphicon glyphicon-user"></span>&emsp;';
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
        <div id="mainContainer" class="container" style="width:40%;border:3px solid grey;border-radius:15px;">
              <div class="row">
                  <div class="panel panel-default my_panel">
                    <div class="panel-body">
                      <img src="assets/dcard.png" alt="" class="img-responsive center-block" />
                    </div>
                      <h3>&nbsp;DONOR DETAILS:-</h3>
                      <div class="col-md-5">
                        <br>
                        Name : &emsp;&emsp;<label id="name" class="card-text" name="name"></label><br>
                        Email : &emsp;&emsp;&nbsp;<label id="email" class="card-text" name="email"> </label><br>
                        DOB :&emsp;&emsp;&nbsp;&nbsp;<label id="dob" class="card-text" name="dob"> </label><br><br>
                      </div>

                      <div class="col-md-4">
                          <br>
                        Type of Donor : &nbsp;&nbsp; <label id="don_type" class="card-text" name="don_type"></label><br>
                        Blood Group :  &nbsp;&nbsp;<label id="blood_type" class="card-text" name="blood_type"> </label><br>
                    </div>
                    </div>
                </div>
          </div>
  <script>
      document.getElementById('name').innerHTML="<?php echo $name?>";
      document.getElementById('email').innerHTML="<?php echo $email?>";
      document.getElementById('dob').innerHTML="<?php echo $dob?>";
      document.getElementById('don_type').innerHTML="<?php echo $don_type?>";
      document.getElementById('blood_type').innerHTML="<?php echo $blood_type?>";
      document.getElementById('med_cername').innerHTML="<?php echo $med_cer?>";
	</script>

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
