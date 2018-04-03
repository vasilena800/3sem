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
    $prid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) or die('missing parameter');
       
    ?>

    <!-- CLIENT DETAILS -->    
    <article><h1>Details for project with ID <?=$prid?>:</h1>
    <ul>
    <p>
    <?php
    require_once 'dbcon.php';
    $sql = 'SELECT pr_name, pr_descr, other_details, clients_clientsID FROM project1db.projects where projectID=?';
    
    $stmt = $link->prepare($sql);
    $stmt->bind_param('i', $prid);
    $stmt->execute();
    $stmt->bind_result($prname, $prdescr, $prother, $clid);
    
    while($stmt->fetch()){
        echo '<li>Project Name: '.$prname.'</li>';
        echo '<li>Project Description: '.$prdescr.'</li>';
        echo '<li>Other info: '.$prother.'</li>';   
        echo '<li>Client Name: '.$clid.'</li>';
    }
    ?>
    </p>
    </ul>
    
    <button class="button"><a href="editform.php?prid=<?=$prid?>">Edit Project</a></button>
	</article>

	<?php require 'footer.php';?>