<?php
 session_start();
 require('../layouts/config.php');

 date_default_timezone_set('Africa/Algiers');
 $curdate = date('y-m-d h:i:s');

 $req = mysqli_query($link, "SELECT * FROM motifs_visite");


 if(isset($_POST['submit'])){

   $label_motif = $_POST['label_motif'];

   $insert = mysqli_query($link, "INSERT INTO motifs_visite (label, created_at)
                            VALUES('$label_motif','$curdate') ");

   if($insert){

        $_SESSION['status'] = "Ajouter avec succès";
        $_SESSION['success'] = "1";
        
        header('Location:../ajouter-un-motif-de-viste');
    
   }else{
    
     header('Location:ajouter-un-visiteur');
   }

 }

?>