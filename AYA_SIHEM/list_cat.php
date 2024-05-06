<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    <title>Liste des catégories</title>
</head>
<body>
<?php include 'include/nav.php' ?>
<div class="container py-2">
<div class="header">
    <h2>Liste des catégorie</h2>
    <a href="ajouter_cat.php" class="btn btn-primary">Ajouter catégorie</a>
            <?php
                require_once 'include/db.php';
                $categories = $pdo->query( query: 'SELECT * FROM catégorie')->fetchAll( mode: PDO::FETCH_ASSOC);
            ?>
        
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Libelle</th>
                <th>Description</th>
                <th>Date</th>
                <th>Opération</th>
            </tr>
            </thead>
            <tbody>
                <?php
                     foreach ($categories as $categorie){
                        ?>
                            <tr>
                                <td><?php echo $categorie['id']  ?></td>
                                <td><?php echo $categorie['libelle'] ?></td>
                                <td><?php echo $categorie['description'] ?></td>
                                <td><?php echo $categorie['date_creation'] ?></td>
                                <td>
                                    <input type="submit" class="btn btn-primary btn-sm" value="Modifier">
                                    <input type="submit" class="btn btn-danger btn-sm" value="Supprimer">
                                </td>
                            </tr>

                        <?php
                    }
                ?>


            </tbody>

        </table>
                </div>
</div> 

</body>
</html>