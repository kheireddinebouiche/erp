<script>
    $(document).ready(function() {

        loadData();

        // Soumettre le formulaire pour ajouter de nouvelles données
        $('#formationAddForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: 'scripts/formations/add-formation.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Recharger les données après l'ajout
                    loadData();
                    if (response.success) {
                        $("#showModal").modal('hide');
                        showFloatingMessage(response.message, 'success');
                    } else {
                        $("#showModal").modal('hide');
                        showFloatingMessage(response.message, 'error');
                    }

                }
            });
        });

        function loadData() {
            $.ajax({
                url: 'scripts/formations/get-formations-liste.php',
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

                        rows += '<td><a href="javascript:void(0);" class="fw-medium link-primary">' + item.id + '</a></td>';
                        rows += '<td>' + item.label + '</td>';

                        rows += '<td>' + item.ref + '</td>';
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
                    $('#tablebody').html(rows);
                }
            });
        }

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