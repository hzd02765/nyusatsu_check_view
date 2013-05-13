<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>NYUSATSU_CHECK_VIEW</title>
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script>
		$(document).ready(function(){
		
			// 業務大分類

				
				var data = $(this).val();		
				$.ajax({
					url: '../ajax/_ajax_get_kbn1_from_tenders.php',
					dataType: 'JSON',
					success: function(result){
						for(var i in result){
							var value = result[i];
							var text = result[i];
							$('#kbn1').append($('<option>').val(value).text(text));
						}
					}
				});

		});
	</script>
</head>
<body>
<form method="GET" action="./gyoumu_kbn_20.php.php">
	<div>
		<p>大分類</p>
		<select name="kbn1" id='kbn1' size="10">
		</select>
	</div>
	<p><input type="submit" name="submit" value="選択"></p>
</form>
</body>
</html>