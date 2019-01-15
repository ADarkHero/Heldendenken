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
    <link rel="stylesheet" href="css/ekko-lightbox.css">
    
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

<footer class="footer">
    <div class="container">
        <p class="text-muted">
            (c) <a href="https://www.adarkhero.de" target="_blank">ADarkHero</a> 2019
            | <a href="https://www.adarkhero.de" target="_blank">Imprint</a>
            | <a href="https://creativecommons.org/licenses/by/4.0/" target="_blank">CC BY 4.0</a>
            | Made with ❤ and 🎶
        </p> 
    </div>
</footer>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ekko-lightbox.min.js"></script>
    
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>
  </body>
  
</html>