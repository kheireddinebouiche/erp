<script>
    $(document).ready(function() {

        loadData();



        // Fonction pour charger les données dans le tableau
        function loadData() {
            $.ajax({
                url: "scripts/students/get_all_students.php",
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var rows = '';
                    $.each(data, function(index, item) {
                        rows += '<tr>';
                        rows += '<th scope="row">';
                        rows += '<div class="form-check">';
                        rows += '<input class="form-check-input" type="checkbox" name="chk_child" value=option1>';
                        rows += '</div>';
                        rows += '</th>';

                        rows += '<td class="id"><a href="javascript:void(0);" class="fw-medium link-primary">' + item.id + '</a></td>';
                        rows += '<td class="nom_prenom">' + item.nom + ' ' + item.prenom + '</td>';

                        rows += '<td class="mobile">' + item.mobile + '</td>';
                        rows += '<td class="email_id">' + item.email + '</td>';
                        rows += '<td class="birth_date">' + item.date_naissance + '</td>';
                        rows += '<td class="created_at">' + item.created_at + '</td>';


                        rows += '<td>';
                        rows += '<ul class="list-inline hstack gap-2 mb-0">';
                        rows += '<li class="list-inline-item>';
                        rows += '<div class="dropdown">';
                        rows += '<button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">'
                        rows += '<i class="ri-more-fill align-middle"></i>';
                        rows += '</button>';
                        rows += '<ul class="dropdown-menu dropdown-menu-end">';
                        rows += '<li><button class="dropdown-item view-item-btn detailsBtn" data-id=' + item.id + '><i class="ri-eye-fill align-bottom me-2 text-muted"></i>Détails</button></li>';
                        rows += '<li><button class="dropdown-item edit-item-btn editBTn" data-id=' + item.id + '><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Modifier</button></li>';
                        rows += '<li><button class="dropdown-item remove-item-btn deleteBtn"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Supprimer</button></li>';
                        rows += '</ul>';
                        rows += '</div>';
                        rows += '</li>';
                        rows += '</ul>';
                        rows += '</td>';
                        rows += '</tr>';
                    });
                    $('#tablebody').html(rows);
                }
            });
        }

        $(document).on('click', '.editBTn', function() {

            var id = $(this).data('id');

            $.ajax({
                url: "scripts/students/get-student-info.php",
                type: 'GET',
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(data) {
                    var content = '<input type="text" value="' + data[0].nom + '" > ' +
                        '<input type="text" value="' + data[0].prenom + '" >';

                    $('#detailsModalBody').html(content);
                    $('#studentDetailsModal').modal('show');

                }
            });
        });

        $(document).on('click', '.detailsBtn', function() {

            var id = $(this).data('id');

            $.ajax({
                url: "scripts/students/get-joined-student-info.php",
                type: 'GET',
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(data) {
                    var content = '<input type="text" value="' + data[0].nom + '" > ' +
                        '<input type="text" value="' + data[0].prenom + '" >';

                    $('#detailsModalBody').html(content);
                    $('#studentDetailsModal').modal('show');

                }
            });
        });

        $(document).on('click', '.deleteBtn', function() {
            var id = $(this).data('id');
            var content = "<h4 class='fs-semibold'>Vous étes sur le point de supprimer un étudiant</h4>" +
                "<p class = 'text-muted fs-14 mb-4 pt-1' > La suppréssion de l'étudiant supprimera toutes les informations dans la base de données. </p>" +
                "<div class = 'hstack gap-2 justify-content-center remove'>" +
                "<button class ='btn btn-link link-info fw-semibold text-decoration-none' id = 'deleteRecord-close' data-bs-dismiss = 'modal' > <i class = 'ri-close-line me-1 align-middle'> </i> Fermer </button>" +
                "<button class ='btn btn-primary' id='delete-record'> Confirmer la suppréssion </button> </div>";
            $('#deleteModalBody').html(content);
            $('#deleteRecordModal').modal('show');
        });
    });
</script>