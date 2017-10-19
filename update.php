<?php

        $conn = new mysqli("localhost","id3320560_root_lol","lol1234","id3320560_organd");

      if($conn->connect_error)
        die("Connection failed".$conn->connect_error);

      $name = $_POST["name"];
      $username = $_POST["username"];
      $email = $_POST["email"];
      $dob = $_POST["dob"];
      $don_type = $_POST["don_type"];
      $blood_type = $_POST["blood_type"];
      $med_cer = basename( $_FILES['file']['name']);
     //   echo "<script>alert('".$med_cer."');</script>";
     $up=1;

      $update_q = "UPDATE user SET name='$name', email='$email', dob='$dob', don_type='$don_type', blood_type='$blood_type'WHERE username = '$username'";

      $_SESSION["name"]=$name;
     //  echo $_SESSION["name"];

      $res = $conn->query($update_q);
      if(strlen($med_cer)>0){

           $update_m = "UPDATE user SET med_cer='$med_cer'WHERE username = '$username'";
           $medres =  $conn->query($update_m);
           $targetfolder = "uploads/";

           $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

          if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
           {
             echo "<script>alert('The file ". basename( $_FILES['file']['name']). " is uploaded');</script>";
             echo "<script>alert('Your details were Successfully updated');</script>";
             echo $_SESSION["name"];
             echo "<script>window.location.replace('index.php')</script>";
           }

           else {
                $up=0;
             echo "<script>alert('Problem uploading');</script>";
             echo "<script>window.location.replace('user-profile.php')</script>";
           }
      }
      if($up==1)
         echo "<script>alert('Your details were Successfully updated');</script>";
         echo "<script>window.location.replace('index.php')</script>";

?>
