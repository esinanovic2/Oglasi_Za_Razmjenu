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
			$t1 = strtotime($a['datum']);
			$t2 = strtotime($b['datum']);
			return $t1 - $t2;
		}  
		function uporediNaslove($a, $b)
		{
			$t1=$a['naslov'];
			$t2=$b['naslov'];
			return strcmp($t1,$t2);
			
		}
		$vijest=fopen("Novosti.csv",'r')or die("Datoteka se ne može otvoriti");
		$vijesti;
		$i=0;
		while(!feof($vijest))
		{
			$sadrzaj[$i]=fgets($vijest);
			$temp=$sadrzaj[$i];
			$linija=explode(";",$temp);
			if (!isset($linija[0]) || !isset($linija[1]) || !isset($linija[2]) || !isset($linija[3])) {
				$linija[0] = null;
				$linija[1] = null;
				$linija[2] = null;
				$linija[3] = null;
			}
			$niz=Array("naslov"=>str_replace('"', "", $linija[0]), 
					   "oglas"=>str_replace('"', "", $linija[1]),
					   "url"=>str_replace('"', "", $linija[2]),
					   "datum"=>$linija[3]);
			$vijesti[$i]=$niz;
			$i++;
			
		}
		
		/*if(isset($_REQUEST['sort']))
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
			
		}*/
		
			
		
		
		usort($vijesti, 'uporediDatume');
		$naslov; $oglas; $url; $datum;
		for($j=0;$j<count($sadrzaj);$j++)
		{
			$temp=$sadrzaj[$j];
			$linija=explode(";",$temp);
			
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
	<section id="5" class="novost">
	
		<div class="slika"> 
			<a href="http://www.google.ba">
				<img src="./slike/masina.jpg" alt="Slika Masine">
			</a>
		</div>
		
		<div class="tekst">
			<h2> Veš mašina </h2>
			
			<p>
				Mašina stara 2 godine, mijenjam za sušilicu.
			</p>
			<aside class="datum">Objavljeno: <time class="vrijeme" ></time> </aside>
		</div>
						
	</section>
	
	<section id="6" class="novost">
		<div class="slika"> 
			<a href="http://www.google.ba">
			<img src="./slike/golf2.jpg" alt="Slika Golfa"> 
			</a>
			
		</div>
		
		<div class="tekst">
		<h2> Golf 2 </h2>
		
		<p>
			1990 godište, mijenjam za Golf 3 uz doplatu.
		</p>
		<aside class="datum">Objavljeno: <time class="vrijeme" ></time> </aside>
		</div>
		
	</section>

	<section id="7" class="novost">
		<div class="slika"> 
			<a href="http://www.google.ba">
			<img src="./slike/golf2.jpg" alt="Slika Golfa"> 
			</a>
			
		</div>
		
		<div class="tekst">
		<h2> Golf 2 </h2>
		
		<p>
			1990 godište, mijenjam za Golf 3 uz doplatu.
		</p>
		<aside class="datum">Objavljeno: <time class="vrijeme" ></time> </aside>
		</div>
		
	</section>
	
	
	<section id="8" class="novost">
		
		<div class="slika"> 
			<a href="http://www.google.ba">
			<img src="./slike/xperiaz1.jpg" alt="Slika Masine">
			</a>
		</div>
		
		<div class="tekst">
		<h2>Mobitel Xperia z1</h2>
		
		<p> Dobro očuvan, sa sd karticom, mijenjam za samsung galaxy s4.</p>
		<aside class="datum">Objavljeno: <time class="vrijeme" ></time> </aside>
		</div>
		
	</section>
	
	<section id="9" class="novost">
		
		<div class="slika">  
			<a href="http://www.google.ba">
				<img src="./slike/xperiaz1.jpg" alt="Slika Masine"> 
			</a>
		</div>
		
		<div class="tekst">
		<h2>Mobitel Xperia z1</h2>
		
		<p> Dobro očuvan, sa sd karticom, mijenjam za samsung galaxy s4.</p>
		<aside class="datum">Objavljeno: <time class="vrijeme" ></time> </aside>
		</div>
					
	</section>
	
	<section id="10" class="novost">
		
		<div class="slika"> 
			<a href="http://www.google.ba">
			<img src="./slike/xperiaz1.jpg" alt="Slika Masine">
			</a>
		</div>
		
		<div class="tekst">
		<h2>Mobitel Xperia z1</h2>
		
		<p> Dobro očuvan, sa sd karticom, mijenjam za samsung galaxy s4.</p>
		<aside class="datum">Objavljeno: <time class="vrijeme" ></time> </aside>
		</div>
					
	</section>
	
	<section id="11" class="novost">
		
		<div class="slika"> 
			<a href="http://www.google.ba">
			<img src="./slike/xperiaz1.jpg" alt="Slika Masine"> 
			</a>
		</div>
		
		<div class="tekst">
		<h2>Mobitel Xperia z1</h2>
		
		<p> Dobro očuvan, sa sd karticom, mijenjam za samsung galaxy s4.</p>
		<aside class="datum">Objavljeno: <time class="vrijeme" ></time> </aside>
		</div>
					
	</section>
	
	<section id="12" class="novost">
		
		<div class="slika"> 
			<a href="http://www.google.ba">
			<img src="./slike/xperiaz1.jpg" alt="Slika Masine"> 
			</a>
		</div>
		
		<div class="tekst">
		<h2>Mobitel Xperia z1</h2>
		
		<p> Dobro očuvan, sa sd karticom, mijenjam za samsung galaxy s4.</p>
		<aside class="datum">Objavljeno: <time class="vrijeme" ></time> </aside>
		</div>
					
	</section>
	
	<section id="13" class="novost">
	
		<div class="slika"> 
		<a href="http://www.google.ba">
			<img src="./slike/masina.jpg" alt="Slika Masine">
		</a>
		</div>
		
		<div class="tekst">
		<h2> Veš mašina </h2>
		
		<p>
			Mašina stara 2 godine, mijenjam za sušilicu.
		</p>
		<aside class="datum">Objavljeno: <time class="vrijeme" ></time> </aside>
		</div>
						
	</section>
	
	<section id="14" class="novost">
	
		<div class="slika"> 
		<a href="http://www.google.ba">
			<img src="./slike/masina.jpg" alt="Slika Masine">
		</a>
		</div>
		
		<div class="tekst">
		<h2> Veš mašina </h2>
		
		<p>
			Mašina stara 2 godine, mijenjam za sušilicu.
		</p>
		<aside class="datum">Objavljeno: <time class="vrijeme" ></time> </aside>
		</div>
						
	</section>
	
	<section id="15" class="novost">
	
		<div class="slika"> 
		<a href="http://www.google.ba">
			<img src="./slike/masina.jpg" alt="Slika Masine">
		</a>
		</div>
		
		<div class="tekst">
		<h2> Veš mašina </h2>
		
		<p>
			Mašina stara 2 godine, mijenjam za sušilicu.
		</p>
		<aside class="datum">Objavljeno: <time class="vrijeme" ></time> </aside>
		</div>
						
	</section>
	
	<section id="16" class="novost">
	
		<div class="slika"> 
		<a href="http://www.google.ba">
			<img src="./slike/masina.jpg" alt="Slika Masine">
		</a>
		</div>
		
		<div class="tekst">
		<h2> Veš mašina </h2>
		
		<p>
			Mašina stara 2 godine, mijenjam za sušilicu.
		</p>
		<aside class="datum">Objavljeno: <time class="vrijeme" ></time> </aside>
		</div>
						
	</section>
	
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