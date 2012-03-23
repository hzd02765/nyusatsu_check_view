$(document).ready(function(){
	// 案件TYPEを選択
	$('#kind').change(function(){
		$('#kbn1').empty();		
		$('#kbn1').append($('<option>').val('').text(''));
		
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
		$('#kbn2').empty();		
		$('#kbn2').append($('<option>').val('').text(''));
		
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
		$('#anken').empty();
		$('#anken').append($('<option>').val('').text(''));
		
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
					$('#anken_id').text($('ANKEN_ID', this).text());
					$('#anken_no').text($('ANKEN_NO', this).text());
					$('#anken_nyusatsu_system').text($('ANKEN_NYUSATSU_SYSTEM', this).text());
					$('#anken_nyusatsu_type').text($('ANKEN_NYUSATSU_TYPE', this).text());
					$('#anken_keishu_cd').text($('ANKEN_KEISHU_CD', this).text());
					$('#anken_public_flag').text($('ANKEN_PUBLIC_FLAG', this).text());
					$('#anken_gyoumu_kbn_1').text($('ANKEN_GYOUMU_KBN_1', this).text());
					$('#anken_gyoumu_kbn_2').text($('ANKEN_GYOUMU_KBN_2', this).text());
					$('#anken_name').text($('ANKEN_ANKEN_NAME', this).text());
					$('#anken_kasitu_name').text($('ANKEN_KASITU_NAME', this).text());
					$('#anken_tender_date').text($('ANKEN_TENDER_DATE', this).text());
					$('#anken_url').text($('ANKEN_ANKEN_URL', this).text());
					$('#anken_version_no').text($('ANKEN_VERSION_NO', this).text());
					$('#anken_delete_flag').text($('ANKEN_DELETE_FLAG', this).text());
					$('#anken_ins_date').text($('ANKEN_INS_DATE', this).text());
					$('#anken_upd_date').text($('ANKEN_UPD_DATE', this).text());

				});
			}
		});
	});
});