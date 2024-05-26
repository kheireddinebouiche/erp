<?php include 'layouts/session.php'; ?>
<?php include 'layouts/main.php'; ?>

<?php
 require('layouts/config.php');

 if(isset($_POST["submit"])){

    $nom_contact = $_POST['contact_name'];
    $contact_entreprise = $_POST['contact_entreprise'];
    $contact_email = $_POST['contact_email'];
    $contact_phone = $_POST['contact_phone'];


    $req = mysqli_query($link,"INSERT INTO contacts (nom_contact, entreprise_contact, email_contact, phone_contact) 
                                VALUES ('$nom_contact','$contact_entreprise','$contact_email','$contact_phone') ");

    if($req){
        header('Location:liste-des-contacts.php');

    }

 }

?>

<head>

    <?php includeFileWithVariables('layouts/title-meta.php', array('title' => 'Ajouter un contact')); ?>

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

                    <?php includeFileWithVariables('layouts/page-title.php', array('pagetitle' => 'CRM', 'title' => 'Ajouter un contact')); ?>

                    <form autocomplete="off" method="POST" class="tablelist-form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="contact_name">Nom du contact</label>
                                            <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Veuillez entrer le nom du contact" required>
                                            <div class="invalid-feedback">Please Enter a product title.</div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="contact_entreprise">Nom de l'entreprise</label>
                                            <input type="text" class="form-control" id="contact_entreprise" name="contact_entreprise" placeholder="Veuillez entrer la désignation de l'entreprise" required>
                                            <div class="invalid-feedback">Please Enter a product title.</div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="contat_email">Adresse Email</label>
                                            <input type="text" class="form-control" id="contat_email" name="contact_email" placeholder="Veuillez entrer l'adresse email du contact" required>
                                            <div class="invalid-feedback">Please Enter a product title.</div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="contat_phone">N° Téléphone</label>
                                            <input type="text" class="form-control" id="contat_phone" name="contact_phone" placeholder="Veuillez entrer le n° téléphone du contact" required>
                                            <div class="invalid-feedback">Please Enter a product title.</div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div>
                                                <label for="taginput-choices" class="form-label font-size-13 text-muted">Tags</label>
                                                <select class="form-control" name="taginput-choices" id="taginput-choices" multiple>
                                                    <option value="Lead">Lead</option>
                                                    <option value="Partner">Partner</option>
                                                    <option value="Exiting">Exiting</option>
                                                    <option value="Long-term">Long-term</option>
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