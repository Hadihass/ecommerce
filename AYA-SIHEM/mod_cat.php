<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify category</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="stylee_admin.css">
</head>
<body>
<?php
require_once 'include/db.php';
include 'include/nav.php';
?>
<div class="container py-2">
    <h4>Modify category</h4>
            <?php
                $id = $_GET['id'];
                require_once 'include/db.php';
                $sqlState = $pdo->prepare( query: 'SELECT * FROM catégorie WHERE id=?');
                $sqlState->execute([$id]);
                $produit = $sqlState->fetch( mode: PDO::FETCH_OBJ);
                if(isset($_POST['modifier'])){
                    $libelle = $_POST['libelle'];
                    $desc = $_POST['description'];
                    $date = date( format: 'Y-m-d');

                    if(!empty($libelle)) {

                            $query = "UPDATE catégorie SET libelle=?,
                                                            description=?
                                                        WHERE id = ? ";
                            $sqlState = $pdo->prepare($query);
                            $updated = $sqlState->execute([$libelle,$desc,$id]);
                            if($updated){
                                header(header: 'location: list_cat.php');
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
                                        Name is required.
                                    </div>
                            <?php
                    }
                }
                 ?>
            <form method="post" enctype="multipart/form-data">
                <label class="form-label">Name</label>
                <input type="text"  class="form-control" name="libelle" value="<?= $produit->libelle ?>">

                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" ><?= $produit->description ?></textarea>

                <input type="submit" value="Modify category" class="btn btn-primary  my-2" name="modifier">

            </form>
        </div>



</body>
</html>