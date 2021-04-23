<?php
    if (isset($_POST['submit'])) {
    	$txt = $_POST['txt'];

    	// setup the URL and read the JS from a file
	    $url = 'https://javascript-minifier.com/raw';
	    $js = $txt;

	    // init the request, set various options, and send it
	    $ch = curl_init();

	    curl_setopt_array($ch, [
	        CURLOPT_URL => $url,
	        CURLOPT_RETURNTRANSFER => true,
	        CURLOPT_POST => true,
	        CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"],
	        CURLOPT_POSTFIELDS => http_build_query([ "input" => $js ])
	    ]);

	    $minified = curl_exec($ch);

	    // finally, close the request
	    curl_close($ch);

	    // output the $minified JavaScript
	    // echo $minified;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="style.css">
	<title>JavaScript Minifier - Brave Coder</title>
</head>
<body>

	<div class="container wrapper shadow">
		<h2 class="title text-center mb-4">Simple JavaScript Minifier</h2>
		<form action="" method="post">
			<div class="form-group mb-3">
				<textarea name="txt" class="form-control" rows="10" required placeholder="Enter your JavaScript Code"></textarea>
			</div>
			<button type="submit" name="submit" class="btn btn-outline-primary mb-3">Minify</button>
			<div class="form-group">
				<textarea class="form-control" rows="10" disabled placeholder="Result"><?php if (isset($_POST['submit'])) { echo $minified; } ?></textarea>
			</div>
		</form>
	</div>
	
	<!-- Boostrap Bundle -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>