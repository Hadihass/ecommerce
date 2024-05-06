<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styleadmin.css">
    <link rel="stylesheet" href="style1.css">
    <title>Admin</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" >E-commerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active " aria-current="page" href="index.php">Ajouter utilisateur</a>
        </li>

                <li class="nav-item">
                  <a class="nav-link active  " aria-current="page" href="list_cat.php">Liste des catégories</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active  " aria-current="page" href="ajouter_cat.php">Ajouter catégorie</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active " aria-current="page" href="ajouter_produit.php">Ajouter produit</a>
                </li>

              <li class="nav-item">
              <a class="nav-link active" href="deconnexion.php">Déconnexion</a>
              </li>

      </ul>
    </div>
  </div>
</nav>
<img class="bg-img"src="https://media.istockphoto.com/id/1133980246/photo/shopping-online-concept-shopping-service-on-the-online-web-with-payment-by-credit-card-and.jpg?s=1024x1024&w=is&k=20&c=ZsW8UwqqUKZ0HbKD65_Byzvzu4QhfeaqsD9_ovXcWZ4=" alt="bg image">



<div class="container py-2">
    <?php
      session_start();
      if(!isset($_SESSION['utilisateurr'])){
        header(header: 'location: connexion.php');
      }
    ?>

    
    <h4>bonjour <?php echo $_SESSION['utilisateurr']['login']?> </h4>

    
</div>



</body>
</html>