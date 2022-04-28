<?php

$example_data = '{
   "html_attributions" : [],
   "result" : {
      "rating" : 4.4
   },
   "status" : "OK"
}
';

$example_data_decoded = json_decode($example_data);
var_dump($example_data_decoded);
$rating = $example_data_decoded->result->rating;
$star_fill_percent = ($rating / 5) * 100  . "%" ;
var_dump($rating);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="./style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<h1>Penndel Pizza Review</h1>
	<h2 class="roboto">Find what others are saying about this spot:</h2>
	<div class="ratings-container">
		<div class="rating-container">
			<div class="rating-info">
				<i class="fa-brands fa-google"></i>
				<p class="no-m rating-title">Google Maps </p>
			</div>
		<div class="score-container">
			<div class="star-container">
				<div class="stars-outer">
					<div class="stars-inner" style="width:<?php echo $star_fill_percent ?>"></div>
					</div>
				</div>
			<p class="rating-number" ><?php echo $rating ?> / 5</p>
			<p class="no-m text-align-center review-count">45 reviews</p>
			</div>
		</div>
		<div class="rating-container">
			<div class="rating-info">
				<i class="fa-brands fa-yelp"></i>
				<p class="no-m rating-title">Yelp</p>
			</div>
		<div class="score-container">
			<div class="star-container">
				<div class="stars-outer">
					<div class="stars-inner" style="width:<?php echo $star_fill_percent ?>"></div>
					</div>
			</div>
			<p class="rating-number" ><?php echo $rating ?> / 5</p>
			<p class="no-m text-align-center review-count">45 reviews</p>
			</div>
		</div>
	</div>

	<img src="./maps-penndel-example.PNG" alt="">

	
</body>
</html>