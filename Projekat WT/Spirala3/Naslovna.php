<!Doctype html>

<html>

<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="naslovnaStil.css" media="all">


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
				echo "Dobrodošli: ".$fusername;
			}
			else
			{
				echo "Niste unijeli validne podatke!";
			}
		}
		
	?>
	</div>
	
	<nav>
		<ul>
			<li><a href="#">Naslovna</a></li>
			<li><a href="Kontakt.html">Kontakt</a></li>
			<li><a href="Tabela.html">Tabela</a></li>
			<li><a href="Link.html">Linkovi</a></li>
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
	<section id="1" class="novost">
	
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
	
	<section id="2" class="novost">
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

	<section id="3" class="novost">
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
	
	
	<section id="4" class="novost">
		
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
	
	<section id="5" class="novost">
		
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
	
	<section id="6" class="novost">
		
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
	
	<section id="7" class="novost">
		
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
	
	<section id="10" class="novost">
	
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
	
	<section id="11" class="novost">
	
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
	
	<section id="12" class="novost">
	
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

<form>
<h2>Oglasi postavljeni<h2>
	<select id="izbor">
		<option value="izaberi" >Izaberi</option>
		<option value="danas" onclick="reload()">Danas</option>
		<option value="sedmica" onclick="reload()">Ove sedmice</option>
		<option value="mjesec" onclick="reload()">Ovog mjeseca</option>
		<option value="sve" onclick="reload()">Svi</option>
	</select>

</form>

</div>

<footer>
	<script src="naslovnaScript.js"></script>
	<p>Copyright &copy; Elvedin Sinanović 2015/2016.</p>
</footer>

</body>

</html>