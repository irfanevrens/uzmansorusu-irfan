<?php

$gorev = $_GET['gorev'];

if ($gorev == 'iller') {

	$iller[] = array('id' => 0, 'adi' => 'Lütfen Seçiniz');
	$iller[] = array('id' => 1, 'adi' => 'Adana');
	$iller[] = array('id' => 34, 'adi' => 'İstanbul');
	$iller[] = array('id' => 46, 'adi' => 'Kahramanmaraş');
				
	echo json_encode($iller);
} elseif ($gorev == 'ilceler') {

	$il_id = $_GET['il_id'];
	
	$ilceler = array();
	
	if ($il_id == 1) {
	
		$ilceler[] = array('id' => '1', 'adi' => 'Seyhan');
	} elseif ($il_id == 34) {
	
		$ilceler[] = array('id' => '2', 'adi' => 'Küçükçekmece');
		$ilceler[] = array('id' => '3', 'adi' => 'Üsküdar');
	} elseif ($il_id == 46) {
	
		$ilceler[] = array('id' => '4', 'adi' => 'Göksun');
		$ilceler[] = array('id' => '5', 'adi' => 'Andırın');
		$ilceler[] = array('id' => '6', 'adi' => 'Pazarcık');	
	}
	
	echo json_encode($ilceler);
}