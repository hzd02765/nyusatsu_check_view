<?php
// exec('/usr/bin/python /usr/local/app/nyusatsu_check_cron/main.py 2>&1', $buf);
// exec('/usr/bin/python /usr/local/app_release/nyusatsu_check_cron/main.py 2>&1', $buf);


exec('/usr/bin/python /usr/local/my_product/nyusatsu_check_cron/ekimu/main.py 2>&1', $buf);

$link = pg_connect('host=localhost dbname=nyusatsu_check user=nyusatsu_check password=nyusatsu_check');

$histories = array();

$sql = "SELECT * FROM j_histories ORDER BY id desc limit 1";
$result = pg_query($sql);
$rows = pg_fetch_all($result);
foreach($rows as $row){
	$ary = explode('.', $row['process_start']);
	$process_start = array_shift($ary);
	
	$ary = explode('.', $row['process_end']);
	$process_end = array_shift($ary);
	
	array_push(
		$histories, 
		array(
			'id' => $row['id']
			, 'process_start' => $process_start
			, 'process_end' => $process_end
			, 'process_seconds' => $row['process_seconds']
			, 'count_tenders' => $row['count_tenders']
		)
	);
	// echo $row['id'];
	
}

exec('/usr/bin/python /usr/local/my_product/nyusatsu_check_cron/ekimu2/main.py 2>&1', $buf);

$sql = "SELECT * FROM j_histories ORDER BY id desc limit 1";
$result = pg_query($sql);
$rows = pg_fetch_all($result);
foreach($rows as $row){
	$ary = explode('.', $row['process_start']);
	$process_start = array_shift($ary);
	
	$ary = explode('.', $row['process_end']);
	$process_end = array_shift($ary);
	
	array_push(
		$histories, 
		array(
			'id' => $row['id']
			, 'process_start' => $process_start
			, 'process_end' => $process_end
			, 'process_seconds' => $row['process_seconds']
			, 'count_tenders' => $row['count_tenders']
		)
	);
	// echo $row['id'];
	
}

pg_close($link);
header("Content-type: text/plain; charset=UTF-8");

// デバッグ用
// print_r($buf);

// echo "更新しました。ブラウザを再読み込みして下さい。";
echo json_encode($histories);
