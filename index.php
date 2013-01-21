<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>NYUSATSU_CHECK_VIEW</title>
	<link href="./css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="./js/jquery-1.7.2.min.js"></script>
	<script>
		$(document).ready(function(){
			// 大分類を空に
			function emptyKbn1(){
				$('#kbn1').empty();		
				$('#kbn1').append($('<option>').val('').text(''));
			}
			// 小分類を空に
			function emptyKbn2(){
				$('#kbn2').empty();
				$('#kbn2').append($('<option>').val('').text(''));
			}
			// 案件を空に
			function emptyAnken(){
				$('#anken').empty();
				$('#anken').append($('<option>').val('').text(''));
			}
			// 詳細を空に
			function emptyDetail(){
				$('.anken-detail tr td span').text('');
				$('.anken-detail tr td a').attr('href', '');
				$('.anken-detail tr td a').text('');
			}
			
			// 最新の情報を取得
			$('#get_new_info').click(function(){
				alert('実装予定です。');
				// TODO
			});
			// 案件TYPEを選択
			$('#kind').change(function(){
				emptyKbn1();
				emptyKbn2();
				emptyAnken();
				emptyDetail();
				
				if('' == $(this).val()){
					return true;
				}
				
				var data = $(this).val();		
				$.ajax({
					url: './_ajax_get_kbn1.php',
					type: 'POST',
					data: data,
					dataType: 'JSON',
					success: function(result){
/*
						$('Item', result).each(function(){
							var value = $('KBN_CD', this).text();
							var text = $('KBN_NAME', this).text();
							$('#kbn1').append($('<option>').val(value).text(text));
						});
*/
						for(var i in result){
							var value = result[i];
							var text = result[i];
							$('#kbn1').append($('<option>').val(value).text(text));
						}
					}
				});
			});
			// 大分類を選択
			$('#kbn1').change(function(){
				emptyKbn2();
				emptyAnken();
				emptyDetail();
				
				if('' == $(this).val()){
					return true;
				}

				var data = 'gyoumu_kbn_1=' + $(this).val() + '&' + $('#kind').val();
				$.ajax({
					url: './_ajax_get_kbn2.php',
					type: 'POST',
					data: data,
					dataType: 'JSON',
					success: function(result){
/*
						$('Item', result).each(function(){
							var value = $('KBN_CD', this).text();
							var text = $('KBN_NAME', this).text();
							$('#kbn2').append($('<option>').val(value).text(text));
							
						});
*/
						for(var i in result){
							var value = result[i];
							var text = result[i];
							$('#kbn2').append($('<option>').val(value).text(text));
						}
					}
				});
			});
			// 小分類を選択
			$('#kbn2').change(function(){
				emptyAnken();
				emptyDetail();
				
				if('' == $(this).val()){
					return true;
				}

				var data = 'gyoumu_kbn_1=' + $('#kbn1').val() + '&gyoumu_kbn_2=' + $(this).val() + '&' + $('#kind').val();
				$.ajax({
					url: './_ajax_get_anken.php',
					type: 'POST',
					data: data,
					dataType: 'JSON',
					success: function(result){
/*
						$('Item', result).each(function(){
							var value = $('ANKEN_ID', this).text();
							var text = $('ANKEN_NO', this).text();
							$('#anken').append($('<option>').val(value).text(text));
						});
*/
						for(var i in result){
							var value = result[i].id;
							var text = result[i].anken_no;
							$('#anken').append($('<option>').val(value).text(text));
						}
					}
				});
			});
			// 案件を選択
			$('#anken').change(function(){
				emptyDetail();
				
				if('' == $(this).val()){
					return true;
				}
				
				var data = 'anken_id=' + $(this).val();
				$.ajax({
					url: './_ajax_get_anken_detail.php',
					type: 'POST',
					data: data,
					dataType: 'JSON',
					success: function(result){
/*
						// 値の代入
						$('Item', result).each(function(){
							// 案件番号
							$('#anken_no').text($('ANKEN_NO', this).text());
							// URL
							$('#anken_url').attr('href', $('ANKEN_URL', this).text());
							$('#anken_url').text($('ANKEN_URL', this).text());
							// 案件名(事業年度・名称)
							$('#anken_name').text($('ANKEN_NAME', this).text());
							// 契約種別
							$('#anken_keishu_name').text($('ANKEN_KEISHU_NAME', this).text());
							// 対象業者の地域要件
							$('#anken_company_area').text($('ANKEN_COMPANY_AREA', this).text());
							// 公開開始日時
							$('#anken_open_date').text($('ANKEN_OPEN_DATE', this).text());
							// 公開終了日時
							$('#anken_close_date').text($('ANKEN_CLOSE_DATE', this).text());
							// 入札日時
							$('#anken_tender_date').text($('ANKEN_TENDER_DATE', this).text());
							// 入札場所
							$('#anken_tender_place').text($('ANKEN_TENDER_PLACE', this).text());
							// 履行期限
							$('#anken_limit_date').text($('ANKEN_LIMIT_DATE', this).text());
							// 業務大分類
							$('#anken_gyoumu_kbn_1').text($('ANKEN_GYOUMU_KBN_1', this).text());
							// 業務小分類
							$('#anken_gyoumu_kbn_2').text($('ANKEN_GYOUMU_KBN_2', this).text());
							// 実施機関
							$('#anken_kasitu_name').text($('ANKEN_KASITU_NAME', this).text());
							// 担当者名・電話番号
							$('#anken_tanto_name').text($('ANKEN_TANTO_NAME', this).text());
							// 特記事項
							$('#anken_notes').text($('ANKEN_NOTES', this).text());
							// 結果表示開始日時
							$('#anken_result_open_date').text($('ANKEN_RESULT_OPEN_DATE', this).text());
							// 結果表示終了日時
							$('#anken_result_close_date').text($('ANKEN_RESULT_CLOSE_DATE', this).text());
							// 落札業者名等
							$('#anken_raku_name').text($('ANKEN_RAKU_NAME', this).text());
							// 落札金額（税込・円）
							$('#anken_price').text($('ANKEN_PRICE', this).text());
						});
*/
						// 案件番号
						$('#anken_no').text(result.anken_no);
						// URL
						$('#anken_url').attr(result.anken_url);
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
		.hero-unit{
			padding:15px;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="hero-unit">
		<h1>HEADER</h1>
		<p>description</p>
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
	
	<hr>
	
	<footer class="footer">
		<p>FOOTER</p>
	</footer>
</div>
</body>
</html>