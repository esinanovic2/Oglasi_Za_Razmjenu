<?php
session_start();
?>
<!Doctype html>

<html>

<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="tabelaStil.css" media="all">
<title>Tabela</title>

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
	
	<h2>Tabelarni podaci</h2>
	
	<table>
		<tr>
			<th>
				ID Korisnika
			</th>
		
			<th>
				Ime
			</th>
		
			<th>
				Prezime
			</th>
		
			<th>
				Broj Oglasa
			</th>
		
			<th>
				Pouzdanost
			</th>
		</tr>
		
		<tr>
			<td>
				a
			</td>
			
			<td>
				a
			</td>
			
			<td>
				a
			</td>
			
			<td>
				a
			</td>
			
			<td>
				a
			</td>
			
		</tr>
		
		<tr class="plavi">
			<td>
				a
			</td>
			
			<td>
				a
			</td>
			
			<td>
				a
			</td>
			
			<td>
				a
			</td>
			
			<td>
				a
			</td>
		</tr>
		
		<tr>
			<td>
				a
			</td>
			
			<td>
				a
			</td>
			
			<td>
				a
			</td>
			
			<td>
				a
			</td>
			
			<td>
				a
			</td>
			
		</tr>
		
		<tr class="plavi">
			<td>
				a
			</td>
			
			<td>
				a
			</td>
			
			<td>
				a
			</td>
			
			<td>
				a
			</td>
			
			<td>
				a
			</td>
		
		</tr>
	</table>
	
	

</section>


<footer>
	
	<p>Copyright &copy; Elvedin Sinanović 2015/2016.</p>
</footer>

</body>

</html>