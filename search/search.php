<?php
require_once '../functions.php';
require_once '../config.php';

$anken_no = '';
if(!empty($_GET['q'])){
	$anken_no = $_GET['q'];
}
// var_dump($anken_no);
// exit();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>NYUSATSU_CHECK_VIEW</title>
	<link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script>
		function clear_anken(){
			// 案件番号
			$('#anken_no').text('');
			// URL
			$('#anken_url').text('');
			// 案件名(事業年度・名称)
			$('#anken_name').text('');
			// 契約種別
			$('#anken_keishu_name').text('');
			// 対象業者の地域要件
			$('#anken_company_area').text('');
			// 公開開始日時
			$('#anken_open_date').text('');
			// 公開終了日時
			$('#anken_close_date').text('');
			// 入札日時
			$('#anken_tender_date').text('');
			// 入札場所
			$('#anken_tender_place').text('');
			// 履行期限
			$('#anken_limit_date').text('');
			// 業務大分類
			$('#anken_gyoumu_kbn_1').text('');
			// 業務小分類
			$('#anken_gyoumu_kbn_2').text('');
			// 実施機関
			$('#anken_kasitu_name').text('');
			// 担当者名・電話番号
			$('#anken_tanto_name').text('');
			// 特記事項
			$('#anken_notes').text('');
			// 結果表示開始日時
			$('#anken_result_open_date').text('');
			// 結果表示終了日時
			$('#anken_result_close_date').text('');
			// 落札業者名等
			$('#anken_raku_name').text('');
			// 落札金額（税込・円）
			$('#anken_price').text('');
		}
		function get_anken(anken_no){
			var data = 'anken_no=' + anken_no;
			
			// console.log(data);
			$.ajax({
				url: '../ajax/_ajax_get_anken_detail_by_ankenno.php',
				type: 'POST',
				data: data,
				dataType: 'JSON',
				success: function(result){
					console.log(result)
					
					// 案件番号
					$('#anken_no').text(result.anken_no);
					// URL
					$('#anken_url').attr('href', result.anken_url);
					$('#anken_url').text(result.anken_url);
					// 案件名(事業年度・名称)
					$('#anken_name').text(result.anken_name);
					// 契約種別
					$('#anken_keishu_name').text(result.keishu_name);
					// 対象業者の地域要件
					$('#anken_company_area').text(result.company_area);
					// 公開開始日時
					$('#anken_open_date').text(result.anken_open_date);
					// 公開終了日時
					$('#anken_close_date').text(result.anken_close_date);
					// 入札日時
					$('#anken_tender_date').text(result.tender_date);
					// 入札場所
					$('#anken_tender_place').text(result.tender_place);
					// 履行期限
					$('#anken_limit_date').text(result.limit_date);
					// 業務大分類
					$('#anken_gyoumu_kbn_1').text(result.gyoumu_kbn_1);
					// 業務小分類
					$('#anken_gyoumu_kbn_2').text(result.gyoumu_kbn_2);
					// 実施機関
					$('#anken_kasitu_name').text(result.kasitu_name);
					// 担当者名・電話番号
					$('#anken_tanto_name').text(result.tanto_name);
					// 特記事項
					$('#anken_notes').text(result.notes);
					// 結果表示開始日時
					$('#anken_result_open_date').text(result.result_open_date);
					// 結果表示終了日時
					$('#anken_result_close_date').text(result.result_close_date);
					// 落札業者名等
					$('#anken_raku_name').text(result.raku_name);
					// 落札金額（税込・円）
					$('#anken_price').text(result.price);
				}
			});
		}
		$(document).ready(function(){
			// 案件を選択

			var anken_no = $('#anken_id').val();
			console.log(anken_no);
			
			if(anken_no === ''){
				return false;
			}
			
			get_anken(anken_no);

			
			$('#button').click(function(){
				var anken_no = $('#q').val();
				console.log(anken_no);
				
				clear_anken();
				get_anken(anken_no);
			});
		});
	</script>
	<style>
		body{
			padding-top:10px;
		}
		.anken-detail th{
			width:200px;
		}
		.anken-detail td{
			width:700px;
		}
		.anken{
			margin-top:45px;
		}
	</style>
</head>
<body>
<div class="container">

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<ul class="nav">
					<li><a href="../index.php">Home</a></li>
					<li class="active"><a href="./search/search.php">Search</a></li>
					<li><a href="../raku_name/raku_name_10.php">Raku_Name</a></li>
					<li><a href="../gyoumu_kbn/gyoumu_kbn_10.php">Gyoumu_Kbn</a></li>
					<li><a href="../help/help.php">Help</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	<input type="hidden" value="<?php echo $anken_no ?>" name="anken_id" id="anken_id">
	
	<div class="row anken">
		<div class="span16">
			<div>
				<span>案件番号</span>
				<input type="text" name="q" id="q" value="<?php echo $anken_no ?>">
				<input type="button" name="button" id="button" value="検索">
			</div>

			<hr>
			
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
	
	<hr>
	
	<footer class="footer">
		<p>FOOTER</p>
		<p><a href="http://twitter.github.com/bootstrap/">bootstrap</a></p>
	</footer>
</div>
</body>
</html>