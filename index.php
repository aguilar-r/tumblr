<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html>
<head>
 <title> MMXV </title>
 <meta charset="utf-8"><meta name="generator" content="AlterVista - Editor HTML Color Your Life Homepage"/>
 <link type="text/css" rel="stylesheet" href="/css/eel.css">
</head>
<body>
<div class="contentWrapper"></div><div class="contentBody">
<div class="content">
<?php
try {
	//instantiate the class
	$pages = new Paginator('10','p');

	//collect all records fro the next function
	$stmt = $db->query('SELECT postID FROM articles');

	//determine the total number of records
	$pages->set_total($stmt->rowCount());
	
	$stmt = $db->query('SELECT postID, headline, postCont, postDate FROM articles ORDER BY postID DESC '.$pages->get_limit());
	while($row = $stmt->fetch()) {
		echo '<div id="post">';
			echo '<h2 id="headline"><a href="viewpost.php?id='.$row['postID'].'">'.$row['headline'].'</a></h2>';
			echo '<hr>';
			echo '<p>'.$row['postCont'].'</p>';
			echo '<hr>';
			echo '<span id="bottom">posted: '.date('jS M Y', strtotime($row['postDate'])).' </span>';
		echo '</div>';
        echo '</br>';
	}
} catch(PDOException $e) {
	echo $e->getMessage();
}
?>
	<div id="pageContainer">
		<?php echo $pages->page_links(); ?>
	</div>
</div><!-- end content -->
</div>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
 <script src="/js/script.js"></script>
 <script src="/js/audiojs/audio.min.js"></script><script src="/js/album.js"></script>
</body>
    <footer>(c) raul aguilar | </footer>
</html>