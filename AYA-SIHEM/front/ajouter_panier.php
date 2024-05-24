<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_GET['id'])){
    if(isset($_GET['qt']) ){
            $quantity = $_GET['qt'];
            header(header: 'location: index.php');
    }else{
            $quantity = 1;
            header(header: 'location: index.php');
    }
    $id = $_GET['id'];
    
    $_SESSION['panier'][$id] = array('qt' => $quantity);
    // echo '<pre>';
    // print_r($_SESSION['panier']);
    // echo '</pre>';

}

?>