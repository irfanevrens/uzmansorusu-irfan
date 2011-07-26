<?php

// web servisinin adresidir
$ServisAdresi = 'https://sonucservis.osym.gov.tr/service.asmx?WSDL';

// web servisini kullanmak yetki gerektirmektedir. 
// bu kısımda yetki bilgilerinizi tanımlayabilirsiniz.
$KullaniciAdi = 'kullanici_adi';
$Sifre = 'sifre';

// bu örnekte SonucGetir fonksiyonunu test ediyoruz.
// bu fonksiyon için istenen bilgiler aşağıdadır.
// örnek olarak bir tane girerek deneme yapabilirsiniz.
$SinavId = 14; 
$SinavYili = 2011;
$SinavDonemi = 'S1';
$TcKimlikNo = '12345678901';

$client = new SoapClient(
					$ServisAdresi, 
					array(
						'soap_version'  => SOAP_1_2));

// Web Servisi için NameServer değeri
$NS = 'https://sonucservis.osym.gov.tr/';

// yetkilendirme için servis client header bilgisi
$Header = new SOAPHeader(
					$NS, 
					'AuthenticationHeader', 
					array(
						'KullaniciAdi' => $KullaniciAdi, 
						'Sifre' => $Sifre));
       
// header bilgisini set ediyoruz.
$client->__setSoapHeaders($Header); 

// web servisinden SonucGetir fonksiyonunu çağırıyoruz
$SonucGetir = $client->__soapCall(
							"SonucGetir", 
							array(
								'parameters' => array( 
													'SinavId' => $SinavId, 
													'SinavYili' => $SinavYili, 
													'SinavDonemi' => $SinavDonemi, 
													'TcKimlikNo' => $TcKimlikNo)));

// gelen sonucu görmek için commentleri kaldır
// echo '<pre>';
// print_r($SonucGetir);
// echo '</pre>';

// Gelen sonuç içinde XMLData şeklinde bilgi var, bu bilgi 
// xml olduğu için bunu önce php arrayına çevirmemiz gerekiyor
$SonucuParcala = simplexml_load_string($SonucGetir->SonucGetirResult->XMLData);

echo '<pre>';
print_r($SonucuParcala);
echo '</pre>';

// İstenirse sonuçlara tek tek şu şekilde erişilebilir
// Görmek için yorumu kaldırabilirsiniz.
// echo 'YGS2_ALAN: ' . $SonucuParcala->YGS2_ALAN;
