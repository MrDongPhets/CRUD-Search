<?php
    include_once 'includes/DPhp.php';
    session_start();
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login Form</title>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Css/style10.css" />

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
    <div class="container-fluid section">
      <div>
        <h2>- REGISTER -</h2>
      </div>
      <form action="" name="" method="POST" class="form1">
        <p>
          <input
            type="text"
            id="Fname"
            name="Fname"
            placeholder="Firstname"
            required
          />
        </p>
        <p>
          <input
            type="text"
            id="Lname"
            name="Lname"
            placeholder="Lastname"
            required
          />
        </p>
        <p>
          <input
            type="text"
            id="email"
            name="email"
            placeholder="Email"
            required
          />
        </p>
        <p>
          <input
            type="text"
            id="Uid"
            name="Uid"
            placeholder="Username"
            required
          />
        </p>
        <p>
          <input
            type="password"
            id="pass"
            name="pass"
            placeholder="Password"
            required
          />
        </p>
        <p>
          <select name="userType">
            <option value="user">User</option>
            <option value="admin">Admin</option>
          </select>
        </p>
        <p>
          <button class="bt1" id="submit" name="submit">SUBMIT</button>
        </p>
      </form>
      <form action="" method="POST">
        <button class="bt1" id="back" name="back">BACK</button>
      </form>
    </div>

    <?php
 if(isset($_POST['submit'])){
        
    $fname = $_POST['Fname'];
    $lname = $_POST['Lname'];
    $Email = $_POST['email'];
    $UID = $_POST['Uid'];
    $password = $_POST['pass'];
    $user_type = $_POST['userType'];

    $sql = "INSERT INTO users (user_Firstname,user_Lastname,user_email,user_uid,user_password,userType)  
    VALUES ('$fname','$lname','$Email','$UID','$password','$user_type');";

mysqli_query($conn, $sql);
    $_SESSION['user_type'] = $user_type;
    header("Location:index.php");
  }

if(isset($_POST['back'])){
    header("Location:index.php");
  }
  
    ?>
  </body>
</html>
