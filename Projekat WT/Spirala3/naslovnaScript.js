
var novosti=document.getElementsByClassName("novost");
var ispis;
var datum;

	function racunajMinute(razlikaMinute)//funkcija koja provjerava koliko je minuta prošlo i postavlja pravilan oblik riječi
	{
		if(razlikaMinute>=1 && razlikaMinute<2)
		{
			ispis=" prije - "+Math.round(razlikaMinute)+" minutu";
		}
		else if(razlikaMinute>1 && razlikaMinute<5)
		{
			ispis=" prije - "+Math.round(razlikaMinute)+" minute";
		}
		else if(razlikaMinute>=5 && razlikaMinute<=20)
		{
			ispis=" prije - "+razlikaMinute+" minuta";
		}
		else if(razlikaMinute>20 && razlikaMinute<60)
		{
			var cifra=razlikaMinute.toString()[1];
			if(cifra>=1&&cifra<2)
			{
				ispis=" prije - "+Math.round(razlikaMinute)+" minutu";
			}
			else if(cifra>=2 && cifra<5)
			{
				ispis=" prije - "+Math.round(razlikaMinute)+" minute";
			}
			else
			{
				ispis=" prije - "+Math.round(razlikaMinute)+" minuta";
			}
		}
	}
	
function racunajSate(razlikaSati)//funkcija koja provjerava koliko je sati prošlo i postavlja pravilan oblik riječi
{
	if(razlikaSati>=1 && razlikaSati<2)
	{
		ispis=" prije - "+Math.round(razlikaSati)+" sat";
	}
	else if(razlikaSati>1 && razlikaSati<4.5)
	{
		ispis=" prije - "+Math.round(razlikaSati)+" sata";
	}
	else if(razlikaSati>=4.5 && razlikaSati<=20)
	{
		ispis=" prije - "+Math.round(razlikaSati)+" sati";
	}
	else if(razlikaSati>20 && razlikaSati<60)
	{
		var cifra=razlikaSati.toString()[1];
		if(cifra>=1&&cifra<2)
		{
			ispis=" prije - "+Math.round(razlikaSati)+" sat";
		}
		else if(cifra>=2 && cifra<5)
		{
			ispis=" prije - "+Math.round(razlikaSati)+" sata";
		}
		else
		{
			ispis=" prije - "+Math.round(razlikaSati)+" sati";
		}
	}
}	

function racunajDane(razlikaDani)//funkcija koja provjerava koliko je dana prošlo i postavlja pravilan oblik riječi
{
	if(razlikaDani>=1 && razlikaDani<2)
	{
		ispis=" prije - "+Math.round(razlikaDani)+" dan";
	}
	else if(razlikaDani>1 && razlikaDani<=20)
	{
		ispis=" prije - "+Math.round(razlikaDani)+" dana";
	}
	else if(razlikaDani>20 && razlikaDani<60)
	{
		var cifra=razlikaDani.toString()[1];
		if(cifra>=1&&cifra<2)
		{
			ispis=" prije - "+Math.round(razlikaDani)+" dan";
		}
		else if(cifra>=2)
		{
			ispis=" prije - "+Math.round(razlikaDani)+" dana";
		}
	}
}

function racunajSedmice(razlikaSedmice)//funkcija koja provjerava koliko je sedmica prošlo i postavlja pravilan oblik riječi
{
	if(razlikaSedmice<=1 && razlikaSedmice<1.5)
	{
		ispis=" prije - "+Math.round(razlikaSedmice)+" sedmicu";
	}
	else if(razlikaSedmice>1.5 && razlikaSedmice<=4)
	{
		ispis=" prije - "+Math.round(razlikaSedmice)+" sedmice";
	}
	else if(razlikaSedmice>5)
	{
		ispis=datum;
	}
	
}	

//Ova petlja postavlja datume u novosti, za testiranje treba promijeniti postavljene datume
/*for(var i=5;i<novosti.length;i++)
{
	var vrijeme=document.getElementsByClassName("vrijeme");
	vrijeme[i].setAttribute("data-datum","May 13, 2016 13:30:00");
	if(i>=5 && i<8)
	{
		vrijeme[i].setAttribute("data-datum","Apr 18, 2016");
	}
	if(i>=8)
	{
		vrijeme[i].setAttribute("data-datum","Mar 18, 2002");
	}
}*/
//ova petlja postavlja klasu na sekcije novosti u zavisnosti od toga koliko je sati/dana/sedmica prošlo od postavljanja
for(var i=0;i<novosti.length;i++)
{
	var vrijeme=document.getElementsByClassName("vrijeme");
	var sekcija=vrijeme[i].parentNode.parentNode.parentNode;
	var vrijemeString=vrijeme[i].getAttribute("data-datum");
	var parsiranDatum=Date.parse(vrijemeString);
	var sad=Date.now();
	razlika=sad-parsiranDatum;
	var Sekunde=Math.round(razlika/1000);
	var Minute=Math.round(Sekunde/60);
	var Sati=Math.round(Minute/60);
	var Dani=Math.round(Sati/24);
	var Sedmice=Math.round(Dani/7);
	var n=new Date();
	var trenutniMjesec=n.getMonth();
	var trenutniDan=n.getDay();
	var datumClanka=new Date(vrijemeString);
	var mjesec=datumClanka.getMonth();
	var dan=datumClanka.getDay();
	var razlikaDana=Math.abs(trenutniDan-dan);
	
	if(Sati<24)
	{
		sekcija.className ="novost danas";
	}
	else if(Dani>=1 && Dani<7)
	{
		sekcija.className="novost sedmica";
	}
	//if(Sati>24 && Dani>7 && Dani<=31)
	else if(trenutniMjesec==mjesec || Dani<31)	
	{
		sekcija.className="novost mjesec";
	}
	else if(Sati>24 && Dani>31)
	{
		sekcija.className="novost ostalo";
	}
}


function reload()
{
	window.location.reload();
}
var izabrani=document.getElementById("izbor");
function danas()
{
		var ostali=document.getElementsByClassName("ostalo");
		var mjesec=document.getElementsByClassName("mjesec");
		var sedmica=document.getElementsByClassName("sedmica");
		for(var i=0;i<ostali.length;i++)
		{
			ostali[i].style.display="none";
		}
		for(var i=0;i<mjesec.length;i++)
		{
			mjesec[i].style.display="none";
		}
		for(var i=0;i<sedmica.length;i++)
		{
			sedmica[i].style.display="none";
		}
}
/*if(izabrani.options[izabrani.selectedIndex].value=="danas")//skrivanje vijesti koje nisu selektovane
	{
		var ostali=document.getElementsByClassName("ostalo");
		var mjesec=document.getElementsByClassName("mjesec");
		var sedmica=document.getElementsByClassName("sedmica");
		for(var i=0;i<ostali.length;i++)
		{
			ostali[i].style.display="none";
		}
		for(var i=0;i<mjesec.length;i++)
		{
			mjesec[i].style.display="none";
		}
		for(var i=0;i<sedmica.length;i++)
		{
			sedmica[i].style.display="none";
		}
	}*/

function sedmica()
{
		var ostali=document.getElementsByClassName("ostalo");
		for(var i=0;i<ostali.length;i++)
		{
			ostali[i].style.display="none";
		}
		var mjesec=document.getElementsByClassName("mjesec");
		for(var i=0;i<mjesec.length;i++)
		{
			mjesec[i].style.display="none";
		}
		var sedmica=document.getElementsByClassName("sedmica");
		for(var i=0;i<sedmica.length;i++)
		{
			sedmica[i].style.display="block";
		}
		var danas=document.getElementsByClassName("danas");
		for(var i=0;i<danas.length;i++)
		{
			danas[i].style.display="block";
		}
		
}
/*
if(izabrani.options[izabrani.selectedIndex].value=="sedmica")
{
		var ostali=document.getElementsByClassName("ostalo");
		var mjesec=document.getElementsByClassName("mjesec");
		for(var i=0;i<ostali.length;i++)
		{
			ostali[i].style.display="none";
		}
		for(var i=0;i<mjesec.length;i++)
		{
			mjesec[i].style.display="none";
		}
		
}
*/

function m()
{
		var ostali=document.getElementsByClassName("ostalo");
		for(var i=0;i<ostali.length;i++)
		{
			ostali[i].style.display="none";
		}
		var mjesec=document.getElementsByClassName("mjesec");
		for(var i=0;i<mjesec.length;i++)
		{
			mjesec[i].style.display="block";
		}
		var sedmica=document.getElementsByClassName("sedmica");
		for(var i=0;i<sedmica.length;i++)
		{
			sedmica[i].style.display="block";
		}
		var danas=document.getElementsByClassName("danas");
		for(var i=0;i<danas.length;i++)
		{
			danas[i].style.display="block";
		}
}
/*
	if(izabrani.options[izabrani.selectedIndex].value=="mjesec")
	{
		var ostali=document.getElementsByClassName("ostalo");
		for(var i=0;i<ostali.length;i++)
		{
			ostali[i].style.display="none";
		}
	}
*/

function sve()
{
	var sve=document.getElementsByClassName("novost");
		for(var i=0;i<sve.length;i++)
		{
			sve[i].style.display="block";
		}
		var ostali=document.getElementsByClassName("ostalo");
		for(var i=0;i<ostali.length;i++)
		{
			ostali[i].style.display="block";
		}
		var mjesec=document.getElementsByClassName("mjesec");
		for(var i=0;i<mjesec.length;i++)
		{
			mjesec[i].style.display="block";
		}
		var sedmica=document.getElementsByClassName("sedmica");
		for(var i=0;i<sedmica.length;i++)
		{
			sedmica[i].style.display="block";
		}
}
	/*if(izabrani.options[izabrani.selectedIndex].value=="sve")
	{
		
		var sve=document.getElementsByClassName("novost");
		for(var i=0;i<sve.length;i++)
		{
			sve[i].style.display="visible";
		}
	}*/

for(var i=0;i<novosti.length;i++)//petlja koja poziva funkcije za računanje proteklog vremena za sve vijesti
{
	var vrijeme=document.getElementsByClassName("vrijeme");
	var vrijemeString=vrijeme[i].getAttribute("data-datum");
	datum=vrijemeString;
	var parsiranDatum=Date.parse(vrijemeString);
	var sad=Date.now();
	razlika=sad-parsiranDatum;
	var Sekunde=Math.round(razlika/1000);
	var Minute=Math.round(Sekunde/60);
	var Sati=Math.round(Minute/60);
	var Dani=Math.round(Sati/24);
	var Sedmice=Math.round(Dani/7);
	
	
	if(Sekunde<60)
	{
		ispis=" - par sekundi";
	}
		
	if(Minute>=1)
	{
		racunajMinute(Minute);
	}
	if(Sati>=1)
	{
		racunajSate(Sati);
	}
	if(Dani>=1)
	{
		racunajDane(Dani);
	}
	if(Sedmice>=1)
	{
		racunajSedmice(Sedmice);
	}
	vrijeme[i].innerHTML=" "+ispis;
}	





