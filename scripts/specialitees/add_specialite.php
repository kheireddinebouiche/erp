<?php

require '../../layouts/config.php';

if (isset($_POST['label']) && isset($_POST['duree'])) {

    $label = htmlspecialchars($_POST['label']);
    $dure = $_POST['duree'];
    $prix = $_POST['prix'];
    $specialite = $_POST['specialite'];



    $req = mysqli_query($link, "INSERT INTO specialite (label, dure, prix, id_formation ,created_at) 
                                                    VALUES ('$label','$dure','$prix','$specialite','$date') ");

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
} else {

    $response['success'] = false;
    $response['message'] = "Veuillez remplir tous le champs.";
    header('Content-Type: application/json');
    echo json_encode($response);
}
