<?php

require '../../layouts/config.php';

$label = htmlspecialchars($_POST['label']);
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];
$specialite = $_POST['specialite'];
$num_groupe = $_POST['num_groupe'];


$req = mysqli_query($link, "INSERT INTO groupes (label, date_debut, date_fin, num_groupe, specialite) 
                                                    VALUES ('$label','$date_debut','$date_fin','$num_groupe','$specialite') ");

$response = array();

if ($req) {
    $response['success'] = true;
    $response['message'] = "Les données on été enregistrer avec succès";
} else {
    $response['success'] = false;
    $response['message'] = "Une erreur c'est produite lors de l'execution de la requete";
}

header('Content-Type: application/json');
echo json_encode($response);
