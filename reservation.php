<script>
class Calendar {
    constructor(input, options) {
        this.now = new Date();
        this.day = this.now.getDate();
        this.month = this.now.getMonth();
        this.year = this.now.getFullYear();
        this.input = input;
        this.divCnt = null;
        this.divTable = null;
        this.divDateText = null;
        this.divButtons = null;

        const defaultOptions = {
            closeOnSelect : false,
            onDateSelect : (day, month, year) => {
                const monthText = ((month + 1) < 10) ? "0" + (month + 1) : month + 1;
                const dayText =  (day < 10) ? "0" + day : day;
                this.input.value = `${dayText}-${monthText}-${this.year}`;
            }
        };
        this.options = Object.assign({}, defaultOptions, options);
    }

    //metoda tworząca przyciski prev-next
    createButtons() {
        const buttonPrev = document.createElement("button");
        buttonPrev.innerText = "<";
        buttonPrev.type = "button";
        buttonPrev.classList.add("input-prev");
        buttonPrev.addEventListener("click", e => {
            this.month--;
            if (this.month < 0) {
                this.month = 11;
                this.year--;
            }
            this.createCalendarTable();
            this.createDateText();
        });
        this.divButtons.appendChild(buttonPrev);

        const buttonNext = document.createElement("button");
        buttonNext.classList.add("input-next");
        buttonNext.innerText = ">";
        buttonNext.type = "button";
        buttonNext.addEventListener("click", e => {
            this.month++;
            if (this.month > 11) {
                this.month = 0;
                this.year++;
            }
            this.createCalendarTable();
            this.createDateText();
        });
        this.divButtons.appendChild(buttonNext);
    }

    //metoda wypisująca nazwę miesiąca i roku
    createDateText() {
        const monthNames = ["styczeń", "luty", "marzec", "kwiecień", "maj", "czerwiec", "lipiec", "sierpień", "wrzesień", "październik", "listopad", "grudzień"];
        this.divDateText.innerHTML = monthNames[this.month] + " " + this.year;
    }

    //metoda tworząca tabele z kalendarzem
    createCalendarTable() {
        this.divTable.innerHTML = "";

        //tworzymy nazwy dni
        const tab = document.createElement("table");
        tab.classList.add("calendar-table");

        //tworzymy nagłówki dni
        let tr = document.createElement("tr");
        tr.classList.add("calendar-table-days-names");
        const days = ["Pon", "Wto", "Śro", "Czw", "Pią", "Sob", "Nie"];
        days.forEach(day => {
            const th = document.createElement("th");
            th.innerHTML = day;
            tr.appendChild(th);
        });
        tab.appendChild(tr);

        //pobieramy wszystkie dni danego miesiąca
        const daysInMonth = new Date(this.year, this.month+1, 0).getDate();

        //pobieramy pierwszy dzień miesiąca
        const tempDate = new Date(this.year, this.month, 1);
        let firstMonthDay = tempDate.getDay();
        if (firstMonthDay === 0) {
            firstMonthDay = 7;
        }

        //wszystkie komórki w tabeli
        const j = daysInMonth + firstMonthDay - 1;

        if (firstMonthDay - 1 !== 0) {
            tr = document.createElement("tr");
            tab.appendChild(tr);
        }

        //tworzymy puste komórki przed dniami miesiąca
        for (let i=0; i < firstMonthDay - 1; i++) {
            const td = document.createElement("td");
            td.innerHTML = "";
            tr.appendChild(td);
        }

        //tworzymy komórki dni
        for (let i = firstMonthDay-1; i<j; i++) {
            if(i % 7 === 0){
                tr = document.createElement("tr");
                tab.appendChild(tr);
            }

            const td = document.createElement("td");
            td.innerText = i - firstMonthDay + 2;
            td.dayNr = i - firstMonthDay + 2;
            td.classList.add("day");

            if (this.year === this.now.getFullYear() && this.month === this.now.getMonth() && this.day === i - firstMonthDay + 2) {
                td.classList.add("current-day")
            }

            tr.appendChild(td);
        }

        tab.appendChild(tr);

        this.divTable.appendChild(tab);
    };

    //podpinamy klik pod dni w tabeli kalendarza
    bindTableDaysEvent() {
        this.divTable.addEventListener("click", e => {
            if (e.target.tagName.toLowerCase() === "td" && e.target.classList.contains("day")) {
                if (this.options.closeOnSelect) {
                    this.hide();
                }
                this.options.onDateSelect(e.target.dayNr, this.month + 1, this.year);
            }
        });
    }

    //metoda ukrywa/pokazuje kalendarz
    toggleShow() {
        this.divCnt.classList.toggle("calendar-show");
    }

    //metoda pokazuje kalendarz
    show() {
        this.divCnt.classList.add("calendar-show");
    }

    //metoda ukrywa kalendarz
    hide() {
        this.divCnt.classList.remove("calendar-show");
    }

    //metoda inicjująca obiekt
    init() {
        //tworzymy div z całą zawartością
        this.divCnt = document.createElement("div");
        this.divCnt.classList.add("calendar");

        //tworzymy div z guzikami
        this.divButtons = document.createElement("div");
        this.divButtons.className = "calendar-prev-next";
        this.createButtons();

        //tworzymy div z nazwą miesiąca
        this.divDateText = document.createElement("div");
        this.divDateText.className = "date-name";
        this.createDateText();

        //tworzymy nagłówek kalendarza
        this.divHeader = document.createElement("div");
        this.divHeader.classList.add("calendar-header");

        this.divHeader.appendChild(this.divButtons);
        this.divHeader.appendChild(this.divDateText);
        this.divCnt.appendChild(this.divHeader);

        //tworzymy div z tabelą kalendarza
        this.divTable = document.createElement("div");
        this.divTable.className = "calendar-table-cnt";
        this.divCnt.appendChild(this.divTable);
        this.createCalendarTable();
        this.bindTableDaysEvent();

        //tworzymy wrapper dla input
        this.calendarWrapper = document.createElement("div");
        this.calendarWrapper.classList.add("input-calendar-cnt");
        this.input.parentElement.insertBefore(this.calendarWrapper, this.input);
        this.calendarWrapper.appendChild(this.input);
        this.calendarWrapper.appendChild(this.divCnt);

        this.input.classList.add("input-calendar");
        this.input.addEventListener("click", e => this.toggleShow());
        this.input.addEventListener("click", e => e.stopImmediatePropagation());
        this.divCnt.addEventListener("click", e => e.stopImmediatePropagation());
        document.addEventListener("click", e => this.hide());
    }
}
</script>
</head>
<script>
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
	<a href="./indexhotel.html">Witaj</a>	
	<a href="./rooms.html">Pokoje i apartamenty</a>
  	<a href="./reservation.html">Rezerwacje</a>
  	<a href="./atractions.html">Atrakcje okolicy</a>
  	<a href="./gallery.html">Galeria</a>
  	<a href="./contact.html">Kontakt</a>
  </div>
  <script>function myFunction(c) {
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
}</script>
<br></br>
<p class="title_main"><i>Wypoczynek i rekreacja w górskim klimacie</i></p>

<div id="obrazki_strona">

<img id="obrazmain" src="images/apartament1.png" width="455px" height:auto; alt="hotel" class="center"></img>
<img id="obrazmain" src="images/homesokolec.png" width="455px" height:auto; alt="hotel" class="center"></img>
<img id="obrazmain" src="images/domekold1.jpg" width="455px" height:auto; alt="hotel" class="center"></img>

</div><!-- obrazki strona glowna -->
<h2><i>Pokoje i Aparatamenty na wynajem u Magdy</i></h2>

<?php 
if (isset($_GET['addjoke']));
?>
<div id="reserve">
<a href="index.html"><< Back / Powrót na stronę główną</a>
<div id="kalendarz">
<h2>Rezerwacje</h2>
<form class="form" action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="post">
     <label>Rezerwacja online jest bezpłatna</label></br>
    <div class="form-row">
        <div class="col">
        <table border="1"><tbody>
			<tr><td><label>Nazwisko: </td><td><input type="text" class="name" id="customername" name="customername"></label></td></tr></br>
			<tr><td><label>Imię: </td><td><input type="text" class="name" id="customersurname" name="customersurname"></label></td></tr></br>
			<tr><td><label>Adres: </td><td><input type="text" class="name" id="customeraddress" name="customeraddress"></label></td></tr></br>
			<tr><td><label>e-mail: </td><td><input type="text" class="name" id="customeremail" name="emailklienta"></label></td></tr></br>
			<tr><td><label>telefon: </td><td><input type="text" class="name" id="customertel" name="telefonklienta"></label></td></tr></br>
			<tr><td><label>Data od: </td><td><input type="text" class="name" id="customerfrom" name="date_from"></label></td></tr></br>
			<tr><td><label>Data do: </td><td><input type="text" class="name" id="date_to" name="date_to"></label></td></tr></br>
			
			<tr><td><label>Ile noclegów: </td><td><input type="text" class="name" id="ile_dni" name="ile_dni"></label></td></tr></br>
            <tr><td><label>Data: </td></td><td><input type="text" class="input-demo" id="demoInput" name="demoInput"></label></td></tr>
            </tbody></table>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <button class="button" type="button" id="enableDemo1">Ustaw datę przyjazdu wg. kalendarza</button>
        </div>
    </div>
    <div class="col">
     <button class="button" type="button" id="ustawDataTo" onclick="myFunction()">Ustaw Datę Końcową pobytu</button>
     </br>
     </div>
     <div class="col">
    
     <input type="submit" value="Zarezerwuj pokój" />
    
     </div>
</form>
</div><!-- reserve -->
<script>
function myFunction() {
  const btn = document.querySelector("#ustawDataTo");
    btn.addEventListener("click", e => {
        btn.disabled = true;
        const input = document.querySelector("#date_to");
       
        
        const cal = new Calendar(input, {
            closeOnSelect : true,
            onDateSelect(day, month, year) {
                const dayText = (day<10)?"0"+day : day;
                const monthText = (month<10)?"0"+month : month;
                const date = dayText + "-" + monthText + "-" + year;
                const newdate = year + "-" + monthText + "-" + dayText;
                input.value = newdate;
					document.getElementById('date_to').value=newdate; 
            }
        });
        cal.init();
       
        document.getElementById("#date_to").innerHTML =  input.value;
        });
      
}
</script>

<script>
{
    const btn = document.querySelector("#enableDemo1");
    btn.addEventListener("click", e => {
        btn.disabled = true;
        const input = document.querySelector("#demoInput");
       
        
        const cal = new Calendar(input, {
            closeOnSelect : true,
            onDateSelect(day, month, year) {
                const dayText = (day<10)?"0"+day : day;
                const monthText = (month<10)?"0"+month : month;
                const date = dayText + "-" + monthText + "-" + year;
                const newdate = year + "-" + monthText + "-" + dayText;
                input.value = newdate;
					document.getElementById('customerfrom').value=newdate; 
            }
        });
        cal.init();
       
        document.getElementById("#customerfrom").innerHTML =  input.value;
        });
      
    
}
</script>

<!-- dodawanie wpisu rezerwacji do bazy danych -->
<?php
$dbcnx = @mysql_connect('localhost', 'root', 'root');
if(!$dbcnx) { 
    exit('<p>Problem podczas połączenia z serwerem apache!</p>');
}

if(!@mysql_select_db('hotel')) {
    exit('<p>Nie ma takiej bazy danych!</p>');
} 
if(isset($_POST['customername'])){
$nazwisko = $_POST['customername'];
$imie = $_POST['customersurname'];
//$adres = $_POST[''];
//$nr_karty_kredt = $_POST[''];
$tel = $_POST['telefonklienta'];
$ile_dni = $_POST['ile_dni'];
$data_od = $_POST['date_from'];
$data_do = $_POST['date_to'];

$sql = "INSERT INTO reservations SET date_from='$data_od', date_to='$data_do', klient='$nazwisko', customername='$imie',telefonklienta='$tel', ile_dni='$ile_dni', emailklienta='$imie', zarezerwowany='TRUE'  "; 
if(@mysql_query($sql)){
echo '<p><font color="#FF0000">Twoje rezerwacja i dane personalne zostały zapisane!</font></p>';
} 
else {
echo '<p>Błąd podczas zapisu rezerwacji' . mysql_error() . '</p>';
	}
}
?>
 </div>
<?php 
$dbcnx = @mysql_connect('localhost', 'root', 'root');
if(!$dbcnx) { 
    exit('<p>Problem podczas połączenia z serwerem apache!</p>');
}

if(!@mysql_select_db('hotel')) {
    exit('<p>Nie ma takiej bazy danych!</p>');
}


$authors = @mysql_query('SELECT * FROM reservations');

while($autor = mysql_fetch_array($authors)){

$id = $autor['id'];
$klientname = $autor['customername'];
$dataf = $autor['date_from'];
$datat = $autor['date_to'];
$pok = $autor['nr_room'];
$zarezerw = $autor['zarezerwowany'];
$zaplac = $autor['zaplacony'];
$money = $autor['oplata'];
$customer = $autor['klient'];
$nr_cust = $autor['nr_klienta'];
$telklienta = $autor['telefonklienta'];
$email = $autor['emailklienta'];
$employer = $autor['pracownik'];
$days = $autor['ile_dni'];

echo "<li><tr><td>ID: $id" . " " . "</td><td>Data od: $dataf" . " " . "</td><td> do dnia: $datat" . " " . "</td><td>Nr pokoju: $pok" . " " . "</td><td>$zarezerw" . " " . "</td><td>$zaplac" . " " . "</td><td>$money" . " " . "</td><td>Nazwisko: $customer" . " " . "</td><td>$nr_cust" . " " . "</td><td>$email" . " " . "</td><td>Tel. $telklienta" . " " . "</td><td>$employer" . " " . "</td><td>Ile dni: $days" . " " . "</td></tr></li>";

}


?>
<h3><i>1. Apartament 3 pokoje na 1 piętrze z tarasem 1 łazienka - 1000 pln/dzień</i><p>&nbsp;</p><a href="rezerwuj.php">Rezerwacja</a></h3>
<h3><i>2. Apartament na parterze z osobną łazienką - 1200 pln/dzień</i><p>&nbsp;</p><a href="rezerwuj.php">Rezerwacja</a></h3>
<h3><i>3. Pokój 2 osobowy z łazienką - 100pln/osobę/noc</i><p>&nbsp;</p><a href="rezerwuj.php">Rezerwacja</a></h2>
<h3><i>4. Pokój 2 osobowy z łazienką - niedostępny aktualnie</i><p>&nbsp;</p><a href="rezerwuj.php">Rezerwacja</a></h2>
<h3><i>5. Pokój 2 osobowy z łazienką - niedostępny aktualnie</i><p>&nbsp;</p><a href="rezerwuj.php">Rezerwacja</a></h2>
<h3><i>6. Aneks dla gości - mini-salon - parter - od stycznia 2023 - nieodpłatny z tv canal+</i><p>&nbsp;</p><a href="rezerwuj.php">Rezerwacja</a></h2>

<img id="obrazmain" src="images/apartament3.png" width="225px" height:auto; alt="hotel" class="center"></img>
<img id="obrazmain" src="images/apartament4.png" width="225px" height:auto; alt="hotel" class="center"></img>
<img id="obrazmain" src="images/apartament5.png" width="225px" height:auto; alt="hotel" class="center"></img>
<script type="text/javascript">

<p id="fontMstrona"><i>&nbsp; &nbsp; &nbsp;Zapraszamy do naszego domu, tutaj przenocujecie w luksusowym apartamencie. Możesz wynająć pokój, cały apartamenet składający się z 3 pokoi oraz łazienki, na parterze salon z kominkiem z osobną łazienką. Wypoczynek w naszej miejscowości to prawdziwa przyjemność, obudzisz się z widokiem gór Sowich pod Wielką Sową, budynek jest położony na wysokości około 550m npm. Widok na schronisko Orzeł, Sokolec, Ludwikowice Kłodzkie - Sowina.</i></p>
  
</div><!--strona-->
