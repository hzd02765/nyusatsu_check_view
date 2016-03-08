<?php

exec('/usr/bin/python /usr/local/app_product/nyusatsu_check_cron/main.py 2>&1', $out, $ret);

$link = pg_connect('host=localhost dbname=nyusatsu_check user=nyusatsu_check password=nyusatsu_check');
$histories = array();
$sql = "SELECT * FROM j_histories ORDER BY id desc limit 1";
$result = pg_query($sql);
$rows = pg_fetch_all($result);
foreach($rows as $row){
	// ex. 2015-03-02 09:20:09.637246 => 2015-03-02 09:20:09
	$ary = explode('.', $row['process_start']);
	$process_start = array_shift($ary);
	
	// ex. 2015-03-02 09:21:04.963728 => 2015-03-02 09:21:04
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
}
pg_close($link);

// デバッグ用
// print_r($buf);

// echo "更新しました。ブラウザを再読み込みして下さい。";
header("Content-type: text/plain; charset=UTF-8");
echo json_encode($histories);
