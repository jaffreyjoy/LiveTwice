<?php
  session_start();
  $conn = new mysqli("localhost","id3320560_root_lol","lol1234","id3320560_organd");
  if(isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $sql = "SELECT name FROM user WHERE username='$username'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $_SESSION["name"] = $row["name"];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>LiveTwice</title>
  <link rel="icon" type="image/x-icon" href="favicon.ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
      <a class="navbar-brand" href="">LiveTwice!</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active" href="#"><a href="">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="laws.html">Laws</a></li>
        <li><a href="index.php#below">Helplines</a></li>
        <li><a href="forum.php">Forum</a></li>
        <li><a href="ngo.html">NGOs</a></li>
        
      <?php
          if(isset($_SESSION["logged"]) && $_SESSION["logged"]==TRUE)
          echo' <li><a href="donorc.php">Donor Card</a></li>';
      ?>

      </ul>

      <!-- <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="#">Welcome <b> <?php echo $_SESSION['login_user']; ?> </b>Logout</a>
        </li>
      </ul> -->


    <?php

          if((isset($_SESSION["logged"]) && $_SESSION["logged"]!=TRUE) || (!isset($_SESSION["logged"])))
          echo '<ul class="nav navbar-nav navbar-right">
             <li><a href="login.html">Login/Sign Up</a></li>
           </ul>';

           else {
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


      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->



     <!-- <h2><a href = "logout.php">Sign Out</a></h2>-->

<!-- *****************************************NAVBAR ENDS HERE **************************************************-->



<div class="container">

  <div id="myCarousel" class="carousel slide" data-ride="carousel" position="absolute">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>


    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" >
      <div class="item active">
        <img src="assets/Donate-Organs.jpg"  style="width:100%;max-height: 20%;">
         <div class="container">
        <div class="carousel-caption">

          <p></p>
          <p align="left"><a class="btn btn-lg btn-success"  href="learn.html">Learn More!</a>
        </p>
        </div>
      </div>

      </div>

      <div class="item">
        <img src="assets/Organ.jpg"  style="width:100%;max-height:20%;">
      </div>

      <div class="item">
        <img src="assets/Lead-organ-donation.jpg"  style="width:100%;max-height: 20%;">
      </div>

<div class="item">
        <img src="assets/hero.png"  style="width:100%;max-height: 20%;">
      </div>

      <div class="item" >

        <img src="assets/organ-donation1.jpg"  style="width:100%;max-height: 20%;">
        <div class="container">
        <div class="carousel-caption">

          <p></p>
          <p align="right"><a class="btn btn-lg btn-danger"  href="">Register Now!</a>
        </p>
        </div>
      </div>








        <!--<img src="assets/vutton.png" style="width:20%;height: 10%;"class="btn btn-lg btn-primary" style=" position: absolute; top: 0;right: 0;" class="conner">-->


      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</nav>

<h3><b>Organ banks in Mumbai</b></h3>
<center><iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d348150.5458285042!2d72.72087647175589!3d19.073308780777676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sorgan+donation+banks+mumbai!5e0!3m2!1sen!2sin!4v1508309292827" width="600" height="450" frameborder="0" style="border:0; width:100%" allowfullscreen></iframe></center>


<h3><b>Major Organ Banks in India</b></h3>
<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d16475000.78370975!2d71.72388431185604!3d22.32501378436492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sorgan+donation+banks+india!5e0!3m2!1sen!2sin!4v1508310311249" width="600" height="450" frameborder="0" style="border:0;width:100%" allowfullscreen></iframe>


<br>
<br>

<div id="below">
<div class="row left">
        <div class="col-sm-6 border-right blue";>
            <h2 style="padding-left: 40px">More Options</h2>
            <ul class="list-unstyled emphasised-list"; style="font-size: 20px;padding-left: 40px">
                <li><a href="http://www.organdonation.nhs.uk/register-to-donate/amend-your-details-on-the-register/">Update my details and decision</a></li>
                <li><a href="http://www.organdonation.nhs.uk/register-to-donate/withdraw/">Withdraw from the register</a></li>
                <li><a href="http://www.organdonation.nhs.uk/register-to-donate/nominate-a-representative/">Nominate a representative</a></li>
            </ul>
        </div>
        <br>
        <p style="padding-right: 20px; font-size: 20px;padding-left: 50px; padding-right: 40px">If you're not sure if you're registered or would prefer to speak to someone about your decision, you can call us</p><div class="col-sm-6 add-padd top left">
            
            <span class="large-text blue-text"><span class="glyphicon glyphicon-earphone circled-icon" aria-hidden="true"; style="font-size: 20px"></span><a href="tel:25444789"; style="font-size: 20px">25444789</a></span>
        </div>
    </div>
</div>


 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
