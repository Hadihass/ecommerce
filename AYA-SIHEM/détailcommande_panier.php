<?php
require_once 'include/db.php';
$idCommande = $_GET['id'];
$sqlState = $pdo->prepare( query: 'SELECT * FROM commande WHERE commande.id = ?
                                ORDER BY commande.date_creation DESC');
$sqlState->execute([$idCommande]);
$commande = $sqlState->fetch( mode: PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order | NUM:<?= $commande['id'] ?></title>
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
    <h2>Order details</h2>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Date</th>
                <th>Operation</th>
            </tr>
            </thead>
            <tbody>
                        <?php
                            $sqlStateLignCommandes = $pdo->prepare( query: 'SELECT ligne_commande.*,produit.libelle,produit.image from ligne_commande 
                                                                            INNER JOIN produit ON ligne_commande.id_produit = produit.id
                                                                            WHERE id_commande = ?');
                            $sqlStateLignCommandes->execute([$idCommande]);
                            $LigneCommandes = $sqlStateLignCommandes->fetchAll( mode: PDO::FETCH_OBJ);
                            
                        ?>
                            <tr>
                                <td><?php echo $commande['id']  ?></td>
                                <td>
                                    <div class="sidebyside">
                                        <h6>Name:</h6><span><?= $commande['nomeprenom']?></span>
                                    </div>
                                    <div class="sidebyside">
                                        <h6>phone:</h6><span><?= $commande['telephone']?></span>
                                    </div>
                                    <div class="sidebyside">
                                        <h6>address:</h6><span><?= $commande['adresse']?></span>
                                    </div>
                                </td>
                                <td><?php echo $commande['totalproduit'] ?>DA</td>
                                <td><?php echo $commande['date_creation'] ?></td>
                                <td>
                                    <?php if($commande['valide'] == 0): ?>
                                    <a class="btn btn-success btn-sm" href="valider_paniercommande.php?id=<?= $commande['id']?>&etat=1">Validate the order</a>
                                    <?php else: ?>
                                    <a class="btn btn-danger btn-sm" href="valider_paniercommande.php?id=<?= $commande['id']?>&etat=0">Cancel the order</a>
                                    <?php endif; ?>
                                </td>
                                <td>
                                
                                </td>
                            </tr>

                        <?php
                    
                ?>


            </tbody>
        </table>
        <hr>
<h2>Products:</h2>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Product</th>
                <th>Unit price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($LigneCommandes as $LigneCommande): ?>
                            <tr>
                                <td><?php echo $LigneCommande->id?></td>
                                <td><?php echo $LigneCommande->libelle?></td>
                                <td><?php echo $LigneCommande->prix?>DA</td>
                                <td>x<?php echo $LigneCommande->quantité?></td>
                                <td><?php echo $LigneCommande->total?></td>
                            </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>

</body>
</html>