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
            <li role="presentation"><a href="#">Prise de rendez-vous</a></li>
            <li role="presentation"><a href="#">Disabled link</a></li>
            <li role="presentation"><a href="#">Disabled link</a></li>
        </ul>
    </div>
	 <div class="reinitialise_div">
            <table>
                <tr>
                    <td>
                        <a href="<?php echo site_url("Csv_controller/") ?>" >
                            <input type="submit" value="Importer" class="bouton_safe">
                        </a>
                    </td>
                    <td>
                        <a href="#" >
                            <input type="submit" value="Reinitialiser" class="bouton_rouge">
                        </a>
                    </td>
                </tr>
            </table>
        </div>
   