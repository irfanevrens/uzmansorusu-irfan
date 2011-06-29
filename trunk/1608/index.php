<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">

	$(document).ready(function() {
	
		// combo 1
		$('#combo1').change(function() {

			$("#combo2").css("display", "block");
		
			var secili_combo1_id = $("#combo1 option:selected").attr("value");
			var secili_combo2_id = $("#combo2 option:selected").attr("value");
			var secili_combo3_id = $("#combo3 option:selected").attr("value");
			
			$("#combo1 option").each(function(){

				var i = $(this).attr("value");
				
				if (secili_combo1_id != i && secili_combo2_id != i && secili_combo3_id != i) {
			
					$("#combo2 option[value='" + i + "']").removeAttr('disabled');
					$("#combo3 option[value='" + i + "']").removeAttr('disabled');
				}
			});
			
			$("#combo2 option[value='" + secili_combo1_id + "']").attr("disabled","disabled");
			$("#combo3 option[value='" + secili_combo1_id + "']").attr("disabled","disabled");
		});
		
		
		// combo 2
		$('#combo2').change(function() {

			$("#combo3").css("display", "block");
		
			var secili_combo1_id = $("#combo1 option:selected").attr("value");
			var secili_combo2_id = $("#combo2 option:selected").attr("value");
			var secili_combo3_id = $("#combo3 option:selected").attr("value");
			
			$("#combo2 option").each(function(){

				var i = $(this).attr("value");
			
				if (secili_combo1_id != i && secili_combo2_id != i && secili_combo3_id != i) {
			
					$("#combo1 option[value='" + i + "']").removeAttr('disabled');
					$("#combo3 option[value='" + i + "']").removeAttr('disabled');
				}
			});
			
			$("#combo1 option[value='" + secili_combo2_id + "']").attr("disabled","disabled");
			$("#combo3 option[value='" + secili_combo2_id + "']").attr("disabled","disabled");
				

		});
		
		
		// combo 3
		$('#combo3').change(function() {
		
			var secili_combo1_id = $("#combo1 option:selected").attr("value");
			var secili_combo2_id = $("#combo2 option:selected").attr("value");
			var secili_combo3_id = $("#combo3 option:selected").attr("value");
			
			$("#combo3 option").each(function(){

				var i = $(this).attr("value");
			
				if (secili_combo1_id != i && secili_combo2_id != i && secili_combo3_id != i) {
			
					$("#combo1 option[value='" + i + "']").removeAttr('disabled');
					$("#combo2 option[value='" + i + "']").removeAttr('disabled');
				}
			});
			
			$("#combo1 option[value='" + secili_combo3_id + "']").attr("disabled","disabled");
			$("#combo2 option[value='" + secili_combo3_id + "']").attr("disabled","disabled");
		});
	
	});

</script>

<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<select id="combo1">
	<option value="1">Güreş</option>
	<option value="2">Atletizm</option>
	<option value="3">Yüzme</option>
	<option value="4">Uzun Atlama</option>
</select>

<hr />

<select id="combo2" style="display: none;">
	<option value="1">Güreş</option>
	<option value="2">Atletizm</option>
	<option value="3">Yüzme</option>
	<option value="4">Uzun Atlama</option>
</select>

<hr />

<select id="combo3" style="display: none;">
	<option value="1">Güreş</option>
	<option value="2">Atletizm</option>
	<option value="3">Yüzme</option>
	<option value="4">Uzun Atlama</option>
</select>
