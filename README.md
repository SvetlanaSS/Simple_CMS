# Simple_CMS

### Attila Cederbygd, Svetlana Slyusareva, Martin Blomgren, FEND16, kurs CMS, PHP & MySQL

En bloggliknande applikation skriven i PHP och MySQL som fungerar som ett mindre CMS där man kan lägga till, redigera och ta bort innehåll.


#### Github Repo
Länk till GitHub [här](https://github.com/SvetlanaSS/Simple_CMS) :v:


#### Applikationen syfte och dess funktionalitet

Funktionalitet:

* Man kan se alla posts samt se när innehållet är skapat och av vem innehållet är skapat.
* Registrera sig i appen. Man kan inte regga sig med samma användarnamn eller email flera gånger.
* Logga in och logga ut med olika användare som har olika roller (admin och vanlig användare).
* Lägga till nya posts.
* Redigera existerande posts.
* Ta bort existerande posts.
* Bara den användaren som har skapat en viss post kan redigera eller ta bort den. Alternativt så kan man ta bort den om man har admin-rättigheter.
* En användare kan gilla på varje post.
* En användare kan inte rösta på samma post flera gånger.
* En användare kan ta bort sin röst från en post.

#### Arbetsprocess

Vi började med att designa databasen med tre tabeller: post, user och like_count
Efter lite diskussioner skapade vi en filstruktur som vi höll till oss, med en admin-folder och en rootfolder
med olika partials och sedvanliga js och css-mappar. 

Därefter skapade vi klasser som hade olika fokus och kunde inkluderas i olika filer.
En databas-klass hade hand om querys till databasen. Den kunde inkluderas sen till en klass Articles som hämtar poster och returnerar arrayer med data. En tredje ArticleTemplate klass har hand om rendera innehållet so HTML.

Det mesta av koden sköttes av php, JavaScript användes bara till att uppdatera likes när användaren lajkar eller unlajkar. AJAX-anropet går till like-post i adminfoldern som returnerar JSON-sträng med like antal efter query till databasen. Så JavaScript hämtar bara efter att uppdatering skett i datatabsen.

#### Uppdelning av arbete

Vi delade upp arbetet på detta sätt:

#####Svetlana
* att visa sidan för inloggade användare
* att visa min sida
* lägga till post
* redigera och ta bort posts

#####Attila
* att registrera nya användare
* likes
* första sidan med alla posts
* enskild blogginlägg visning

#####Martin
* login
* logout
* admin

#### Till nästa gång

##### Funktionalitet som inte hanns med
* HTML-editor för att lägga till / editera
* Kunna ladda upp bilder

#### Teknologier vi använt
* PHP
* MySQL
* HTML
* JavaScript
* AJAX
* CSS
* Bootstrap
* Photoshop
