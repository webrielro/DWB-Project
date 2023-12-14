<?php
session_start();
require_once('../Mcvshop/components/db.php');

$registrationSuccess = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $streetAddress = $_POST['streetAddress'];
        $city = $_POST['city'];
        $postalCode = $_POST['postalCode'];
        $phone = $_POST['phone'];

        $insert_query = $mysqli->prepare("INSERT INTO user (Username, Password, Email, FirstName, LastName, StreetAddress, City, PostalCode, Phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert_query->bind_param("sssssssss", $username, $password, $email, $firstName, $lastName, $streetAddress, $city, $postalCode, $phone);
        $insert_query->execute();

        $registrationSuccess = 'Registration successful!';
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
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <link href="./css/products.css" rel="stylesheet">
    <link href="./css/navbar.css" rel="stylesheet">
    <link href="./css/hero.css" rel="stylesheet">
    <link href="./css/footer.css" rel="stylesheet">
</head>
<body>

<div class="container" id="registercontainer">
    <h2>Register</h2>
    <?php if (!empty($registrationSuccess)): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $registrationSuccess; ?>
        </div>
    <?php endif; ?>
    <form action="register.php" method="POST">
        <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <input type="text" name="firstName" class="form-control" placeholder="First Name">
        </div>
        <div class="mb-3">
            <input type="text" name="lastName" class="form-control" placeholder="Last Name">
        </div>
        <div class="mb-3">
            <input type="text" name="streetAddress" class="form-control" placeholder="Street Address">
        </div>
        <div class="mb-3">
            <input type="text" name="city" class="form-control" placeholder="City">
        </div>
        <div class="mb-3">
            <input type="text" name="postalCode" class="form-control" placeholder="Postal Code">
        </div>
        <div class="mb-3">
            <input type="text" name="phone" class="form-control" placeholder="Phone">
        </div>
        <div class="mb-3">
            <input type="submit" name="register" class="btn btn-primary" id="btnform" value="Register">
        </div>
    </form>
</div>

</body>
</html>
<?php 
include('../Mcvshop/components/footer.php');
?>