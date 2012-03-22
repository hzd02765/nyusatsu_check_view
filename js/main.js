$(document).ready(function(){
	$('#kind').change(function(){
		// alert('a');
		$('#kbn1').empty();
		$('#kbn1').append($('<option>').val('').text(''));
		$('#kbn1').append($('<option>').val('a').text('a'));
		$('#kbn1').append($('<option>').val('b').text('b'));
		$('#kbn1').append($('<option>').val('c').text('c'));
		$('#kbn1').append($('<option>').val('d').text('d'));
	});
});