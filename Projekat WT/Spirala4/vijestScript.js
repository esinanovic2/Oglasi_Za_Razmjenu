regExSlova=/^[a-zA-Z\s0-9čćšđžČĆŠĐŽ,\\.]+$/;
regExURL=/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/;
regExTelefon=/^(\d\d\d)-(\d\d\d)-(\d\d\d)$/;

var dugme=document.getElementById("sub");
var greske=0;

var korisnik;
var sifra;
var Email;
var Datum;
var Telefon;


function nasValid()
{
	var ime=document.getElementById("n");
	if(!ime.value.match(regExSlova))
	{	
		greske++;
		ime.style.backgroundColor="red";
		ime.setAttribute("placeholder","Unesite naslov sa slovima i brojevima!");
		ime.value="";
		
	}
	else
	{
		greske--;
		ime.style.backgroundColor="white";
		ime.placeholder="";
		korisnik=ime.value;
	}

}

function oglasValid()
{
	var ime=document.getElementById("oglas");
	if(!ime.value.match(regExSlova))
	{	
		greske++;
		ime.style.backgroundColor="red";
		ime.setAttribute("placeholder","Unesite oglas bez specijalnih karaktera!");
		ime.value="";
		
	}
	else
	{
		greske--;
		ime.style.backgroundColor="white";
		ime.placeholder="";
		korisnik=ime.value;
	}

}

function urlValid()
{
	var url=document.getElementById("url");
	if(!url.value.match(regExURL))
	{	
		greske++;
		url.style.backgroundColor="red";
		url.setAttribute("placeholder","Unesite validan url!");
		url.value="";
		
	}
	else
	{
		greske--;
		url.style.backgroundColor="white";
		url.placeholder="";
		korisnik=url.value;
	}

}


var kod;
var pozivni;
function uzmiDKod()
{
	var dkod=document.getElementById("dkod");
	var vrijednostDkod=dkod.value;
	
	var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
				var tekst= xhttp.responseText;
				var objekat=JSON.parse(tekst);
				kod=objekat[0].alpha2Code;
				pozivni=objekat[0].callingCodes;
				if(objekat[0]==null)
				{
					dkod.style.backgroundColor="red";
					dkod.setAttribute("placeholder","Unesite validan dvoslovni kod države!");
					dkod.value="";
				}
				else
				{
					dkod.style.backgroundColor="white";
					dkod.placeholder="";
				}
			}
		};
	xhttp.open("GET", "https://restcountries.eu/rest/v1/alpha?codes="+vrijednostDkod, true);
	xhttp.send();
}

function telValid()
{
	var tel=document.getElementById("tel");
	var vrijednostTel=tel.value;
	var dkod=document.getElementById("dkod");
	var vrijednostDkod=dkod.value;
	if(!(vrijednostTel==pozivni) || !(vrijednostDkod==kod))
	{
		greske++;
		tel.style.backgroundColor="red";
		tel.setAttribute("placeholder","Unesite validan pozivni broj države!");
		tel.value="";
		dkod.style.backgroundColor="red";
		dkod.setAttribute("placeholder","Unesite validan dvoslovni kod države!");
		dkod.value="";
	}
	else
	{
		greske--;
		tel.style.backgroundColor="white";
		tel.placeholder="";
		dkod.style.backgroundColor="white";
		dkod.placeholder="";
	}
}

function telefonValid()
{
	var telefon=document.getElementById("telefon");
	if(!telefon.value.match(regExTelefon))
	{
		greske++;
		telefon.style.backgroundColor="red";
		telefon.setAttribute("placeholder","Morate unijeti telefon u obliku: ###-###-###");
		telefon.value="";
	}
	else
	{
		
		greske--;
		telefon.style.backgroundColor="white";
		telefon.placeholder="";
		Telefon=telefon.value;
	}

}

/*
var kod;
function pozoviKod()
{
	var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
				var tekst= xhttp.responseText;
				var objekat=JSON.parse(tekst);
				kod=objekat[0].alpha2Code;
				document.getElementById("Ispis").innerHTML=kod;
			}
		};
	xhttp.open("GET", "https://restcountries.eu/rest/v1/alpha?codes=ba", true);
	xhttp.send();
}


function dkodValid()
{
	var dkod=document.getElementById("dkod");
	var vrijednost=dkod.value;
	
	if(!(vrijednost==kod))
	{
		greske++;
		dkod.style.backgroundColor="red";
		dkod.setAttribute("placeholder","Unesite validan dvoslovni kod države!");
		dkod.value="";
	}
	else
	{
		greske--;
		dkod.style.backgroundColor="white";
		dkod.placeholder="";
	}
}

var pozivni;
function pozoviPozivni()
{
	var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
				var tekst= xhttp.responseText;
				var objekat=JSON.parse(tekst);
				pozivni=objekat[0].callingCodes;
				document.getElementById("Ispis").innerHTML=pozivni;
			}
		};
	xhttp.open("GET", "https://restcountries.eu/rest/v1/alpha?codes=ba", true);
	xhttp.send();
}


function telValid()
{
	var tel=document.getElementById("tel");
	var vrijednost=tel.value;
	if(!(vrijednost==pozivni))
	{
		greske++;
		tel.style.backgroundColor="red";
		tel.setAttribute("placeholder","Unesite validan pozivni broj države!");
		tel.value="";
	}
	else
	{
		greske--;
		tel.style.backgroundColor="white";
		tel.placeholder="";
	}
}*/

if(greske==0)
{
	dugme.disabled=false;
}
