<?php include 'layouts/session.php'; ?>
<?php include 'layouts/main.php'; ?>

<?php
require("layouts/config.php");

$req = mysqli_query($link, "SELECT * FROM students");

?>

<head>

    <?php includeFileWithVariables('layouts/title-meta.php', array('title' => 'Liste des étudiants')); ?>

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

                    <?php includeFileWithVariables('layouts/page-title.php', array('pagetitle' => 'Gestion de la scolarité', 'title' => 'Liste des etudiants')); ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center flex-wrap gap-2">
                                        <div class="flex-grow-1">
                                            <button class="btn btn-info add-btn" data-bs-toggle="modal" data-bs-target="#AddStudentModal"><i class="ri-add-fill me-1 align-bottom"></i> Ajouter un étudiant</button>
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
                                                    <th class="sort" data-sort="id" scope="col">id</th>
                                                    <th class="sort" data-sort="nom_prenom" scope="col">Nom & prenom</th>
                                                    <th class="sort" data-sort="mobile" scope="col">Mobile</th>
                                                    <th class="sort" data-sort="email_id" scope="col">Email </th>
                                                    <th class="sort" data-sort="birth_data" scope="col">Date naissance</th>
                                                    <th class="sort" data-sort="created_at" scope="col">Crée le</th>
                                                    <th scope="col">Actions</th>

                                                </thead>
                                                <tbody class="list form-check-all" id="tablebody">


                                                </tbody>
                                            </table>

                                        </div>

                                    </div>

                                    <div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0">
                                                <div class="modal-header bg-info-subtle p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                </div>
                                                <form class="tablelist-form" autocomplete="off">
                                                    <div class="modal-body">
                                                        <input type="hidden" id="id-field" />
                                                        <div class="row g-3">
                                                            <div class="col-lg-12">
                                                                <!-- <div class="text-center">
                                                                    <div class="position-relative d-inline-block">
                                                                        <div class="position-absolute  bottom-0 end-0">
                                                                            <label for="customer-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                                                                <div class="avatar-xs cursor-pointer">
                                                                                    <div class="avatar-title bg-light border rounded-circle text-muted">
                                                                                        <i class="ri-image-fill"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                            <input class="form-control d-none" value="" id="customer-image-input" type="file" accept="image/png, image/gif, image/jpeg">
                                                                        </div>
                                                                        <div class="avatar-lg p-1">
                                                                            <div class="avatar-title bg-light rounded-circle">
                                                                                <img src="assets/images/users/user-dummy-img.jpg" id="customer-img" class="avatar-md rounded-circle object-fit-cover" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <label for="nom_etudiant" class="form-label">Nom</label>
                                                                <input type="text" id="nom_etudiant" class="form-control" name="name_etudiant" placeholder="Nom de l'étudiant" required />
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label for="prenom_etudiant" class="form-label">Prénom</label>
                                                                <input type="text" id="prenom_etudiant" class="form-control" name="prenom_etudiant" placeholder="Prénom de l'étudiant" required />
                                                            </div>


                                                            <div class="col-lg-12">
                                                                <div>
                                                                    <label for="designation-field" class="form-label">Designation</label>
                                                                    <input type="text" id="designation-field" class="form-control" placeholder="Enter Designation" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div>
                                                                    <label for="email_id-field" class="form-label">Email ID</label>
                                                                    <input type="text" id="email_id-field" class="form-control" placeholder="Enter email" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <label for="phone-field" class="form-label">Phone</label>
                                                                    <input type="text" id="phone-field" class="form-control" placeholder="Enter phone no" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div>
                                                                    <label for="lead_score-field" class="form-label">Lead Score</label>
                                                                    <input type="text" id="lead_score-field" class="form-control" placeholder="Enter value" required />
                                                                </div>
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
                                                    <div class="modal-footer">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                                            <button type="submit" class="btn btn-success" id="add-btn">Ajouter l'étudiant</button>
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


    <?php include "scripts/students/process_student_data.php"; ?>
</body>

</html>