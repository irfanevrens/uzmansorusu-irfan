<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">

	$(document).ready(function() {
	
		// fiyat bilgisi değiştikçe çalışır
		$('#fiyat').keyup(function() {

			// iskonto yüdesini alıyoruz.
			var iskonto = $('#iskonto').val();

			// fiyat bilgisini alıyoruz
			var fiyat = $('#fiyat').val();

			// fiyata ve iskontoya göre iskonto miktarını buluyoruz
			var iskonto_miktari = iskonto_hesapla(fiyat, iskonto);

			// fiyattan iskonto çıkartılarak sonuç yazdırılıyor
			$('#sonuc').val(fiyat - iskonto_miktari);
		});
	
	});

	// iskonto hesaplayan fonksiyon
	// verilen fiyat için iskonto miktarını verir
	// 200 TL için %10 iskonto 20 sonucunu verir
	function iskonto_hesapla(fiyat, iskonto) {

		return (fiyat / 100) * iskonto;
	}

</script>

<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<form action="" method="post">

	<table>
		<tr>
			<td>İskonto: %</td>
			<td><input type="text" id="iskonto" name="iskonto" /></td>
		</tr>
		<tr>
			<td>Fiyatı: </td>
			<td><input type="text" id="fiyat" name="fiyat" /></td>
		</tr>
		<tr>
			<td>Sonuç: </td>
			<td><input type="text" id="sonuc" name="sonuc" /></td>
		</tr>
	</table>

</form>
