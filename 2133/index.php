<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function() {

	$('#secenek_check').click (function () {

		var secenek_check = $(this);

		if (secenek_check.is(':checked')) {

			// seçili ise

			$('#secenek').css('display', 'none');
			
		} else {

			// seçili değilse

			$('#secenek').css('display', 'inline');
		}
	});

});

</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<form  action="index.php" method="post">
	
	<input type="checkbox" name="secenek_check" id="secenek_check" />


	<select name="secenek" id="secenek">
		<option>item1</option>
		<option>item2</option>
		<option>item3</option>
	</select>
	
</form> 