<?php

    if(isset($_SESSION['status'])){
        
    ?>
    <div class="row" class="z-index:100;">
        
        <div class="col-md-3">
            
        </div>
        
        <?php

            if($_SESSION["success"] == 1){
        ?>

        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong> <?php
                        echo $_SESSION['status'];

                        unset($_SESSION['status']);
                        unset($_SESSION["success"]);
                    ?></strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        
        
        <?php
            } else {
        ?>
        
        
        <?php
            if($_SESSION["success"] == 0){
        ?>
        <div class="col-md-6">             
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?php
                        echo $_SESSION['status'];
                        unset($_SESSION['status']);
                        unset($_SESSION["success"]);
                    ?>
            </div>
            
        </div> <!-- end col-->
        <?php
            }
            }
        ?>
        
        <div class="col-md-3">
            
        </div>
    <?php
    }
?>