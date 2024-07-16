<div class="contenu">
    <h3>Liste de tous mes Rendez-vous </h3>
    <table class="table table-striped">
        <tr>
            <th>Service nom</th>
            <th>Service prix</th>
            <th>Duree</th>
            <th>Date</th>
            <th></th>
        </tr>
        <?php if (!empty($list_rendezvous)) : ?>

        <?php foreach ($list_rendezvous as $rdv ) : ?>
        <tr>
            <td><?php echo $rdv['service_nom']; ?></td>
            <td><?php echo $rdv['service_prix']; ?> Ar</td>
            <td><?php echo $rdv['service_duree']; ?> h</td>
            <td><?php echo $rdv['operation_entree_date']; ?> <?php echo $rdv['operation_entree_time']; ?></td>
            <td><a href="<?php echo site_url('Rendezvous_Controller/detail_rendezvous/'.$rdv['rendez_vous_id']); ?>">Detail</a></td>
            <td><a href="#"><span class="glyphicon glyphicon-download-alt"></span></a></td>
        </tr>
        <?php endforeach; ?>
        <?php else : ?>
                <tr>
                    <td colspan="5">Aucun rendrez vous disponibles</td>
                </tr>
        <?php endif; ?>
    </table>
</div>
