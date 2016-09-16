<?php
require_once __DIR__ . '/fs.php';
$vid_data = create_meta();
$files1   = $vid_data->collection[0]->draw();
$files2   = $vid_data->collection[1]->draw();
echo '<html><head>
        <title>CP Sharp - File share</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style.css"/>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">				        
    </head>
    <body><main>
        <aside class="logo"></aside>
        <aside class="glitz glitz_hide"></aside>';
echo '<div class="list_container" id="S1_list">';
echo $files1;
echo '</div>';
echo '<div class="list_container" id="S2_list">';
echo $files2;
echo '</div>';
echo '<section>
            <figure ID="S1">
                <div class="front">Season 1</div>
                <div class="right">Season 1</div>
                <div class="left">Season 1</div>
                <div class="bottom">Season 1</div>
            </figure>';
echo '</div><figure ID="S2">
                <div class="front">Season 2</div>
                <div class="right">Season 2</div>
                <div class="left">Season 2</div>
                <div class="bottom">Season 2</div>
            </figure>';

echo '<figure ID="S3">
                <div class="front">More...</div>
                <div class="right">More...</div>
                <div class="left">More...</div>
                <div class="bottom">More...</div>
            </figure>
        </section>
    </main>
    </body>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="page.js"></script>
</html>';
