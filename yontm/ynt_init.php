<?php 
#starting the users session
session_start();
require '../core/connect/database.php';
require 'classes/grups.php';
require 'classes/general.php';
 
$grup 		= new Grup($db);
$general 	= new General();

 
$errors 	= array();
?>