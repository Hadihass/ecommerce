<?php
require_once 'include/db.php';
$id = $_GET['id'];
$sqlState = $pdo->prepare( query: 'DELETE FROM produit WHERE id=?');
$supprime = $sqlState->execute([$id]);
header( header: 'location: list_prod.php');