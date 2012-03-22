<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>NYUSATSU_CHECK_VIEW</title>
	<script src="./js/jquery-1.7.2.min.js"></script>
	<script src="./js/main.js"></script>
</head>
<body>
<h1>HEADER</h1>
<div>
	<p>案件TYPE</p>
	<select id='kind'>
		<option value="0"></option>
		<option value="1">現在公開分 => 一般競争入札</option>
		<option value="2">現在公開分 => 簡易公開調達</option>
		<option value="3">既に終了分 => 一般競争入札</option>
		<option value="4">既に終了分 => 簡易公開調達</option>
	</select>
</div>
<div>
	<p>大分類</p>
	<select id='kbn1'>
	</select>
</div>
<div>
	<p>小分類</p>
	<select id='kbn2'>
	</select>
</div>
<div>
	<p>案件</p>
	<ul>
	</ul>
</div>
<div>
	<p>詳細</p>
	<ul>
		<li>id</li>
		<li>anken_no</li>
		<li>nyusatsu_system</li>
		<li>nyusatsu_type</li>
		<li>keishu_cd</li>
		<li>public_flag</li>
		<li>gyoumu_kbn_1</li>
		<li>gyoumu_kbn_2</li>
		<li>anken_name</li>
		<li>kasitu_name</li>
		<li>tender_date</li>
		<li>anken_url</li>
		<li>version_no</li>
		<li>delete_flag</li>
		<li>ins_date</li>
		<li>upd_date</li>
	</ul>
</div>
<h2>FOOTER</h2>
</body>
</html>