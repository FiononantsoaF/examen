<div class="contenu">
	<h3>Liste des Services</h3>
	<ul>
		<?php foreach ($services as $key => $value) {
			echo "<li>" . $value['service'] . " : " . $value['duree'] . "</li>";
		} ?>
	</ul>
	<h3>Liste des Travaux</h3>
	<table class="table table-striped">
		<tr>
			<th>voiture</th>
			<th>type voiture</th>
			<th>date rdv</th>
			<th>heure rdv</th>
			<th>type service</th>
			<th>montant</th>
			<th>date paiement</th>
		</tr>
		<?php for ($i = 0; $i < count($works); $i++) {
			echo "<tr>";
			foreach ($works[$i] as $key => $value) {
				echo "<td>" . $value . "</td>";
			}
			echo "</tr>";
		} ?>
	</table>

	<table>
		<tr>
			<td>
				<div class="form-group">
					<a href="#"><input type="submit" class="bouton_2" value="Retour a la page d'acceuil"></a>
					<br>
				</div>
			</td>
			<td>
				<div class="form-group">
					<form action="<?php echo site_url("Csv_Controller/confirm_save") ?>" method="post"  enctype="multipart/form-data">
						<?php
							$services_json = json_encode($services);
							$works_json = json_encode($works);
						?>
						<input type="hidden" value='<?php echo $services_json; ?>' name="services">
						<input type="hidden" value="<?php echo $works_json; ?>" name="works">
						<input type="submit" class="bouton_1" value="Importer">
					</form>
				</div>
			</td>
		</tr>
	</table>
</div>