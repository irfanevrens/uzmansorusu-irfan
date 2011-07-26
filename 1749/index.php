<?php

// web servisinin adresidir
$ServisAdresi = 'https://sonucservis.osym.gov.tr/service.asmx?WSDL';

// web servisini kullanmak yetki gerektirmektedir. 
// bu k�s�mda yetki bilgilerinizi tan�mlayabilirsiniz.
$KullaniciAdi = 'kullanici_adi';
$Sifre = 'sifre';

// bu �rnekte SonucGetir fonksiyonunu test ediyoruz.
// bu fonksiyon i�in istenen bilgiler a�a��dad�r.
// �rnek olarak bir tane girerek deneme yapabilirsiniz.
$SinavId = 14; 
$SinavYili = 2011;
$SinavDonemi = 'S1';
$TcKimlikNo = '12345678901';

$client = new SoapClient(
					$ServisAdresi, 
					array(
						'soap_version'  => SOAP_1_2));

// Web Servisi i�in NameServer de�eri
$NS = 'https://sonucservis.osym.gov.tr/';

// yetkilendirme i�in servis client header bilgisi
$Header = new SOAPHeader(
					$NS, 
					'AuthenticationHeader', 
					array(
						'KullaniciAdi' => $KullaniciAdi, 
						'Sifre' => $Sifre));
       
// header bilgisini set ediyoruz.
$client->__setSoapHeaders($Header); 

// web servisinden SonucGetir fonksiyonunu �a��r�yoruz
$SonucGetir = $client->__soapCall(
							"SonucGetir", 
							array(
								'parameters' => array( 
													'SinavId' => $SinavId, 
													'SinavYili' => $SinavYili, 
													'SinavDonemi' => $SinavDonemi, 
													'TcKimlikNo' => $TcKimlikNo)));

// gelen sonucu g�rmek i�in commentleri kald�r
// echo '<pre>';
// print_r($SonucGetir);
// echo '</pre>';

// Gelen sonu� i�inde XMLData �eklinde bilgi var, bu bilgi 
// xml oldu�u i�in bunu �nce php array�na �evirmemiz gerekiyor
$SonucuParcala = simplexml_load_string($SonucGetir->SonucGetirResult->XMLData);

echo '<pre>';
print_r($SonucuParcala);
echo '</pre>';

// �stenirse sonu�lara tek tek �u �ekilde eri�ilebilir
// G�rmek i�in yorumu kald�rabilirsiniz.
// echo 'YGS2_ALAN: ' . $SonucuParcala->YGS2_ALAN;
