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


	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="stylesheet" href="slider_files/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="slider_files/custom.css.php" type="text/css">
			<link rel="stylesheet" href="slider_files/responsive.css" type="text/css">

		
		
	<link rel="alternate" type="application/rss+xml" title="Easy Events » Feed" href="http://muratbulbul.tk/takvim/feed/">
<link rel="alternate" type="application/rss+xml" title="Easy Events » Comments Feed" href="http://muratbulbul.tk/takvim/comments/feed/">
<link rel="stylesheet" id="theme-my-login-css" href="slider_files/theme-my-login.css" type="text/css" media="all">
<link rel="stylesheet" id="theme-my-login-ajax-css" href="slider_files/ajax.css" type="text/css" media="all">
<link rel="stylesheet" id="prettyPhoto-css" href="slider_files/prettyPhoto.css" type="text/css" media="all">
<script type="text/javascript" src="slider_files/jquery.js" style=""></script>
<script type="text/javascript" src="slider_files/tweets.js"></script>
<script type="text/javascript">

<script>jQuery(document).ready(function(){sidebar_slide_init();});</script><script type="text/javascript" charset="UTF-8" src="slider_files/{common,map,util,geocoder}.js"></script><script type="text/javascript" charset="UTF-8" src="slider_files/{infowindow,onion,stats}.js"></script><script type="text/javascript" charset="UTF-8" src="slider_files/{controls}.js"></script><script type="text/javascript" charset="UTF-8" src="slider_files/{marker}.js"></script></head>

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
	<div class="clear"></div>
	<div id="alt"> Site Bilgileri , hakkkımızda vs gibi kapanış bilgileri</div>
</div>
</body>
</html>
