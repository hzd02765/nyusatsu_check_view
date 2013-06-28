<?php
function h($s){
	return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

function db_connect(){
	$link = pg_connect("host=".HOST." dbname=".DBNAME." user=".USER." password=".PASSWORD);
	if (!$link) {
		echo "An error occurred.\n";
		exit;
	}
	return $link;
}