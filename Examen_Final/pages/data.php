<?php
$data = array();
$data[0] = array('event' =>'Vidange','jour' => '2024-07-01', 'heure' => 12.5);
$data[1] = array('event' => 'Restoration','jour' => '2024-07-01', 'heure' => 11);
$data[2] = array('event' =>'Depannage' ,'jour' => '2024-07-01', 'heure' => 20.25);

// Ajouter plus de données si nécessaire

header('Content-Type: application/json');
echo json_encode($data);
?>
