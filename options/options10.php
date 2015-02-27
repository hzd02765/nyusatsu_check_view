<?php
require_once '../functions.php';
require_once '../config.php';

$anken_list = array();

$link = pg_connect("host=".HOST." dbname=".DBNAME." user=".USER." password=".PASSWORD);

$sql = "select id, process_start, process_end, process_seconds, count_tenders from j_histories order by process_end desc limit 30";
$result = pg_query($sql);

$histories = array();
while($row = pg_fetch_array($result, null, PGSQL_ASSOC)){	
	$history = array();
	
	// var_dump(explode('.', $row['process_start']));
	
	$ary = array();
	
	$ary = explode('.', $row['process_start']);
	$process_start = array_shift($ary);
	
	$ary = explode('.', $row['process_end']);
	$process_end = array_shift($ary);
	
	$history['id'] = $row['id'];
	$history['process_start'] = $process_start;
	$history['process_end'] = $process_end;
	$history['process_seconds'] = $row['process_seconds'];
	$history['count_tenders'] = $row['count_tenders'];
	
	array_push($histories, $history);
}

pg_close($link);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>NYUSATSU_CHECK_VIEW</title>
	<link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script>
		$(document).ready(function(){			
			// 最新の情報を取得
			$('#get_new_info').click(function(){
				var button = $(this);
				
				button.addClass('disabled')
				$('#success-update').addClass('alert-success');
				$('#success-update').text("更新中です・・・");

				$.ajax({
					url: './_ajax_get_new_info.php',
					dataType: 'json',
					success: function(result){
						button.removeClass('disabled');
						$('#success-update').text("更新しました。");
						var table = $('tbody');
						for(var i=0; i < result.length; i++){
							var id = result[i].id;
							var process_start = result[i].process_start;
							var process_end = result[i].process_end;
							var process_seconds = result[i].process_seconds;
							var count_tenders = result[i].count_tenders;
							
							var tr = $('<tr/>')
							var td = $('<td/>').text(process_start).addClass('slide');
							tr.append(td);
							var td = $('<td/>').text(process_end).addClass('slide');
							tr.append(td);
							var td = $('<td/>').text(process_seconds).addClass('slide');
							tr.append(td);
							var td = $('<td/>').text(count_tenders).addClass('slide');
							tr.append(td);
							table.prepend(tr);
										$('.slide').slideDown("first");
						}
						
					}
				});
			});
		});
	</script>
	<style>
		body{
			padding-top:10px;
		}
		.anken-detail{
			width:900px;
		}

		.hero-unit{
			margin-top:42px;
			padding:15px;
		}
		.alert-success{
			padding:13px;
			moz-border-radius:10px;
			-webkit-border-radius:10px;
			border-radius:10px;
		}
		.slide {
			display:none;
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
					<li><a href="../search/search.php">Search</a></li>
					<li><a href="../raku_name/raku_name_10.php">Raku_Name</a></li>
					<li><a href="../gyoumu_kbn/gyoumu_kbn_10.php">Gyoumu_Kbn</a></li>
					<li><a href="../chart/chart10.php">Chart</a></li>
					<li><a href="../etc/etc10.php">etc</a></li>
					<li class="active"><a href="./options10.php">Options</a></li>
					<li><a href="../help/help10.php">Help</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="hero-unit">
		<button type="button" id="get_new_info" class="btn btn-primary btn-large">最新の情報を取得</button>
	</div>
	
	<p id="success-update"></p>

	<div class="row">
		<div class="span16">
			<table class="table table-bordered anken-detail" id="history_list">
				<thead>
					<tr>
						<th>process_start</th>
						<th>process_end</th>
						<th>process_seconds</th>
						<th>count_tenders</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($histories as $history): ?>
					<tr>
						<td><?php echo $history['process_start'] ?></td>
						<td><?php echo $history['process_end'] ?></td>
						<td><?php echo $history['process_seconds'] ?></td>
						<td><?php echo $history['count_tenders'] ?></td>
					</tr>
					<?php endforeach; ?>
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