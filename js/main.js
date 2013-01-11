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
	
	// 最新の情報を取得
	$('#get_new_info').click(function(){
		alert('実装予定です。');
		// TODO
	});
	// 案件TYPEを選択
	$('#kind').change(function(){
		// $('#kbn1').empty();		
		// $('#kbn1').append($('<option>').val('').text(''));
		emptyKbn1();
		emptyKbn2();
		emptyAnken();
		emptyDetail();
		
		if('' == $(this).val()){
			return true;
		}
		
		var data = $(this).val();		
		$.ajax({
			url: './ajax/get_kbn1.php',
			type: 'POST',
			data: data,
			dataType: 'XML',
			success: function(result){
				$('Item', result).each(function(){
					var value = $('KBN_CD', this).text();
					var text = $('KBN_NAME', this).text();
					$('#kbn1').append($('<option>').val(value).text(text));
				});
			}
		});
	});
	// 大分類を選択
	$('#kbn1').change(function(){
		// $('#kbn2').empty();
		// $('#kbn2').append($('<option>').val('').text(''));
		emptyKbn2();
		emptyAnken();
		emptyDetail();
		
		if('' == $(this).val()){
			return true;
		}

		
		var data = 'gyoumu_kbn_1=' + $(this).val() + '&' + $('#kind').val();
		$.ajax({
			url: './ajax/get_kbn2.php',
			type: 'POST',
			data: data,
			dataType: 'XML',
			success: function(result){
				$('Item', result).each(function(){
					var value = $('KBN_CD', this).text();
					var text = $('KBN_NAME', this).text();
					$('#kbn2').append($('<option>').val(value).text(text));
				});
			}
		});
	});
	// 小分類を選択
	$('#kbn2').change(function(){
		// $('#anken').empty();
		// $('#anken').append($('<option>').val('').text(''));
		emptyAnken();
		emptyDetail();
		
		if('' == $(this).val()){
			return true;
		}

		var data = 'gyoumu_kbn_1=' + $('#kbn1').val() + '&gyoumu_kbn_2=' + $(this).val() + '&' + $('#kind').val();
		$.ajax({
			url: './ajax/get_anken.php',
			type: 'POST',
			data: data,
			dataType: 'XML',
			success: function(result){
				$('Item', result).each(function(){
					var value = $('ANKEN_ID', this).text();
					var text = $('ANKEN_NO', this).text();
					$('#anken').append($('<option>').val(value).text(text));
				});
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
			url: './ajax/get_anken_detail.php',
			type: 'POST',
			data: data,
			dataType: 'XML',
			success: function(result){
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
			}
		});
	});
});