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
<div class="container py-2 ">
    <div class="header">
    <h4>Ajouter utilisateur</h4>
            <?php
                if(isset($_POST['ajouter'])) {
                    $login = $_POST['login'];
                    $pwd = $_POST['password'];

                    if(!empty($login) && !empty($pwd))  {
                        require_once 'include/db.php';
                        $date = date(format: 'Y-m-d');
                        $sqlState = $pdo->prepare( query: 'INSERT INTO utilisateurr VALUES(null,?,?,?)');
                        $sqlState->execute([$login,$pwd,$date]);
                        // Redirection
                        header( header: 'Location: connexion.php');

                }else {
                    ?>

                                <div class="alert alert-danger" role="alert">
                                    login et password sont obligatoires.
                                </div>

                     <?php
                }

            }
?>
            <form method="post">
                <label class="form-label">Login:</label>
                <input type="text"  class="form-control" name="login">

                <label class="form-label">Password:</label>
                <input type="password"  class="form-control input-sm" name="password">

                <input type="submit" value="Ajouter utilisateur" class="btn btn-primary  my-2" name="ajouter">

            </form>
            </div>
</div>



</body>
</html>