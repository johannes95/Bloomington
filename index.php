<html>
<head>
	<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>

<?php 
	$src = "img/stevejobs.jpg";
	$img = imagecreatefromjpeg($src);
	$img_size = array("width" => getimagesize($src)[0], "height" => getimagesize($src)[1]);
	
	for($h = 0; $h < 50; $h++){
	for($w = 0; $w < $img_size["width"]; $w++){
		$rgb = imagecolorat($img, $w, $h);
		$r = ($rgb >> 16) & 0xFF;
		$g = ($rgb >> 8) & 0xFF;
		$b = $rgb & 0xFF;

		echo '<div class="p" style="background:rgb('.$r.', '.$g.', '.$b.');"></div>';
	}
		echo "<br />";
	}

	
?>