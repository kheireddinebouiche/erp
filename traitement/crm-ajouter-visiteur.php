<?php
session_start();
require('../layouts/config.php');

if (isset($_POST['submit'])) {

  $visiteur_nom = $_POST['visiteur_nom'];
  $visiteur_prenom = $_POST['visiteur_prenom'];
  $visiteur_email = $_POST['visiteur_email'];
  $visiteur_phone = $_POST['visiteur_phone'];
  $date_visite = $_POST['date_visite'];
  $motif_de_visite = $_POST['motif_de_visite'];
  $visiteur_adresse = $_POST['visiteur_adresse'];

  $insert = mysqli_query($link, "INSERT INTO prospects (nom, prenom, mobile, email, adresse,date_visite,motif_visite, created_at)
                             VALUES('$visiteur_nom','$visiteur_prenom','$visiteur_phone','$visiteur_email','$visiteur_adresse','$date_visite','$motif_de_visite','$created_at') ");

  if ($insert) {
    $_SESSION['status'] = "Enregistrer avec succès";
    $_SESSION['success'] = 1;

    header('Location:../liste-des-visiteurs');
  } else {

    $_SESSION['status'] = "Une erreur est survenue lors du traitement de la requête.";
    $_SESSION['success'] = 0;

    header('Location:../ajouter-un-visiteur');
  }
}
