<?php

$text = '';

$fp = fopen('help.txt', 'r');
$count = 0;
if ($fp){
    if (flock($fp, LOCK_SH)){
        while (!feof($fp)) {
            $buffer = fgets($fp);
            // print($buffer.'<br>');
			$text .= $buffer;
            $count++;
        }

        // print('行は'.$count.'行でした<br>');

        flock($fp, LOCK_UN);
    }else{
        print('ファイルロックに失敗しました');
    }
}

$flag = fclose($fp);

if ($flag){
    // print('無事クローズしました');
}else{
    print('クローズに失敗しました');
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>NYUSATSU_CHECK_VIEW</title>
	<link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/jquery-1.7.2.min.js"></script>
</head>
<body>
<div class="container">

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<ul class="nav">
					<li><a href="../index.php">Home</a></li>
					<li><a href="../search/search.php">Search</a></li>
					<li><a href="../raku_name/raku_name_10.php">Raku_Name</a></li>
					<li><a href="../gyoumu_kbn/gyoumu_kbn_10.php">Gyoumu_Kbn</a></li>
					<li><a href="../chart/chart10.php">Chart</a></li>
					<li><a href="../etc/etc10.php">etc</a></li>
					<li class="active"><a href="./help10.php">Help</a></li>
				</ul>
			</div>
		</div>
	</div>

	<br>
	<br>
	<hr>
	
	<?php echo $text; ?>
	
	<br>
	<hr>
	
	<a href="./help20.php">編集</a>
</div>
</body>
</html>