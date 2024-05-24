<?php
session_start();
require_once '../include/db.php';
$id = $_GET['id'];
$sqlState = $pdo->prepare( query: "SELECT * FROM produit WHERE id=?");
$sqlState->execute([$id]);
$produit = $sqlState->fetch( mode: PDO::FETCH_ASSOC );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product |  <?php echo $produit['libelle']?></title>
    <link href='https:unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https:cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https:cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="stt.css">

    <link rel="preconnect" href="https:fonts.googleapis.com">
    <link rel="preconnect" href="https:fonts.gstatic.com" crossorigin>
    <link href="https:fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;1,100&family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https:cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<div class="container">
<section>
<nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
  <div class="container">
    <a class="navbar-brand" >
    <img class="logo" src="image/logo.png" alt="" >
    </a>
    <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header text-white border-bottom">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Alisa</h5>
        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end align-items-center flex-grow-1 pe-0">
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

  <?php

                 if(isset($_POST['ajouter'])){
                     $quantité = $_POST['qt'];
                     $libelle = $_POST['libelle'];
                     $teléphone = $_POST['tele'];
                     $adresse = $_POST['adresse'];
                     $idproduit = $produit['id'];
                     $prixpr = $produit['prix'];
                     $total = $quantité * $prixpr;
                     $valide = 0;
                     $date = date( format: 'Y-m-d');
                     if(!empty($quantité) && !empty($libelle) && !empty($teléphone) && !empty($adresse)) {
                         $sqlState = $pdo->prepare( query: 'INSERT INTO commande_client VALUES(null,?,?,?,?,?,?,?,?,?)');
                         $inserted = $sqlState->execute([$idproduit,$libelle,$teléphone,$adresse,$prixpr,$quantité,$total,$valide,$date]);
                         if($inserted){
                          ?>
                            <div class="alert alert-primary" role="alert">
                            Your order with the amount <?= $total ?> DZ is added.
                            </div>
                          <?php
                         }else{
                          ?>
                            <div class="alert alert-danger" role="alert">
                                Database error (40023).
                            </div>
                          <?php
                         }
                      }else{
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    Please fill in the information.
                                </div>
                              <?php
                  }
                }
            ?>

  <div class="row">
      <div class="col-md-6">
            <h1><?php echo $produit['libelle']?></h1>
            <img class="img img-fluid w-75" src="../upload/produit/<?php echo $produit['image']?>" alt="<?php echo $produit['libelle']?>">
            <h6>Price:<?php echo $produit['prix']?>DA</h6>
      </div>
      <div class="col-md-6">
          <p>
          <?php echo $produit['description']?>
          </p>
        <hr>

        

    <form method="post">



                        <div class="row">
                                <div class="col-md-2">
                                    <h6>Quantity:</h6>
                                </div>
                                <div class="col-md-2 d-flex">
                                    <button onclick="return false;" class="btn btn-primary mx-2 counter-moins">-</button>
                                    <input type="hidden" name="id" value="">
                                    <input class="form-control" type="number" name="qt" id="qt" max="99" value="0">
                                    <button onclick="return false;" class="btn btn-primary mx-2 counter-plus">+</button>
                                </div>
                        </div>

        <hr>
            <h5>Customer information:</h5>

                <input type="text"  class="form-control" placeholder="Full name" name="libelle">
                <br>
                <input type="text"  class="form-control"  placeholder="Phone number" name="tele">
                <br>
                <input type="text"  class="form-control"  placeholder="Adresse" name="adresse">

                <input type="submit" value="Make th order" class="btn btn-primary  my-2" name="ajouter">

    </form>

      </div>
  </div>



</section>
<script src="script2.js"></script>
</div>

<script src="https:code.jquery.com/jquery-3.7.1.js"></script>
<script src="../assets/js/produit/counter.js"></script>
</body>
</html>