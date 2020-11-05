<?php
session_start();

if(isset($_SESSION['username'])) {
	session_destroy();
	unset($_SESSION['password']);
	unset($_SESSION['username']);
	header("Location: index.php");
} else {
	header("Location: index.php");
}
?>