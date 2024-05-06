<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'include/nav1.php' ?>
<div class="container py-2">
            <?php
                if(isset($_POST['connexion'])) {
                    $login = $_POST['login'];
                    $pwd = $_POST['password'];

                    if(!empty($login) && !empty($pwd))  {
                        require_once 'include/db.php';
                        $sqlState = $pdo->prepare( query: 'SELECT * FROM utilisateurr
                                                            WHERE login=?
                                                            AND password=?');

                        $sqlState->execute([$login,$pwd]);
                        if($sqlState->rowCount()>=1)
                        {
                            session_start();
                             $_SESSION['utilisateurr'] = $sqlState->fetch();
                             header(header: 'location: admin.php');
                        }else{
                            ?>

                                <div class="alert alert-danger" role="alert">
                                    login ou password incorrecte.
                                </div>

                            <?php
                        }

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
             <h4 class="text-center">Connexion</h4>
                <!-- <div class="user-box"> -->
                <label class="form-label">Login</label>
                <input type="text"  class="form-control" name="login" placeholder="login">
                <!-- </div> -->
                <!-- <div class="user-box"> -->
                <label class="form-label">Password</label>
                <input type="password"  class="form-control" name="password" placeholder="password">
                <!-- </div> -->
                <input type="submit" value="Connexion" class="btn btn-primary  my-2" name="connexion">

            </form>
        </div>



</body>
</html>