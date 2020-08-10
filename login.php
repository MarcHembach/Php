<?php
	error_reporting(0);
	$m = new mysqli('localhost','root','','bibnem_bbm2h18');
	
	if($m->connect_errno){
			die("Verbindung fehlgeschlagen: " . $m->connect_errno);
	}
	
	if(isset($_POST['sub'])){
		$u = $m->real_escape_string($_POST['User']);
		$p = $m->real_escape_string($_POST['Passwort']);
		$sql = "SELECT * FROM user WHERE Name = '$u'";
		$result = $m->query($sql);
		$t = $result->fetch_assoc();				
		if (password_verify($p, $t['Passwort'])) {
			session_start();
			$_SESSION['User'] = $u;
			//echo "<hr>Richtiges Passwort<hr>";
			header('Location: kunden_anzeigen.php');
		} else {
			//echo "<hr>Passwort fehlerhaft<hr>";
		}
	}
?>
<!doctype html>
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8">
	</head>
	<body>
	<form method="post">
	
	<!-- // http://localhost/bbm2h18/Pruefung/_2020_06_22/login.php -->
	
	<div align='center'>
		<br>
	</div><hr>
	
	<table align="center" border="1" cellpadding="10" cellspacing="0">
	<tr>
		<td>User</td>
		<td><input name="User"></td>
	</tr>
	<tr>
		<td>Passwort</td>
		<td><input name="Passwort" type="password"></td>
	</tr>
	<tr>
		<td><br></td>
		<td><input name="sub" type="submit" value="Login">
	</tr>
	</table>
	
	</form>
	<hr>
	</body>
</html>