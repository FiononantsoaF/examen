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
        </ul>
    </div>
<div class="contenu">
<h3>Mes rendez-vous</h3>
<hr>
<?php if (!empty($detail_rendezvous)) : ?>
<table class="table table-striped">
    <tr>
        <th>Matricule</th>
        <td><?php echo $detail_rendezvous[0]['client_matricule']; ?></td>
    </tr>
    <tr>
        <th>Type Voiture</th>
        <td><?php echo $detail_rendezvous[0]['voiture_nom']; ?></td>
    </tr>
    <tr>
        <th>Slot</th>
        <td><?php echo $detail_rendezvous[0]['slot_nom']; ?></td>
    </tr>
    <tr>
        <th>Type reparation</th>
        <td><?php echo $detail_rendezvous[0]['service_nom']; ?></td>
    </tr>
    <tr>
        <th>Duree</th>
        <td><?php echo $detail_rendezvous[0]['service_duree']; ?> h</td>
    </tr>
    <tr>
        <th>Date Rendez-vous</th>
        <td><?php echo $detail_rendezvous[0]['operation_entree_date']; ?>
         à <?php echo $detail_rendezvous[0]['operation_entree_time']; ?></td>
    </tr>
    <tr>
        <th>Cout</th>
        <td><?php echo $detail_rendezvous[0]['service_prix']; ?> Ar</td>
    </tr>
    <tr>
        <th>Date paiement</th>
        <td><?php echo $detail_rendezvous[0]['devis_payment_date']; ?></td>
    </tr>
    <tr>
        <th></th>
        <td><?php $fonction=$detail_rendezvous[0]['paye'];
            if($fonction == 1) {
                echo "Paye";
            } else {
                echo "Impaye";
            }
         ?></td>
    </tr>
</table>
<hr>
<?php echo form_open('Pdf_Controller/generate_pdf'); ?>
        <input type="hidden" name="client_matricule" value="<?php echo $detail_rendezvous[0]['client_matricule']; ?>">
        <input type="hidden" name="voiture_nom" value="<?php echo $detail_rendezvous[0]['voiture_nom']; ?>">
        <input type="hidden" name="slot_nom" value="<?php echo $detail_rendezvous[0]['slot_nom']; ?>">
        <input type="hidden" name="service_nom" value="<?php echo $detail_rendezvous[0]['service_nom']; ?>">
        <input type="hidden" name="service_duree" value="<?php echo $detail_rendezvous[0]['service_duree']; ?>">
        <input type="hidden" name="operation_entree_date" value="<?php echo $detail_rendezvous[0]['operation_entree_date']; ?>">
        <input type="hidden" name="operation_entree_time" value="<?php echo $detail_rendezvous[0]['operation_entree_time']; ?>">
        <input type="hidden" name="service_prix" value="<?php echo $detail_rendezvous[0]['service_prix']; ?>">
        <input type="hidden" name="devis_payment_date" value="<?php echo $detail_rendezvous[0]['devis_payment_date']; ?>">
        <input type="hidden" name="paye" value="<?php echo $detail_rendezvous[0]['paye']; ?>">
        <input type="submit" class="bouton_2" value="Exporter en PDF">
  <?php echo form_close(); ?>
    <?php else : ?>
    <p>Aucun détail disponible pour ce rendez-vous.</p>
    <?php endif; ?>
</div>
