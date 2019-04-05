<div class="greeter"><div class="greeter-message"><h1>Impressum</h1></div></div>
<br>
<p>Copyright (c) by J******* V****, Luzius Kölling</p>
<p>Kontakt: J*******.V*****[at]fh-erfurt.de, Luzius.Koelling[at]fh-erfurt.de</p>
<br>
<h3>Quellen</h3>
<p>Allgemein</p>
<a href="https://www.w3schools.com/">https://www.w3schools.com/</a><br>
<a href="http://php.net/manual/">http://php.net/manual/</a><br>
<br>
<p>Login und Registrierung</p>
<a href="https://www.php-einfach.de/experte/php-codebeispiele/loginscript/angemeldet-bleiben/">
https://www.php-einfach.de/experte/php-codebeispiele/loginscript/angemeldet-bleiben/</a><br>
<a href="https://www.php-einfach.de/experte/php-codebeispiele/loginscript/">
https://www.php-einfach.de/experte/php-codebeispiele/loginscript/</a><br>
<a href="http://www.php-kurs.info/tutorial-login_mit_mysql_datenbank.html">
http://www.php-kurs.info/tutorial-login_mit_mysql_datenbank.html</a><br>
<br>
<div class="greeter"><div class="greeter-message"><h1>Dokumentation</h1></div></div>
<br>
<div class="text-container">
<h3>Inhalt</h3>
<p>
Der fiktive Kunde „Comet Pizza“ ist ein Lieferdienst für Speisen wie Pizza, Burger,
 etc. und möchte mit einer Website sein Sortiment anbieten, auf besondere Aktionen 
 hinweisen und Bestellungen darüber ermöglichen. Des Weiteren sollen Informationen 
 zum Unternehmen abrufbar sein, wie z.B. Jobangebote oder Franchisegeber.</p>
<br>
<p>
Die Website erlaubt es dem Nutzer sich das Sortiment des Lieferdienstes anzusehen 
und zu Bestellen. Dazu erstellt er ein Konto mit allen nötigen Informationen, welche
 später auch noch bearbeiten werden können. Zudem ist es ihm auch möglich sein Konto
 zu löschen. Der angemeldete Benutzer kann verschiedene Produkte in verschiedenen
 Mengen und Größen seinem Warenkorb hinzufügen. Schließlich erfolgt ab der
 Warenkorbseite der Bestellvorgang, bei dem er seine Zahlungsoption festlegt, 
 besondere Instruktionen geben kann sowie seine Lieferadresse nochmal überprüft bis 
 er letztendlich auf „Jetzt Bestellen“ klickt und den Auftrag an den Lieferdienst 
 übergibt.
</p>
<br>
<h3>Recherche</h3>
<li>Aktuelle Angebote, Blickfänger auf der Startseite, aufgeräumtes Design sowie 
eine direkte Einsicht des Sortiments, allerdings unnötig große Introbilder in den 
Shopseiten bei <a href="https://www.world-of-pizza.de/">
world-of-pizza.de</a></li>
<img src="assets/images/wop_shoppage.png"></img><br><br>
<li>Assoziationen von natürlichen Materialien erwecken in der Gestaltung und sehr 
schöne Produktbilder bei <a href="https://www.world-of-pizza.de/">dominos.de</a></li>
<img src="assets/images/Dominos_speisekarte.jpg"></img><br><br>
<li>Kombination von aufgeräumten Design und Verwendung von großflächigen Bildern mit 
natürlichen Materialien, präsenter Angebots-Slider, allerdings nicht so schöne Produktbilder bei 
<a href="https://www.freddy-fresh.de/">freddy-fresh.de</a></li>
<img src="assets/images/freddy_start.png"></img><br><br>
<li>Allgemein: Die Verwendung der Farben Rot und Grün harmoniert gut mit dem Thema „Speisen“</li>
<br>
<h3>Seitenlayout und -struktur</h3>
<br>
<li>Allgemeines Seitenlayout mit wechselndem Seiteninhalt</li>
<img src="assets/images/wireframe_layout.png"></img><br><br>
<br>
<li>Seitenlayout Startseite mit Angebots-Slider und Informationen zur Filiale</li>
<img src="assets/images/wireframe_start.png"></img><br><br>
<br>
<li>Seitenlayout Produktübersicht</li>
<img src="assets/images/wireframe_shopview.png"></img><br><br>
<h3>Sitemap</h3>
<br>
<ul>
    <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>">Index</a>
        <ul>
            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=jobs">Jobangebote</a></li>
            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=franchise">Franchise Informationen</a></li>
            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=Pizza">Pizza Sortiment</a>
                <ul>
                    <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=produkt&id=2">Produktansicht, z.B. Salamipizza</a>
                        <ul>
                            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=login">Login (falls nicht angemeldet)</a></li>
                            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=cart">Weiterleitung Warenkorb (nach Klick auf "In den Warenkorb")</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=Burger">Burger Sortiment</a>
                <ul>
                    <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=produkt&id=3">Produktansicht, z.B. Quarterpounder</a>
                        <ul>
                            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=login">Login (falls nicht angemeldet)</a></li>
                            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=cart">Weiterleitung Warenkorb (nach Klick auf "In den Warenkorb")</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=Burritos">Burritos Sortiment</a>
                <ul>
                    <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=produkt&id=5">Produktansicht, z.B. Macho Burrito</a>
                        <ul>
                            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=login">Login (falls nicht angemeldet)</a></li>
                            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=cart">Weiterleitung Warenkorb (nach Klick auf "In den Warenkorb")</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=Pasta">Pasta Sortiment</a>
                <ul>
                    <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=produkt&id=6">Produktansicht, z.B. Lasagne</a>
                        <ul>
                            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=login">Login (falls nicht angemeldet)</a></li>
                            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=cart">Weiterleitung Warenkorb (nach Klick auf "In den Warenkorb")</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=Salat">Salat Sortiment</a>
                <ul>
                    <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=produkt&id=4">Produktansicht, z.B. Ceasar Salat</a>
                        <ul>
                            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=login">Login (falls nicht angemeldet)</a></li>
                            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=cart">Weiterleitung Warenkorb (nach Klick auf "In den Warenkorb")</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=Getränke">Getränke Sortiment</a>
                <ul>
                    <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=produkt&id=14">Produktansicht, z.B. Coca Cola</a>
                        <ul>
                            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=login">Login (falls nicht angemeldet)</a></li>
                            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=cart">Weiterleitung Warenkorb (nach Klick auf "In den Warenkorb")</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=login">Login</a>
            <ul>
                <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=Pizza">Weiterleitung Pizza Sortiment nach Login</a></li>
                <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=registration">Registrierung</a></li>
            </ul>
        </li>
        <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=userpage">Benutzerseite</a></li>
                <ul>
                    <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=login">Login (falls nicht angemeldet)</a></li>
                    <li>Konto löschen (nicht funktional)</li>
                </ul>
            </li>
            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=cart">Warenkorb</a></li>
                <ul>
                    <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=login">Login (falls nicht angemeldet)</a></li>
                    <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=checkout">Zur Kasse gehen</a></li>
                    <li>Konto löschen (nicht funktional)</li>
                </ul>
            </li>
            <li>Über uns (nicht funktional)</li>
            <li><a href="<?echo $_SERVER['SCRIPT_NAME'];?>?p=impressum">Impressum</a></li>
            <li>Kontakt (nicht funktional)</li>
            <li>Social Media Buttons (nicht funktional)</li>
        </ul>
    </li>
</ul>
<h3>Design</h3>
<p>Der Name „Comet Pizza“ ging einher mit dem Entwurf des Logos. Das Logo sollte idealerweise rund sein, 
    da es sich so gut in verschiedene Inhalte einpasst und auch für spätere Firmengegenstände wie beispielsweise 
    ein Mitarbeiterhemd mit Logo-Stickerei geeignet sein sollte. Die Form eines Kometen war somit passend und sollte 
    Assoziationen wie schnell und heiß in Bezug auf die Pizza erwecken. Die Farbgestaltung hat sich einerseits an 
    den passenden Farben der Recherche orientiert und der Idee den Kometen als Pizza darzustellen, mit roter Füllung 
    welche Tomatensauce darstellt und einem hellbraunen Schweif der den Teig Rand assoziiert.
</p>
<p>Das Design greift das vom Firmennamen gegebene Weltraumthema auf. So hat der Header einen animierten 
    Sternenhimmel-Hintergrund in den sich das Comet Pizza Logo passend einfügt. Weiterhin werden dem Nutzer 
    auf der Startseite die Themen Weltraum und Pizza verknüpfende Bilder präsentiert. Im Content Bereich ist die 
    Seite ansonsten schlicht gestaltet um so die Produkt-Bilder in den Vordergrund zu rücken. Hierbei spielten auch 
    die in der Recherche als angenehm empfundenen Aspekte eine Rolle. Die bestimmende Farbkombination ist hier 
    Tomatensaucen-Rot mit Nachthimmel-Blau, wieder Verweise auf die beiden das Design leitenden Themen. Grundsätzlich 
    zeigt sich sie Seite modern mit klaren Kanten und Ecken die Seriosität und Geschmack vermitteln. Die Schrift ist 
    einfach gehalten, sie soll gut lesbar sein und den aufgeräumten Charakter des Designs unterstützen.
</p>
<h3>Datenbank</h3>
<p>
    EER-Modell
    <img src="assets/images/eer-model.png"></img>
</p>
<h3>Funktionalität</h3>
<h5>Header</h5>
<p>
    Der Header enthält das Firmenlogo, welches bei einem Klick darauf wieder zur Startseite leitet. Außerdem 
    verweist er zu den Speisekarten, sortiert nach Kategorien, des Weiteren zu den Benutzerelementen Login, 
    Benutzerseite und Warenkorb. Das Logo des Logins ändert sich zu einem Logout Logo sobald man eingeloggt ist, 
    darüber ist dann der Logout möglich.
</p>
<h5>Footer</h5>
<p>Der Footer verweist zu Informationsseiten wie „Über uns“, Impressum, Kontakt und zu Social Media Seiten. Aktuell 
    ist nur das Impressum und Kontakt implementiert.
</p>
<h5>Startseite</h5>
    <p>Auf der Startseite ist neben den überall verfügbaren Header und Footer Elementen eine Slideshow mit Weiterleitung 
        zu aktuellen Angeboten oder Hinweisen auf Rabattaktionen verfügbar. Aktuell enthält diese Verweise auf den 
        Klassiker „Pizza Salami“ und das Pizza Sortiment. Daneben sind zwei Info Elemente präsent, welche einerseits 
        zu den aktuellen Jobangeboten und andererseits zu einer Informationsseite über das Franchise weiterleiten.
</p>
<img src="assets/images/screenshot1.png"></img><br><br>
<h5>Speisekarten</h5>
<p>Auf den Sortimentsseiten sind die Produkte welche zum Kauf stehen mit Mindestpreis zu sehen und können zur näheren 
    Ansicht und zum Kauf angeklickt werden. Des Weiteren stehen Filter-Optionen zur Verfügung mit denen sich Produkte 
    mit bestimmten Schlagworten anzeigen lassen.
</p>
<img src="assets/images/screen_shopview.png"></img><br><br>
<h5>Produktseiten</h5>
<p>Auf den Produktseiten können Details zum Produkt gelesen werden, die gewünschte Größe und Anzahl können ausgewählt werden.
    Dabei wird der angezeigte Preis je nach Auswahl sofort angepasst. In den Warenkorb kann das Produkt nur gelegt werden
     wenn der Nutzer angemeldet ist.
</p>
<img src="assets/images/screenshot2.png"></img><br><br>
<h5>Warenkorb</h5>
<p>Die Warenkorbseite ist nur für angemeldete Kunden sichtbar. Gespeicherte Produkte aus vergangenen Anmeldungen werden im 
    Warenkorb gespeichert und die angefangene Bestellung kann fortgesetzt werden. Es können alle gespeicherten Produkte mit 
    Größe und Preis eingesehen werden, ebenso können diese einzeln oder alle gelöscht werden. Auch der Gesamtpreis der 
    Bestellung ist ersichtlich. Unten kann zur Kasse gegangen werden und somit zum Bestellabschluss.
</p>
<img src="assets/images/screenshot3.png"></img><br><br>
<h5>Bestellabschluss</h5>
<p>Beim Bestellabschluss können noch einmal die bestellte Menge und Gesamtpreis, sowie Lieferadresse überprüft werden. Dann 
    kann die Zahlungsmethode gewählt werden und bei Bedarf eine Bemerkung zur Bestellung gemacht werden. Durch einen Klick auf 
    "Jetzt Bestellen" wird man zum gewählten Zahlungspartner weitergeleitet, ist aktuell nicht implementiert.
</p>
<img src="assets/images/screenshot4.png"></img><br><br>
<h5>Registrierung</h5>
<p>Auf der Registrierungsseite sind Pflichtfelder gekennzeichnet, bei der Email Adresse wird geprüft ob sie noch nicht 
    registriert ist und das Passwort muss zur Sicherheit zweimal eingegeben werden. Falls einer dieser Punkte nicht erfüllt ist, 
    erscheint eine Warnung, die bereits eingegebenen Daten die keine Fehler haben bleiben erhalten. Das Passwort wird als Hashwert 
    in der Datenbank gespeichert. Bei den persönlichen Daten des Kunden wird automatisch der Anfangsbuchstabe in einen Großbuchstaben 
    gewandelt. Nach der Registrierung wird man zur Anmeldung verwiesen und muss sich einloggen. 
</p>
<img src="assets/images/screen_register.png"></img><br><br>
<h5>Login</h5>
<p>Beim Login kann man sich anmelden und dabei die Option „Angemeldet bleiben“ wählen, sodass man sich nach Schließen und erneutem 
    Öffnen des Browsers nicht erneut einloggen braucht, bis man sich ausloggt oder der Cookie abgelaufen ist. Falls man noch kein 
    Konto hat gelangt man hier zur Registrationsseite.
</p>
<img src="assets/images/screen_login.png"></img><br><br>
<h5>Benutzerseite</h5>
<p>Auf der Benutzerseite kann man seine persönlichen Daten einsehen und ändern, sie werden aus der Datenbank in die Felder geladen. 
    Bei Passwort und Email gelten dieselben Restriktionen wie bei der Registrierung. Auch kann das Konto gelöscht werden, diese 
    Funktion ist aktuell allerdings nicht implementiert.
</p>
<img src="assets/images/screenshot5.png"></img><br><br>
<h5>Kontaktseite</h5>
<p>Auf der Kontaktseitekann über ein mehrseitiges Formular eine Nachricht an den Lieferdienst gesendet werden. Falls ein Nutzer 
    angemeldet ist, braucht er seinen Namen und Emailadresse nicht anzugeben, diese werden automatisch an das Session-Array übergeben.
</p>
<h5>Suche</h5>
<p>Es gibt im Header eine Suchleiste mit der nach Produkten gesucht werden kann. Nachdem man diese benutzt hat gelangt man auf die Seite 
mit den Ergebnissen, auf welcher man eine erweiterte Suche, mit der Auswahl der Suchmethode, ausführen kann. Die "Und" Variante ist 
funktionstüchtig, die "Oder" Variante ist aktuell noch nicht ganz ausgereift.
<br>
<h3>Rollenmodell</h3>
<img src="assets/images/rollenmodell_deliveryservice.png"></img><br><br>
<h3>Flussbild für Dateneingabe</h3>
<img src="assets/images/dataflowchart.png"></img><br><br>
<h3>Herausforderungen</h3>
<ul>
<li>Zu Beginn haben wir den Ansatz verfolgt, die Interaktion mit der Datenbank mit models zu realsisieren. Das konnten wir allerdings 
aufgrund mangelnder Zeit und Verständnis nicht konsequent umsetzen, gerade bei der Dateneingabe gab es Probleme.</li>
<li>Ein weiteres Problem in dem Zusammenhang war, das zu Bildungszwecken Mysqli gewählt wurde, in Tutorials und auf Infoseiten aber 
oft PDO genutzt wurde, was in einigen Hinsichten unkomplizierter zu sein scheint. Es war teilweise schwierig das Vorgehen in Mysqli 
umzuwandeln, gerade in Bezug auf die models.</li>
<h3>Besonderheiten</h3>
<p>
    <li>Eine Navigation mit mehr als einer Ebne ist in der Darstellung für Mobilgeräte, bzw. im responsiven Design zu finden.</li>
    <li>Header Design unflexibel</li>
    <li>Elemente im Warenkorb einzeln aufgezählt, keine Mengen gleicher Produkte</li>
    <li>Benutzung von AJAX bei Preisaktualisierung auf productview unnötig</li>
    <li>Die Verwendung von bootstrap war anfangs nur als Übung gedacht und um schnell ein einheitliches Design zu erhalten, welches 
    später zu ersetzen gedacht war. Aber aufgrund von Zeitmangel wurde es nicht durch einen eigenen Style ersetzt.</li>
</p>
<br>
<h3>Projektmanagement</h3>
<br>
<h5>Arbeitsteilung</h5>
<h6>Luzius Kölling</h6>
<p>
    <li>Grunddesign</li>
    <li>Logo</li>
    <li>Datenbank</li>
    <li>Datenbankanbindung, Abfragen und Eingebungen</li>
    <li>Login und Registrierung</li>
    <li>Kontaktseite</li>
    <li>Benutzerseite</li>
    <li>Bestellung/Warenkorbeinträge in Datenbank einfügen</li>
</p>
<h6>J******* V****</h6>
<p>
    <li>startpage und Unterseiten</li>
    <li>Layout und teilweise Funktionalität productview</li>
    <li>Layout und Funktionalität shopview</li>
    <li>Layout und Funktionalität shoppingcart</li>
    <li>Layout und Funktionalität checkout</li>
    <li>Seitenstruktur und Responsive Design</li>
</p>
</div>
