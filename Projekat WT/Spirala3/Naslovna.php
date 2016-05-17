<?php
session_start();
?>
<!Doctype html>

<html>

<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="naslovnaStil.css" media="all">
<script src="naslovnaScript.js"></script>

<title>Naslovna</title>

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
	<table id="forma">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<tr>
				<td>Korisničko Ime</td>
				<td><input type="text" name="username"id="uname"></td>
			</tr>
			<tr>
				<td>Šifra</td>
				<td><input type="password" name="password"id="pass"></td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
					<input type="submit" value="Login">
				</td>
			</tr>
		</form>
	</table>
	<?php
		$korisnici=fopen("Korisnici.txt","a+") or die("Datoteka se ne može otvoriti");
		$fusername=provjera(fgets($korisnici));
		$fpassword=provjera(fgets($korisnici));
		fclose($korisnici);
		function provjera($podatak)
		{
			$podatak=trim($podatak);
			$podatak=stripslashes($podatak);
			$podatak=htmlspecialchars($podatak);
			return $podatak;
		}
		if(isset($_REQUEST['username'])&&($_REQUEST['username']!="")&&isset($_REQUEST['password'])&&($_REQUEST['password']!=""))
		{
			$username=provjera($_REQUEST['username']);
			$password=provjera($_REQUEST['password']);

			echo "<br>";
			
			if($fusername==$username && password_verify($password, $fpassword))
			{
				$_SESSION["username"]=$username;
				echo "Dobrodošli: ",$_SESSION["username"];
			}
			else
			{
				echo "Niste unijeli validne podatke!";
				$_SESSION["username"]=null;
			}
		}
		else
		{
			echo "<br>";
			if(isset($_SESSION["username"]))
			{
				echo "Logirani ste kao: ".$_SESSION["username"];
			}
			else
			{
				echo "Niste logirani!";
			}
			
			
		}
		
	?>
	</div>
	
	<nav>
		<ul>
			<li><a href="#">Naslovna</a></li>
			<li><a href="Kontakt.php">Kontakt</a></li>
			<li><a href="Tabela.php">Tabela</a></li>
			<li><a href="Link.php">Linkovi</a></li>
			<?php
			if(isset($_SESSION["username"]))
			{
				echo "<li><a href='DodajVijest.php'>Dodaj Vijest</a></li>";
			}
			?>
		</ul>
	
	</nav>
	
</header>

<div id="kategorije">

	<h2>Kategorije</h2>
	
	<section>
	<ul>
		<li>Kućanski aparati</li>
		<li>Vozila</li>
		<li>Računari</li>
		<li>Namještaj</li>
		<li>Mobilni uređaji</li>
		<li>Nakit</li>
		<li>Odjeća i obuća</li>
	</ul>
	</section>
</div>


<div id="novosti">
	<?php
		
		function uporediDatume($a, $b)
		{
			$dateTime1 = new DateTime(str_replace('"', '',$a['datum'])); 
			$dateTime2 = new DateTime(str_replace('"', '',$b['datum'])); 
			$t1=$dateTime1->format('U'); 
			$t2=$dateTime2->format('U'); 
			return $t2-$t1;
		}  
		function uporediNaslove($a, $b)
		{
			$t1=$a['naslov'];
			$t2=$b['naslov'];
			return strcmp($t1,$t2);
			
		}
		$vijest=fopen("Novosti.csv",'r')or die("Datoteka se ne može otvoriti");
		//$vijest= array_values(array_filter($vijest, "trim"));
		
		$vijesti;
		$i=0;
		while(!feof($vijest))
		{
			$sadrzaj[$i]=fgets($vijest);
			if(strlen($sadrzaj[$i])>10)
			{
				$temp=$sadrzaj[$i];
				$linija=explode(";",$temp);
			}
			else
			{
				continue;
			}
			
				
			if (!isset($linija[0]) || !isset($linija[1]) || !isset($linija[2]) || !isset($linija[3])
				||$linija[0]=="" ||$linija[1]=="" ||$linija[2]=="" ||$linija[3]=="") {
				$linija[0] = null;
				$linija[1] = null;
				$linija[2] = null;
				$linija[3] = null;
			}
			$niz=Array("naslov"=>str_replace('"', '', $linija[0]), 
					   "oglas"=>str_replace('"', '', $linija[1]),
					   "url"=>str_replace('"', '', $linija[2]),
					   "datum"=>str_replace('\"', "" ,$linija[3]));
			$vijesti[$i]=$niz;
			$i++;
			
		}
		if(isset($_REQUEST['sort']))
		{
			$izbor=$_REQUEST['abc'];
			
			if($izbor=="dtm")
			{
				usort($vijesti, 'uporediDatume');
			}
			else
			{
				usort($vijesti, 'uporediNaslove');
			}
			
		}
		
		
		
		$naslov; $oglas; $url; $datum;
		for($j=0;$j<count($vijesti);$j++/*$j=0;$j<count($sadrzaj);$j++*/)
		{
			
			$naslov=$vijesti[$j]['naslov'];
			$oglas=$vijesti[$j]['oglas'];
			$url=$vijesti[$j]['url'];
			$datum=$vijesti[$j]['datum'];

			echo 
			"
				<section id='".$j."' class='novost'>
		
					<div class='slika'> 
						<a href='http://www.google.ba'>
							<img src='".$url."' alt='Slika'>
						</a>
					</div>
			
					<div class='tekst'>
						<h2> ".$naslov." </h2>
						
						<p>
							".$oglas."
						</p>
						<aside class='datum'>Objavljeno: <time class='vrijeme' data-datum=".$datum."></time> </aside>
					</div>
							
				</section>
			
			";
		
		
		}
		
		
		
	?>
	
	
</div>

<div id="forma">

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<br>
	<label>Oglasi postavljeni</label>
	<select id="izbor">
		<option value="izaberi" >Izaberi</option>
		<option value="danas" onclick="danas()">Danas</option>
		<option value="sedmica" onclick="sedmica()">Ove sedmice</option>
		<option value="mjesec" onclick="m()">Ovog mjeseca</option>
		<option value="sve" onclick="sve()">Svi</option>
	</select>
	<br>
	<label>Sortiraj po:</label>
	<br>
	<select id="abc" name="abc">
		<option value="dtm">Datum</option>
		<option value="abcd">Abeceda</option>
	</select>
	<br>
	<input type="submit" name="sort" value="Sortiraj"></submit>
</form>

</div>

<footer>
	<script src="naslovnaScript.js"></script>
	<p>Copyright &copy; Elvedin Sinanović 2015/2016.</p>
</footer>

</body>

</html>