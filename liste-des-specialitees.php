<?php include 'layouts/session.php'; ?>
<?php include 'layouts/main.php'; ?>

<?php
require("layouts/config.php");

$req = mysqli_query($link, "SELECT * FROM students");

$req1 = mysqli_query($link, "SELECT * FROM formations");

?>

<head>

    <?php includeFileWithVariables('layouts/title-meta.php', array('title' => 'Liste des spécialitées')); ?>

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

                    <?php includeFileWithVariables('layouts/page-title.php', array('pagetitle' => 'Gestion de la scolarité', 'title' => 'Liste des spécialitées')); ?>
                    <div class="mess"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center flex-wrap gap-2">
                                        <div class="flex-grow-1">
                                            <button class="btn btn-info add-btn" data-bs-toggle="modal" data-bs-target="#showModal"><i class="ri-add-fill me-1 align-bottom"></i> Ajouter une spécialitée </button>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="hstack text-nowrap gap-2">
                                                <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                                <button class="btn btn-primary"><i class="ri-filter-2-line me-1 align-bottom"></i> Filters</button>
                                                <button class="btn btn-soft-info">Import</button>
                                                <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-soft-primary"><i class="ri-more-2-fill"></i></button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                    <li><a class="dropdown-item" href="#">All</a></li>
                                                    <li><a class="dropdown-item" href="#">Last Week</a></li>
                                                    <li><a class="dropdown-item" href="#">Last Month</a></li>
                                                    <li><a class="dropdown-item" href="#">Last Year</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-12">
                            <div class="card" id="contactList">
                                <div class="card-header">
                                    <div class="row g-3">
                                        <?php include 'layouts/search_plugin.php'; ?>
                                        <div class="col-md-auto ms-auto">
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="text-muted">Sort by: </span>
                                                <select class="form-control mb-0" data-choices data-choices-search-false id="choices-single-default">
                                                    <option value="nom_prenom">Name</option>
                                                    <option value="Company">Company</option>
                                                    <option value="Lead">Lead</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="table-responsive table-card mb-3" style='min-height:300px;'>
                                            <table class="table align-middle table-nowrap mb-0" id="customerTable">
                                                <thead class="table-light">

                                                    <th scope="col" style="width: 50px;">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                        </div>
                                                    </th>
                                                    <th>id</th>
                                                    <th>Label</th>
                                                    <th>Crée le</th>
                                                    <th>Dérniere modification</th>
                                                    <th scope="col">Actions</th>

                                                </thead>
                                                <tbody class="list form-check-all" id="tablebody">


                                                </tbody>
                                            </table>

                                        </div>

                                    </div>

                                    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0">
                                                <div class="modal-header bg-info-subtle p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                </div>
                                                <form class="tablelist-form" autocomplete="off" id="specialiteAddForm">
                                                    <div class="modal-body">
                                                        <input type="hidden" id="id-field" />
                                                        <div class="row g-5">
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <label for="label" class="form-label">Nom de la specialite</label>
                                                                    <input type="text" id="label" name="label" class="form-control" placeholder="Nom de la spécialitée" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <label for="specialite" class="form-label font-size-13">Spécialitée</label>
                                                                    <select class="form-select" name="specialite" id="specialite">

                                                                        <?php

                                                                        while ($row = mysqli_fetch_assoc($req1)) {
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
                                                                    <label for="duree" class="form-label">Durée de la formation</label>
                                                                    <input type="text" id="duree" name="duree" class="form-control" placeholder="La durée de la formation en mois" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div>
                                                                    <label for="prix" class="form-label">Prix de la formation</label>
                                                                    <input type="text" id="prix" name="prix" class="form-control" placeholder="La durée de la formation en mois" required />
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                                            <button type="submit" class="btn btn-success" id="add-btn">Ajouter la formation</button>
                                                            <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end add modal-->

                                    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                                </div>
                                                <div class="modal-body p-5 text-center">

                                                    <lord-icon src="https://cdn.lordicon.com/jnzhohhs.json" trigger="loop" delay="2000" style="width:100px;height:100px">
                                                    </lord-icon>

                                                    <div class="mt-4 text-center" id="deleteModalBody">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end delete modal -->

                                    <div class="modal fade" id="updateSpecialiteModal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                        <!-- Structure du modèle pour afficher les détails -->
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Modification de la spécialitée</h5>
                                                </div>
                                                <div class="modal-body" id="detailsModalBody">


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--end card-->
                        </div>

                    </div>
                    <!--end row-->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php include 'layouts/footer.php'; ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <?php include 'layouts/vendor-scripts.php'; ?>

    <!-- list.js min js -->
    <!-- <script src="assets/libs/list.js/list.min.js"></script> -->
    <script src="assets/libs/list.pagination.js/list.pagination.min.js"></script>

    <script src="assets/js/pages/crm-contact.init.js"></script>

    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function showDetails(link) {
            // Récupérer les données de la ligne sélectionnée
            var row = $(link).closest('tr');
            var contactId = row.find('.id a').text();
            var contactName = row.find('.name').text();
            var companyName = row.find('.company_name').text();
            // Ajouter d'autres champs selon les besoins

            // Afficher les détails dans un modèle ou une boîte de dialogue
            $('#contactDetailsModal #contactId').text(contactId);
            $('#contactDetailsModal #contactName').text(contactName);
            $('#contactDetailsModal #companyName').text(companyName);
            // Ajouter d'autres champs selon les besoins

            // Afficher le modèle ou la boîte de dialogue
            $('#contactDetailsModal').modal('show');
        }
    </script>

    <?php include "scripts/specialitees/process_specialite_data.php"; ?>
</body>

</html>