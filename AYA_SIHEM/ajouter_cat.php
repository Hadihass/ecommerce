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
<?php include 'include/nav.php' ?>
<div class="container py-2">
<div class="header">
    <h4>Ajouter catégorie</h4>
            <?php
                if(isset($_POST['ajouter'])) {
                    $libele = $_POST['libelle'];
                    $desc = $_POST['description'];

                    if(!empty($libele) && !empty($desc)) {
                        require_once 'include/db.php';
                        $sqlState = $pdo->prepare( query: 'INSERT INTO catégorie(libelle,description) VALUES(?,?)');
                        $sqlState->execute([$libele,$desc]);
                        ?>

                                <div class="alert alert-success" role="alert">
                                    la catégorie <?php echo $libele ?> est bien ajouté.
                                </div>

                        <?php
                }else{
                    ?>

                                <div class="alert alert-danger" role="alert">
                                    libelle et description sont obligatoires.
                                </div>

                     <?php
                }


            }
            ?>
            <form method="post">
                <label class="form-label">Libelle:</label>
                <input type="text"  class="form-control" name="libelle">

                <label class="form-label">Description:</label>
                <textarea class="form-control" name="description"></textarea>

                <input type="submit" value="Ajouter catégorie" class="btn btn-primary  my-2" name="ajouter">

            </form>
        </div>
        </div>



</body>
</html>