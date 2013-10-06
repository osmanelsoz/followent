<?php 
#including our init.php
require 'core/init.php';

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<title>FOLLOWENT</title>
</head>
<body>	
<div id="main">
	<div id="banner"> 
		<?php include 'banner.php'; ?>
	</div>
	<div id="icerik">
		<div id="icerikLinkler"> <div class="icerikLinkBaslik"><b>Etkinlikler</b></div>
			<div class="icerikLinkDetay">
				Eğitim<br/>
				Eğlence<br/>
				Toplantı<br/>
				Tanıtım<br/>
				Proje <br/>
			</div>
			 <div class="icerikLinkBaslik"><b>Gruplar</b></div>
			<div class="icerikLinkDetay">
				IEEE<br/>
				Spor Klubü<br/>
				Doğa Klubü<br/>
				Zeka Oyunları Klubü<br/>
				Ne Klubü <br/>
			</div>
		</div>
		<div id="icerikEtkinlikler"> etkinlik
		
			<div id="container">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="logout.php">Logout</a></li>
			<li><a href="giris.php">Login</a></li>
			<li> deneme mehmet </li>
		</ul>
		<?php
		if($_SESSION["grup"])
		{
			require"gruplar/grup_anasayfa.php";
		}
		elseif($_SESSION["uye"])
		{
			echo"üye anasayfası";
		}
		else
		{
			echo "<h1>Welcome to our site!</h1>";
		}
		?>
		
	</div>
		</div>
	</div>
	<div id="alt"> Site Bilgileri , hakkkımızda vs gibi kapanış bilgileri</div>
</div>
</body>
</html>
