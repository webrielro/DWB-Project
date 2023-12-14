<?php
session_start();

if (isset($_SESSION['admin'])) {
    header("Location: admin_dashboard.php");
    exit();
}

include("db.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    $sql = "SELECT Password FROM Adminuser WHERE Username = '$admin_username'";
    $result = $mysqli->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['Password'];

        if (password_verify($admin_password, $hashed_password)) {
            $_SESSION['admin'] = true;
            header("Location: admin_dashboard.php");
            exit();
        }
    }

    $login_error = "Error: The username or the password is not registered on this site.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/admin_login.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>
<body>
    <div class="logincontainer">
    <img src="../img/websitelogo.png" alt="this is a websitelogo" class="websitelogo"/>
    <h1>CMS Admin Login</h1>
    <?php if (isset($login_error)) { echo "<p>$login_error</p>"; } ?>
    <form method="post" action="admin_login.php">
        <input type="text" name="admin_username" placeholder="Username" required><br>
        <input type="password" name="admin_password" placeholder="Password" required><br>
        <input id="submitbtnadmin" type="submit" value="Login">
    </form></div>
</body>
</html>
