regExSlova=/^[a-zA-Z\s]+$/;
regExTelefon=/^(\d\d\d)-(\d\d\d)-(\d\d\d)$/;
regExDatum=/^(\d\d)\/(\d\d)\/(\d\d\d\d)$/
regexEmail=/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|ba|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;

var dugme=document.getElementById("but");
var greske=0;
if(greske==0)
{
	dugme.disabled=false;
}
var korisnik;
var sifra;
var Email;
var Datum;
var Telefon;

function imeValid()
{
	var ime=document.getElementById("ime");
	if(!ime.value.match(regExSlova))
	{	
		greske++;
		ime.style.backgroundColor="red";
		ime.setAttribute("placeholder","Unesite ime i prezime bez brojeva!");
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

function sifraValid()
{
	var pass=document.getElementById("pass");
	var ppass=document.getElementById("ppass");
	if(pass.value!=ppass.value)
	{
		greske++;
		pass.style.backgroundColor="red";
		pass.setAttribute("placeholder","Šifre moraju biti identične!");	
		ppass.style.backgroundColor="red";
		ppass.setAttribute("placeholder","Šifre moraju biti identične!");
		ppass.value="";
		

	}
	else
	{
		greske--;
		pass.style.backgroundColor="white";
		pass.placeholder="";	
		ppass.style.backgroundColor="white";
		ppass.placeholder="";
		sifra=pass.value;
	}
}

function emailValid()
{
	var email=document.getElementById("email");
	if(!email.value.match(regexEmail))
	{
		greske++;
		email.style.backgroundColor="red";
		email.setAttribute("placeholder","Morate unijeti validan email!");
		email.value="";
		email.focus();

	}
	else
	{
		greske--;
		email.style.backgroundColor="white";
		email.placeholder="";
		Email=email.value;
	}
	
}


function datumValid()
{
	var datum=document.getElementById("datum");
	if(!datum.value.match(regExDatum))
	{
		greske++;
		datum.style.backgroundColor="red";
		datum.setAttribute("placeholder","Morate unijeti datum u obliku: dd/mm/yyy");
		datum.value="";
	}
	else
	{
		
		greske--;
		datum.style.backgroundColor="white";
		datum.placeholder="";
		Datum=datum.value;
	}
}



function telefonValid()
{
	var telefon=document.getElementById("brtel");
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
