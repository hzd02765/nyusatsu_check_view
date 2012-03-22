$(document).ready(function(){
	$('#kind').change(function(){
		// alert('a');
		$('#kbn1').empty();
		
		$('#kbn1').append($('<option>').val('').text(''));
		
		// $('#kbn1').append($('<option>').val('a').text('a'));
		// $('#kbn1').append($('<option>').val('b').text('b'));
		// $('#kbn1').append($('<option>').val('c').text('c'));
		// $('#kbn1').append($('<option>').val('d').text('d'));
		
		var type = $(this).val()
		var data = '';
		if(1 == type){
			data = 'keishu_cd=1&public_flag=0';
		}else if(2 == type){
			data = 'keishu_cd=2&public_flag=0';
		}else if(3 == type){
			data = 'keishu_cd=1&public_flag=1';
		}else if(4 == type){
			data = 'keishu_cd=2&public_flag=1';
		}else{
			return true;
		}
		
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
});