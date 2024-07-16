<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/hafa.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/Logo.jpg');?>" type="image/x-icon">
    
</head>

<body>
    <div class="entete">
        <ul class="content_link">
            <li role="presentation"><a href="<?php echo site_url('Rendezvous_Controller/get_all_services');?>">Prendre rendez_vous</a></li>
            <li role="presentation"><a href="<?php echo site_url('Rendezvous_Controller/liste_rendezvous');?>">Mes rendez_vous</a></li>
            <li role="presentation"><a href="#">Disabled link</a></li>
        </ul>
    </div>
<div class="contenu">
    <h2>Mes rendez-vous</h2>
    <hr>
    <p>Début</p>
    <table class="table">
        <tr>
            <td><input type="date" class="input" name="date" id="date"></td>
            <td><input type="time" class="input" placeholder="heure" name="time" id="time"></td>
        </tr>
    </table>
    <p>Service</p>
    <select name="service" id="service" class="input">
        <?php if (!empty($liste_service)) {
            foreach ($liste_service as $service): ?>
                <option value="<?= $service['id']; ?>"><?= $service['nom']; ?></option>
            <?php endforeach;
        } ?>
    </select>
    <button class="bouton_3" id="check_dispo">Confirmer</button>
    <div id="dispo_result"></div>
    <a href="<?php echo site_url('Rendezvous_Controller/liste_rendezvous'); ?>">Liste de mes rendez-vous</a>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#check_dispo').click(function(event) {
            event.preventDefault();

            let date = $('#date').val();
            let time = $('#time').val();
            let service = $('#service').val();

            $.ajax({
                url: '<?php echo site_url('Rendezvous_Controller/check_dispo'); ?>',
                type: 'POST',
                data: {
                    date_debut: date,
                    time: time,
                    service: service
                },
                success: function(response) {
                    $('#dispo_result').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Erreur lors de la vérification de disponibilité:', error);
                    $('#dispo_result').html('<p>Erreur lors de la vérification de disponibilité</p>');
                }
            });
        });
    });
</script>
