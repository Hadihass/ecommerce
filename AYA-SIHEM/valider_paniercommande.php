<?php
require_once 'include/db.php';
$id = $_GET['id'];
$etat = $_GET['etat'];
$sqlState = $pdo->prepare(query:'UPDATE commande SET valide=? WHERE id = ?');
$sqlState->execute([$etat,$id]);
header( header:'location: détailcommande_panier.php?id='.$id);
