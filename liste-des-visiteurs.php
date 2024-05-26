<?php 
include 'layouts/session.php'; 
include 'layouts/main.php'; 
require("layouts/config.php");
?>

<head>

    <?php includeFileWithVariables('layouts/title-meta.php', array('title' => 'Liste des visiteurs')); ?>

    <!-- Sweet Alert css-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/breadcrumbs.css" rel="stylesheet" type="text/css" />

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
                    <div class="mess">

                    </div>
                    <?php includeFileWithVariables('layouts/page-title.php', array('pagetitle' => 'CRM', 'title' => 'Liste des visiteurs')); ?>
                    <?php include('notification.php'); ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center flex-wrap gap-2">
                                        <div class="flex-grow-1">
                                            <button class="btn btn-info add-btn" data-bs-toggle="modal" data-bs-target="#showModal"><i class="ri-add-fill me-1 align-bottom"></i> Ajouter un visiteur</button>
                                        </div>
                                        <?php include 'layouts/filter-plugin.php'; ?>
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
                                                    <option value="Name">Name</option>
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
                                                    <tr>
                                                        <th scope="col" style="width: 50px;">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                            </div>
                                                        </th>
                                                        <th class="sort" data-sort="id" scope="col">ID</th>
                                                        <th class="sort" data-sort="nom" scope="col">Nom & Prénom</th>
                                                        <th class="sort" data-sort="email_id" scope="col">Email </th>
                                                        <th class="sort" data-sort="phone" scope="col">N° Téléphone</th>
                                                        <th class="sort" data-sort="tags" scope="col">Tags</th>
                                                        <th class="sort" data-sort="date" scope="col">Dernier contact</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="form-check-all" id='visiteurListTableBody'>

                                                    
                                                </tbody>
                                            </table>
                                            <div class="noresult" style="display: none">
                                                <div class="text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                                    <p class="text-muted mb-0">We've searched more than 150+ contacts We did not find any contacts for you search.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end mt-3">
                                            <div class="pagination-wrap hstack gap-2">
                                                <a class="page-item pagination-prev disabled" href="#">
                                                    Previous
                                                </a>
                                                <ul class="pagination listjs-pagination mb-0"></ul>
                                                <a class="page-item pagination-next" href="#">
                                                    Next
                                                </a>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0">
                                                <div class="modal-header bg-info-subtle p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                </div>
                                                <form class="tablelist-form" id="updateForm" autocomplete="off">
                                                    <div class="">
                                                        <div class="modal-body">
                                                            <input type="hidden" id="id-field" />
                                                            <div class="row g-3" id="detailsModalBody">
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="hstack gap-2 justify-content-end">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger" id="add-btn">Confirmer les modifications</button>
                                                                <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                                            </div>
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
                                                    <div class="mt-4 text-center">
                                                        <h4 class="fs-semibold">Voulez vous vraiement supprimer les informations du contact ?</h4>
                                                        <p class="text-muted fs-14 mb-4 pt-1">La suppréssion du contacte effacera toutes les données dans la base de données</p>
                                                        <div class="hstack gap-2 justify-content-center remove">
                                                            <button class="btn btn-link link-info fw-semibold text-decoration-none" id="deleteRecord-close" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Non</button>
                                                            <button class="btn btn-primary" id="delete-record">Oui, le supprimer !!</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end delete modal -->

                                    <div class="modal fade" id="contactDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                        <!-- Structure du modèle pour afficher les détails -->
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content" id="detailModalBody">
                                            
                                                
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
    <?php include 'scripts/contact/process_vistiseurs_data.php'; ?>
                                                    
    <script>
        $(document).ready(function() {
            $(document).on('click', '.delete', function() {
                var id = $(this).data('id');
                console.log(id);
                $('#deleteRecordModal').modal('show');
            });
        });
    </script>

    

</body>

</html>