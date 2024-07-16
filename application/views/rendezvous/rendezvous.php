<div class="contenu">
<!-- public function save_rendez_vous_to_database($client, $service_id, $id_slot, $entree_date, $entree_time)
	{
		$simple_rdv_data = $this->create_simple_rdv($client, $service_id);
		$this->db->insert('finals4_simple_rendez_vous', $simple_rdv_data);

		$rendez_vous_data = $this->create_operation_rdv($service_id, $id_slot, $entree_date, $entree_time);
		$devis_data = $this->create_devis($service_id);

		$this->db->insert('finals4_operation_rendez_vous', $rendez_vous_data);
		$this->db->insert('finals4_devis', $devis_data);
	} -->
<?php echo form_open('Client_Controller/enregistrer'); ?>
        <h2>Mes rendez-vous</h2>
            <hr>
                <p>Debut</p>
            <table class="table">
                <tr>
                    <td><input type="date" class="input" name="date"></td>
                    <td><input type="time" class="input" placeholder="heure" name="time"></td>
                </tr>
            </table>
            <p>Service</p>
            <select name="service" id="service" class="input">
            <?php
            if(!empty($liste_service)) {
                foreach($liste_service as $service): ?>
                    <option value="<?= $service['id']; ?>"><?= $service['nom']; ?></option>
                <?php endforeach; ?>

          <?php  } ?>

        </select>
            <input type="submit" class="bouton_3" value="Confirm">
    <?php echo form_close(); ?>
            <hr>
            <p>Debut : 12-02-24     Duree : 3 h</p>
            <p>Service : Revision Prix : 20 000 Ar</p>
            <p>Slot : A</p>
            <input type="submit" class="bouton_1" value="Envoyer>
    </form> 
    <a href="<?php echo site_url('Rendezvous_Controller/liste_rendezvous'); ?>">liste de mes rendez vous</a>

</div>