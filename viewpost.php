<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html>
<head>
 <title> Color Your Life </title>
 <meta charset="utf-8"><meta name="generator" content="AlterVista - Editor HTML Color Your Life Homepage"/>
 <link rel="shortcut icon" href="http://www.nasa.gov/favicon.ico" type="image/x-icon">
 <link type="text/css" rel="stylesheet" href="/css/eel.css">
</head>
<body>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
 <script src="/js/script.js"></script>
<div class="contentWrapper"></div><div class="contentBody">
<div class="content">
	<?php
		$stmt = $db->prepare('SELECT postID, headline, postCont, postDate FROM articles WHERE postID = :postID');
		$stmt->execute(array(':postID' => $_GET['id']));
		$row = $stmt->fetch();

		if( $row['postID'] == '') {
			header('Location: ./');
			exit;
		}
		
		echo '<div id="post">';
			echo '<h2 id="headline"><a href="javascript:history.back()">'.$row['headline'].'</a></h2>';
			echo '<hr>';
			echo '<p>'.$row['postCont'].'</p>';
			echo '<hr>';
			echo '<span id="bottom">posted: '.date('jS M Y', strtotime($row['postDate'])).' </span>';
		echo '<br></div>';
	?>
</div><!-- end content -->
</div>
</body>
    <footer>(c) raul aguilar</a> | </footer>
</html>