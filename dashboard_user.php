<?php
    include_once 'includes/DPhp.php';
    session_start();

    if(isset($_POST['update'])){ mysqli_query($conn,"UPDATE users set user_Firstname='". $_POST['Fname'] ."', 
      user_Lastname='". $_POST['Lname'] . "', user_email='". $_POST['email'] . "',
          user_uid='". $_POST['Uid'] . "', user_password='". $_POST['pass'] . "' WHERE user_id='" . $_POST['id'] ."'"); 
          $message = "<p style='color:green;'>Record Modified Successfully !</p>";

          $_SESSION['firstname'] = $_POST['Fname'];
          $_SESSION['lastname'] = $_POST['Lname'];
          $_SESSION['email'] = $_POST['email'];
          $_SESSION['uid'] = $_POST['Uid'];
          $_SESSION['password'] = $_POST['pass'];
        } 

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
            <p class="next"><a href="index.php">LOGOUT</a></p>
          </ul>
        </div>
      </div>
    </div>
    <div class="container-fluid section">
      <div>
        <h2>- USER -</h2>
      </div>
      <div>
      <?php
            if(isset($message)) {echo $message; }
        ?>
      </div>
      
      <form action="" name="" method="POST" class="form1">
      <p>
          <input class="input1"
            type="hidden"
            id="id"
            name="id"
            value=" <?php echo $_SESSION["id"]; ?>"
           
          />
        </p>
        <p>
          <input class="input1"
            type="text"
            id="Fname"
            name="Fname"
            value=" <?php echo $_SESSION["firstname"]; ?>"
           
          />
        </p>
        <p>
          <input class="input1"
            type="text"
            id="Lname"
            name="Lname"
            value="<?php echo $_SESSION["lastname"]; ?>"
      
          />
        </p>
        <p>
          <input class="input1"
            type="text"
            id="email"
            name="email"
            value="<?php echo $_SESSION["email"]; ?>"
           
          />
        </p>
        <p>
          <input class="input1"
            type="text"
            id="Uid"
            name="Uid"
            value="<?php echo $_SESSION["uid"]; ?>"
        
          />
        </p>
        <p>
          <input class="input1"
            type="text"
            id="pass"
            name="pass"
            value="<?php echo $_SESSION["password"]; ?>"
            
          />
        </p>
       
        <p>
          <button class="bt1" id="update" name="update">UPDATE</button>
        </p>
      </form>
      
    </div>
    
</body>



</html>