<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style_login.css">
  </head>
  <body>
            <?php
                if(isset($_POST['connexion'])) {
                    $login = $_POST['login'];
                    $pwd = $_POST['password'];

                    if(!empty($login) && !empty($pwd))  {
                        require_once 'include/db.php';
                        $sqlState = $pdo->prepare( query: 'SELECT * FROM utilisateur
                                                            WHERE login=?
                                                            AND password=?');

                        $sqlState->execute([$login,$pwd]);
                        if($sqlState->rowCount()>=1)
                        {
                            session_start();
                             $_SESSION['utilisateur'] = $sqlState->fetch();
                             header(header: 'location: admin.php');
                        }else{
                            ?>

                                <div class="alert alert-danger" role="alert">
                                    login et password sont obligatoires.
                                </div>

                            <?php
                        }
                }
            }
?>

    <div class="center">
      <h1>Login</h1>
      <form method="post">

            <div class="txt_field">
            <input type="text" name="login" required>
            <span></span>
            <label>Username</label>
            </div>

            <div class="txt_field">
            <input type="password" name="password" required>
            <span></span>
            <label>Password</label>
            </div>

            <input type="submit" value="Login" name="connexion">

      </form>
    </div>

  </body>
</html>
