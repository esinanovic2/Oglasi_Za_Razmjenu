regExSlova=/^[a-zA-Z\s0-9čćšđžČĆŠĐŽ,\\.]+$/;
regExURL=/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/;

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

if(greske==0)
{
	dugme.disabled=false;
}
