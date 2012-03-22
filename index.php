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
		<option value=""></option>
		<option value="keishu_cd=1&public_flag=0">現在公開分 => 一般競争入札</option>
		<option value="keishu_cd=2&public_flag=0">現在公開分 => 簡易公開調達</option>
		<option value="keishu_cd=1&public_flag=1">既に終了分 => 一般競争入札</option>
		<option value="keishu_cd=2&public_flag=1">既に終了分 => 簡易公開調達</option>
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
	<select id='anken'>
	</select>
</div>
<div>
	<p>詳細</p>
	<ul>
		<li>
			id・・・
			<label id="anken_id"></label>
		</li>
		<li>
			anken_no・・・
			<label id="anken_no"></label>
		</li>
		<li>
			nyusatsu_system・・・
			<label id="anken_id"></label>
		</li>
		<li>
			nyusatsu_type・・・
			<label id="anken_nyusatsu_system"></label>
		</li>
		<li>
			keishu_cd・・・
			<label id="anken_keishu_cd"></label>
		</li>
		<li>
			public_flag・・・
			<label id="anken_public_flag"></label>
		</li>
		<li>
			gyoumu_kbn_1・・・
			<label id="anken_gyoumu_kbn_1"></label>
		</li>
		<li>
			gyoumu_kbn_2・・・
			<label id="anken_gyoumu_kbn_2"></label>
		</li>
		<li>
			anken_name・・・
			<label id="anken_name"></label>
		</li>
		<li>
			kasitu_name・・・
			<label id="anken_kasitu_name"></label>
		</li>
		<li>
			tender_date・・・
			<label id="anken_tender_date"></label>
		</li>
		<li>
			anken_url・・・
			<label id="anken_url"></label>
		</li>
		<li>
			version_no・・・
			<label id="anken_version_no"></label>
		</li>
		<li>
			delete_flag・・・
			<label id="anken_delete_flag"></label>
		</li>
		<li>
			ins_date・・・
			<label id="anken_ins_date"></label>
		</li>
		<li>
			upd_date・・・
			<label id="anken_upd_date"></label>
		</li>
	</ul>
</div>
<h2>FOOTER</h2>
</body>
</html>