<?php
require_once __DIR__ . '/fs.php';

$vid_data = create_meta();
$files1   = $vid_data->collection[0]->draw();
$files2   = $vid_data->collection[1]->draw();
$files3   = $vid_data->collection[2]->draw();


echo '<html><head>
        <title>CP Sharp - File share</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style.css"/>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link rel="icon" href="http://i2.wp.com/www.cpsharp.net/wp-content/uploads/2015/09/cropped-cpsharp.logo_.300.white_.png?fit=32%2C32" sizes="32x32" />
		<link rel="icon" href="http://i2.wp.com/www.cpsharp.net/wp-content/uploads/2015/09/cropped-cpsharp.logo_.300.white_.png?fit=192%2C192" sizes="192x192" />
		<link rel="apple-touch-icon-precomposed" href="http://i2.wp.com/www.cpsharp.net/wp-content/uploads/2015/09/cropped-cpsharp.logo_.300.white_.png?fit=180%2C180" />
		<meta name="msapplication-TileImage" content="http://i2.wp.com/www.cpsharp.net/wp-content/uploads/2015/09/cropped-cpsharp.logo_.300.white_.png?fit=270%2C270" />		
    </head>  
    <body><main>
    <aside class="logo"></aside></section></div>
        <div><aside class="film-reel">';
echo $files3;
echo '</aside></div></main></body>';
echo '<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>';
echo '<script src="page.js"></script></html>';

/*<figure style-="margin-top: 1em;">
	<div class="front" class="">Movies</div>
	<div class="right">Movies</div>
	<div class="left">Movies</div>
	<div class="bottom">Movies</div>
</figure>
<aside class="glitz glitz-hide"></aside>';
/*echo '<div class="list_container" id="S1_list">';
echo $files1;
echo '</div>';
echo '<div class="list_container" id="S2_list">';
echo $files2;
echo '</div>';
echo '<div class="list_container" id="Movies_list">';
echo $files3;
echo '</div><div><section>';
/*echo '<figure ID="S1">
<div class="front">Season 1</div>
<div class="right">Season 1</div>
<div class="left">Season 1</div>
<div class="bottom">Season 1</div>
</figure>';
echo '</div>
<figure ID="S2">
	<div class="front">Season 2</div>
	<div class="right">Season 2</div>
	<div class="left">Season 2</div>
	<div class="bottom">Season 2</div>
</figure>';*/