<?php

/* This data was obtained with the following url: */

/* https://api.yelp.com/v3/businesses/search?term=Penndel+Pizza&location=Penndel+Pizza+15+W+Lincoln+Hwy%2C+Penndel%2C+PA+19047&limit=1 */

$yelp_data_json = '{"businesses": [{"id": "2vpflvpjxG5SbE2aSScg3Q", "alias": "pauls-penndel-pizza-langhorne", "name": "Paul\'s Penndel Pizza", "image_url": "https://s3-media4.fl.yelpcdn.com/bphoto/lyHpMjS_rvYbFaVxavYfMw/o.jpg", "is_closed": false, "url": "https://www.yelp.com/biz/pauls-penndel-pizza-langhorne?adjust_creative=ieQtQ-YbTEbg3rE6tGTSsQ&utm_campaign=yelp_api_v3&utm_medium=api_v3_business_search&utm_source=ieQtQ-YbTEbg3rE6tGTSsQ", "review_count": 44, "categories": [{"alias": "pizza", "title": "Pizza"}, {"alias": "salad", "title": "Salad"}, {"alias": "sandwiches", "title": "Sandwiches"}], "rating": 4.0, "coordinates": {"latitude": 40.15858, "longitude": -74.91234}, "transactions": ["delivery"], "price": "$", "location": {"address1": "15 W Lincoln Hwy", "address2": "", "address3": "", "city": "Langhorne", "zip_code": "19047", "country": "US", "state": "PA", "display_address": ["15 W Lincoln Hwy", "Langhorne, PA 19047"]}, "phone": "+12157572611", "display_phone": "(215) 757-2611", "distance": 17.367934942826572}], "total": 7, "region": {"center": {"longitude": -74.91233825683594, "latitude": 40.15839862317712}}}';

/* This data is returned with the following url: */

/* https://maps.googleapis.com/maps/api/place/details/json?fields=rating%2Cuser_ratings_total%2Curl&place_id=ChIJs23l-VBSwYkRKMloJqRCi08&key=YOUR_API_KEY_HERE */

$google_data_json = '{
   "html_attributions" : [],
   "result" : {
      "rating" : 4.4,
	  "url" : "https://maps.google.com/?cid=5731748223545559336",
	  "user_ratings_total":"361"	
   },
   "status" : "OK"
}
';

function fill_percent($num, $total){
	return ($num / $total) * 100 . "%";

}

$google_data = json_decode($google_data_json);
$yelp_data = json_decode($yelp_data_json);
$google_rating = $google_data->result->rating;
$google_review_count = $google_data->result->user_ratings_total;
$google_url = $google_data->result->url;
$google_star_fill_percent = fill_percent($google_rating, 5 );
var_dump($google_rating);

$yelp_rating = $yelp_data->businesses[0]->rating;
$yelp_review_count = $yelp_data->businesses[0]->review_count;
$yelp_url = $yelp_data->businesses[0]->url;
$yelp_star_fill_percent = fill_percent($yelp_rating, 5);
var_dump($yelp_rating);

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
		<a class="unstyled-link rating-link" href="<?php echo $google_url;?>" target="_blank">
			<div class="rating-container">
				<div class="rating-info">
					<i class="fa-brands fa-google"></i>
					<p class="no-m rating-title">Google Maps </p>
				</div>
			<div class="score-container">
				<div class="star-container">
					<div class="stars-outer">
						<div class="stars-inner" style="width:<?php echo $google_star_fill_percent ?>"></div>
						</div>
					</div>
				<p class="rating-number" ><?php echo $google_rating ?> / 5</p>
				<p class="no-m text-align-center review-count"><?php echo $google_review_count ?> reviews</p>
				</div>
			</div>
			</a>
		<a class="unstyled-link rating-link" href="<?php echo $yelp_url;?>" target="_blank">
			<div class="rating-container">
				<div class="rating-info">
					<i class="fa-brands fa-yelp"></i>
					<p class="no-m rating-title">Yelp</p>
				</div>
			<div class="score-container">
				<div class="star-container">
					<div class="stars-outer">
						<div class="stars-inner" style="width:<?php echo $yelp_star_fill_percent ?>"></div>
						</div>
				</div>
				<p class="rating-number" ><?php echo $yelp_rating ?> / 5</p>
				<p class="no-m text-align-center review-count"><?php echo $yelp_review_count ?> reviews</p>
				</div>
			</div>
		</a>
	</div>

	<img src="./maps-penndel-example.PNG" alt="">

	
</body>
</html>