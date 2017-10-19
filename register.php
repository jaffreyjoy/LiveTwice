<?php

  if(isset($_POST["reg_btn"])) {
        $conn = new mysqli("localhost","root","","organd");

        if($conn->connect_error)
          die("Connection failed".$conn->connect_error);

        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $dob = $_POST["dob"];
        $don_type = $_POST["don_type"];
        $password = $_POST["password"];
        $cpass = $_POST["cpass"];

        $check_uname = "SELECT username FROM user WHERE username='$username'";
        $check_email = "SELECT email FROM user WHERE email='$email'";
        $register = "INSERT INTO user (name,username,email,dob,don_type,password) VALUES('$name','$username','$email','$dob','$don_type','$password')";

        $res_uname = $conn->query($check_uname);
        $res_email = $conn->query($check_email);


        if($cpass == $password) {
          if($res_uname->num_rows > 0){
            echo "<script>alert('Username already exists');window.history.go(-1);</script>";
          }

          else{

            if($res_email->num_rows > 0)
            echo "<script>alert('Email Already Registered !');window.history.go(-1);
            </script>";

            else{

              if($conn->query($register)){
                session_start();

                $_SESSION["username"] = $username;
                $_SESSION["name"] = $name;
                $_SESSION["logged"] = TRUE;

                header("location:index.php");
                exit();

              }
            }
          }
        }

        else{
          echo "<script>alert('Passwords don\'t match !!');window.history.go(-1);</script>";
        }
    }
?>
