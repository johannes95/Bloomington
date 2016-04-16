<html>
<head>
	<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>

<?php 
	$skittle_colors = array(array(214,24,43,94), array(222,118,27,122));
	$src = "img/stevejobs.jpg";
	$img = imagecreatefromjpeg($src);
	$img_size = array("width" => getimagesize($src)[0], "height" => getimagesize($src)[1]);
	$output_pixel_size = 1;
	$skittles_required = 0;

	for($h = 0; $h < $img_size["height"]; $h += $output_pixel_size){
	for($w = 0; $w < $img_size["width"]; $w += $output_pixel_size){
		$rgb = imagecolorat($img, $w, $h);
		$r = ($rgb >> 16) & 0xFF;
		$g = ($rgb >> 8) & 0xFF;
		$b = $rgb & 0xFF;


		$avg = ($r+$g+$b) / 3;
		if($avg > 110){
			$avg = 255;
		}else{
			$avg = 0;
		}

		echo '<div class="p" style="width:'.$output_pixel_size.'px;height:'.$output_pixel_size.'px;left:'.$w.'px;top:'.$h.'px;background:rgb('.$avg.', '.$avg.', '.$avg.');"></div>';
		$skittles_required++;
	}
		echo "<br />";
	}

	echo '<div id="output">skittles required: '.$skittles_required.'</div>';

	
?>