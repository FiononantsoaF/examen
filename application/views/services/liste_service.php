<div class="contenu">
    <h3>Liste de tous les Services</h3>
    <table class="table table-striped">
        <tr>
            <th>Type</th>
            <th>Durée</th>
            <th>Prix</th>
            <th></th>
            <th></th>
        </tr>
        <?php if (!empty($liste_services)) : ?>
            <?php foreach ($liste_services as $service) : ?>
                <tr>
                    <td><?php echo $service['nom']; ?></td>
                    <td><?php echo $service['duree']; ?></td>
                    <td><?php echo $service['prix']; ?></td>
                    <td>
                        <a href="#" class="edit-service" data-id="<?php echo $service['id']; ?>">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="delete-service" data-id="<?php echo $service['id']; ?>">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="5">Aucun service disponible.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
