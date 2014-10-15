<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <link href='https://fonts.googleapis.com/css?family=Chivo:900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="stylesheets/stylesheet.css" media="screen">
    <link rel="stylesheet" type="text/css" href="stylesheets/pygment_trac.css" media="screen">
    <link rel="stylesheet" type="text/css" href="stylesheets/print.css" media="print">
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <title>Příručka k NCIP toolkitu</title>
  </head>

  <body>
    <div id="container">
      <div class="inner">

        <header>
          <h1>CPK-standardy</h1>
          <h2>Standardy pro Centrální portál knihoven</h2>
        </header>

        <section id="downloads" class="clearfix">
          <a target="blank" href="https://github.com/moravianlibrary/CPK-standardy/zipball/master" id="download-zip" class="button"><span>Download .zip</span></a>
          <a target="blank" href="https://github.com/moravianlibrary/CPK-standardy/tarball/master" id="download-tar-gz" class="button"><span>Download .tar.gz</span></a>
          <a target="blank" href="https://github.com/moravianlibrary/CPK-standardy" id="view-on-github" class="button"><span>View on GitHub</span></a>
        </section>

        <hr>

        <section id="main_content">

	  <h1>O projektu</h1>

	  <h2>Specifikace projektu</h2>
        	<p>Tento projekt byl založen jako místo pro vývoj a zpřístupnění standardů umožňujících zapojení knihovních systémů do Centrálního portálu knihoven nebo do jiných portálů založených na podobných principech jako CPK. Všechny informace jsou uloženy na wiki tohoto projektu, připomínky lze vkládat do issues.</p>

	  <h2>Standardy používané projektem</h2>
		<p>Projekt se zaměřuje na efektivní meziknihovní komunikaci za použití <a target="blank" href="http://www.niso.org/home/">NISO</a> standardu pod názvem <a target="blank" href="http://www.niso.org/workrooms/ncip">NCIP</a> (<a target="blank" href="http://www.ncip.info/introduction-to-ncip.html">zde oficiální stránky</a>).</p>
		<p>Vývoje a implementace NCIP standardu se ujala organizace <a target="blank" href="http://www.extensiblecatalog.org/">eXtensible Catalog</a>. S ohledem na vývojáře knihovních služeb pak na <a target="blank" href="https://code.google.com/p/xcncip2toolkit/">google code</a> založila verzovací systém, kde všechny knihovny, mající zájem na rozvoji a kompatibilitě NCIP, sdílejí svůj postup.</p>
		<p>Projekt dostal pod záštitou eXtensible Catalog název "XC NCIP Toolkit version 2.x of NCIP Protocol". Odtud vzniklo zkrácené pojmenování projektu XCNCIP2Toolkit.</p>
		<p>XCNCIP2Toolkit je ke stažení <a target="blank" href="https://code.google.com/p/xcncip2toolkit/source/checkout">zde</a> a prozatím obsahuje 6 konektorů. Konektory (z angl. Connector) slouží k tomu, aby knihovní elektronický systém dokázal rozpoznat NCIP zprávu, správně ji použít a odeslat zpětnou vazbu odesílateli, která se strukturalizuje dle <a target="blank" href="http://www.niso.org/schemas/ncip/v2_02/ncip_v2_02.xsd">schématu</a> definovaného standardem.</p>
		<p>Zde uvádíme příklad, jak by mohla taková meziknihovní NCIP komunikace vypadat:</p>

	  <h3>NCIP dotaz:</h3>
	  <?= include "messages/LookupAgency.html" ?>
		<p>V této NCIP zprávě žádáme o informace o knihovně, které dotaz posíláme. To je zřejmé z tagu <code>&lt;ns1:LookupAgency&gt;</code>, která je, jako každá jiná NCIP služba, definovaná v <a target="blank" href="http://www.niso.org/apps/group_public/download.php/6517/z39-83-1-2008.pdf#page=17">oficiální dokumentaci</a>.</p>
	  </p>Pomocí tagu <code>&lt;ns1:AgencyId&gt;</code> se představujeme a díky tagu <code>&lt;ns1:AgencyElementType&gt;</code> je možno blíže specifikovat, co si přejeme vědět.</p>

	  <h3>NCIP odpověď:</h3>
	  <?= include "messages/LookupAgencyResponse.html" ?>
		<p>Knihovna, jíž jsme dotaz poslali, nám poslala odpověď, ve které se zmiňuje o svém úplném názvu v mezinárodním formátu a také o své adrese.</p>
		<p>Ačkoliv jsme žádali o mnohem více informací, dotazovaná knihovna uznala za vhodné zveřejnit pouze tyto elementární informace, nutné k navázání kontaktu.</p>
		<p>Později se dozvíme, jak lze přímo v toolkitu nastavit informace, které bude spravovaná knihovna na tento dotaz vracet.</p>

	  <h1 id="instalace">Instalace toolkitu</h1>
		<p>Vzhledem k tomu, že si přejeme, aby byly naše služby k dispozici pokud možno nonstop, měli bychom si obstarat výkonný server, na kterém by XCNCIP2Toolkit běžel. Servery se provozují zejména na linuxovém jádru a proto se zaměříme na instalaci pro Linux.</p>

	  <h2 id="stazeni">Stažení prerekvizit</h2>
		<p>Všechny námi použité programy jsou doporučené. Jistě cesta povede i jinudy, ale zde se zaměříme na postup, který jsme úspěšně použili při vývoji Aleph konektoru.</p>

	  <h3>Aktuální verze xcncip2toolkit</h3>
		<p>K obstarání toolkitu máte v zásadě dvě možnosti. Buďto si jej stáhnete <a target="blank" href="https://code.google.com/p/xcncip2toolkit/source/checkout">z google code</a> nebo využijete služeb GitHub, Inc. a naklonujete si <a target="blank" href="https://github.com/moravianlibrary/xcncip2toolkit">aktuální verzi</a> Moravské zemské knihovny v Brně, která je mimo jiné autorem velké části Aleph konektoru.</p>

	  <h3>Apache Maven</h3>
		<p>Pro správu tohoto Java projektu je použit <a target="blank" href="http://maven.apache.org/">Maven</a>. (my jsme použili <a target="blank" href="http://archive.apache.org/dist/maven/binaries/apache-maven-3.0.4-bin.tar.gz">Maven 3.0.4</a>)</p>
		<p>Jelikož je zde od toho, aby stahoval další software potřebný k bezproblémovému běhu toolkitu, tak se bez jeho úspěšného buildování neobejdeme a náš toolkit nám s největší pravděpodobností ani nepojede.</p>

          <h3>Eclipse IDE for Java EE Developers</h3>
		<p>Aleph konektor jsme vyvíjeli za pomocí <a target="blank" href="https://www.eclipse.org/downloads/packages/eclipse-ide-java-ee-developers/lunasr1">Eclipse Luna</a>.</p>
		<p>K dosažení nejvyšší efektivity jsme použili několikero zpětně doinstalovaných pluginů, dostupných ke stažení v menu <code>Help -&gt; Install New Software...</code></p>
		<p>Které rozšíření se rozhodnete použít záleží čistě na Vašich osobních/firemních preferencích.</p>

	  <h3>Apache Tomcat</h3>
		<p>Jako Java Servlet jsme se rozhodli použít <a target="blank" href="http://tomcat.apache.org/download-80.cgi">Tomcat 8.0</a>, jehož binární soubory jsme pouze stáhli a extrahovali do složky, kam běžně ukládáme software třetích stran. Dobrým zvykem je složka 'opt' v kořenovém adresáři: <code>/opt/tomcat</code></p>

	  <h2 id="konfigurace">Konfigurace vývojového prostředí</h2>
		<p>V této části instalace nás čeká buildování pomocí Maven, import Maven projektu do Eclipse a nastavení Servletu v Eclipse, aby bylo možné elegantně ladit chyby.</p>

	  <h3>Maven buildování</h3>
		<p>Projekt je zapotřebí zbuildovat v adresáři <code>xcncip2toolkit/core/trunk</code> příkazem <code>mvn install</code>. Jestliže build není úspěšný, upravíme příkaz tak, aby Maven přeskočil testy, tedy <code>mvn install -Dmaven.test.skip</code>. V našem případě se build povedl až napotřetí, opětovným spuštěním <code>mvn install</code>.</p>
		<p>Čeká nás ještě jeden build a to na adrese <code>xcncip2toolkit/connector/aleph/20/trunk</code>. Postupujeme stejně - zde by měly testy projít bez problémů.</p>

	  <h3>Import do Eclipse</h3>
		<p>Otevřeme nový workspace, nevytváříme nový projekt, pouze naimportujeme <code>xcncip2toolkit/core/trunk</code> a <code>xcncip2toolkit/connector/aleph/20/trunk</code>.</p>
		<p>Po úspěšném importu se objevil problém neustáléno buildování projektu v Eclipse. Je možno jej vyřešit tak, že zavřeme všechny projekty <code>binding-*</code> kromě <code>binding</code> a <code>binding-jar</code>.</p>

	  <h3>Tomcat 8.0 v Eclipse</h3>
		<p>Po otevření okna <code>Servers</code> (<code>Window -&gt; Show View -&gt; Others -&gt; Servers</code>) zvolte <code>New Server -&gt; Tomcat 8.0</code>, nastavte Vámi při instalaci zvolený adresář a vše potvrďte.</p>
		<p>Pro ověření správnosti konfigurace klikněte pravým tlačítkem myši na projekt <code>aleph-web</code> a zvolte <code>Debug As -&gt; Debug on Server</code>. Mělo by se Vám zobrazit 'uživatelské rozhraní' aleph konektoru hojně užívaného při jeho vývoji.</p>

	  <h1>Vývoj konektoru</h1>
		<p>Chystáte-li se vyvíjet Aleph konektor pro účely dalších knihoven běžících na Alephu, pak byste se měli seznámit s mapováním služeb z Alephu do NCIP formátu.</p>
		<p>V zásadě lze použít <a target="blank" href="https://developers.exlibrisgroup.com/aleph/apis/Aleph-RESTful-APIs">Aleph RESTful APIs</a>, <a target="blank" href="https://developers.exlibrisgroup.com/aleph/apis/Aleph-X-Services">Aleph X-Services</a>, či <a target="blank" href="https://developers.exlibrisgroup.com/aleph/apis/Aleph-Web-Services">Aleph Web Services</a>.</p>

	  <h2>Aleph RESTful APIs</h2>
		<p>Dosud napsaný konektor využívá této oblasti alephu co nejvíce z toho důvodu, aby i knihovny, které si nemohou dovolit tak drahé služby, jako jsou X-Services, byly konektorem obsloužitelné.</p>

	  <h3><u><a target="blank" href="https://developers.exlibrisgroup.com/aleph/apis/Aleph-RESTful-APIs/Patrons">Patrons</a></u></h3>
		<p>V této oblasti Alephu se vyskytuje mnoho důležitých informací spojených s uživateli. Jedná se především o jejich práva, blokace/pokuty, půjčené/rezervované položky, stav účtu a v neposlední řadě také kontaktní 'adresy' uživatelů.</p>

	  <h4><a target="blank" href="https://developers.exlibrisgroup.com/aleph/apis/Aleph-RESTful-APIs/Address">Address</a></h4>
		<p>Stávající verze konektoru odtud sbírá adresu uživatele v nestrukturovaném formátu a to z toho důvodu, že málokterá knihovna je opravdu v databázi strukturalizuje, resp. využívá polí <code>z304-address-1</code> až <code>z304-address-5</code> k rozeznání uložených dat. Toto rozhodnutí je pochopitelné pakliže vezmeme v úvahu nejednoznačnost označení těchto polí.</p>
		<p>Dále je zde možno nalézt telefonní číslo/a, elektronickou adresu, či poštovní směrovací číslo, přičemž lze všechny tyto údaje využít při mapování do NCIP služby LookupUser.</p>

<!-- TODO  <h4><a target="blank" href="https://developers.exlibrisgroup.com/aleph/apis/Aleph-RESTful-APIs/Patron-Blocks">Patron Blocks</a></h4>
		<p>TODO this -&gt; Where to localize it</p>

	  <h4><a target="blank" href="https://developers.exlibrisgroup.com/aleph/apis/Aleph-RESTful-APIs/Patron-Registration">Patron Registration</a></h4>
		<p>TODO this -&gt; Where to localize it</p> -->

	  <h4><a target="blank" href="https://developers.exlibrisgroup.com/aleph/apis/Aleph-RESTful-APIs/Circulation-Actions">Circulation Actions</a></h4>
		<p>Zde se nabízí možnost získat informace o zůstatku na účtu v knihovně, počtu výpůjček, žádostí a detailu pokut.</p>
		<p>Všechny tyto údaje mají využití pouze ve službě LookupUser.</p>

	  <h4><a target="blank" href="https://developers.exlibrisgroup.com/aleph/apis/Aleph-RESTful-APIs/Loans">Loans</a></h4>
		<p>Tady hledáme všechny aktuální výpůjčky, respektive odkazy na ně.</p>
		<p>Užití nacházíme opět pouze u LookupUser služby.</p>

<!-- TODO  <h3><u><a target="blank" href="https://developers.exlibrisgroup.com/aleph/apis/Aleph-RESTful-APIs/Records">Records</a></u></h3>
		<p></p>-->

	  <h2>NCIP code style</h2>
		<p>Je zde několik zvyklostí, se kterými byste se před vývojem vlastního konektoru měli seznámit.</p>
		<p>Jsou jimi například jednorodé formátování, ukládání konstant do specifické statické třídy (viz <code>connectors/aleph/20/trunk/util/AlephConstants.java</code>), či používání normalizovaných hodnot a schémat.</p>

	  <h3>Normalizované hodnoty a schémata</h3>
		<p>Téměř každá třída typu <code>SchemeValuePair</code> má uložené své normalizované hodnoty ve větvi <code>core/trunk/service/src/main/java/org/extensiblecatalog/ncip/v2/service</code> pod názvem Version1*.</p>
		<p>Příkazem <code>find . -type f -name "Version*"</code> vypíšete všechny soubory sloužící k normalizaci.</p>
		<p>Je vysoce doporučeno používat pouze hodnoty z těchto souborů nejen pro NCIP odpovědi, ale i dotazy. A to z toho důvodu, že NCIP Responder, na který se dotaz posílá, může mít zapnutou validaci dotazu právě dle těchto norem.</p>
		<p>Máte-li zájem si tuto službu u svého Responderu zapnout/vypnout, ve složce <code>connectors/aleph/20/trunk/web/src/main/resources</code> si můžete prohlédnout konfigurační soubor Aleph konektoru <code>toolkit.properties</code>. Konkrétně se tedy jedná o 32. řádek: 
			<pre>NCIPServiceValidatorConfiguration.ValidateMessagesAgainstSchema=true</pre></p>
		<p>Nastavíte-li hodnotu na <code>false</code>, tak Váš Responder již nadále nebude validovat dotaz vůči normalizovaným hodnotám.</p> 
		<p>Vypnutí validace podle schématu se doporučuje pouze a jen při vývojových potížích.</p>
	  <h3>Konfigurace konektoru</h3>
		<p>Jak již bylo zmíněno dříve, funkci konfiguračního souboru plní příslušný <i>toolkit.properties</i>: <code>core/trunk/service/src/main/java/org/extensiblecatalog/ncip/v2/service/toolkit.properties</code></p>
		<p>Po implementaci nové služby je zapotřebí do tohoto souboru uvést cestu k třídě, která plní danou funkci. My jsme například po implementaci služby <code>LookupUserService</code> zahrnuli tento řádek: <code>LookupUserService.class=org.extensiblecatalog.ncip.v2.aleph.AlephLookupUserService</code></p>
	<!-- TODO: include agency address, name, version & schema to validate against -->
	</section>

        <footer>
          CPK-standardy is maintained by <a target="blank" href="https://github.com/moravianlibrary">moravianlibrary</a><br>
          This page was generated by <a target="blank" href="http://pages.github.com">GitHub Pages</a>. Tactile theme by <a target="blank" href="https://twitter.com/jasonlong">Jason Long</a>.
        </footer>

                  <script type="text/javascript">
            var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
            document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
          </script>
          <script type="text/javascript">
            try {
              var pageTracker = _gat._getTracker("UA-107343-20");
            pageTracker._trackPageview();
            } catch(err) {}
          </script>

      </div>
    </div>
  </body>
</html>
