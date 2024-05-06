<?php
session_start();
$connecte=false;
if(isset($_SESSION['utilisateurr'])){
  $connecte=true;
}
?>
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" >E-commerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  ms-auto">
        <li class="nav-item ">
          <a class="nav-link  " aria-current="page" href="index.php">Ajouter utilisateur</a>
        </li>

        <?php
            if($connecte){
              ?>
                <li class="nav-item">
                  <a class="nav-link active  " aria-current="page" href="list_cat.php">Liste des catégories</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active  " aria-current="page" href="list_prod.php">Liste des produits</a>
                </li>
               <li class="nav-item">
                  <a class="nav-link active  " aria-current="page" href="ajouter_cat.php">Ajouter catégorie</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active " aria-current="page" href="ajouter_produit.php">Ajouter produit</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active " href="deconnexion.php">Déconnexion</a>
                </li>
              <?php
            }else{
              ?>
              <li class="nav-item">
              <a class="nav-link active " href="connexion.php">Connexion</a>
              </li>
              <?php
            }
        ?>
      </ul>
    </div>
  </div>
</nav>
<img class="bg-img"src="https://media.istockphoto.com/id/1133980246/photo/shopping-online-concept-shopping-service-on-the-online-web-with-payment-by-credit-card-and.jpg?s=1024x1024&w=is&k=20&c=ZsW8UwqqUKZ0HbKD65_Byzvzu4QhfeaqsD9_ovXcWZ4=" alt="bg image">