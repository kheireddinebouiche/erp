<script>
    $(document).ready(function() {

        loadData();

        // Soumettre le formulaire pour ajouter de nouvelles données
        $('#specialiteAddForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: 'scripts/specialitees/add_specialite.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Recharger les données après l'ajout
                    loadData();
                    if (response.success) {
                        $("#showModal").modal('hide');
                        showFloatingMessage(response.message, 'success');
                        $("#showModal").find('input[type="text"]').val('');

                    } else {
                        $("#showModal").modal('hide');
                        showFloatingMessage(response.message, 'error');
                    }

                }
            });
        });

        function loadData() {
            $.ajax({
                url: 'scripts/specialitees/get_specialitees_list.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var rows = '';
                    if (data.length > 0) {
                        $.each(data, function(index, item) {
                            rows += '<tr>';
                            rows += '<th scope="row">';
                            rows += '<div class="form-check">';
                            rows += '<input class="form-check-input" type="checkbox" name="chk_child" value=option1>';
                            rows += '</div>';
                            rows += '</th>';

                            rows += '<td><a href="javascript:void(0);" class="fw-medium link-primary">' + item.id + '</a></td>';
                            rows += '<td>' + item.label + '</td>';


                            rows += '<td>' + item.created_at + '</td>';
                            rows += '<td>' + item.updated_at + '</td>';

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
                    } else {
                        rows += '<tr>';
                        rows += '<td colspan="5">Aucune donnée disponible</td>';
                        rows += '</tr>';
                    }
                    $('#tablebody').html(rows);
                }
            });
        }



        $(document).on('click', '.editBTn', function() {

            var id = $(this).data('id');

            $.ajax({
                url: "scripts/specialitees/get_specialite_detail.php",
                data: {
                    id: id
                },
                dataType: "JSON",
                type: "GET",
                success: function(data) {

                    var content = "<div class='row g-5'>" +
                        "<div clas='col-lg-6'>" +
                        "<div>" +
                        "<label for='label_update' class='form-label'>Nom de la specialite</label>" +
                        "<input type='text' id='label_update' name='label_update' value='" + data[0].label + "' class='form-control' placeholder='Nom de la spécialitée' required />" +
                        "</div>" +

                        "<div clas='col-lg-6'>" +
                        "<div>" +
                        "<label for='duree_update' class='form-label'>Durée de la formation</label>" +
                        "<input type='text' id='duree_update' name='duree_update' value='" + data[0].dure + "' class='form-control' placeholder='Durée de la formation' required />" +
                        "</div>" +

                        "<div clas='col-lg-6'>" +
                        "<div>" +
                        "<label for='prix_update' class='form-label'>Prix de la formation</label>" +
                        "<input type='text' id='prix_update' name='prix_update' value='" + data[0].prix + "' class='form-control' placeholder='Prix de la formation' required />" +
                        "</div>" +
                        "<hr>" +
                        "<div style='margin-top:10px; display: flex;justify-content: right;'>" +
                        "<button type='button' class='btn btn-light' data-bs-dismiss='modal'>Fermer</button>" +
                        "<button type='submit' class='btn btn-primary  valider' data-id='" + id + "'  >Valider les modifications </button>" +
                        "</div>" +
                        "</div>";

                    $('#detailsModalBody').html(content);
                    $('#updateSpecialiteModal').modal('show');

                }

            });


        });


        $(document).on('click', '.valider', function(e) {

            e.preventDefault();

            var id = $(this).data('id');

            var label = $('#label_update').val();
            var duree = $('#duree_update').val();
            var prix = $('#prix_update').val();

            console.log(label, duree, prix);

            $('#updateSpecialiteModal').modal('hide');

            var content = "<h4 class='fs-semibold'>Vous étes sur le point de modifier les informations de la spécilaitée</h4>" +
                "<p class = 'text-muted fs-14 mb-4 pt-1' > La modification entrennera la mise à jour de toutes les informations dans la base de données. </p>" +
                "<div class = 'hstack gap-2 justify-content-center remove'>" +
                "<button class ='btn btn-link link-info fw-semibold text-decoration-none' id = 'deleteRecord-close' data-bs-dismiss = 'modal' > <i class = 'ri-close-line me-1 align-middle'> </i> Fermer </button>" +
                "<button class ='btn btn-primary' id='update-record' data-id='" + id + "' data-label='" + label + "' data-prix='" + prix + "' data-dure='" + prix + "'> Confirmer la modification </button> </div>";

            $('#deleteModalBody').html(content);
            $('#deleteRecordModal').modal('show');
        });

        $(document).on('click', '#update-record', function() {
            var id = $(this).data('id');
            var label = $(this).data('label');
            var prix = $(this).data('prix');
            var duree = $(this).data('dure');

            $.ajax({

            });
        });

        // Function to display floating success message
        function showFloatingMessage(message) {
            // Create message element
            var messageElement = $('<div class="alert alert-icon alert-primary" role="alert"><em class="icon ni ni-alert-circle"></em> <strong>' + message + ' </strong></div>');

            // Append message element to body
            $('.mess').html(messageElement);

            // Set timeout to remove message after a certain duration
            setTimeout(function() {
                messageElement.fadeOut('slow', function() {
                    $(this).remove();
                });
            }, 4000); // 3000 milliseconds (3 seconds) duration
        }

    });
</script>