<?php
session_start();
?>
<!Doctype html>

<html>

<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="kontaktStil.css" media="all">
<script src="formaScript.js"></script>
<title>Kontakt</title>


</head>

<body>

<header>
	
	<div id="naslov">
	<h1>Mijenjaj.ba</h1>
	
	</div>
	<div id="oklop">
	<div class="okvir">

		<div class="krug1"></div>
		<div class="lijevi"></div>
		<div class="l"></div>

		<div class="desni"></div>
		<div class="d"></div>
		<div class="krug2"></div>
	
	</div>
	</div>
	
	<div id="login">
	<?php
		
			echo "<br>";
			if(isset($_SESSION["username"]))
			{
				echo "Logirani ste kao: ".$_SESSION["username"];
			}
			else
			{
				echo "Niste logirani!";
			}
	?>
	</div>
	
	<nav>
		<ul>
			<li><a href="Naslovna.php">Naslovna</a></li>
			<li><a href="Kontakt.php">Kontakt</a></li>
			<li><a href="Tabela.php">Tabela</a></li>
			<li><a href="Link.php">Linkovi</a></li>
		</ul>
	
	</nav>
	
</header>

<section>
	
	<h2>Registracija</h2>
	
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	
		<div id="labele">
			<p><label>Korisničko ime</label></p>
			<p><label>Šifra</label></p>
			<p><label>Ponovi Šifru</label></p>
			<p><label>E-Mail</label></p>
			<p><label>Datum rođenja - dd/mm/yyyy</label></p>
			<p><label>Broj telefona</label></p>
		</div>
		<div id="unos">
		<p >
				<input type="text" name="ime" id="ime" onblur="imeValid()" required>
		</p>
		
		<p >
				<input type="password" name="password" id="pass" required >
		</p>
		<p >
				<input type="password" name="ppassword" id="ppass" onblur="sifraValid()" required>
		</p>
		
		<p >
				<input type="email" name="email" id="email" onblur="emailValid()" required>
		</p>
		
		<p >
				<input type="date" name="datum" id="datum" onblur="datumValid()" required>
		</p>
		
		<p >
				<input type="tel" name="brojtelefona" id="brtel" onblur="telefonValid()" required>
		</p>
		
		</div>
		
		<p id="dugme">
			<label>
				<input type="checkbox" name="zapamti"> Zapamti me
			</label>
			
			<input type="submit" id="but" value="Registruj">
		</p>
		
		
	</form>
	
	<?php
		function provjera($podatak)
		{
			$podatak=trim($podatak);
			$podatak=stripslashes($podatak);
			$podatak=htmlspecialchars($podatak);
			return $podatak;
		}
		if(isset($_REQUEST['ime'])&&($_REQUEST['ime']!="")
			&&isset($_REQUEST['password'])
			&&($_REQUEST['password']!="")
			&&isset($_REQUEST['email'])&&($_REQUEST['email']!="")
			&&isset($_REQUEST['datum'])&&($_REQUEST['datum']!="")
			&&isset($_REQUEST['brojtelefona'])&&($_REQUEST['brojtelefona']!="")
			)
		{
			$username=provjera($_REQUEST['ime']);
			$password=password_hash(provjera($_REQUEST['password']),PASSWORD_DEFAULT);
			$email=provjera($_REQUEST['email']);
			$datum=provjera($_REQUEST['datum']);
			$telefon=provjera($_REQUEST['brojtelefona']);

			$korisnici=fopen("Korisnici.txt","a+") or die("Datoteka se ne može otvoriti");
			fwrite($korisnici,$username."\n");
			fwrite($korisnici,$password."\n");
			fclose($korisnici);
		}
	?>
	

</section>


<footer>
	
	<p>Copyright &copy; Elvedin Sinanović 2015/2016.</p>
</footer>

</body>

</html>