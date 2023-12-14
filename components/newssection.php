<div id="newswrapper" class="album py-5" style="background-color: #F5F5F5;">
    <div id="newscontainer" class="container">
        <h3>LATEST NEWS</h3>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            <?php
            include 'components/db.php';

            $query = "SELECT * FROM news WHERE IsLatest = 1 ORDER BY DatePosted DESC LIMIT 3"; 
            $result = $mysqli->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col" id="newsection">
                            <div class="card shadow-sm">
                                <img id="newsimg" class="bd-placeholder-img card-img-top" src="/Mcvshop/img/news' . $row["NewsID"] . '.jpg" alt="this is an article image">
                                <div class="card-body" id="news-card-body">
                                    <p class="card-title" id="newscardtitle">' . $row["Title"] . '</p>
                                    <p class="card-text" id="cardtextnews">' . $row["Content"] . '</p>
                                    <div class="buttoncontainer">
                                        <a href="/Mcvshop/news.php" class="btn btn-sm btn-outline-secondary">read more ></a>
                                    </div>
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
