<?php
require_once 'include/db.php';
$idCommand = $_GET['id'];
$sqlState = $pdo->prepare( query: 'SELECT * FROM commande_client WHERE commande_client.id = ?
                                ORDER BY commande_client.date_creation DESC');
$sqlState->execute([$idCommand]);
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
                            $sqlStateClientCommandes = $pdo->prepare( query: 'SELECT commande_client.*,produit.libelle,produit.image from commande_client
                                                                            INNER JOIN produit ON commande_client.id_produit = produit.id
                                                                            WHERE commande_client.id = :id');
                            $sqlStateClientCommandes->execute([':id' => $idCommand]);
                            $ClientCommandes = $sqlStateClientCommandes->fetchAll( mode: PDO::FETCH_OBJ);

                        ?>
                            <tr>
                                <td><?php echo $commande['id']  ?></td>
                                <td>
                                    <div class="sidebyside">
                                        <h6>Name:</h6><span><?= $commande['nomeprenom']?></span>
                                    </div>
                                    <div class="sidebyside">
                                        <h6>phone:</h6><span><?= $commande['télephone']?></span>
                                    </div>
                                    <div class="sidebyside">
                                        <h6>address:</h6><span><?= $commande['adresse']?></span>
                                    </div>
                                </td>
                                <td><?php echo $commande['total'] ?>DA</td>
                                <td><?php echo $commande['date_creation'] ?></td>
                                <td>
                                    <?php if($commande['valide'] == 0): ?>
                                    <a class="btn btn-success btn-sm" href="valider_clientcommande.php?id=<?= $commande['id']?>&etat=1">Validate the order</a>
                                    <?php else: ?>
                                    <a class="btn btn-danger btn-sm" href="valider_clientcommande.php?id=<?= $commande['id']?>&etat=0">Cancel the order</a>
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
                <?php foreach($ClientCommandes as $ClientCommande): ?>
                            <tr>
                                <td><?php echo $ClientCommande->id?></td>
                                <td><?php echo $ClientCommande->libelle?></td>
                                <td><?php echo $ClientCommande->prix?>DA</td>
                                <td>x<?php echo $ClientCommande->quantité?></td>
                                <td><?php echo $ClientCommande->total?></td>
                            </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>

</body>
</html>