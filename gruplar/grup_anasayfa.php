<br>
<a href="?duzenle">Bilgilerimi Düzenle</a>
<br>
<a href="?sayfam">Sayfam</a>
<br>
<?php 
if(empty($_GET['duzenle']) && isset($_GET['duzenle']))
{
	require 'gruplar/grup_bilgi_duzenle.php';
}
else if(empty($_GET['sayfam']) && isset($_GET['sayfam']))
{
	require"gruplar/grup_sayfa.php";
}
else
{
	echo "bu grupların göreceği anasayfa<br>";
}
?>

