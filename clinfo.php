<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CLient info</title>
<link rel="stylesheet" href="css/style.css">
<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>

<body>

	<ul class="navbar">
    <?php include 'menu.php';?>
    <br>  
    </ul>
	<?php
    $cid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) or die('missing parameter');
        echo $cid;
    ?>

    <!-- CLIENT DETAILS -->
    <article>    
    <h1>Details for client with ID <?=$cid?>:</h1>
    <ul>
    <?php
    require_once 'dbcon.php';
    $sql = 'SELECT c_name, c_address, zip_code_zip_id, c_con_number FROM project1db.clients where clientsID=?';
    
    $stmt = $link->prepare($sql);
    $stmt->bind_param('i', $cid);
    $stmt->execute();
    $stmt->bind_result($clname, $claddress, $clzip, $clcontact);
    
    while($stmt->fetch()){
        echo '<li>Name: '.$clname.'</li>';
        echo '<li>Address: '.$claddress.', '.$clzip.'</li>';
        echo '<li>Contact number: '.$clcontact.'</li>';   
    }
    ?>
    </ul>
    </article>
        <?php require 'footer.php';?>