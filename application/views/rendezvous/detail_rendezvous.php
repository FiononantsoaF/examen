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

</table>
<hr>
<form action="model_pdf.php">
    <input type="submit" class="bouton_2" value="Exporter en PDF">
</form>
<?php else : ?>
<p>Aucun détail disponible pour ce rendez-vous.</p>
<?php endif; ?>
