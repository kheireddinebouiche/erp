<?php include 'layouts/session.php'; ?>
<?php include 'layouts/main.php'; ?>

<?php
require('layouts/config.php');

$req = mysqli_query($link, "SELECT * FROM motifs_visite");



?>

<head>

    <?php includeFileWithVariables('layouts/title-meta.php', array('title' => 'Ajouter un visteur')); ?>

    <!-- Sweet Alert css-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <?php include 'layouts/head-css.php'; ?>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php include 'layouts/menu.php'; ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <?php includeFileWithVariables('layouts/page-title.php', array('pagetitle' => 'CRM', 'title' => 'Ajouter un visiteur')); ?>
                    <?php include('notification.php'); ?>
                    <form autocomplete="off" method="POST" action="traitement/crm-ajouter-visiteur" class="tablelist-form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label" for="visiteur_nom">Nom </label>
                                                <input type="text" class="form-control" id="visiteur_nom" name="visiteur_nom" placeholder="Veuillez entrer le nom du contact" required>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label" for="visiteur_prenom">Prenom </label>
                                                <input type="text" class="form-control" id="visiteur_prenom" name="visiteur_prenom" placeholder="Veuillez entrer le nom du contact" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label" for="visiteur_email">Adresse Email</label>
                                                <input type="text" class="form-control" id="visiteur_email" name="visiteur_email" placeholder="Veuillez entrer l'adresse email du contact" required>
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label" for="visiteur_phone">N° Téléphone</label>
                                                <input type="text" class="form-control" id="visiteur_phone" name="visiteur_phone" placeholder="Veuillez entrer le n° téléphone du contact" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="visiteur_adresse">Adresse</label>
                                            <input type="text" class="form-control" id="visiteur_adresse" name="visiteur_adresse" placeholder="Veuillez entrer le n° téléphone du contact" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="date_visite">Date de visite</label>
                                            <input type="date" class="form-control" id="date_visite" name="date_visite" placeholder="Veuillez entrer le n° téléphone du contact" required>
                                        </div>

                                        <div class="col-lg-12">
                                            <div>
                                                <label for="motif_de_visite" class="form-label font-size-13">Motif de visite</label>
                                                <select class="form-select" name="motif_de_visite" id="motif_de_visite">

                                                    <?php

                                                    while ($row = mysqli_fetch_assoc($req)) {
                                                    ?>

                                                        <option value="<?php echo $row['id']; ?> "><?php echo $row['label']; ?></option>

                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div>
                                                <label for="specialite" class="form-label font-size-13">Spécialité demandé</label>
                                                <select class="form-select" name="specialite" id="specialite">

                                                    <?php

                                                    while ($row = mysqli_fetch_assoc($req)) {
                                                    ?>

                                                        <option value="<?php echo $row['id']; ?> "><?php echo $row['label']; ?></option>

                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!-- end card -->
                                <!-- end card -->
                                <div class="text-end mb-3">
                                    <button type="submit" name="submit" class="btn btn-success w-sm">Enregistrer</button>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                    </form>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php include 'layouts/footer.php'; ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <?php include 'layouts/vendor-scripts.php'; ?>

    <!-- list.js min js -->
    <script src="assets/libs/list.js/list.min.js"></script>
    <script src="assets/libs/list.pagination.js/list.pagination.min.js"></script>

    <script src="assets/js/pages/crm-contact.init.js"></script>

    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
</body>

</html>