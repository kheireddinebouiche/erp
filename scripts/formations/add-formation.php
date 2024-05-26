<?php

require '../../layouts/config.php';

if (isset($_POST['label']) && isset($_POST['ref'])) {

    $label = htmlspecialchars($_POST['label']);
    $ref = $_POST['ref'];



    $req = mysqli_query($link, "INSERT INTO formations (label, ref, created_at) 
                                                    VALUES ('$label','$ref','$date') ");

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
