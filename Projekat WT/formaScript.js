regExSlova=/^[a-zA-Z\s]+$/;
regexEmail=/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|ba|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i

var korisnik;
var sifra;
var email;
function imeValid()
{
	var ime=document.getElementById("ime");
	if(!ime.value.match(regExSlova))
	{
		alert("Moras unijeti ime koje nema brojeva");
	}
	else
	{
		korisnik=ime.value;
	}

}

function sifraValid()
{
	var pass=document.getElementById("pass");
	var ppass=document.getElementById("ppass");
	if(pass.value!=ppass.value)
	{
		alert("Moras unijeti isti password");
	}
	else
	{
		sifra=pass.value;
	}
}

function emailValid()
{
	var email=document.getElementById("email");
	if(!email.value.match(regexEmail))
	{
		alert("Moras unijeti validan email");
	}
	else
	{
		email=email.value;
	}
	
}

