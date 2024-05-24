<?php
session_start();
require_once '../include/db.php';
$sqlState = $pdo->prepare( query: 'SELECT * FROM produit ');
$sqlState->execute();
$produits = $sqlState->fetchAll( mode: PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alisa Shoes</title>
    <link href='https://unpkg.com/boxicons@2.0.0/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="stt3.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;1,100&family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<div class="container">
<section>
<img class="bg-img" src= "image/front_img.jpg" alt="bg image">

<nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
  <div class="container">
    <a class="navbar-brand" >
    <img class="logo" src="image/logo.png" alt="" >
    </a>
 
    <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header text-white border-bottom">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Alisa</h5>
        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end align-items-center flex-grow-1 pe-1">
            
        <li class="nav-item mx-2">
          <a class="nav-link active" aria-current="page" href="index.php"><i class="bx bx-home icon"></i></a>
        </li>
        <?php
        if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
          $panier_count = count($_SESSION['panier']);
          } else {
              $panier_count = 0;
          }
        ?>
        <li class="nav-item mx-2">
          <a class="nav-link" href="cart.php"><i class="bx bx-cart icon"><span><?php echo $panier_count?></span></i></a>
        </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

</section>
<section class="main-home" >
      <div class="main-text">
          <h5>New Collection</h5>
          <p>There's nothing like trend</p>

          <ul class="navbar-nav  align-items-center">
            <?php
                $categories = $pdo->query( query: 'SELECT * FROM catégorie')->fetchAll( mode: PDO::FETCH_OBJ);
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
              </a>
              <ul class="dropdown-menu">
                <?php
                    foreach ($categories as $categorie){
                      ?>
                        <li>
                          <a class="dropdown-item" href="catégorie.php?id=<?php echo $categorie->id ?>">
                          <?php echo $categorie->libelle ?>
                          </a>
                        </li>
                      <?php
                    }

                ?>
              </ul>
            </li>
          </ul>

      </div>
</section>

</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="../assets/js/produit/counter.js"></script>
</body>
</html>