<html>
<head>
	<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php 
	$skittle_colors = array(array(214,24,43,94), array(222,118,27,122), array(250,246,40,175), array(14,199,51,88), array(86, 6, 117, 209), array(42, 108, 232, 127), array(242,148,148,179));
	$src = "img/stevejobs.jpg";
	$img = imagecreatefromjpeg($src);
	$img_size = array("width" => getimagesize($src)[0], "height" => getimagesize($src)[1]);
	$output_pixel_size = 8;
	$skittles_required = 0;

	for($h = 0; $h < $img_size["height"]; $h += $output_pixel_size){
	for($w = 0; $w < $img_size["width"]; $w += $output_pixel_size){
		$rgb = imagecolorat($img, $w, $h);
		$r = ($rgb >> 16) & 0xFF;
		$g = ($rgb >> 8) & 0xFF;
		$b = $rgb & 0xFF;

		$avg = ($r+$g+$b) / 3;
		$best = array("index" => -1, "diff" => 256);
		for($y = 0; $y < sizeof($skittle_colors); $y++){
			$diff = sqrt(pow($avg - $skittle_colors[$y][3], 2));
			if($diff < $best["diff"]){
				$best["index"] = $y;
				$best["diff"] = $diff;
			}
		}

		echo '<div class="p" style="border-radius:'.$output_pixel_size.'px;width:'.$output_pixel_size.'px;height:'.$output_pixel_size.'px;left:'.$w.'px;top:'.$h.'px;background:rgb('.$skittle_colors[$best["index"]][0].', '.$skittle_colors[$best["index"]][1].', '.$skittle_colors[$best["index"]][2].');"></div>';
		$skittles_required++;
	}
		echo "<br />";
	}

	echo '<div id="output">skittles required: '.$skittles_required.'</div>';

	
?>
</body>
</html>