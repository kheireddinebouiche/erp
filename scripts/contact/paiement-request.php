<?php

require '../../layouts/config.php';

$id = $_POST['id'];

$insert = mysqli_query($link,"INSERT INTO paiements_request (id_visiteur,etat,created_at) VALUES ('$id','0','$date')");
$update = mysqli_query($link ,"UPDATE prospects SET etat_paiement='1' WHERE id='$id' ");

$response = array();

if($insert and $update){
    $response['success']= true;
    $response['message']= "L'opération à été effectuer avec succès";
}else{
    $response["success"]= false;
    $response["message"]= "Une erreur c'est produite lors du traitement de la requête.";
}

// Envoyer les données sous forme de JSON
header('Content-Type: application/json');
echo json_encode($response);
