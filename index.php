<html>
<head>
	<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>

<?php 
	//$skittle_colors = array();
	$src = "img/stevejobs.jpg";
	$img = imagecreatefromjpeg($src);
	$img_size = array("width" => getimagesize($src)[0], "height" => getimagesize($src)[1]);
	$output_pixel_size = 10;
	$skittles_required = 0;

	for($h = 0; $h < $img_size["height"]; $h += $output_pixel_size){
	for($w = 0; $w < $img_size["width"]; $w += $output_pixel_size){
		$rgb = imagecolorat($img, $w, $h);
		$r = ($rgb >> 16) & 0xFF;
		$g = ($rgb >> 8) & 0xFF;
		$b = $rgb & 0xFF;

		echo '<div class="p" style="width:'.$output_pixel_size.'px;height:'.$output_pixel_size.'px;left:'.$w.'px;top:'.$h.'px;background:rgb('.$r.', '.$g.', '.$b.');"></div>';
		$skittles_required++;
	}
		echo "<br />";
	}

	echo '<div id="output">skittles required: '.$skittles_required.'</div>';

	
?>