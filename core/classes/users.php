<?php 
class Users{
 
	private $db;
 
	public function __construct($database) {
	    $this->db = $database;
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
 
public function email_exists($email) {
 
	$query = $this->db->prepare("SELECT COUNT(`grup_id`) FROM `grup_kullanici` WHERE `email`= ?");
	$query->bindValue(1, $email);
 
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
 
public function register($username, $password, $email){
	
	$time 		= time();
	$ip 		= $_SERVER['REMOTE_ADDR'];
	$email_code = sha1($username + microtime());
	$password   = sha1($password);
 
	$query 	= $this->db->prepare("INSERT INTO `grup_kullanici` (`username`, `password`, `email`, `ip`, `time`, `email_code`) VALUES (?, ?, ?, ?, ?, ?) ");
 
	$query->bindValue(1, $username);
	$query->bindValue(2, $password);
	$query->bindValue(3, $email);
	$query->bindValue(4, $ip);
	$query->bindValue(5, $time);
	$query->bindValue(6, $email_code);
 
	try{
		$query->execute();
 
		// mail($email, 'Please activate your account', "Hello " . $username. ",\r\nThank you for registering with us. Please visit the link below so we can activate your account:\r\n\r\nhttp://www.example.com/activate.php?email=" . $email . "&email_code=" . $email_code . "\r\n\r\n-- Example team");
	}catch(PDOException $e){
		die($e->getMessage());
	}	
}
public function activate($email, $email_code) {
		
		$query = $this->db->prepare("SELECT COUNT(`grup_id`) FROM `grup_kullanici` WHERE `email` = ? AND `email_code` = ? AND `confirmed` = ?");
 
		$query->bindValue(1, $email);
		$query->bindValue(2, $email_code);
		$query->bindValue(3, 0);
 
		try{
 
			$query->execute();
			$rows = $query->fetchColumn();
 
			if($rows == 1){
				
				$query_2 = $this->db->prepare("UPDATE `grup_kullanici` SET `confirmed` = ? WHERE `email` = ?");
 
				$query_2->bindValue(1, 1);
				$query_2->bindValue(2, $email);				
 
				$query_2->execute();
				return true;
 
			}else{
				return false;
			}
 
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function login($username, $password) {
 
	$query = $this->db->prepare("SELECT `grup_sifre`, `grup_id` FROM `grup_kullanici` WHERE `grup_kullanici` = ?");
	$query->bindValue(1, $username);
	
	try{
		
		$query->execute();
		$data 				= $query->fetch();
		$stored_password 	= $data['grup_sifre'];
		$grup_id 				= $data['grup_id'];
		

		
		#hashing the supplied password and comparing it with the stored hashed password.
		if($stored_password === sha1($password)){
			return $grup_id;	
		}else{
			return false;	
		}
 
	}catch(PDOException $e){
		die($e->getMessage());
	}
}

 
}