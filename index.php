 <?php

function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

$page = get_data( "https://en.wikipedia.org/w/api.php?action=query&list=recentchanges&rcprop=title&rclimit=1&rcnamespace=6&format=json" );
$api_data = json_decode( $page );

var_dump( $page );

?>
<!doctype html>
<html>
<head>
	<style>
		body {
			background-color: darkorange;
		}

		h2 {
			text-align: center;
		}
	</style>
</head>
<body>
	<h2>Hello World!</h2>
	<h3>Here's the latest edited file from Wikipedia</h3>
	<iframe src=<?php echo '"http://en.wikipedia.org/wiki/' . $api_data['query']['recentchanges']['title'] . '"' ?> >
	</iframe>
</body>
</html>