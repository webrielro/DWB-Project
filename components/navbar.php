<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="fastdeliveryinfo">
    <h1>FAST DELIVERY - EVERYWHERE IN DENMARK 🚚🎉</h1>
</div>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="navbar-header mr-auto">
        <a href="/Mcvshop/index.php">
            <img class="mcvlogo" src="/Mcvshop/img/logoblack.png" alt="this is a logo" />
        </a>
    </div>
    <div class="container-fluid">
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav mr-auto">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Mcvshop/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Mcvshop/aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Mcvshop/news.php">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Mcvshop/products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Mcvshop/contact.php">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-nav ms-auto">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo 'Hello, ' . $_SESSION['username'];
                            } else {
                                echo 'Account';
                            }
                            ?>
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo '<li><a class="dropdown-item" href="logout.php">Logout</a></li>';
                            } else {
                                echo '<li><a class="dropdown-item" href="login.php">Log-In</a></li>';
                                echo '<li><a class="dropdown-item" href="register.php">Register</a></li>';
                            }
                            ?>
                            <li><a class="dropdown-item" href="components/admin_login.php">AdminPanel</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Mcvshop/cart.php">My Cart</a>
                    </li>
                </ul>
            </div>
            <form class="searchbtn d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button id="btnsearch" class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
