<?php 
require_once('../Mcvshop/components/db.php');
include('../Mcvshop/components/navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MCV Shop - Welcome to DWB Project E-commerce!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <link href="./css/newssection.css" rel="stylesheet">
    <link href="./css/products.css" rel="stylesheet">
    <link href="./css/navbar.css" rel="stylesheet">
    <link href="./css/hero.css" rel="stylesheet">
    <link href="./css/footer.css" rel="stylesheet">
</head>
<body>

<div id="newswrapper" class="album py-5" style="background-color: #F5F5F5;">
    <div id="newscontainer" class="container">
        <h3>MCVSHOP NEWS</h3>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">

            <?php
            include 'components/db.php';

            $query = "SELECT * FROM news ORDER BY DatePosted DESC"; 
            $result = $mysqli->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col" id="newsection">
                            <div class="card shadow-sm">
                                <img id="newsimgf" class="bd-placeholder-img card-img-top" src="/Mcvshop/img/news' . $row["NewsID"] . '.jpg" alt="this is an article image">
                                <div class="card-body" id="news-card-body">
                                    <p class="card-title" id="newscardtitle">' . $row["Title"] . '</p>
                                    <p class="card-text" id="cardtextnews">' . $row["Content"] . '</p>
                                </div>
                            </div>
                        </div>';
                }
            } else {
                echo "No news articles available.";
            }
            $mysqli->close(); 
            ?>

        </div>
    </div>
</div>


<?php 
include('../Mcvshop/components/footer.php');
?>
</body>
</html>
