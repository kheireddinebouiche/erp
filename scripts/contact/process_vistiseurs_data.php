<script>
    $(document).ready(function(){
        
        loadData();

        function loadData() {
            $.ajax({
                url: 'scripts/contact/get-all-visiteurs.php',
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
                        rows += '<td>' + item.nom +" "+item.prenom+ '</td>';

                        rows += '<td>' + item.email + '</td>';
                        rows += '<td>' + item.mobile + '</td>';
                        rows += '<td class="tags"><span class="badge bg-primary-subtle text-primary">Lead</span><span class="badge bg-primary-subtle text-primary">Partner</span></td>';
                        rows += '<td>' + item.created_at + '</td>';
                        rows += '<td>';
                        rows += '<ul class="list-inline hstack gap-2 mb-0">';
                        rows += '<li class="list-inline-item>';
                        rows += '<div class="dropdown">';
                        rows += '<button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">'
                        rows += '<i class="ri-more-fill align-middle"></i>';
                        rows += '</button>';
                        rows += '<ul class="dropdown-menu dropdown-menu-end">';
                        rows += '<li><button class="dropdown-item view-item-btn detailsBtn" data-id=' + item.id + '><i class="ri-eye-fill align-bottom me-2 text-muted"></i>Détails</button></li>';
                        rows += '<li><button class="dropdown-item edit-item-btn editBTn" data-id=' + item.id + '><i class="ri-pencil-fill align-bottom me-2 text-muted"></i>Modifier</button></li>';
                        rows += '<li><button class="dropdown-item remove-item-btn deleteBtn"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Supprimer</button></li>';
                        rows += '</ul>';
                        rows += '</div>';
                        rows += '</li>';
                        rows += '</ul>';
                        rows += '</td>';
                        rows += '</tr>';
                    });
                    $('#visiteurListTableBody').html(rows);
                }
            });
        }

        $(document).on('click', '.detailsBtn', function(){
            var id = $(this).data('id');
            console.log(id);
            $.ajax({
                url : "scripts/contact/get-contact-info.php",
                type : "GET",
                dataType: "JSON",
                data : { id : id},

                success : function(data){
                    var activer = "";var active = "";var visiteur = "";var paiement = "";var preinscrit = "";var inscrit = "";
                    switch(data[0].etat_paiement){
                        case "2":
                            activer = "hidden";
                            visiteur = "";
                            paiement = "";
                            preinscrit = "active";
                            inscrit = "";
                            break;
                        case "1":
                            activer = "hidden";
                            visiteur = "";
                            paiement = "active";
                            preinscrit = "";
                            break;
                        case "0":
                            visiteur = "active";
                            paiment = "";
                            preinscrit ="";
                            inscrit = "";
                            break;
                    }
                    
                        var content ='<div class="col-lg-12" style="margin-top:15px;">'+
                            '<nav aria-label="breadcrumb">'+
                                '<ol class="breadcrumb">'+
                                    '<li id="breadcrumb-item" class="'+visiteur+'"><a href="#">Visiteur</a></li>'+
                                    '<li id="breadcrumb-item" class="'+paiement+'"><a href="#">Paiement</a></li>'+
                                    '<li id="breadcrumb-item" class="'+preinscrit+'"><a href="#">Préinscrit</a></li>'+
                                    '<li id="breadcrumb-item" class="'+inscrit+'"><a href="#">Inscrit</a></li>'+
                                '</ol>'+
                            '</nav>'+
                        '</div>'+
                        '<hr>'+
                        '<div class="col-lg-12">'+
                            '<div class="card" id="contact-view-detail" style="border:none; background-color:transparent; box-shadow:none;">'+
                                '<div class="card-body text-center">'+
                                    '<h5 class="mt-4 mb-1">'+data[0].nom+' '+data[0].prenom+'</h5>'+
                                    '<p class="text-muted">'+data[0].type_client+'</p>'+
                                '</div>'+
                                '<div class="card-body">'+
                                    '<h6 class="text-muted text-uppercase fw-semibold mb-3">Description</h6>'+
                                    '<p class="text-muted mb-4">'+data[0].description+'</p>'+
                                    '<div class="table-responsive table-card">'+
                                        '<table class="table table-borderless mb-0">'+
                                            '<tbody>'+
                                                '<tr>'+
                                                    '<td class="fw-medium" scope="row">Nom & Prénom</td>'+
                                                    '<td>'+data[0].nom+' '+data[0].prenom+'</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                    '<td class="fw-medium" scope="row">E-mail</td>'+
                                                    '<td>'+data[0].email+'</td>'+
                                               '</tr>'+
                                                '<tr>'+
                                                    '<td class="fw-medium" scope="row">Mobile / Contact</td>'+
                                                    '<td>'+data[0].mobile+'</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                    '<td class="fw-medium" scope="row">Crée le</td>'+
                                                    '<td>'+data[0].created_at+'</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                    '<td class="fw-medium" scope="row">Tags</td>'+
                                                    '<td>'+
                                                        '<span class="badge bg-primary-subtle text-primary"></span>'+
                                                        '<span class="badge bg-primary-subtle text-primary"></span>'+
                                                    '</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                    '<td class="fw-medium" scope="row"></td>'+
                                                    '<td><small class="text-muted"></small></td>'+
                                                '</tr>'+
                                            '</tbody>'+
                                        '</table>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            
                '</div>'+
               
                       
                        '<div class="modal-footer">'+
                            '<button '+ activer + ' type="button" data-id="'+id+'" class="btn btn-warning paiementRequest" id="pandingPaiement">Paiement</button>'+
                            '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>'+
                        '</div>';


                        
            $('#detailModalBody').html(content);

            $('#contactDetailsModal').modal('show');
                }
            });
            
            
        });
               
        $(document).on('click', '.editBTn', function(){
            var id = $(this).data('id');
            $.ajax({
                url : "scripts/contact/get-contact-info.php",
                dataType: "JSON",
                data : {id: id},
                type : "GET",
                success: function(data){
                    var rows ="";
                    $.each(data, function(index, item){
                        rows += "<div class='col-lg-6'>";
                        rows += "<div>";
                        rows += "<label for='new_nom' class='form-label'>Nom</label>";
                        rows += "<input type='text'name='new_name' id='new_name' value='"+item.nom+"' class='form-control' placeholder='Enter name' required />";
                        rows += "</div>";
                        rows += "</div>";
                        rows += "<div class='col-lg-6'>";
                        rows += "<div>";
                        rows += "<label for='new_prenom' class='form-label'>Prénom</label>";
                        rows += "<input type='text'name='new_prenom' id='new_prenom' value='"+item.prenom+"' class='form-control' placeholder='Enter name' required />";
                        rows += "</div>";
                        rows += "</div>";
                        rows += "<div class='col-lg-12'>";
                        rows += "<div>";
                        rows += "<label for='new_email' class='form-label'>Email</label>";
                        rows += "<input type='text' id='new_email' name='new_email' value='"+item.email+"' class='form-control' placeholder='Enter company name' required />";
                        rows += "</div>";
                        rows += "</div>";
                        rows += "<div class='col-lg-12'>";
                        rows += "<div>";
                        rows += "<label for='new_contact' class='form-label'>Mobile / Contact </label>";
                        rows += "<input type='text' id='new_contact' name='new_contact' value='"+item.mobile+"' class='form-control' placeholder='Enter Designation' required />";
                        rows += "</div>";
                        rows += "</div>";
                        rows += "<div class='col-lg-12'>";
                        rows += "<div>";
                        rows += "<label for='email_id-field' class='form-label'>Email ID</label>";
                        rows += "<input type='text' id='email_id-field' class='form-control' placeholder='Enter email' required />";
                        rows += "</div>";
                        rows +="</div>";
                        rows +="<div class='col-lg-6'>";
                        rows +="    <div>";
                        rows +="        <label for='phone-field' class='form-label'>Phone</label>";
                        rows +="        <input type='text' id='phone-field' class='form-control' placeholder='Enter phone no' required />";
                        rows +="    </div>";
                        rows +="</div>";
                        rows +="<div class='col-lg-6'>";
                        rows +="    <div>";
                        rows +="        <label for='lead_score-field' class='form-label'>Lead Score</label>";
                        rows +="        <input type='text' id='lead_score-field' class='form-control' placeholder='Enter value' required />";
                        rows +="    </div>";
                        rows +="</div>";
                        rows +="<div class='col-lg-12'>";
                        rows +="    <div>";
                        rows +="        <label for='taginput-choices' class='form-label font-size-13 text-muted'>Tags</label>";
                        rows +="        <select class='form-control' name='taginput-choices' id='taginput-choices' multiple>";
                        rows +="            <option value='Lead'>Lead</option>";
                        rows +="            <option value='Partner'>Partner</option>";
                        rows +="            <option value='Exiting'>Exiting</option>";
                        rows +="            <option value='Long-term'>Long-term</option>";
                        rows +="        </select>";
                        rows +="    </div>";
                        rows +="</div>";
                    });

                    $('#detailsModalBody').html(rows);

                    $('#detailsModal').modal('show');
                }
            });
        });

        $(document).on('click', '.paiementRequest', function(){
            var id = $(this).data('id');
           
            $.ajax({
                url :"scripts/contact/paiement-request.php",
                dataType: 'JSON',
                type : "POST",
                data : {id : id},
                success : function(response){
                    $('#contactDetailsModal').modal('hide');
                    showFloatingMessage(response.message, "success");
                }
            })
        });

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