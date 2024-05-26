<?php

require '../../layouts/config.php';

// Vérifier la connexion
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

$id = $_GET['id'];

// Requête pour récupérer les données
$sql = "SELECT  * FROM prospects WHERE id='$id' ";
$result = $link->query($sql);

$data = array();

if ($result->num_rows > 0) {
    // Récupérer les données sous forme de tableau associatif
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Fermer la connexion
$link->close();

// Envoyer les données sous forme de JSON
header('Content-Type: application/json');
echo json_encode($data);
