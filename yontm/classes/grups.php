<?php

class Grup{
 
	private $db;
 
public function __construct($database) {
	    $this->db = $database;
}
public function login($username, $password) {
 
	$query = $this->db->prepare("SELECT `sifre`, `id` FROM `ynt_admin` WHERE `kullanici` = ?");
	$query->bindValue(1, $username);
	
	try{
		
		$query->execute();
		$data 				= $query->fetch();
		$stored_password 	= $data['sifre'];
		$id 				= $data['id'];
		
		#hashing the supplied password and comparing it with the stored hashed password.
		if($stored_password === $password){
			return $id;	
		}else{
			return false;	
		}
 
	}catch(PDOException $e){
		die($e->getMessage());
	}
}
public function user_exists($username) {
 
	$query = $this->db->prepare("SELECT COUNT(`grup_id`) FROM `grup_kullanici` WHERE `grup_kullanici`= ?");
	$query->bindValue(1, $username);
 
	try{
 
		$query->execute();
		$rows = $query->fetchColumn();
 
		if($rows == 1){
			return true;
		}else{
			return false;
		}
 
	} catch (PDOException $e){
		die($e->getMessage());
	}
 
}
public function register($username, $password){
	
	$time 		= date("Y-m-d");
	$password   = sha1($password);
 
	$query 	= $this->db->prepare("INSERT INTO `grup_kullanici` (`grup_kullanici`, `grup_sifre`,`kayit_tarih`) VALUES (?, ?, ?) ");
 
	$query->bindValue(1, $username);
	$query->bindValue(2, $password);
	$query->bindValue(3, $time);
 
	try{
		$query->execute();
 
		// mail($email, 'Please activate your account', "Hello " . $username. ",\r\nThank you for registering with us. Please visit the link below so we can activate your account:\r\n\r\nhttp://www.example.com/activate.php?email=" . $email . "&email_code=" . $email_code . "\r\n\r\n-- Example team");
	}catch(PDOException $e){
		die($e->getMessage());
	}	
}
}
?>