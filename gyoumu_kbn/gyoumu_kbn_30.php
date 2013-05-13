<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>NYUSATSU_CHECK_VIEW</title>
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script>
		$(document).ready(function(){
		
			// 業務小分類
			var kbn1 = $('#kbn1').val();
			var kbn2 = $('#kbn2').val();
			var data = {'kbn1' : kbn1, 'kbn2' :kbn2};
			$.ajax({
				url: '../ajax/_ajax_get_lyear_from_tenders.php',
				type: 'POST',
				data: data,					
				dataType: 'JSON',
				success: function(result){
					for(var i in result){
						var value = result[i];
						var text = result[i];
						$('#l_year').append($('<option>').val(value).text(text));
					}
				}
			});
		});
	</script>
</head>
<body>
<form method="GET" action="./gyoumu_kbn_40.php">
	<p><input type="text" name="kbn1" id="kbn1" value="<?php echo $_GET['kbn1'] ?>"></p>
	<p><input type="text" name="kbn2" id="kbn2" value="<?php echo $_GET['kbn2'] ?>"></p>
	<div>
		<p>履行期限：年</p>
		<select name="l_year" id='l_year' size="10">
		</select>
	</div>
	<p><input type="submit" name="submit" value="選択"></p>
</form>
</body>
</html>