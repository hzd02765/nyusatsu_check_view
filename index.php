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
			padding-top:10px;
			// background-color:FFFFFF;
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
		.anken-detail th{
			width:200px;
		}
		.anken-detail td{
			width:700px;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="hero-unit">
		<h1>HEADER</h1>
		<br>
		<a class="btn btn-primary btn-large" id="get_new_info">最新の情報を取得</a>
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

			<table class="table table-bordered anken-detail">
				<tbody>
					<tr><th>案件番号</th><td><span id="anken_no"></span></td></tr>
					<tr><th>URL</th><td><a href="" id="anken_url" target="_blank"></a></td></tr>
					<tr><th>案件名(事業年度・名称)</th><td><span id="anken_name"></span></td></tr>
					<tr><th>契約種別</th><td><span id="anken_keishu_name"></span></td></tr>
					<tr><th>対象業者の地域要件</th><td><span id="anken_company_area"></span></td></tr>
					<tr><th>公開開始日時</th><td><span id="anken_open_date"></span></td></tr>
					<tr><th>公開終了日時</th><td><span id="anken_close_date"></span></td></tr>
					<tr><th>入札日時</th><td><span id="anken_tender_date"></span></td></tr>
					<tr><th>入札場所</th><td><span id="anken_tender_place"></span></td></tr>
					<tr><th>履行期限</th><td><span id="anken_limit_date"></span></td></tr>
					<tr><th>業務大分類</th><td><span id="anken_gyoumu_kbn_1"></span></td></tr>
					<tr><th>業務小分類</th><td><span id="anken_gyoumu_kbn_2"></span></td></tr>
					<tr><th>実施機関</th><td><span id="anken_kasitu_name"></span></td></tr>
					<tr><th>担当者名・電話番号</th><td><span id="anken_tanto_name"></span></td></tr>
					<tr><th>特記事項</th><td><span id="anken_notes"></span></td></tr>
					<tr><th>結果表示開始日時</th><td><span id="anken_result_open_date"></span></td></tr>
					<tr><th>結果表示終了日時</th><td><span id="anken_result_close_date"></span></td></tr>
					<tr><th>落札業者名等</th><td><span id="anken_raku_name"></span></td></tr>
					<tr><th>落札金額（税込・円）</th><td><span id="anken_price"></span></td></tr>
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