<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title> PHP </title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
	<div class="bimg">
		<?php
			if(isset($_POST['wyloguj'])){
				$_SESSION['zalogowany'] = 0;
				$_SESSION['zalogowanyImie'] = "";
		}
		?>
		<div class ="diamond-container">
		<div class ="form-container">
		<h1>Logowanie</h1>
		<div class ="login-form">
			<form action="logowanie.php" method="POST">
			<table>
				<tr><td>Login:</td><td><input type="text" name="login"></td></tr>
				<tr><td>Hasło:</td><td><input type="password" name="haslo"></td></tr>
				<tr>
					<td colspan="2"><input type="submit" value="Zaloguj" name="zaloguj"></td></tr>
			</table>
			</form>
		</div>
		<div class="cookie-form">
			<form action="cookie.php" method="GET">
			<table>
				<tr><td>Czas[s]: </td><td><input type="number" name="czas" value=0 min=0 required></td></tr>
				<tr>
					<td colspan="2"><input type="submit" value="Utwórz" name="utworzCookie"></td></tr>
			</table>
			</form>
		</div>
		<?php
			if(isset($_COOKIE['cookie'])){
				echo "Wartość Cookie: " . $_COOKIE['cookie'];
			}
		?>
	</div>
</div>

</div>
	</body>
</html>