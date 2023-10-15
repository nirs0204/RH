<?php 
  if(!isset($services)) $services=array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_table.css">
    <title>Details CV</title>
</head>
<body>
<table>
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Adresse</th>
        <th>Date de naissance</th>
        <th>Experience</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php foreach($detail as $details) { ?>
        <td><?php echo ($details->nom) ?></td>
        <td><?php echo ($details->prenom) ?></td>
        <td><?php echo ($details->adresse) ?></td>
        <td><?php echo ($details->dtn) ?></td>
        <td><?php echo ($details->experience) ?></td>
        <?php } ?>
      </tr>
    </tbody>
  </table>
</body>
</html>