<?php

$text = '';

$fp = fopen('help.txt', 'r');
$count = 0;
if ($fp){
    if (flock($fp, LOCK_SH)){
        while (!feof($fp)) {
            $buffer = fgets($fp);
            // print($buffer.'<br>');
			$text .= $buffer;
            $count++;
        }

        // print('行は'.$count.'行でした<br>');

        flock($fp, LOCK_UN);
    }else{
        print('ファイルロックに失敗しました');
    }
}

$flag = fclose($fp);

if ($flag){
    // print('無事クローズしました');
}else{
    print('クローズに失敗しました');
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>NYUSATSU_CHECK_VIEW</title>
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="../js/nicEdit/nicEdit.js"></script>
	<script type="text/javascript">
		bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
		
		$(document).ready(function(){
			$('#button').click(function(){
				var text = $('.nicEdit-main')[0].innerHTML;
				// console.log(a);
				
				var data = {'text' : text};
				
				$.ajax({
					url: '_ajax_help10.php',
					type: 'POST',
					data: data,
					dataType: 'JSON',
					success: function(result){
						// console.log(result)
						window.location = './help10.php';
					}
/*
*/
				});
			});
		});
	</script>
</head>
<body>
	<textarea name="area1" id = "area1" cols="40"><?php echo $text ?></textarea>
	<br>
	<input type="button" name="button" id="button" value="決定">
</body>
</html>