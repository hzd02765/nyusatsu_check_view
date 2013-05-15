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
			var data = 'gyoumu_kbn_1=' + kbn1;
			$.ajax({
				url: '../ajax/_ajax_get_kbn2_from_tenders.php',
				type: 'POST',
				data: data,					
				dataType: 'JSON',
				success: function(result){
					for(var i in result){
						var value = result[i];
						var text = result[i];
						$('#kbn2').append($('<option>').val(value).text(text));
					}
				}
			});
		});
	</script>
</head>
<body>
<form method="GET" action="./gyoumu_kbn_30.php">
	<p><input type="text" name="kbn1" id="kbn1" value="<?php echo $_GET['kbn1'] ?>"></p>
	<div>
		<p>小分類</p>
		<select name="kbn2" id='kbn2' size="10">
		</select>
	</div>
	<p><input type="submit" name="submit" value="選択"></p>
</form>
</body>
</html>