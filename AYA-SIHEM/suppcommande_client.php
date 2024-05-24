<?php
require_once 'include/db.php';
$id = $_GET['id'];
$sqlState = $pdo->prepare( query: 'DELETE FROM commande_client WHERE id=?');
$supprime = $sqlState->execute([$id]);
header( header: 'location: listcommande.php');