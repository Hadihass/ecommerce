<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin|Add_category</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="stylee_admin.css">
</head>
<body>
<?php
require_once 'include/db.php';
include 'include/nav.php';
?>
<div class="container py-2">
    <h4>Add category</h4>
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
                                    the category <?php echo $libele ?> is added.
                                </div>

                        <?php
                }else{
                    ?>

                                <div class="alert alert-danger" role="alert">
                                    name and description are required.
                                </div>

                     <?php
                }


            }
            ?>
            <form method="post" enctype="multipart/form-data">
                <label class="form-label">name</label>
                <input type="text"  class="form-control" name="libelle">

                <label class="form-label">Description:</label>
                <textarea class="form-control" name="description"></textarea>

                <input type="submit" value="Add category" class="btn btn-primary  my-2" name="ajouter">

            </form>
</div>

</body>
</html>