<?php
session_start();
?>
<!Doctype html>

<html>

<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="dodajVijestStil.css" media="all">
<script src="vijestScript.js"></script>
<title>Dodaj Vijest</title>


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
			<li><a href="Index.php">Naslovna</a></li>
			<li><a href="Kontakt.php">Kontakt</a></li>
			<li><a href="Tabela.php">Tabela</a></li>
			<li><a href="Link.php">Linkovi</a></li>
			<li><a href="#">Dodaj Vijest</a></li>
		</ul>
	
	</nav>
	
</header>

<section>
	
	<h2>Registracija</h2>
	
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	
		
		<div id="unos">
		<p >
				<label>Naslov<input type="text" name="n" id="n" onblur="nasValid()" required></label>
		</p>
		
		<p >
				<label>Oglas<input type="text" name="oglas" id="oglas" onblur="oglasValid()" required ></label>
		</p>
		<p >
				<label>URL Slike<input type="text" name="url" id="url" onblur="urlValid()" required></label>
		</p>
		<p>
				<label>Dvoslovni kod države<input type="text" name="dkod" id="dkod" required></label>
		</p>
		<p>
				<label id="l1">Pozivni Broj
				<input type="text" name="tel" id="tel" onfocus="uzmiDKod()" onblur="telValid()" required>
				</label>
				
		</p>
		<p>
				<label>
				Telefon<input type="text" name="telefon" id="telefon" onblur="telefonValid()" required>
				</label>
		</p>
		
		
		</div>
		
		<p id="dugme">			
			<input type="submit" id="sub" value="Dodaj Vijest">
		</p>
		
		
	</form>
	
	<?php
		date_default_timezone_set("Europe/Sarajevo");
		if(isset($_REQUEST['n'])&&($_REQUEST['n']!="")&&isset($_REQUEST['oglas'])&&($_REQUEST['oglas']!="")
			&&isset($_REQUEST['url'])&&($_REQUEST['url']!=""))
		{
			function provjera($podatak)
			{
				$podatak=trim($podatak);
				$podatak=stripslashes($podatak);
				$podatak=htmlspecialchars($podatak);
				return $podatak;
			}
			$naslov=provjera($_REQUEST['n']);
			$oglas=provjera($_REQUEST['oglas']);
			$url=provjera($_REQUEST['url']);
			$datum=date("M d,Y H:i:s");
			
			$niz=array($naslov,$oglas,$url,$datum);
			$novost=fopen("Novosti.csv","a") or die("Datoteka se ne može otvoriti");
			fwrite($novost,"\n");
			fputcsv($novost,$niz,";");
			$stat = fstat($novost);
			ftruncate($handle, $stat['size']-1);
			fclose($novost);
		}
	?>
	

</section>
<div id="Ispis">


</div>

<footer>
	<script src="vijestScript.js"></script>
	<p>Copyright &copy; Elvedin Sinanović 2015/2016.</p>
</footer>

</body>

</html>