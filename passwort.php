<!doctype html>
<html>
	<head>
		<title>Passwort</title>
		<meta charset="utf-8">
	</head>
	<body>
	<?php
		$p = "asdasd";
		echo "<hr>" . password_hash( $p, PASSWORD_DEFAULT) . "<hr>";
	?>
	</body>
</html>