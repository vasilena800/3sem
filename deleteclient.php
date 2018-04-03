<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="css/style.css">
<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>
	<ul class="navbar">
    <?php include 'menu.php';?>
    <br>  
    </ul>
	<?php
    $cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');
    require_once 'dbcon.php';
    $sql = 'Delete from clients where `clientsID`=?';
    $stmt = $link->prepare($sql);
    $stmt->bind_param('i', $cid);
    $stmt->execute();
    if ($stmt->affected_rows >0 ){
        echo 'Client deleted from list';
    }
    else {
        echo 'No client deleted';
    //	echo $stmt->error;
    }
    ?>
    <hr>
    <a href="clientlist.php">Back to Clientlist</a><br>
    </body>
    </html>

	<?php require 'footer.php';?>