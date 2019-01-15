<?php

$db_host = 'localhost';
$db_name = 'heldendenken';
$db_user = 'root';
$db_password = '';
$pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_password);

//The scripts connect to a wordpress database
$wordpress_short = "ggcx"; //The little text thing that wordpress sets before the table name
$lyrics_category = "17"; //term_id @ terms; ID from your songtexts
$baselink = "https://media.adarkhero.de/txt/"; //Base link for the menu stuff
$featured_db_name = $wordpress_short."_"."featuredSongs"; //Database for featured songs

$categories = array();
$category_names = array();
//Reads all albums from the database
$sql = "SELECT ".$wordpress_short."_term_taxonomy.term_id, name, parent FROM ".$wordpress_short."_term_taxonomy "
        . "LEFT JOIN ".$wordpress_short."_terms "
        . "ON ".$wordpress_short."_terms.term_id = ".$wordpress_short."_term_taxonomy.term_id "
        . "WHERE parent = ".$lyrics_category;
foreach ($pdo->query($sql) as $row) {
   array_push($categories, $row["term_id"]);
   array_push($category_names, $row["name"]);
}



function getSongLists($categories, $category_names, $wordpress_short, $baselink, $pdo){
    $post_dates = array();
    $post_titles = array();
    $post_names = array();
    //Read all the songs in the albums
    foreach ($categories as $index => &$value){
        $sql = "SELECT post_date, post_title, post_name FROM ".$wordpress_short."_posts "
                . "INNER JOIN ".$wordpress_short."_term_relationships "
                . "ON ".$wordpress_short."_posts.ID = ".$wordpress_short."_term_relationships.object_id "
                . "WHERE term_taxonomy_id = ".$value." "
                . "ORDER BY post_date DESC";
    foreach ($pdo->query($sql) as $row) {
       array_push($post_dates, $row["post_date"]);
       array_push($post_titles, $row["post_title"]);       
       array_push($post_names, $row["post_name"]);
    }

    //Display the categories as dropdown 
        ?>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php
        echo $category_names[$index];
        ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
       <?php
       foreach ($post_titles as $postindex => $postvalue) {
            echo '<a class="dropdown-item" href="'.$baselink.$post_names[$postindex].'/" target="_blank">'.$postvalue.'</a>';
        }
       
       echo '</div>';
    }
}

function getFeaturedSongs($featured_db_name, $pdo){
    $sql = "SELECT * FROM ".$featured_db_name."";
    foreach ($pdo->query($sql) as $row) {
       ?>
        <div class="col-12 col-lg-4">

            <p class="lead song-name">
                <?php echo $row["Name"]; ?>
            </p>

            <a href="<?php echo $row["Picture"]; ?>" target="_blank">
                <img src="<?php echo $row["Picture"]; ?>" class="img-fluid song-image" alt="Responsive image">
            </a>

            <blockquote class="blockquote song-quote">
                <p class="mb-0"><?php echo $row["Quote"]; ?></p>
                <footer class="blockquote-footer">ADarkHero, <cite title="Source Title"><?php echo $row["Name"]; ?></cite></footer>
            </blockquote>

            <a href="<?php echo $row["Lyrics"]; ?>" target="_blank" class="song-lyrics">Lyrics</a>
            
            <div class="song-space"></div>
        </div>
    <?php
    } 
}