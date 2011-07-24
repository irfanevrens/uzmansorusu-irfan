<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function() {

	// il web servisi
	var servis_iller = 'servis.php?gorev=iller';

	// illeri yükle
	$.getJSON(servis_iller, function(data) {

			sonuc = '';
		
			$.each(data, function(index, value) {

				sonuc += '<option value="' + value.id + '">' + value.adi + '</option>';
			});

			$('#iller').html(sonuc);
		});

	$('#ilceler, #koyler').css('display', 'none');

	// il seçildiğinde
	$('#iller').change(function() {

		$('#ilceler').css('display', 'block');

		// seçili ilin id numarası
		var il_id = $('#iller option:selected').val();
		
		// ilçe web servisi
		var servis_ilceler = 'servis.php?gorev=ilceler&il_id=' + il_id;

		$.getJSON(servis_ilceler, function(data) {

			sonuc = '';
		
			$.each(data, function(index, value) {

				sonuc += '<input type="checkbox" value="' + value.id + '" name="secili_ilceler"> ' + value.adi + '<br />';
			});

			$('#ilceler').html(sonuc);
		});
	});
});

</script>



<select id="iller">
	
</select>

<div id="ilceler">
	
</div>
