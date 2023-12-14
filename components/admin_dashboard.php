<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$adminName = $_SESSION['admin_name'] ?? 'Admin';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin_dashboard.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384-Bw5e5HJzyCnv1ktA5meWH5z12DfaadB1gBY3Kut/n3Qu8E4GF3mOVKd5mc5e5cm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
    <img src="../img/websitelogo.png" alt="this is a websitelogo" class="websitelogo"/>
    <p>Welcome, <?php echo $adminName; ?>!</p>
    <h2 class="dashboard">Admin Dashboard</h2>
    <div class="options">
        <a href="add_news.php" class="option">Edit News</a>
        <a href="edit_products.php" class="option">Edit Products</a>
    </div>

    <div class="account" id="account">
         Settings
        <div class="account-dropdown" id="accountDropdown">
            <a href="admin_logout.php">Logout</a>
        </div>
    </div>

    <script>
        const account = document.getElementById("account");
        const accountDropdown = document.getElementById("accountDropdown");

        account.addEventListener("click", () => {
            if (accountDropdown.style.display === "block") {
                accountDropdown.style.display = "none";
            } else {
                accountDropdown.style.display = "block";
            }
        });

        document.addEventListener("click", function(event) {
            if (event.target !== account && event.target !== accountDropdown) {
                accountDropdown.style.display = "none";
            }
        });
    </script>
</body>
</html>