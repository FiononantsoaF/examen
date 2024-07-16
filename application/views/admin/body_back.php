<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
    <div class="entete">
        <ul class="content_link">
            <li role="presentation"><a href="#">Service</a></li>
            <li role="presentation"><a href="<?php  echo site_url("Rendezvous_Controller/get") ;?>">Calendrier</a></li>
            <li role="presentation"><a href="#">Devis</a></li>
        </ul>
    </div>
    <div>
        <div class="contenu">
            <h3>New  service :</h3>
            <?php echo form_open('Admin_Controller/enregistre_services'); ?>
                <div class="form-group">
                    <p>Type</p>
                    <input type="text" class="input" name="nom" >
                </div>
                <div class="form-group">
                    <p>Durée (h)</p>
                    <input type="time" class="input" name="duree">
                    <!-- <input type="time" class="input" name="duree" min="08:00" max="18:00"> -->
                </div>
                <div class="form-group">
                    <p>Prix (Ar)</p>
                    <input type="number" class="input" name="prix">
                </div>
                <input type="submit" value="inserer" class="bouton_2">
            <?php echo form_close(); ?> 
        </div>  

        <div id="content"></div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                function loadServiceList() {
                    $.ajax({
                        url: "<?php echo site_url('Admin_Controller/liste_services'); ?>",
                        method: "GET",
                        success: function(data) {
                            $('#content').html(data);
                        }
                    });
                }

                loadServiceList();

                $(document).on('click', '.edit-service', function(e) {
                    e.preventDefault();
                    var serviceId = $(this).data('id');
                    $.ajax({
                        url: "<?php echo site_url('Admin_Controller/modifier_service/'); ?>" + serviceId,
                        method: "GET",
                        success: function(data) {
                            $('#content').html(data);
                        }
                    });
                });

                $(document).on('click', '.delete-service', function(e) {
                    e.preventDefault();
                    var serviceId = $(this).data('id');
                    if (confirm('Êtes-vous sûr de vouloir supprimer ce service ?')) {
                        $.ajax({
                            url: "<?php echo site_url('Admin_Controller/supprimer_service/'); ?>" + serviceId,
                            method: "GET",
                            success: function(data) {
                                loadServiceList();
                            }
                        });
                    }
                });
                $(document).on('submit', '#update-service-form', function(e) {
                    e.preventDefault();
                    var serviceId = $(this).data('id');
                    var formData = $(this).serialize();
                    $.ajax({
                        url: "<?php echo site_url('Admin_Controller/update_service/'); ?>" + serviceId,
                        method: "POST",
                        data: formData,
                        success: function(data) {
                            loadServiceList();
                        }
                    });
                });
            });
        </script>
    </div>
</div>  
</body>