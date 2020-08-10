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
		<style>
		/*
			tr:nth-child(even) {
				background-color: black;
				color: white;
			}	
			
			tr:nth-child(odd) {
				background-color: gray;
				color: black;
			}	
			*/
			#u1 {
				background-color: gray;
				color: black;
			}
		
		</style>
	</head>
	<body>
	<?php
	// http://localhost/bbm2h18/Pruefung/_2020_06_15/kunden_anzeigen.php
	echo "<div align='center'>
		<a href='kunden_einfuegen.php'>Neuer Kunde</a> |
		<a href='logout.php'>Logout</a>	
	</div><hr>";
	$m = new mysqli('localhost','root','','bibnem_bbm2h18');
	if($m->connect_errno){
			die("Verbindung fehlgeschlagen: " . $m->connect_errno);
	}
	if(isset($_GET['aktion'])){
		if( $_GET['aktion'] == 'delete'){
			$sql = "DELETE FROM kunde WHERE id_Kunde = " . $_GET['id'];
			$m->query($sql);
		}			
	}
	
	$result = $m->query("SELECT * FROM kunde");
	
	echo '<table align="center" border="1" cellpadding="10" cellspacing="0">';
	echo '<tr id="u1"><th>id</th><th>Nachname</th><th>Vorname</th><th>Email</th><th>DELETE</th><th>Edit</th></tr>';
	$zz = 0;
	while($t = $result->fetch_assoc()){
		$zz++;
		$bgcolor = ($zz%2)?"#c4c4c4":"#fff";
		echo "<tr bgcolor='$bgcolor'>
			<td>" . $t['id_Kunde'] . "</td>
			<td>" . $t['Nachname'] . "</td>
			<td>" . $t['Vorname'] . "</td>
			<td>" . $t['Email'] . "</td>
			<td><a href='kunden_anzeigen.php?aktion=delete&id=". $t['id_Kunde'] . "'>DELETE</a></td>
			<td><a href='kunden_edit.php?id=". $t['id_Kunde'] . "'>Update</a></td>			
			</tr>";
	}	
	?>
	</body>
</html>