<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin|Product list</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="list.css">
</head>
<body>
<?php include 'include/nav_list.php' ?>
<div class="container py-2">
    <h2>Products list</h2>
    <a href="ajouter_produit.php" class="btn btn-primary">Add product</a>
            <?php
                require_once 'include/db.php';
                $produits = $pdo->query( query: 'SELECT * FROM produit')->fetchAll( mode: PDO::FETCH_ASSOC);
            ?>
        
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Picture</th>
                <th>Category</th>
                <th>Date</th>
                <th>Operation</th>
            </tr>
            </thead>
            <tbody>
                <?php
                     foreach ($produits as $produit){
                        ?>
                            <tr>
                                <td><?php echo $produit['id']  ?></td>
                                <td><?php echo $produit['libelle'] ?></td>
                                <td><?php echo $produit['prix'] ?> DA</td>
                                <td><img class="img-fluid" width="90" src="upload/produit/<?php echo $produit['image'] ?>" alt=""></td>
                                <td><?php echo $produit['id_catégorie'] ?></td>
                                <td><?php echo $produit['date_creation'] ?></td>
                                <td>
                                <a class="btn_mod" href="mod_prod.php?id=<?php echo $produit['id'] ?>"><i class="bx bxs-edit"></i></a>
                                <a class="btn_supp" href="supp_prod.php?id=<?php echo $produit['id'] ?>" onclick="return confirm('Do you really want to delete product <?php echo $produit['libelle'] ?>')"><i class="bx bxs-trash"></i></a>
                                </td>
                            </tr>

                        <?php
                    }
                ?>


            </tbody>

        </table>
</div>

</body>
</html>