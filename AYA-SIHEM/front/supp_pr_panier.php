<?php
session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    unset($_SESSION['panier'][$id]);
    header( header: 'location: cart.php');
    exit;
}
?>