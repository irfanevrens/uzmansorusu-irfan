<?php

mysql_connect('localhost', 'root', '');
mysql_select_db('veritabani_adi');
mysql_query('SET NAMES "UTF8"'); // karekter kodlamasını değiştirebilirsiniz.

// sql sorgumuz
$kategoriler_sorgusu = mysql_query('SELECT id, adi, ust_id FROM kategoriler ORDER BY id ASC'); 

// boş kategoriler dizisi
$kategoriler = array();

// kategorileri sorgudan fetch ederek diziye alacağız
while ($kategori = mysql_fetch_object($kategoriler_sorgusu)) {
	
	$kategoriler[] = array('id' => $kategori->id, 'adi' => $kategori->adi, 'ust_id' => $kategori->ust_id);
}

// Başla: Bu Bölüm Test İçindir, Test Ettikten Sonra Satıları /* */ arasına alabilirsiniz.

// kategori ağacının aşağıdaki gibi olduğunu varsayalım
// 1. Alan: Id
// 2. Alan: Adı
// 3. Alan: Üst Id, eğer bu değer 0 ise kategorinin kendisi üst kategori demektir.
$kategoriler = array(
				array('id' => 1, 'adi' => 'Araba', 'ust_id' => 0), 
				array('id' => 2, 'adi' => 'Meyve', 'ust_id' => 0), 
				array('id' => 3, 'adi' => 'Sebze', 'ust_id' => 0), 
				array('id' => 4, 'adi' => 'Mercedes', 'ust_id' => 1),
				array('id' => 5, 'adi' => 'BMW', 'ust_id' => 1),
				array('id' => 6, 'adi' => 'Elma', 'ust_id' => 2),
				array('id' => 7, 'adi' => 'Muz', 'ust_id' => 2),
				array('id' => 8, 'adi' => 'Maydonoz', 'ust_id' => 3),
				array('id' => 9, 'adi' => 'Üğütmek', 'ust_id' => 3));
				
// Başla: Bu Bölüm Test İçindir, Test Ettikten Sonra Satıları /* */ arasına alabilirsiniz.

// üst kategorilerin bir listesini alıyoruz
$ust_kategoriler = get_ust_kategoriler($kategoriler);

echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';

echo '<ul>';

// kaç tane üst kategori varsa hepsini tek tek ele alacağız
foreach ($ust_kategoriler as $ust_kategori) {
	
	// aktif üst kategori bilgisini ekrana yazdıralım
	echo '<li>id: ' . $ust_kategori['id'] . ', adi: ' . $ust_kategori['adi'] . '</li>';
	
	// aktif üst kategoriye ait alt kategorilerin bir listesini alalım
	$alt_kategoriler = get_alt_kategoriler($kategoriler, $ust_kategori['id']);
	
	// aktif üst kategorinin alt kategorisi varsa işlem yapalım yoksa işlem yapmaya gerek yok
	if (count($alt_kategoriler) > 0) {
		
		echo '<ul>';
	
		// üst kategoriye ait alt kategorinin her birisini tek tek ele alacağız
		foreach ($alt_kategoriler as $alt_kategori) {

			// alt kategoriye ait bilgiyi ekrana yazdırıyoruz
			echo '<li>id: ' . $alt_kategori['id'] . ', adi: ' . $alt_kategori['adi'] . '</li>';
		}
		
		echo '</ul>';
	}
}

echo '</ul>';
				
// üst kategori id bilgisi verilen kategorinin alt kategorilerinin listesini array olarak verir
function get_alt_kategoriler($kategoriler, $ust_id) {

	$return = array();
	
	foreach ($kategoriler as $kategori) {
		
		if ($kategori['ust_id'] == $ust_id) {
		
			$return[] = $kategori;
		}
	}
	
	return $return;
}

// üst kategorilerin bir listesini verir 
function get_ust_kategoriler($kategoriler) {

	return get_alt_kategoriler($kategoriler, 0);
}