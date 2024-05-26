<?php
session_start();
require('../layouts/config.php');

$id = $_GET['id'];

$req = mysqli_query($link,"DELETE FROM motifs_visite WHERE id='$id'");

if($req){
   $_SESSION['status'] = "L'enregistrement à été supprimé avec succès";
   $_SESSION['success'] = 1;

   header('Location:../ajouter-un-motif-de-viste');
}



?>