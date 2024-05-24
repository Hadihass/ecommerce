<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify product</title>
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
    <h4>Modify product</h4>
            <?php
                $id = $_GET['id'];
                require_once 'include/db.php';
                $sqlState = $pdo->prepare( query: 'SELECT * FROM produit WHERE id=?');
                $sqlState->execute([$id]);
                $produit = $sqlState->fetch( mode: PDO::FETCH_OBJ);
                if(isset($_POST['modifier'])){
                    $libelle = $_POST['libelle'];
                    $prix = $_POST['prix'];
                    $desc = $_POST['description'];
                    $date = date( format: 'Y-m-d');

                    $filename = "";
                    if(isset($_FILES['image'])){
                        $image = $_FILES['image']['name'];
                        $filename = uniqid().$image;
                       move_uploaded_file($_FILES['image']['tmp_name'], 'upload/produit/' . $filename);

                    }

                    if(!empty($libelle) && !empty($prix)) {
                        
                        if(!empty($filename)){
                            $query = "UPDATE produit SET libelle=?,
                                                            prix=?,
                                                            image=?,
                                                            description=?
                                                        WHERE id = ? ";
                            $sqlState = $pdo->prepare($query);
                            $updated = $sqlState->execute([$libelle,$prix,$filename,$desc,$id]);

                        }else{
                            $query = "UPDATE produit SET libelle=?,
                                                            prix=?,
                                                            description=?
                                                        WHERE id = ? ";
                            $sqlState = $pdo->prepare($query);
                            $updated = $sqlState->execute([$libelle,$prix,$desc,$id]);

                        }
                        if($updated){
                            header(header: 'location: list_prod.php');
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
                                    Name and Price are required.
                                </div>

                        <?php
                    }
                }
                 ?>
            <form method="post" enctype="multipart/form-data">
                <label class="form-label">Name</label>
                <input type="text"  class="form-control" name="libelle" value="<?= $produit->libelle ?>">

                <label class="form-label">Price</label>
                <input type="number"  class="form-control" step="0.1" name="prix" min="0" value="<?= $produit->prix ?>">

                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" ><?= $produit->description ?></textarea>

                <label class="form-label">Picture</label>
                <input type="file"  class="form-control" name="image" value="<?= $produit->libelle ?>">

                <input type="submit" value="Modify product" class="btn btn-primary  my-2" name="modifier">

            </form>
        </div>



</body>
</html>