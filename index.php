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

		<div id="icerikEtkinlikler"> 
			<?php require'etkinlik_slider.php'; ?>
		</div>
		
			
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
			
		}
		?>
		
	
		
	</div>
	<div id="alt"> Site Bilgileri , hakkkımızda vs gibi kapanış bilgileri</div>
</div>
</body>
</html>
