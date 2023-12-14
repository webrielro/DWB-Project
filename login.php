<?php
session_start();
require_once('../Mcvshop/components/db.php');

$loginMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $select_query = $mysqli->prepare("SELECT UserID, Username, Password FROM user WHERE Username = ?");
        $select_query->bind_param("s", $username);
        $select_query->execute();
        $result = $select_query->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['Password'])) {
                $_SESSION['user_id'] = $row['UserID'];
                $_SESSION['username'] = $row['Username'];
                $loginMessage = 'Login successful!';
                header("Location: index.php");
                exit();
            } else {
                $loginMessage = 'Incorrect password';
            }
        } else {
            $loginMessage = 'User not found';
        }
    }
}
?>
<?php 
require_once('../Mcvshop/components/db.php');
include('../Mcvshop/components/navbar.php');
include ('../Mcvshop/components/hero.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <link href="./css/products.css" rel="stylesheet">
    <link href="./css/navbar.css" rel="stylesheet">
    <link href="./css/hero.css" rel="stylesheet">
    <link href="./css/footer.css" rel="stylesheet">
</head>

<body>
<div class="container" id="registercontainer">
    <h2>Login</h2>
    <?php if (!empty($loginMessage)): ?>
        <div class="alert alert-<?php echo ($loginMessage === 'Login successful!') ? 'success' : 'danger'; ?>" role="alert">
            <?php echo $loginMessage; ?>
        </div>
    <?php endif; ?>
    <form action="login.php" method="POST">
        <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="mb-3">
            <input type="submit" name="login" class="btn btn-primary" id="btnform" value="Login">
        </div>
    </form>
</div>

</body>
</html>
<?php 
include('../Mcvshop/components/footer.php');
?>