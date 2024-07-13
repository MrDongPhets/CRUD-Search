<?php
    include_once 'includes/DPhp.php';

  if(count($_POST) >0){ mysqli_query($conn,"UPDATE users set user_Firstname='". $_POST['Fname'] ."', 
 user_email='". $_POST['email'] . "',
        user_uid='". $_POST['Uid'] . "', user_password='". $_POST['pass'] . "' WHERE user_id='" . $_GET['id'] ."'"); 
        $message = "<p style='color:green;'>Record Modified Successfully !</p>";
      } 

  $result = mysqli_query($conn,"SELECT * FROM users WHERE user_id='" .$_GET['id'] . "'");
  $row = mysqli_fetch_array($result); ?>

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
    <div class="container-fluid section1">
      <div>
        <h2>- UPDATE -</h2>
      </div>
      <div>
        <?php
            if(isset($message)) {echo $message; }
        ?>
      </div>
      <form action="" name="" method="POST" class="form1">
        <input
          type="hidden"
          id="id"
          name="id"
          placeholder="id"
          value="<?php echo $row['user_id']; ?>"
          required
        />
        <p>
          <input
            type="text"
            id="Fname"
            name="Fname"
            placeholder="Firstname"
            value="<?php echo $row['user_Firstname']; ?>"
            required
          />
        </p>
        <p>
          <input
            type="text"
            id="email"
            name="email"
            placeholder="Email"
            value="<?php echo $row['user_email']; ?>"
            required
          />
        </p>
        <p>
          <input
            type="text"
            id="Uid"
            name="Uid"
            placeholder="Username"
            value="<?php echo $row['user_uid']; ?>"
            required
          />
        </p>
        <p>
          <input
            type="password"
            id="pass"
            name="pass"
            placeholder="Password"
            value="<?php echo $row['user_password']; ?>"
            required
          />
        </p>
        <p>
          <button class="bt1" id="submit" name="submit">SUBMIT</button>
        </p>
        <p>
          <button class="bt1" id="back" name="back">BACK</button>
        </p>
      </form>
    </div>

    <?php

        if(isset($_POST['submit'])){


        header("Location:dashboard_admin.php");
        }
        if(isset($_POST['back'])){
            header("Location:dashboard_admin.php");
          }
      


?>
  </body>
</html>
