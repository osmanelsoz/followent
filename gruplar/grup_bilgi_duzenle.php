<?php

	if (isset($_POST['submit'])) {
 
	if(empty($_POST['grup_adi']) ||  empty($_POST['email'])){
 
		$errors[] = 'Grup adı ve email grilmesi mecburidir.';
 
	}else{
        
        #validating user's input with functions that we will create next
        if(!ctype_alnum($_POST['grup_adi'])){
            $errors[] = 'Grup adı sadece harf ve rakam içerebilir';	
        }
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = 'Please enter a valid email address';
        }
	}
 
	if(empty($errors) === true){
		
		$grup_adi 	 = htmlentities($_POST['grup_adi']);
		$grup_slogan = htmlentities($_POST['slogan']);
		$email 		 = htmlentities($_POST['email']);
		$bilgi 		 = htmlentities($_POST['bilgi']);
		$adres 		 = htmlentities($_POST['adres']);
		$telefon 	 = htmlentities($_POST['telefon']);
		$website 	 = htmlentities($_POST['website']);
 
		$users->grup_bilgi_ekle($grup_adi,$grup_slogan,$email,$bilgi,$adres,$telefon,$website);
		header('Location: index.php?duzenle&success');
		exit();
	}
}
if (isset($_GET['success']) && empty($_GET['success'])) {
  echo 'Kayıt tamamlandı :)';
}
?>
<h1>Bilgileri Düzenle</h1>
 
		<form method="post" action="">
			<h4>Grup Adı:</h4>
			<input type="text" name="grup_adi" />
			<h4>Slogan:</h4>
			<input type="text" name="slogan" />
			<h4>Grup Bilgisi:</h4>
			<textarea name="bilgi" ></textarea>
			<h4>Adres:</h4>
			<textarea name="adres" ></textarea>
			<h4>Email:</h4>
			<input type="text" name="email" />
			<h4>Telefon:</h4>
			<input type="text" name="telefon" />
			<h4>Web site:</h4>
			<input type="text" name="website" />	
			<br>
			<input type="submit" name="submit" />
		</form>
 