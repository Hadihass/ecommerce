<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin|Add_product</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style_admin_produit.css">
</head>
<body>
<?php
require_once 'include/db.php';
include 'include/nav.php';
?>
<div class="container py-2">
    <h4>Add product</h4>
            <?php

                if(isset($_POST['ajouter'])){
                    $libelle = $_POST['libelle'];
                    $prix = $_POST['prix'];
                    $desc = $_POST['description'];
                    $categorie = $_POST['catégorie'];
                    $date = date( format: 'Y-m-d');

                    $filename = "";
                    if(isset($_FILES['image'])){
                        $image = $_FILES['image']['name'];
                        $filename = uniqid().$image;
                       move_uploaded_file($_FILES['image']['tmp_name'], 'upload/produit/' . $filename);

                    if(!empty($libelle) && !empty($prix) && !empty($categorie)) {
                        $sqlState = $pdo->prepare( query: 'INSERT INTO produit VALUES(null,?,?,?,?,?,?)');
                        $inserted = $sqlState->execute([$libelle,$prix,$categorie,$date,$desc,$filename]);
                        if($inserted){
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
                                                name and price are required.
                                            </div>
                                    <?php
                                }
                }
            }

                 ?>
            <form method="post" enctype="multipart/form-data">
                <label class="form-label">Name</label>
                <input type="text"  class="form-control" name="libelle">

                <label class="form-label">Price</label>
                <input type="number"  class="form-control" step="0.1" name="prix" min="0">

                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" ></textarea>

                <label class="form-label">Picture</label>
                <input type="file"  class="form-control" name="image" >

                <?php
                    $catt = $pdo->query( query: 'SELECT * FROM catégorie')->fetchAll( mode: PDO::FETCH_ASSOC );
                ?>
                <label class="form-label">Category:</label>
                <select name="catégorie" class="form-control ">
                    <option value="">choose a category</option>
                    <?php
                        foreach ($catt as $cat){
                            echo "<option value=".$cat['id'].">".$cat['libelle']."</option>";

                        }
                    ?>
                </select>

                <input type="submit" value="Add product" class="btn btn-primary  my-2" name="ajouter">

            </form>

</div>
</body>
</html>