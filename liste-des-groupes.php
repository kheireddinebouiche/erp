<?php include 'layouts/session.php'; ?>
<?php include 'layouts/main.php'; ?>

<?php
require("layouts/config.php");

$req = mysqli_query($link, "SELECT * FROM students");

?>

<head>

    <?php includeFileWithVariables('layouts/title-meta.php', array('title' => 'Liste des groupes')); ?>

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

                    <?php includeFileWithVariables('layouts/page-title.php', array('pagetitle' => 'Gestion de la scolarité', 'title' => 'Liste des groupes')); ?>
                    <div class="mess"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center flex-wrap gap-2">
                                        <div class="flex-grow-1">
                                            <button class="btn btn-info add-btn" data-bs-toggle="modal" data-bs-target="#showModal"><i class="ri-add-fill me-1 align-bottom"></i> Créer un groupe</button>
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
                                        <div class="col-md-4">
                                            <div class="search-box">
                                                <input type="text" class="form-control search" placeholder="Search for contact...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
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
                                                    <th class="sort" scope="col">id</th>
                                                    <th class="sort" scope="col">Nom du groupe</th>
                                                    <th class="sort" scope="col">Date de Début</th>
                                                    <th class="sort" scope="col">Date de fin </th>
                                                    <th class="sort" scope="col">Nombre d'étudiants</th>
                                                    <th class="sort" scope="col">Crée le</th>
                                                    <th class="sort" scope="col">Dérnier mise à jour</th>
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
                                                <form method="POST" class="tablelist-form" autocomplete="off" id="GroupeAddForm">
                                                    <div class="modal-body">
                                                        <input type="hidden" id="id-field" />
                                                        <div class="row g-2">
                                                            <div class="col-lg-12">
                                                                <div>
                                                                    <label for="label" class="form-label">Nom du groupe</label>
                                                                    <input type="text" id="label" name="label" class="form-control" placeholder="Nom du groupe" required />
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <label for="date_debut" class="form-label">Date de début</label>
                                                                    <input type="date" id="date_debut" name="date_debut" class="form-control" placeholder="Date de début" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <label for="date_fin" class="form-label">Date de fin</label>
                                                                    <input type="date" id="date_fin" name="date_fin" class="form-control" placeholder="Date de fin" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <label for="num_groupe" class="form-label">N° du groupe</label>
                                                                    <input type="text" id="num_groupe" name="num_groupe" class="form-control" placeholder="N° du groupe" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <label for="max_student" class="form-label">Nombre max. étudiants</label>
                                                                    <input type="text" id="max_student" name="max_student" class="form-control" placeholder="Veuillez entrer le nombre maximum d'étudiants" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div>
                                                                    <label for="specialite" class="form-label font-size-13 text-muted">Spécialité</label>
                                                                    <select class="form-control" name="specialite" id="specialite" multiple>
                                                                        <option value="1">Lead</option>
                                                                        <option value="2">Partner</option>
                                                                        <option value="3">Exiting</option>
                                                                        <option value="4">Long-term</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                                            <button type="submit" class="btn btn-success" id="add-btn">Crée le groupe</button>
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
                                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                                                    <div class="mt-4 text-center" id="deleteModalBody">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end delete modal -->

                                    <div class="modal fade" id="studentDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                        <!-- Structure du modèle pour afficher les détails -->
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Détails de l'étudiant</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" id="detailsModalBody">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
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

    <?php include "scripts/groupes/process_groupes_data.php"; ?>
</body>

</html>