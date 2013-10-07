<?php 
#starting the users session
error_reporting(0);
session_start();
require 'connect/database.php';
require 'classes/users.php';
require 'classes/general.php';
 
$users 		= new Users($db);
$general 	= new General();
 
$errors 	= array();