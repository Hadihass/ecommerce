<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin|Order list</title>
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
    <h2>orders list"cart"</h2>
            <?php
                require_once 'include/db.php';
                $commandes = $pdo->query( query: 'SELECT * FROM commande ORDER BY commande.date_creation DESC')->fetchAll( mode: PDO::FETCH_ASSOC);
            ?>
        
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Date</th>
                <th>Validation</th>
                <th>State</th>
                <th>Operation</th>
            </tr>
            </thead>
            <tbody>
                <?php
                     foreach ($commandes as $cmd){
                        ?>
                            <tr>
                                <td><?php echo $cmd['id']  ?></td>
                                <td>
                                    <div class="sidebyside">
                                        <h6>Name:</h6><span><?= $cmd['nomeprenom']?></span>
                                    </div>
                                    <div class="sidebyside">
                                        <h6>phone:</h6><span><?= $cmd['telephone']?></span>
                                    </div>
                                    <div class="sidebyside">
                                        <h6>address:</h6><span><?= $cmd['adresse']?></span>
                                    </div>
                                </td>
                                <td><?php echo $cmd['totalproduit'] ?>DA</td>
                                <td><?php echo $cmd['date_creation'] ?></td>
                                <td><?php echo $cmd['valide'] ?></td>
                                <td><?php if($cmd['valide'] == 1){
                                    ?>
                                        <?php
                                            echo 'delivered';
                                }else{
                                    ?>
                                        <?php
                                            echo 'not-delivered';
                                } ?></td>
                                <td>
                                <a class="btn btn-primary btn-sm" href="détailcommande_panier.php?id=<?php echo $cmd['id'] ?>">show details</a>
                                <a class="btn_supp" href="suppcommande_panier.php?id=<?php echo $cmd['id'] ?>" onclick="return confirm('Do you really want to delete order <?php echo $cmd['id'] ?>')"><i class="bx bxs-trash"></i></a>
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