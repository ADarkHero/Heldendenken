<?php
    require_once 'database.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/theme.css">
    
    <title>Heldendenken</title>
  </head>
  
<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="#">Heldendenken</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
          <?php
            getSongLists($categories, $category_names, $wordpress_short, $baselink, $pdo);
          ?>
      </li>
    </ul>
  </div>
</nav>

<section id="content">
    <div class="container">
        <div class="row">
                <?php
                    getFeaturedSongs($featured_db_name, $pdo);
                ?>
    </div>
</section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  
</html>