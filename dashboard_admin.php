<?php
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
            <p class="next"><a href="index.php">LOGOUT</a></p>
          </ul>
        </div>
      </div>
    </div>
 
<div class="container-fluid section3">
      <div>
        <form action="" method="POST" class="search">
        <input type = "text" id ="username" name  = "username" placeholder="Search" />  
        <button class="bt4" id="search" name="search">Search</button>
        </form>
        <form action="" class="add" method="POST">
        <button class="bt4" id="ADD" name="ADD">ADD</button>
        </form>
        
        </div>
    <table>
        <tr>
            <th>id</th>
            <th>Firstname</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>UserType</th>
            <th>ACTION</th>
            <th>REMOVE</th>
        </tr>
        <?php

        if(isset($_POST['search'])){

          $username = $_POST['username'];

          $add = mysqli_query($conn,"SELECT * FROM users WHERE user_uid = '$username' OR user_Firstname='$username'");
          $show = mysqli_fetch_array($add);

          $result = mysqli_query($conn,"SELECT * FROM users WHERE user_uid = '$username' OR user_Firstname='$username'");
          $row = mysqli_fetch_array($result);

          if(mysqli_num_rows($result) > 0){

                ?>
                <tr>
                <td><?php echo $show["user_id"]; ?></td>
                <td><?php echo $show["user_Firstname"]; ?></td>
                <td><?php echo $show["user_email"]; ?></td>
                <td><?php echo $show["user_uid"]; ?></td>
                <td><?php echo $show["user_password"]; ?></td>
                <td><?php echo $show["userType"]; ?></td>
                <td><a href="update.php? id=<?php echo $show["user_id"]; ?>">UPDATE</a></td>
                <td><a class="remove" href="dashboard_admin.php? id=<?php echo $show["user_id"]; ?>">DELETE</a></td>

                </tr>

            </table>
            <?php
          }else{
            echo "<script> alert('User not found'); </script>";
          }
        }
            ?>
           
         
           
      
    </div>

    <?php

    if(isset($_POST['ADD'])){
      header("Location:add.php");
    }

    if(isset($_GET['id'])){
      $id=($_GET['id']);
      $delete=mysqli_query($conn,"DELETE FROM users WHERE user_id='$id'");
    }

    $select =  "SELECT * FROM users";
    $delete = mysqli_query($conn,$select);
?>
    
</body>



</html>