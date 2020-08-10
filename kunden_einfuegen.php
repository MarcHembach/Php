<?php
	session_start();
	if(!isset($_SESSION['User'])){
		header('Location: login.php');
		exit();
	}
?>
<!doctype html>
<html>
	<head>
		<title>Datensaetze anzeigen</title>
		<meta charset="utf-8">
	</head>
	<body>
	<form method="post">
	<?php
	// http://localhost/bbm2h18/Pruefung/_2020_06_19/kunden_anzeigen.php

	echo "<div align='center'>
		<a href='kunden_anzeigen.php'>Daten anzeigen</a> |
		<a href='logout.php'>Logout</a>		
	</div><hr>";	
	$m = new mysqli('localhost','root','','bibnem_bbm2h18');	
	if($m->connect_errno){
			die("Verbindung fehlgeschlagen: " . $m->connect_errno);
	}	
	if(isset($_POST['sub'])){
			$n = $_POST['Nachname'];
			$v = $_POST['Vorname'];
			$e = $_POST['Email'];		
			$sql = "INSERT INTO kunde (id_Kunde, Nachname, Vorname, Email) VALUES (NULL, '$n', '$v', '$e')"; 
			$m->query($sql);
			header("Location: kunden_anzeigen.php");
	}	
?>	
	<table align="center" border="1" cellpadding="10" cellspacing="0">
		<tr>
			<td>Nachname</td>
			<td><input name="Nachname" size="40"></td>
		</tr>
		<tr>
			<td>Vorname</td>
			<td><input name="Vorname" size="40"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input name="Email" type="email" size="40"></td>
		</tr>
		<tr>
			<td><br></td>
			<td><input name="sub" type="submit" value="Speichern">
		</tr>
	</table>	
	</form>
	</body>
</html>