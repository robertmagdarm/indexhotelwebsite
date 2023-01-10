<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <title>Hotel Mag</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  
body {

  margin: 0;
  font-family: Arial, Helvetica, sans-serif;}

#strona {
  z-index: -1;}
  
#strona .title_main { color: gold; text-align:center; font-size: 18px;}

#logo{ 
z-index: 1000;
width: 170px; height:235px;
float: right;
position: -webkit-sticky;
position: sticky;
top: 0;
padding: 5px;
background-color: #acd373; color: black;
text-align: center;
border-radius: 0;
-webkit-border-radius: 0;
-moz-border-radius: 0;
box-shadow: 0 2px 2px #666666;
-webkit-box-shadow: 0 2px 2px #666666;
-moz-box-shadow: 0 2px 2px #666666;}

#gwiazdki { z-index: 1500; position: absolute; float: right; margin-top: 8px; right: 35px; display: inline;
  margin-left: auto;
  margin-right: auto;}

#fontM { font-family: Georgia;
	 font-size:16px; }
#fontMstrona { font-family: Georgia;
	 font-size:16px;
 }

#obrazki_strona{
display:inline-flex;
border-bottom: 1px solid green;

}

.container {
  display: inline-block;
  cursor: pointer;
}

.bar1, .bar2, .bar3 {
  width: 35px;
  height: 3px;
  background-color: grey;
  margin: 5px 2;

  transition: 0.4s;
}

.change .bar1 {
  -webkit-transform: rotate(-45deg) translate(-9px, 6px);
  transform: rotate(-45deg) translate(-9px, 6px);
}

.change .bar2 {opacity: 0;}

.change .bar3 {
  -webkit-transform: rotate(45deg) translate(-8px, -8px);
  transform: rotate(45deg) translate(-8px, -8px);
}

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  }

#ikona {
    position:fixed;
    margin-top: 145px;
    z-index: 2000;
}

#obrazmain{ 
  position: relative;
  -webkit-box-shadow:0 1px 4px rgba(78, 78, 78, 0.3), 0 1px 4px rgba(78, 78, 78, 0.1) inset;
       -moz-box-shadow:0 1px 4px rgba(78, 78, 78, 0.3), 0 1px 4px rgba(78, 78, 78, 0.1) inset;
            box-shadow:0 1px 4px rgba(78, 78, 78, 0.3), 0 1px 4px rgba(78, 78, 78, 0.1) inset;
}
#obrazmain:before, #obrazmain:after
{
  content:"";
    position:absolute;
    z-index:-1;
    -webkit-box-shadow:0 0 20px rgba(78,78,78,0.8);
    -moz-box-shadow:0 0 20px rgba(78,78,78,0.8);
    box-shadow:0 0 20px rgba(78,78,78,0.8);
    top:0;
    bottom:0;
    left:10px;
    right:10px;
    -moz-border-radius:100px / 10px;
    border-radius:100px / 10px;
}
#obrazmain:after
{
  right:10px;
    left:auto;
    -webkit-transform:skew(8deg) rotate(3deg);
       -moz-transform:skew(8deg) rotate(3deg);
        -ms-transform:skew(8deg) rotate(3deg);
         -o-transform:skew(8deg) rotate(3deg);
            transform:skew(8deg) rotate(3deg);
}


#baner {
text-align:center; 
z-index: 1111;

}

#baner h1 {text-align:justify;}

#myTopnav{ width: 1344px; position: fixed; z-index: 1200; padding: 5px; right:0;}
.topnav {
  overflow: hidden;
  background-color: grey;
  text-transform: uppercase;
	width: auto;
}

.topnav a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 16px;
}

.topnav a:hover {
  background-color: grey;
  color: #acd373;
  border: 1px solid #39b54a;
}

.topnav a.active {
  background-color: grey;
  color: #acd373;
  overflow: hidden;
}

.topnav .icon {
  display: none;}

#ukryj {
width: 40px;
height: 40px;
padding: 2px;
background-image: url("xicon.png");
background-repeat: no-repeat;
background-position: center;
border: 1px solid grey;
margin-top: 0px;
}

h2 {color: #8560a8; text-align: center;}

p {padding: 10px; text-align:justify;}

#stopka {position: relative; width: 1344px; clear: both; float: left; padding: 0; background-color: #acd373; text-align:right;}

#stopka p {text-align:center;}
.stopkafree{text-decoration: none; color:#0054a6;}
.stopkafree:a {text-decoration: none; color: #000000;}
.stopkafree:hover {text-decoration: none;}







@media screen and (max-width: 600px) {

#kwiat{width: 30px; height: 30px; background-image: url("images/iconaDzwonekpng.png"); position: absolute; z index: 1300;}

#cieniowanymenu{ position: absolute; z-index: 1112; width: 250px; background-color: grey; opacity: 0.9;}
.container {
  display: inline-block;
  cursor: pointer;
}

#obrazki_strona{

border-bottom: 1px solid green;
}

#strona .title_main { margin-top: 30px; color: gold; text-align:center; font-size: 18px;}


.bar1, .bar2, .bar3 {
  width: 35px;
  height: 6px;
  background-color: #acd373;
  margin: 5px 0;
	padding: 0;
  transition: 0.4s;
}

.change .bar1 {
  -webkit-transform: rotate(-45deg) translate(-9px, 6px);
  transform: rotate(-45deg) translate(-9px, 6px);
}

.change .bar2 {opacity: 0;}

.change .bar3 {
  -webkit-transform: rotate(45deg) translate(-8px, -8px);
  transform: rotate(45deg) translate(-8px, -8px);
}

#myTopnav{ width: auto; position: absolute; opacity: 0.9;}

#ikona {
    visibility: hidden;
}

.topnav a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 16px;
}

.topnav a:hover {
  background-color: grey;
  color: #acd373;
  border: 1px solid #39b54a;
}

.topnav a.active {
  background-color: grey;
  color: #acd373;
  overflow: hidden;
}
.topnav a:not(:first-child) {display: none;}
.topnav a.icon {
    float: right;
    display: block;}

  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }

h2 { color: #8560a8; width: 385px; height: auto; padding: 5px; text-align: center;font-size: 14px;}

p {padding: 10px; text-align:justify; font-size:18px;}

#logo{ 
z-index: 1400;
width: 170px; height:235px;
position: absolute;
float: right;
padding: 5px;
background-color: #acd373; color: black;
text-align: center;
border-radius: 0;
-webkit-border-radius: 0;
-moz-border-radius: 0;
box-shadow: 0 2px 2px #666666;
-webkit-box-shadow: 0 2px 2px #666666;
-moz-box-shadow: 0 2px 2px #666666;}


  #ukryj {
	width: 35px;
	height: 35px;
	background-image: url("xicon.png");
	border: 1px solid grey;
	margin-top: 0px; }

  #strona{ font: 12px Trebuchet MS, Lucida Sans Unicode, Arial, sans-serif; width: auto; height: auto;}
  #stopka {
    width: 385px;
    text-align: right;
    font-size: 12px;
    padding: 5px;
  }
  
  #glowna{width: 375px;
  font-size: 12px;}

  
.center {
  display: block;
  width: 390px;
  height: auto;
}
.centerkwiat {
display: block-inline;
margin-top: -10px;
margin-left:-325px;
margin-right: auto;
  width: 72px;
  height: 72px;
}

#fontMstrona { font-family: Georgia;
	text-align:justify;
	 font-size:18px;
	width: 365px;
	padding: 5px; }



#obrazmain{
margin-left: 0;
margin-right:0;
}

#obrazmain img{
margin-left: 0;
margin-right:0;
position: absolute;
width: 400px; height: 400px;
}
#scroll-image img {
  position: absolute;
  left: 400px;
}
}

</style>
</head>
<script>
startImageTransition();

function startImageTransition() {
  var images = document.getElementsByName("centerm");

  for (var i = 0; i < images.length; ++i) {
    images[i].style.opacity = 1;
  }

  var top = 1;

  var cur = images.length - 1;

  setInterval(changeImage, 3000);

  async function changeImage() {

    var nextImage = (1 + cur) % images.length;

    images[cur].style.zIndex = top + 1;
    images[nextImage].style.zIndex = top;

    await transition();

    images[cur].style.zIndex = top;

    images[nextImage].style.zIndex = top + 1;

    top = top + 1;

    images[cur].style.opacity = 1;
  
    cur = nextImage;

  }

  function transition() {
    return new Promise(function(resolve, reject) {
      var del = 0.01;

      var id = setInterval(changeOpacity, 10);

      function changeOpacity() {
        images[cur].style.opacity -= del;
        if (images[cur].style.opacity <= 0) {
          clearInterval(id);
          resolve();
        }
      }

    })
  }
}

function myFunction(c) {
 c.classList.toggle("change");
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

function myFunctionUkryj() {
  var x = document.getElementById("baner");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}


function myFunctionC(x) {
  x.classList.toggle("change");
}

</script>
<body>
<div id="gwiazdki">
<img src="images/mini_dzwonek_png.png" width="72px" height:auto; alt="campanula" class="centerkwiat"></img>
</div>
 <div id="strona">

<!--
	<div id="baner">
     		<h1>Comrot Design and IT Projects Development</h1>
     		<img src="images/dzwoneczek.jpg" width="288" height="145" alt="logo " ></img>
		</div>
		<div id="ukryj" onclick="myFunctionUkryj()" (click)="toggleShow()" type="checkbox" ></div>
-->	

<div class="topnav" id="myTopnav">
	<div class="container" onclick="myFunction(this)" a href="javascript:void(0);" class="icon">
  		<div class="bar1"></div>
  		<div class="bar2"></div>
  		<div class="bar3"></div>
	</div>
	<a href=""></a>	
	<a href="./indexhotel.php">Witaj</a>	
	<a href="./rooms.html">Pokoje i apartamenty</a>
  	<a href="./reservation.php">Rezerwacje</a>
  	<a href="./atractions.html">Atrakcje okolicy</a>
  	<a href="./gallery.php">Galeria</a>
  	<a href="./contact.html">Kontakt - Mapa</a>
    <a href="./telefon.html">+99999999999</a> 
  </div>
  <div id="ikona"><img src="muflon.png" width="200" height:auto; alt="muflon"; /></div>
<br></br>
<p class="title_main"><i>Wypoczynek i rekreacja w górskim klimacie</i></p>

<div id="obrazki_strona">

<div id="obrazki_strona">
<img id="obrazmain"  src="./images/mainfoto.png" width="1366px" height="413"; alt="hotel" class="center"></img>

</div>


</div><!-- obrazki strona glowna -->
<h2><i>Pokoje i Aparatamenty na wynajem</i></h2>

<p id="fontMstrona"><i>&nbsp; &nbsp; &nbsp;Zapraszamy do naszego domu, tutaj przenocujecie w luksusowym apartamencie. Możesz wynająć pokój, cały apartamenet składający się z 3 pokoi oraz łazienki, na parterze salon z kominkiem z osobną łazienką. Wypoczynek w naszej miejscowości to prawdziwa przyjemność, obudzisz się z widokiem gór Sowich pod Wielką Sową, budynek jest położony na wysokości około 550m npm.</i></p>


</div><!--strona-->
<div id="stopka"><p>e-mail: you@gmail.com </br>tel: (99999999)/p>
<p align="center">studio graphics <a class="stopkafree" href="http://author.com">MAuthor</a> Wroclaw 2022</p>
</div>

</body>
</html>
