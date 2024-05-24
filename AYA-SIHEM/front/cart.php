<?php
session_start();
include_once '../include/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


  
    <link rel="stylesheet" href="stt.css">
    <link rel="stylesheet" href="cart2.css">
    <link rel="stylesheet" href="formcart.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;1,100&family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
<div class="container" >
<section>

<nav class="navbar navbar-expand-lg navbar-dark ">
  <div class="container" >
    <a class="navbar-brand" >
    <img class="logo" src="image/logo.png" alt="" >
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="sidebar offcanvas offcanvas-end" tabindex="-0" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header text-white border-bottom">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Alisa</h5>
        <button type="button" class="btn-close btn-close-blue shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end align-items-center flex-grow-1 pe-0">
        <li class="nav-item mx-2">
          <a class="nav-link active" aria-current="page" href="index.php"><i class="bx bx-home icon"></i></a>
        </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div class="container py-2">

<?php

                  $panier = $_SESSION['panier'];
                  if(!empty($panier)){
                    $ids = array_keys($_SESSION['panier']);
                    $placeholders = implode(',', array_fill(0, count($ids), '?'));
                    $stmt = $pdo->prepare("SELECT * FROM produit WHERE id IN ($placeholders)");
                    $stmt->execute($ids);
                    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  }
                  if(isset($_POST['valider'])){

                      $libelle = $_POST['libelle'];
                      $teléphone = $_POST['tele'];
                      $adresse = $_POST['adresse'];
                      $sql = 'INSERT INTO ligne_commande (prix,quantité,total,id_produit,id_commande) VALUES';
                      $totale = 0;
                      $prixProduits = [];
                      foreach($products as $panierclient){
                        $idproduit = $panierclient['id'];
                        $qty = isset($_SESSION['panier'][$panierclient['id']]) ? $_SESSION['panier'][$panierclient['id']]['qt'] : 0;
                        $prix = $panierclient['prix'];
                        $libellepr = $panierclient['libelle'];
                        $totale+=$qty*$prix;
                        $prixProduits[$idproduit] = [
                          'id' => $idproduit,
                          'prix' => $prix,
                          'libelle' => $libellepr,
                          'total' => $qty * $prix,
                          'qty' => $qty
                        ];
                      }

                    if(!empty($libelle) && !empty($teléphone) && !empty($adresse)) {
                      $sqlStateCommande = $pdo->prepare(query: 'INSERT INTO commande (nomeprenom,telephone,adresse,totalproduit) VALUES(?,?,?,?)');
                      $sqlStateCommande->execute([$libelle,$teléphone,$adresse,$totale]);
                      $idCommande= $pdo->lastInsertId();
                      $args = [];
                      foreach($prixProduits as $produit){
                        $id = $produit['id'];
                        $sql .= "(:prix$id,:qty$id,:total$id,:id$id,'$idCommande'),";

                      }
                      $sql = substr($sql, offset: 0, length:-1);
                      $sqlState = $pdo->prepare($sql);
                      foreach($prixProduits as $produit){
                        $id = $produit['id'];
                        $sqlState->bindParam( param: ':prix'.$id, var: $produit['prix']);
                        $sqlState->bindParam( param: ':qty'.$id, var: $produit['qty']);
                        $sqlState->bindParam( param: ':total'.$id, var: $produit['total']);
                        $sqlState->bindParam( param: ':id'.$id, var: $produit['id']);
                      }
                      $inserted = $sqlState->execute();
                      if($inserted){
                        ?>
                          <div class="alert alert-primary" role="alert">
                              Your order with the amount <?= $totale ?> DZ is added.
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
  <form method="post">

        <table class="table table-responsive">
            <thead>
            <?php
                  if(empty($_SESSION['panier'])){
                    $total = null;
                  }else{
            ?>
            <tr class="">
                <th scope="col">#</th>
                <th scope="col">Quantity</th>
                <th scope="col">Action</th>
                <th scope="col">Total</th>
            </tr>
            <?php
                  }
             ?>
            </thead>
            <tbody class="table-group-divider">
            <?php
                if(empty($_SESSION)){
                  header(header: 'location: index.php');
                }else{
                //  $ids = array_keys($_SESSION['panier']);
                if(empty($ids)){
                  ?>
                  <div class="alert alert-warning" role="alert">
                    Your cart is empty!
                  </div>
                  <?php
                }else{
                  // $placeholders = implode(',', array_fill(0, count($ids), '?'));
                  // $stmt = $pdo->prepare("SELECT * FROM produit WHERE id IN ($placeholders)");
                  // $stmt->execute($ids);
                  // $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                  $total = 0;
                  foreach($products as $produit):
                    $count = isset($_SESSION['panier'][$produit['id']]) ? $_SESSION['panier'][$produit['id']]['qt'] : 0;
                    $totalproduit = $produit['prix'] *  $count;
                    $total = $totalproduit + $total;

            ?>
                            <tr>
                                <td><img class="img" width="80" src="../upload/produit/<?php echo $produit['image'] ?>" alt=""><br>
                                  <div class="sidebyside">
                                    <h6>Name:</h6><span><?= $produit['libelle']?></span>
                                  </div>
                                  <div class="sidebyside">
                                    <h6>Price:</h6><span><?= $produit['prix']?>DA</span><br>
                                  </div>
                                </td>
                                <td><?= $count ?></td>
                                <td>
                                <a class="btn_supp" href="supp_pr_panier.php?id=<?php echo $produit['id'] ?>" onclick="return confirm('Do you really want to delete product <?php echo $produit['libelle'] ?>')"><i class="bx bxs-trash"></i></a>
                                </td>
                                <td><?= $totalproduit ?>DA</td>
                            </tr>
                      <?php endforeach; }}?>

            <tfoot>
            <?php
                  if(empty($_SESSION['panier'])){
                    $total = null;
                  }else{
            ?>
              <tr>
                
                    <td colspan="3" align="right"><strong>Total:</strong></td>
                    <td><?= $total ?>DA</td>
                    
              </tr>
              <tr>
                <td colspan="6" align="right">

                    
                    <a href="#commande" >Validate the order</a>
                </td>
              </tr>
              <?php
                  }
                ?>
            </tfoot>
            </tbody>

        </table>
</div>
</section>
<?php
                  if(empty($_SESSION['panier'])){
                    $total = null;
                  }else{
?>
<section class="formulaire" id="commande">
 
    <h5>Customer information:</h5>
    <br>
    <input type="text"  class="form-control" placeholder="Full name" name="libelle">
    <br>
    <input type="text"  class="form-control"  placeholder="Phone Number " name="tele">
    <br>
    <input type="text"  class="form-control"  placeholder="Adresse" name="adresse">

    <input type="submit" value="Make the order" class="btn btn-success  my-2" name="valider">
  </form>
</section>
<?php
                  }
                ?>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</body>
</html>