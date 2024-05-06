<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    <title>Document</title>
</head>
<body>
<?php
require_once 'include/db.php';
include 'include/nav.php';
?>
<div class="container py-2">
    <div class="header">
    <h4>Ajouter produit</h4>
            <?php
                if(isset($_POST['ajouter'])){
                    $libelle = $_POST['libelle'];
                    $prix = $_POST['prix'];
                    $discount = $_POST['discount'];
                    $categorie = $_POST['catégorie'];
                    $date = date( format: 'Y-m-d');

                    if(!empty($libelle) && !empty($prix) && !empty($categorie)) {
                        $sqlState = $pdo->prepare( query: 'INSERT INTO produit VALUES(null,?,?,?,?,?)');
                        $sqlState->execute([$libelle,$prix,$discount,$categorie,$date]);
                        ?>

                                <div class="alert alert-success" role="alert">
                                    le produit <?php echo $libelle ?> est bien ajouté.
                                </div>

                        <?php
                     }else{
                         ?>

                                <div class="alert alert-danger" role="alert">
                                    libelle , prix et catégorie sont obligatoires.
                                </div>

                        <?php
                    }
                }
                 ?>
            <form method="post">
                <label class="form-label">Libelle:</label>
                <input type="text"  class="form-control" name="libelle">

                <label class="form-label">Prix:</label>
                <input type="number"  class="form-control" step="0.1" name="prix" min="0">

                <label class="form-label">Discount:</label>
                <input type="range" value="0"  class="form-control" name="discount" min="0" max="100">

                <?php
                    $catt = $pdo->query( query: 'SELECT * FROM catégorie')->fetchAll( mode: PDO::FETCH_ASSOC );
                ?>
                <label class="form-label">Catégorie:</label>
                <select name="catégorie" class="form-control ">
                    <option value="">choisissez une catégorie</option>
                    <?php
                        foreach ($catt as $cat){
                            echo "<option value=".$cat['id'].">".$cat['libelle']."</option>";

                        }
                    ?>
                </select>

                <input type="submit" value="Ajouter produit" class="btn btn-primary  my-2" name="ajouter">

            </form>
            </div>
        </div>



</body>
</html>