<?php
    if(isset($_POST["login_btn"])) {

        $conn = new mysqli("localhost","id3320560_root_lol","lol1234","id3320560_organd");

    if($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT username,password,name FROM user WHERE username='$username' AND password='$password'";

    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    if($result->num_rows > 0){
      session_start();

      $_SESSION["username"] = $username;
      $_SESSION["name"] = $row["name"];
      $_SESSION["logged"] = TRUE;

      echo "<script>alert('Login Successfull!');window.location.replace('index.php');</script>";
       exit();
    }

    else{
      echo "<script>
                var r = confirm('Invalid username or password!!');
                if (r==true)
                {
                  window.location.replace('login.html');
                }
                else
                {
                  window.location.replace('index.php');
                }
            </script>";
    //   header("location:login.html");
    }

    $conn->close();
}
?>
