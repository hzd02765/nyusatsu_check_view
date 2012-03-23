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
		<br>
		<a class="btn btn-primary btn-large">最新の情報を取得</a>
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

			<table class="table table-bordered">
				<tbody>
					<tr><th>id</th><td style="width:800px;"><span id="anken_id"></span></td></tr>
					<tr><th>anken_no</th><td><span id="anken_no"></span></td></tr>
					<tr><th>nyusatsu_system</th><td><span id="anken_nyusatsu_system"></span></td></tr>
					<tr><th>nyusatsu_type</th><td><span id="anken_nyusatsu_type"></span></td></tr>
					<tr><th>keishu_cd</th><td><span id="anken_keishu_cd"></span></td></tr>
					<tr><th>public_flag</th><td><span id="anken_public_flag"></span></td></tr>
					<tr><th>gyoumu_kbn_1</th><td><span id="anken_gyoumu_kbn_1"></span></td></tr>
					<tr><th>gyoumu_kbn_2</th><td><span id="anken_gyoumu_kbn_2"></span></td></tr>
					<tr><th>anken_name</th><td><span id="anken_name"></span></td></tr>
					<tr><th>kasitu_name</th><td><span id="anken_kasitu_name"></span></td></tr>
					<tr><th>tender_date</th><td><span id="anken_tender_date"></span></td></tr>
					<tr><th>anken_url</th><td><span id="anken_url"></span></td></tr>
					<tr><th>version_no</th><td><span id="anken_version_no"></span></td></tr>
					<tr><th>delete_flag</th><td><span id="anken_delete_flag"></span></td></tr>
					<tr><th>ins_date</th><td><span id="anken_ins_date"></span></td></tr>
					<tr><th>upd_date</th><td><span id="anken_upd_date"></span></td></tr>
				</tbody>
			</table>
		</div>
	</div>
	<footer>
		<h2>FOOTER</h2>
	</footer>
</div>
</body>
</html>