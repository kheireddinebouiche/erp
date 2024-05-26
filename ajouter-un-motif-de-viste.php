<?php include 'layouts/session.php'; ?>
<?php include 'layouts/main.php'; ?>

<?php
require('layouts/config.php');

$req = mysqli_query($link, "SELECT * FROM motifs_visite");


?>


<head>

    <?php includeFileWithVariables('layouts/title-meta.php', array('title' => 'Gestion des motifs de visite')); ?>

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
                    
                    <?php includeFileWithVariables('layouts/page-title.php', array('pagetitle' => 'Configuration CRM', 'title' => 'Gestion des motifs de viste')); ?>
                    
                    <?php include('notification.php'); ?>
                   
                    <form autocomplete="off" action="traitement/crm-ajouter-motif.php" method="POST" class="tablelist-form">
                        <div class="row">
                         
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                    
                                        <div class="row">
                                    
                                            <div class="mb-3">
                                                <label class="form-label" for="label_motif">Label </label>
                                                <input type="text" class="form-control" id="label_motif" name="label_motif"  required>
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

                    <div class="col-xxl-12">
                            <div class="card" id="customerTable">
                                <div class="card-header">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <div class="search-box">
                                                <input type="text" class="form-control search" placeholder="Search for contact...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="table-responsive table-card mb-3" style="height:386px;">
                                            <table class="table align-middle table-nowrap mb-0" id="customerTable">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" style="width: 50px;">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                            </div>
                                                        </th>
                                                        <th class="sort" data-sort="name" scope="col">Label</th>
                                                        <th class="sort" data-sort="created_at" scope="col">Créer le</th>
                                                        <th class="sort" data-sort="updated_at" scope="col">Derniere modification</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="form-check-all">

                                                        <?php
                                                          if(mysqli_num_rows($req) > 0){
                                                            while($row = mysqli_fetch_assoc($req)){
                                                        ?>
                                                            <tr>
                                                                
                                                                <th scope="row">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                                    </div>
                                                                </th>
                                                                <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary"><?php echo $row['id']; ?></a></td>
                                                                <td class="label">
                                                                    <div class="d-flex align-items-center">
                                                                        
                                                                        <div class="flex-grow-1 ms-2 name"><?php echo $row['label']; ?></div>
                                                                    </div>
                                                                </td>
                                                                <td class="created_at"><?php echo $row['created_at']; ?></td>
                                                                <td class="updated_at"> <?php echo $row['updated_at']; ?></td>
                                                                <td>
                                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                                        <li class="list-inline-item">
                                                                            <div class="dropdown">
                                                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    <i class="ri-more-fill align-middle"></i>
                                                                                </button>
                                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                                    <li><a class="dropdown-item edit-item-btn" href="#showModal" data-bs-toggle="modal"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Modifier </a></li>
                                                                                    <li><a class="dropdown-item remove-item-btn"  href="traitement/crm-delete-motif?id=<?php echo $row['id']; ?>"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Supprimer </a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>

                                                      <?php
                                                            }
                                                        }else{
                                                                ?>
                                                                <tr>
                                                                    <td colspan="5" class="text-center">Aucune information trouvé</td>
                                                                </tr>   
                                                                <?php
                                                            }
                                                      ?>
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
                                                <form class="tablelist-form" autocomplete="off">
                                                    <div class="modal-body">
                                                        <input type="hidden" id="id-field" />
                                                        <div class="row g-3">
                                                            <div class="col-lg-12">
                                                                <div class="text-center">
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
                                                                </div>
                                                                <div>
                                                                    <label for="name-field" class="form-label">Name</label>
                                                                    <input type="text" id="customername-field" class="form-control" placeholder="Enter name" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div>
                                                                    <label for="company_name-field" class="form-label">Company Name</label>
                                                                    <input type="text" id="company_name-field" class="form-control" placeholder="Enter company name" required />
                                                                </div>
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
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" id="add-btn">Add Contact</button>
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
                                                    <button type="button" class="btn-close" id="deleteRecord-close"  data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                                </div>
                                                <div class="modal-body p-5 text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                                                    <div class="mt-4 text-center">
                                                        <h4 class="fs-semibold">You are about to delete a contact ?</h4>
                                                        <p class="text-muted fs-14 mb-4 pt-1">Deleting your contact will remove all of your information from our database.</p>
                                                        <div class="hstack gap-2 justify-content-center remove">
                                                            <button class="btn btn-link link-info fw-semibold text-decoration-none" id="deleteRecord-close" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                                                            <a href="crm-delete-motif.php?id=<?php echo $row['id']; ?>" class="btn btn-primary" id="delete-record">Oui, supprimer</a>
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
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Détails du contact</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>ID du contact:</strong> <span id="contactId"></span></p>
                                                    <p><strong>Nom du contact:</strong> <span id="contactName"></span></p>
                                                    <p><strong>Entreprise:</strong> <span id="companyName"></span></p>
                                                    <!-- Ajouter d'autres champs selon les besoins -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                </div>
                            </div>
                            <!--end card-->
                        </div>
                    
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