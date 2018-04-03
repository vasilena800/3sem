<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Form</title>
<link rel="stylesheet" href="css/style.css">
<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>

<body>
	<ul class="navbar">
    <?php include 'menu.php';?>
    <br>  
    </ul>
<article>
	<?php
		$prid = filter_input(INPUT_GET, 'prid', FILTER_VALIDATE_INT) or die('missing parameter');
		require_once 'dbcon.php';
		$sql = 'SELECT pr_name FROM project1db.projects WHERE projectID=?';
		$stmt = $link->prepare($sql);
		$stmt->bind_param('i', $prid);
		$stmt->execute();
		$stmt->bind_result($prname);
		while ($stmt->fetch()) {}
		echo 'Project Name:   '.$prname;
    ?>
    
    <form method="post" action="editpr.php" >
    	
        <input type="hidden" name="prid" value="<?=$prid?>" align="left">
        <input type="text" name="prname" placeholder="Enter New Name:" value="<?=$prname?>" />
        <input type="submit" name="action" value="Update Name" style="margin-left: 40%"/>
    </form>
</article>
	<?php require 'footer.php';?>