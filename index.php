<?php
  session_start();
  include_once 'includes/DPhp.php';
?>
<!DOCTYPE html>
<html lang ="en">

<head>
<title>Login Form</title>
<meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Css/style5.css" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>

</head>
<body>
<div class="main2">
      <div class="icon">
        <h2 class="logo">CASTLE</h2>
      </div>
      <div class="navbar">
        <div class="menu">
          <ul>
            <p class="next"><a href="#section1">HOME</a></p>
            <p class="next"><a href="#section2">ABOUT</a></p>
            <p class="next"><a href="#section3">CONTACTS</a></p>
          </ul>
        </div>
      </div>
    </div>
    <div class="container-fluid section" method = "POST">
      <div class="image">
      <img src="image/user.png" alt="" />
      </div>
        <form action="" id="loginForm" method = "POST">
          <h1>LOGIN</h1>

          <?php
    if(isset($_POST['register'])){
      header("Location:register.php");
    }

    if(isset($_POST['login'])){
      $username = $_POST['user'];
      $password = $_POST['pass'];


      $select = mysqli_query($conn, "SELECT * FROM users WHERE user_uid = '$username' AND user_password = '$password'");
      $row = mysqli_fetch_array($select);

      if(is_array($row)) {
        
      if($row['userType'] == 'user'){
        $_SESSION['id'] = $row['user_id'];
        $_SESSION['firstname'] = $row['user_Firstname'];
        $_SESSION['lastname'] = $row['user_Lastname'];
        $_SESSION['email'] = $row['user_email'];
        $_SESSION['uid'] = $row['user_uid'];
        $_SESSION['password'] = $row['user_password'];
        $_SESSION['user_type'] = $row['userType'];
        header("Location:dashboard_user.php");
      }else if($row['userType'] == 'admin'){
        header("Location:dashboard_admin.php");
      }
    }else{
      $message = "<p style='color:red;'>Incorrect Username or Password !</p>";
      echo $message;
  }
  }

    ?>
          <p></p>
          <input class="input" type="text" placeholder="Username" id="user" name="user" />
          </p>
          <p>
          <input class="input"
            type="password"
            placeholder="Password"
            id="password"
            name="pass"  
          />
          </p>
          <button class="bt2" id="login" name="login">LOGIN</button>
          
          <button class="bt2" id="register" name="register">REGISTER</button>
          
        </form>
  
    </div>



</body>



</html>