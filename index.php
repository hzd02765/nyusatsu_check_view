<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>NYUSATSU_CHECK_VIEW</title>
	<link href="./css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="./js/jquery-1.7.2.min.js"></script>
	<script src="./js/main.js"></script>
	<style>
		body{
			background-color:FFFFFF;
		}
		h1{
			// background-color:green;
		}
		h2{
			// background-color:yellow;
		}
		div{
			// background-color:blue;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="hero-unit">
		<h1>HEADER</h1>
	</div>
	<div class="row">
		<div class="span3">
			<p>案件TYPE</p>
			<select id='kind' size="10">
				<option value=""></option>
				<option value="keishu_cd=1&public_flag=0">現在公開分 => 一般競争入札</option>
				<option value="keishu_cd=2&public_flag=0">現在公開分 => 簡易公開調達</option>
				<option value="keishu_cd=1&public_flag=1">既に終了分 => 一般競争入札</option>
				<option value="keishu_cd=2&public_flag=1">既に終了分 => 簡易公開調達</option>
			</select>
		</div>
		<div class="span3">
			<p>大分類</p>
			<select id='kbn1' size="10">
			</select>
		</div>
		<div class="span3">
			<p>小分類</p>
			<select id='kbn2' size="10">
			</select>
		</div>
		<div class="span3">
			<p>案件</p>
			<select id='anken' size="10">
			</select>
		</div>
	</div>
	<div class="row">
		<div class="span16">
		<p>詳細</p>
		<ul>
			<li>
				id・・・<span id="anken_id"></span>
			</li>
			<li>
				anken_no・・・
				<span id="anken_no"></span>
			</li>
			<li>
				nyusatsu_system・・・
				<span id="anken_nyusatsu_system"></span>
			</li>
			<li>
				nyusatsu_type・・・
				<span id="anken_nyusatsu_type"></span>
			</li>
			<li>
				keishu_cd・・・
				<span id="anken_keishu_cd"></span>
			</li>
			<li>
				public_flag・・・
				<span id="anken_public_flag"></span>
			</li>
			<li>
				gyoumu_kbn_1・・・
				<span id="anken_gyoumu_kbn_1"></span>
			</li>
			<li>
				gyoumu_kbn_2・・・
				<span id="anken_gyoumu_kbn_2"></span>
			</li>
			<li>
				anken_name・・・
				<span id="anken_name"></span>
			</li>
			<li>
				kasitu_name・・・
				<span id="anken_kasitu_name"></span>
			</li>
			<li>
				tender_date・・・
				<span id="anken_tender_date"></span>
			</li>
			<li>
				anken_url・・・
				<span id="anken_url"></span>
			</li>
			<li>
				version_no・・・
				<span id="anken_version_no"></span>
			</li>
			<li>
				delete_flag・・・
				<span id="anken_delete_flag"></span>
			</li>
			<li>
				ins_date・・・
				<span id="anken_ins_date"></span>
			</li>
			<li>
				upd_date・・・
				<span id="anken_upd_date"></span>
			</li>
		</ul>
		</div>
	</div>
	<footer>
		<h2>FOOTER</h2>
	</footer>
</div>
</body>
</html>