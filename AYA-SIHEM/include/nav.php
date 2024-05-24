<?php
session_start();
$connecte=false;
if(isset($_SESSION['utilisateur'])){
  $connecte=true;
}
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="">
            <img class="logo" src="images/2.png" alt="">
            E-commerce
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link " href="index.php"><i class="bx bx-user-plus icon"></i> Add user</a>
            </li>
            <?php
                if($connecte){
            ?>
            <li class="nav-item">
            <a class="nav-link" href="ajouter_catégorie.php"><i class="bx bxs-cart-add icon"></i> Add category</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="ajouter_produit.php"><i class="bx bxs-cart-add icon"></i> Add product</a>
            </li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"  aria-expanded="false">
                <i class='bx bx-list-ul' ></i> The lists
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" style="width: 250px;">
                    <li class="nav-item">
                    <a class="nav-link" href="list_prod.php"><i class="bx bx-list-ol icon"></i> Product list</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="list_cat.php"><i class="bx bx-list-ol icon"></i> Category list</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="listcommande_panier.php"><i class='bx bx-barcode'></i> Order list(Cart)</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="listcommande.php"><i class='bx bx-barcode'></i> Order list</a>
                    </li>
                </ul>
                </li>


        </ul>
            <ul class="navbar-nav ms-auto">
            <a class="login-button" href="déconnexion.php"><i class="bx bx-log-out icon"></i> Log-out</a>
            </ul>
            <?php
                }else{
            ?>

            <ul class="navbar-nav ms-auto">
            <a class="login-button1" href="connexion.php" ms-auto><i class="bx bx-log-in icon"></i> Log-in</a>
            </ul>
            <?php
                }
            ?>

        </div>
    </div>
    </nav>
    <img class="bg-img"src="images/admin_img.jpg" alt="bg image">
