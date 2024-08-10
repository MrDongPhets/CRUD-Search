<?php
include_once 'includes/DPhp.php';


// Handle search request
if (isset($_POST['search'])) {
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    if (!empty($username)) {
        // Search users by username or firstname
        $searchQuery = "SELECT * FROM users WHERE user_uid = '$username' OR user_Firstname='$username'";
    } else {
        // If search input is empty, display all users
        $searchQuery = "SELECT * FROM users ";
    }
} else {
    // If no search request, display all users
    $searchQuery = "SELECT * FROM users ";
}

// Execute the query
$searchResult = mysqli_query($conn, $searchQuery);

// Handle add request
if (isset($_POST['ADD'])) {
    header("Location:add.php");
    exit(); // Make sure to stop script execution after redirect
}

// Handle delete request
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $deleteQuery = "DELETE FROM users WHERE user_id='$id'";
    mysqli_query($conn, $deleteQuery);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Form</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Css/style5.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
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
                <input type="text" id="username" name="username" placeholder="Search" />
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

            <?php if (mysqli_num_rows($searchResult) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($searchResult)): ?>
                    <tr>
                        <td><?php echo ($row["user_id"]); ?></td>
                        <td><?php echo ($row["user_Firstname"]); ?></td>
                        <td><?php echo ($row["user_email"]); ?></td>
                        <td><?php echo ($row["user_uid"]); ?></td>
                        <td><?php echo ($row["user_password"]); ?></td>
                        <td><?php echo ($row["userType"]); ?></td>
                        <td><a href="update.php?id=<?php echo ($row["user_id"]); ?>">UPDATE</a></td>
                        <td><a class="remove" href="dashboard_admin.php?id=<?php echo ($row["user_id"]); ?>">DELETE</a></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No users found</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>

</html>
