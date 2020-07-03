<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('contents')->delete();
        
        \DB::table('contents')->insert([
		    [
		        'body' => 'Foo',
		        'caption' => null,
		        'created_at' => '2020-06-25 22:01:34',
		        'deleted_at' => null,
		        'id' => 1,
		        'slug' => 'Impressum',
		        'updated_at' => '2020-06-25 22:01:34',
		        'uuid' => 'cd05b8ca-128a-478d-adf3-ff0c46c89c26',
		    ],
		    [
		        'body' => '## Themenangebote für'."\n"
		            ."\n"
		            .'* Frauenfrühstückstreffen'."\n"
		            .'* Kindergartenelternabend'."\n"
		            .'* Erwachsenenbildung'."\n"
		            .'* Fortbildung für Erzieherinnen:'."\n"
		            .'	* Was macht ein gutes Team aus?'."\n"
		            .'	* Elterngespräche - kompetent führen'."\n"
		            .'	* Therapeutische Interventionen bei Kindern mit Problemverhalten'."\n"
		            .'* Inhaltliche Gestaltung mit einem ausgewählten Büchertisch zum jeweiligen Thema!',
		        'caption' => null,
		        'created_at' => '2020-06-25 22:03:17',
		        'deleted_at' => null,
		        'id' => 2,
		        'slug' => 'Vorträge / Themenangebote',
		        'updated_at' => '2020-06-26 05:01:54',
		        'uuid' => 'fa3091ad-431c-4b53-bd41-959de047fe11',
		    ],
		    [
		        'body' => '## Schwerpunkte'."\n"
		            ."\n"
		            .'* Systemische Familientherapie'."\n"
		            .'* Genogrammarbeit/Familienskulptur'."\n"
		            .'* Gesprächstherapie'."\n"
		            .'* Krisenintervention'."\n"
		            .'* Aufsuchende Familientherapie'."\n"
		            .'* Paartherapie'."\n"
		            .'* Begleiteter Umgang'."\n"
		            .'* Erziehungsberatung'."\n"
		            .'* Trennungsbegleitung/Beratung von Patchworkfamilien'."\n"
		            .'* Suchtproblematik bei Jugendlichen'."\n"
		            .'* Angststörungen'."\n"
		            .'* Emotionale Stressreduzierung'."\n"
		            .'* Lernen lernen'."\n"
		            .'* Lernblockaden/Lerntraining'."\n"
		            .'* Psychosomatische Störungen bei Kindern'."\n"
		            .'* Fit für die Schule (Vorschulkinder)'."\n"
		            .'* Elternkurse'."\n"
		            .'* Pädagogische Rundbriefe'."\n"
		            .'* Gesprächsgruppen'."\n"
		            .'* Selbstbewusstseinstraining'."\n"
		            .'* Maltherapie (Erwachsene und Kinder)'."\n"
		            .'* Coaching'."\n"
		            .'* Telefonberatung +49 (0) 7453 3264',
		        'caption' => '**Seit 20 Jahren arbeite ich als selbständige Therapeutin** mit Erwachsenen, Jugendlichen und Kindern. Ich bilde mich ständig weiter und nehme [Supervisionen](https://de.wikipedia.org/wiki/Supervision) in Anspruch.',
		        'created_at' => '2020-06-25 23:52:44',
		        'deleted_at' => null,
		        'id' => 3,
		        'slug' => 'Beratung',
		        'updated_at' => '2020-06-26 05:01:16',
		        'uuid' => 'ffe302dc-abdd-4742-906f-30a483c38fed',
		    ],
		    [
		        'body' => '### Vortragsthemen'."\n"
		            ."\n"
		            .'* Wenn Kinder trotzen'."\n"
		            .'* Kinder können Krisen meistern'."\n"
		            .'* Positives Erziehungsprogramm in Theorie und Praxis'."\n"
		            .'* Mit Kindern wertschätzend und konsequent leben'."\n"
		            .'* Keine Angst vor Krach und Streit'."\n"
		            .'* Kinder zur Selbständigkeit erziehen / selbständig werden lassen'."\n"
		            .'* Geschwisterkonstellationen / Geschwisterpositionen'."\n"
		            .'* Kinder brauchen Grenzen'."\n"
		            .'* Kinder altersentsprechend fördern ausgerichtet am Orientierungsplan'."\n"
		            .'* Fit in der Schule und was Eltern dazu tun können'."\n"
		            .'* Fit für die Schule (Vorschulkinder)'."\n"
		            ."\n"
		            .'---'."\n"
		            ."\n"
		            .'* Lebenslust statt Midlifefrust'."\n"
		            .'* Leselust - Bücher vorgestellt von Sybille Seuffer'."\n"
		            .'* Nein sagen ohne Schuldgefühle'."\n"
		            .'* Keine Angst vor Krach und Streit'."\n"
		            .'* "Anleitung zum Glücklichsein" - Was wir für ein gutes und gesundes Lebensgefühl erlernen können',
		        'caption' => null,
		        'created_at' => '2020-06-26 02:28:54',
		        'deleted_at' => null,
		        'id' => 4,
		        'slug' => 'Vorträge / Vortragsthemen',
		        'updated_at' => '2020-06-26 05:08:54',
		        'uuid' => '49cebda4-a9fb-4523-b0f5-8897bef8b982',
		    ],
		    [
		        'body' => '## Wenn Du diese oder ähnliche Erfahrungen mit Schule oder dem Lernen machst, dann bist Du bei mir richtig'."\n"
		            ."\n"
		            .'* Hilfe bei mir bleibt alles nur im Kurzzeitgedächtnis.'."\n"
		            .'* Ich wusste viel mehr und in der Klassenarbeit hatte ich einen Blackout.'."\n"
		            .'* Hausaufgaben, ich hasse sie! Ich werde müde, wenn ich nur dran denke.'."\n"
		            .'* Meine Konzentration lässt so schnell nach und meine Eltern nennen das Faulheit.',
		        'caption' => 'Lernen kann so einfach sein.',
		        'created_at' => '2020-06-26 03:18:25',
		        'deleted_at' => null,
		        'id' => 5,
		        'slug' => 'Lerntraining / Wenn Du diese oder ähnliche...',
		        'updated_at' => '2020-06-26 05:01:29',
		        'uuid' => '9848c937-9788-4d08-8002-dc2a6df5e317',
		    ],
		    [
		        'body' => '### Wir gehen wie folgt vor'."\n"
		            ."\n"
		            .'* Gemeinsam finden wir heraus, was Du für ein Lerntyp bist.'."\n"
		            .'* Ich zeige Dir Strategien, wie das Gelernte im Langzeitgedächtnis ankommt.'."\n"
		            .'* Und wie Du Hausaufgaben sinnvoll gliedern und lernen kannst.',
		        'caption' => null,
		        'created_at' => '2020-06-26 03:19:04',
		        'deleted_at' => null,
		        'id' => 6,
		        'slug' => 'Lerntraining / Wir gehen wie folgt vor',
		        'updated_at' => '2020-06-26 05:01:35',
		        'uuid' => 'c51193cd-ddd0-46eb-b64a-0a9450947a0f',
		    ],
		    [
		        'body' => '#### Folgendes kann ich Dir versichern {.headline}'."\n"
		            ."\n"
		            .'* Wenn Lernen zum Erfolg führt, kann es richtig Spaß machen. --1?'."\n"
		            .'* In nur fünf Stunden Lerntraining, kannst Du einiges erreichen.'."\n"
		            ."\n"
		            .'*Also – Kopf hoch und locker bleiben! Es gibt Hilfe!*',
		        'caption' => null,
		        'created_at' => '2020-06-26 03:20:18',
		        'deleted_at' => null,
		        'id' => 7,
		        'slug' => 'Lerntraining / Folgendes kann ich Dir versichern',
		        'updated_at' => '2020-06-26 05:18:14',
		        'uuid' => '029961ad-b68f-4fa6-a78c-6a126410ed5c',
		    ],
		    [
		        'body' => 'Der Inhalt der Internetseiten wurde von budenkoller.de sorgfältig bearbeitet und geprüft. budenkoller.de übernimmt jedoch keine Gewähr für Richtigkeit, Vollständigkeit und Aktualität der bereitgestellten Informationen. Sofern durch "Links" auf fremde Internetseiten verwiesen wird, ist budenkoller.de für den Inhalt der Seiten nicht verantwortlich. Wir behalten uns das Recht vor, Aktualisierungen und Änderungen an den bereitgestellten Informationen ohne vorherige Ankündigung zu verändern, zu ergänzen und zu löschen.',
		        'caption' => 'Verantwortlich für den Inhalt dieser Webseite',
		        'created_at' => '2020-06-26 07:40:17',
		        'deleted_at' => null,
		        'id' => 8,
		        'slug' => 'Impressum',
		        'updated_at' => '2020-06-26 07:40:17',
		        'uuid' => '8c98570a-9725-468c-80b9-fe5c25cceb7d',
		    ],
		    [
		        'body' => '## Allgemeiner Hinweis und Pflichtinformationen'."\n"
		            ."\n"
		            .'Diese Website benutzt Google Analytics, einen Webanalysedienst der Google Inc. („Google“). Google Analytics verwendet sog. „Cookies“, Textdateien, die auf Ihrem Computer gespeichert werden und die eine Analyse der Benutzung der Website durch Sie ermöglichen. Die durch den Cookie erzeugten Informationen über Ihre Benutzung dieser Website werden in der Regel an einen Server von Google in den USA übertragen und dort gespeichert. Im Falle der Aktivierung der IP-Anonymisierung auf dieser Webseite, wird Ihre IP-Adresse von Google jedoch innerhalb von Mitgliedstaaten der Europäischen Union oder in anderen Vertragsstaaten des Abkommens über den Europäischen Wirtschaftsraum zuvor gekürzt.'."\n"
		            ."\n"
		            .'Nur in Ausnahmefällen wird die volle IP-Adresse an einen Server von Google in den USA übertragen und dort gekürzt. Im Auftrag des Betreibers dieser Website wird Google diese Informationen benutzen, um Ihre Nutzung der Website auszuwerten, um Reports über die Websiteaktivitäten zusammenzustellen und um weitere mit der Websitenutzung und der Internetnutzung verbundene Dienstleistungen gegenüber dem Websitebetreiber zu erbringen. Die im Rahmen von Google Analytics von Ihrem Browser übermittelte IP-Adresse wird nicht mit anderen Daten von Google zusammengeführt. Sie können die Speicherung der Cookies durch eine entsprechende Einstellung Ihrer Browser-Software verhindern; wir weisen Sie jedoch darauf hin, dass Sie in diesem Fall gegebenenfalls nicht sämtliche Funktionen dieser Website vollumfänglich werden nutzen können.'."\n"
		            ."\n"
		            .'Sie können darüber hinaus die Erfassung der durch das Cookie erzeugten und auf Ihre Nutzung der Website bezogenen Daten (inkl. Ihrer IP-Adresse) an Google sowie die Verarbeitung dieser Daten durch Google verhindern, indem sie das unter dem folgenden Link verfügbare Browser-Plugin herunterladen und installieren:'."\n"
		            ."\n"
		            .'[Browser Add On zur Deaktivierung von Google Analytics](http://tools.google.com/dlpage/gaoptout?hl=de).'."\n"
		            ."\n"
		            .'## Benennung der verantwortlichen Stelle'."\n"
		            ."\n"
		            .'Die verantwortliche Stelle für die Datenverarbeitung auf dieser Website ist:'."\n"
		            ."\n"
		            .'**Sybille Seuffer**  '."\n"
		            .'Geißwiesen 24/1  '."\n"
		            .'72227 Egenhausen'."\n"
		            ."\n"
		            .'Die verantwortliche Stelle entscheidet allein oder gemeinsam mit anderen über die Zwecke und Mittel der Verarbeitung von personenbezogenen Daten (z.B. Namen, Kontaktdaten o.Ä.).'."\n"
		            ."\n"
		            .'## Widerruf Ihrer Einwilligung zur Datenverarbeitung'."\n"
		            ."\n"
		            .'Nur mit Ihrer ausdrücklichen Einwilligung sind einige Vorgänge der Datenverarbeitung möglich. Ein Widerruf Ihrer bereits erteilten Einwilligung ist jederzeit möglich. Für den Widerruf genügt eine formlose Mitteilung per E-Mail. Die Rechtmäßigkeit der bis zum Widerruf erfolgten Datenverarbeitung bleibt vom Widerruf unberührt.'."\n"
		            ."\n"
		            .'## Recht auf Beschwerde bei der zuständigen Aufsichtsbehörde'."\n"
		            ."\n"
		            .'Als Betroffener steht Ihnen im Falle eines datenschutzrechtlichen Verstoßes ein Beschwerderecht bei der zuständigen Aufsichtsbehörde zu. Zuständige Aufsichtsbehörde bezüglich datenschutzrechtlicher Fragen ist der Landesdatenschutzbeauftragte des Bundeslandes, in dem sich der Sitz unseres Unternehmens befindet. Der folgende Link stellt eine Liste der Datenschutzbeauftragten sowie deren Kontaktdaten bereit: [https://www.bfdi.bund.de/DE/Infothek/Anschriften_Links/anschriften_links-node.html](https://www.bfdi.bund.de/DE/Infothek/Anschriften_Links/anschriften_links-node.html).'."\n"
		            ."\n"
		            .'## Recht auf Datenübertragbarkeit'."\n"
		            ."\n"
		            .'Ihnen steht das Recht zu, Daten, die wir auf Grundlage Ihrer Einwilligung oder in Erfüllung eines Vertrags automatisiert verarbeiten, an sich oder an Dritte aushändigen zu lassen. Die Bereitstellung erfolgt in einem maschinenlesbaren Format. Sofern Sie die direkte Übertragung der Daten an einen anderen Verantwortlichen verlangen, erfolgt dies nur, soweit es technisch machbar ist.'."\n"
		            ."\n"
		            .'## Recht auf Auskunft, Berichtigung, Sperrung, Löschung'."\n"
		            ."\n"
		            .'Sie haben jederzeit im Rahmen der geltenden gesetzlichen Bestimmungen das Recht auf unentgeltliche Auskunft über Ihre gespeicherten personenbezogenen Daten, Herkunft der Daten, deren Empfänger und den Zweck der Datenverarbeitung und ggf. ein Recht auf Berichtigung, Sperrung oder Löschung dieser Daten. Diesbezüglich und auch zu weiteren Fragen zum Thema personenbezogene Daten können Sie sich jederzeit über die im Impressum aufgeführten Kontaktmöglichkeiten an uns wenden.'."\n"
		            ."\n"
		            .'## SSL- bzw. TLS-Verschlüsselung'."\n"
		            ."\n"
		            .'Aus Sicherheitsgründen und zum Schutz der Übertragung vertraulicher Inhalte, die Sie an uns als Seitenbetreiber senden, nutzt unsere Website eine SSL-bzw. TLS-Verschlüsselung. Damit sind Daten, die Sie über diese Website übermitteln, für Dritte nicht mitlesbar. Sie erkennen eine verschlüsselte Verbindung an der „https://“ Adresszeile Ihres Browsers und am Schloss-Symbol in der Browserzeile.'."\n"
		            ."\n"
		            .'## Server-Log-Dateien'."\n"
		            ."\n"
		            .'In Server-Log-Dateien erhebt und speichert der Provider der Website automatisch Informationen, die Ihr Browser automatisch an uns übermittelt. Dies sind:'."\n"
		            ."\n"
		            .'- Besuchte Seite auf unserer Domain'."\n"
		            .'- Datum und Uhrzeit der Serveranfrage'."\n"
		            .'- Browsertyp und Browserversion'."\n"
		            .'- Verwendetes Betriebssystem'."\n"
		            .'- Referrer URL'."\n"
		            .'- Hostname des zugreifenden Rechners'."\n"
		            .'- IP-Adresse'."\n"
		            ."\n"
		            .'Es findet keine Zusammenführung dieser Daten mit anderen Datenquellen statt. Grundlage der Datenverarbeitung bildet Art. 6 Abs. 1 lit. b DSGVO, der die Verarbeitung von Daten zur Erfüllung eines Vertrags oder vorvertraglicher Maßnahmen gestattet.'."\n"
		            ."\n"
		            .'## Registrierung auf dieser Website'."\n"
		            ."\n"
		            .'Zur Nutzung bestimmter Funktionen können Sie sich auf unserer Website registrieren. Die übermittelten Daten dienen ausschließlich zum Zwecke der Nutzung des jeweiligen Angebotes oder Dienstes. Bei der Registrierung abgefragte Pflichtangaben sind vollständig anzugeben. Andernfalls werden wir die Registrierung ablehnen.'."\n"
		            ."\n"
		            .'Im Falle wichtiger Änderungen, etwa aus technischen Gründen, informieren wir Sie per E-Mail. Die E-Mail wird an die Adresse versendet, die bei der Registrierung angegeben wurde.'."\n"
		            ."\n"
		            .'Die Verarbeitung der bei der Registrierung eingegebenen Daten erfolgt auf Grundlage Ihrer Einwilligung (Art. 6 Abs. 1 lit. a DSGVO). Ein Widerruf Ihrer bereits erteilten Einwilligung ist jederzeit möglich. Für den Widerruf genügt eine formlose Mitteilung per E-Mail. Die Rechtmäßigkeit der bereits erfolgten Datenverarbeitung bleibt vom Widerruf unberührt.'."\n"
		            ."\n"
		            .'Wir speichern die bei der Registrierung erfassten Daten während des Zeitraums, den Sie auf unserer Website registriert sind. Ihren Daten werden gelöscht, sollten Sie Ihre Registrierung aufheben. Gesetzliche Aufbewahrungsfristen bleiben unberührt.'."\n"
		            ."\n"
		            .'## Kontaktformular'."\n"
		            ."\n"
		            .'Per Kontaktformular übermittelte Daten werden einschließlich Ihrer Kontaktdaten gespeichert, um Ihre Anfrage bearbeiten zu können oder um für Anschlussfragen bereitzustehen. Eine Weitergabe dieser Daten findet ohne Ihre Einwilligung nicht statt.'."\n"
		            ."\n"
		            .'Die Verarbeitung der in das Kontaktformular eingegebenen Daten erfolgt ausschließlich auf Grundlage Ihrer Einwilligung (Art. 6 Abs. 1 lit. a DSGVO). Ein Widerruf Ihrer bereits erteilten Einwilligung ist jederzeit möglich. Für den Widerruf genügt eine formlose Mitteilung per E-Mail. Die Rechtmäßigkeit der bis zum Widerruf erfolgten Datenverarbeitungsvorgänge bleibt vom Widerruf unberührt.'."\n"
		            ."\n"
		            .'Über das Kontaktformular übermittelte Daten verbleiben bei uns, bis Sie uns zur Löschung auffordern, Ihre Einwilligung zur Speicherung widerrufen oder keine Notwendigkeit der Datenspeicherung mehr besteht. Zwingende gesetzliche Bestimmungen - insbesondere Aufbewahrungsfristen - bleiben unberührt.'."\n"
		            ."\n"
		            .'## Speicherdauer von Beiträgen und Kommentaren'."\n"
		            ."\n"
		            .'Beiträge und Kommentare sowie damit in Verbindung stehende Daten, wie beispielsweise IP-Adressen, werden gespeichert. Der Inhalt verbleibt auf unserer Website, bis er vollständig gelöscht wurde oder aus rechtlichen Gründen gelöscht werden musste.'."\n"
		            ."\n"
		            .'Die Speicherung der Beiträge und Kommentare erfolgt auf Grundlage Ihrer Einwilligung (Art. 6 Abs. 1 lit. a DSGVO). Ein Widerruf Ihrer bereits erteilten Einwilligung ist jederzeit möglich. Für den Widerruf genügt eine formlose Mitteilung per E-Mail. Die Rechtmäßigkeit bereits erfolgter Datenverarbeitungsvorgänge bleibt vom Widerruf unberührt.'."\n"
		            ."\n"
		            .'## Abonnieren von Kommentaren'."\n"
		            ."\n"
		            .'Sie können als Nutzer unserer Website nach erfolgter Anmeldung Kommentare abonnieren. Mit einer Bestätigungs-E-Mail prüfen wir, ob Sie der Inhaber der angegebenen E-Mail-Adresse sind. Sie können die Abo-Funktion für Kommentare jederzeit über einen Link, der sich in einer Abo-Mail befindet, abbestellen. Zur Einrichtung des Abonnements eingegebene Daten werden im Falle der Abmeldung gelöscht. Sollten diese Daten für andere Zwecke und an anderer Stelle an uns übermittelt worden sein, verbleiben diese weiterhin bei uns.'."\n"
		            ."\n"
		            .'## Newsletter-Daten'."\n"
		            ."\n"
		            .'Zum Versenden unseres Newsletters benötigen wir von Ihnen eine E-Mail-Adresse. Eine Verifizierung der angegebenen E-Mail-Adresse ist notwendig und der Empfang des Newsletters ist einzuwilligen. Ergänzende Daten werden nicht erhoben oder sind freiwillig. Die Verwendung der Daten erfolgt ausschließlich für den Versand des Newsletters.'."\n"
		            ."\n"
		            .'Die bei der Newsletteranmeldung gemachten Daten werden ausschließlich auf Grundlage Ihrer Einwilligung (Art. 6 Abs. 1 lit. a DSGVO) verarbeitet. Ein Widerruf Ihrer bereits erteilten Einwilligung ist jederzeit möglich. Für den Widerruf genügt eine formlose Mitteilung per E-Mail oder Sie melden sich über den "Austragen"-Link im Newsletter ab. Die Rechtmäßigkeit der bereits erfolgten Datenverarbeitungsvorgänge bleibt vom Widerruf unberührt.'."\n"
		            ."\n"
		            .'Zur Einrichtung des Abonnements eingegebene Daten werden im Falle der Abmeldung gelöscht. Sollten diese Daten für andere Zwecke und an anderer Stelle an uns übermittelt worden sein, verbleiben diese weiterhin bei uns.'."\n"
		            ."\n"
		            .'## Cookies'."\n"
		            ."\n"
		            .'Unsere Website verwendet Cookies. Das sind kleine Textdateien, die Ihr Webbrowser auf Ihrem Endgerät speichert. Cookies helfen uns dabei, unser Angebot nutzerfreundlicher, effektiver und sicherer zu machen.'."\n"
		            ."\n"
		            .'Einige Cookies sind “Session-Cookies.” Solche Cookies werden nach Ende Ihrer Browser-Sitzung von selbst gelöscht. Hingegen bleiben andere Cookies auf Ihrem Endgerät bestehen, bis Sie diese selbst löschen. Solche Cookies helfen uns, Sie bei Rückkehr auf unserer Website wiederzuerkennen.'."\n"
		            ."\n"
		            .'Mit einem modernen Webbrowser können Sie das Setzen von Cookies überwachen, einschränken oder unterbinden. Viele Webbrowser lassen sich so konfigurieren, dass Cookies mit dem Schließen des Programms von selbst gelöscht werden. Die Deaktivierung von Cookies kann eine eingeschränkte Funktionalität unserer Website zur Folge haben.'."\n"
		            ."\n"
		            .'Das Setzen von Cookies, die zur Ausübung elektronischer Kommunikationsvorgänge oder der Bereitstellung bestimmter, von Ihnen erwünschter Funktionen (z.B. Warenkorb) notwendig sind, erfolgt auf Grundlage von Art. 6 Abs. 1 lit. f DSGVO. Als Betreiber dieser Website haben wir ein berechtigtes Interesse an der Speicherung von Cookies zur technisch fehlerfreien und reibungslosen Bereitstellung unserer Dienste. Sofern die Setzung anderer Cookies (z.B. für Analyse-Funktionen) erfolgt, werden diese in dieser Datenschutzerklärung separat behandelt.'."\n"
		            ."\n"
		            .'## Google Analytics'."\n"
		            ."\n"
		            .'Unsere Website verwendet Funktionen des Webanalysedienstes Google Analytics. Anbieter des Webanalysedienstes ist die Google Inc., 1600 Amphitheatre Parkway, Mountain View, CA 94043, USA.'."\n"
		            ."\n"
		            .'Google Analytics verwendet "Cookies." Das sind kleine Textdateien, die Ihr Webbrowser auf Ihrem Endgerät speichert und eine Analyse der Website-Benutzung ermöglichen. Mittels Cookie erzeugte Informationen über Ihre Benutzung unserer Website werden an einen Server von Google übermittelt und dort gespeichert. Server-Standort ist im Regelfall die USA.'."\n"
		            ."\n"
		            .'Das Setzen von Google-Analytics-Cookies erfolgt auf Grundlage von Art. 6 Abs. 1 lit. f DSGVO. Als Betreiber dieser Website haben wir  ein berechtigtes Interesse an der Analyse des Nutzerverhaltens, um unser Webangebot und ggf. auch Werbung zu optimieren.'."\n"
		            ."\n"
		            .'#### IP-Anonymisierung'."\n"
		            ."\n"
		            .'Wir setzen Google Analytics in Verbindung mit der Funktion IP-Anonymisierung ein. Sie gewährleistet, dass Google Ihre IP-Adresse innerhalb von Mitgliedstaaten der Europäischen Union oder in anderen Vertragsstaaten des Abkommens über den Europäischen Wirtschaftsraum vor der Übermittlung in die USA kürzt. Es kann Ausnahmefälle geben, in denen Google die volle IP-Adresse an einen Server in den USA überträgt und dort kürzt. In unserem Auftrag wird Google diese Informationen benutzen, um Ihre Nutzung der Website auszuwerten, um Reports über Websiteaktivitäten zu erstellen und um weitere mit der Websitenutzung und der Internetnutzung verbundene Dienstleistungen gegenüber uns zu erbringen. Es findet keine Zusammenführung der von Google Analytics übermittelten IP-Adresse mit anderen Daten von Google statt.'."\n"
		            ."\n"
		            .'#### Browser Plugin'."\n"
		            ."\n"
		            .'Das Setzen von Cookies durch Ihren Webbrowser ist verhinderbar. Einige Funktionen unserer Website könnten dadurch jedoch eingeschränkt werden. Ebenso können Sie die Erfassung von Daten bezüglich Ihrer Website-Nutzung einschließlich Ihrer IP-Adresse mitsamt anschließender Verarbeitung durch Google unterbinden. Dies ist möglich, indem Sie das über folgenden Link erreichbare Browser-Plugin herunterladen und installieren: [https://tools.google.com/dlpage/gaoptout?hl=de](https://tools.google.com/dlpage/gaoptout?hl=de).'."\n"
		            ."\n"
		            .'#### Widerspruch gegen die Datenerfassung'."\n"
		            ."\n"
		            .'Sie können die Erfassung Ihrer Daten durch Google Analytics verhindern, indem Sie auf folgenden Link klicken. Es wird ein Opt-Out-Cookie gesetzt, der die Erfassung Ihrer Daten bei zukünftigen Besuchen unserer Website verhindert: Google Analytics deaktivieren.'."\n"
		            ."\n"
		            .'Einzelheiten zum Umgang mit Nutzerdaten bei Google Analytics finden Sie in der Datenschutzerklärung von Google: [https://support.google.com/analytics/answer/6004245?hl=de](https://support.google.com/analytics/answer/6004245?hl=de).'."\n"
		            ."\n"
		            .'#### Auftragsverarbeitung'."\n"
		            ."\n"
		            .'Zur vollständigen Erfüllung der gesetzlichen Datenschutzvorgaben haben wir mit Google einen Vertrag über die Auftragsverarbeitung abgeschlossen.'."\n"
		            ."\n"
		            .'#### Demografische Merkmale bei Google Analytics'."\n"
		            ."\n"
		            .'Unsere Website verwendet die Funktion “demografische Merkmale” von Google Analytics. Mit ihr lassen sich Berichte erstellen, die Aussagen zu Alter, Geschlecht und Interessen der Seitenbesucher enthalten. Diese Daten stammen aus interessenbezogener Werbung von Google sowie aus Besucherdaten von Drittanbietern. Eine Zuordnung der Daten zu einer bestimmten Person ist nicht möglich. Sie können diese Funktion jederzeit deaktivieren. Dies ist über die Anzeigeneinstellungen in Ihrem Google-Konto möglich oder indem Sie die Erfassung Ihrer Daten durch Google Analytics, wie im Punkt “Widerspruch gegen die Datenerfassung” erläutert, generell untersagen.'."\n"
		            ."\n"
		            .'## Google Web Fonts'."\n"
		            ."\n"
		            .'Unsere Website verwendet Web Fonts von Google. Anbieter ist die Google Inc., 1600 Amphitheatre Parkway, Mountain View, CA 94043, USA.'."\n"
		            ."\n"
		            .'Durch den Einsatz dieser Web Fonts wird es möglich Ihnen die von uns gewünschte Darstellung unserer Website zu präsentieren, unabhängig davon welche Schriften Ihnen lokal zur Verfügung stehen. Dies erfolgt über den Abruf der Google Web Fonts von einem Server von Google in den USA und der damit verbundenen Weitergabe Ihre Daten an Google. Dabei handelt es sich um Ihre IP-Adresse und welche Seite Sie bei uns besucht haben. Der Einsatz von Google Web Fonts erfolgt auf Grundlage von Art. 6 Abs. 1 lit. f DSGVO. Als Betreiber dieser Website haben wir ein berechtigtes Interesse an der optimalen Darstellung und Übertragung unseres Webauftritts.'."\n"
		            ."\n"
		            .'Das Unternehmen Google ist für das us-europäische Datenschutzübereinkommen "Privacy Shield" zertifiziert. Dieses Datenschutzübereinkommen soll die Einhaltung des in der EU geltenden Datenschutzniveaus gewährleisten.'."\n"
		            ."\n"
		            .'Einzelheiten über Google Web Fonts finden Sie unter: [https://www.google.com/fonts#AboutPlace:about](https://www.google.com/fonts#AboutPlace:about) und weitere Informationen in den Datenschutzbestimmungen von Google: [https://policies.google.com/privacy/partners?hl=de](https://policies.google.com/privacy/partners?hl=de)',
		        'caption' => null,
		        'created_at' => '2020-06-26 07:41:15',
		        'deleted_at' => null,
		        'id' => 9,
		        'slug' => 'Datenschutzerklärung',
		        'updated_at' => '2020-06-27 02:02:02',
		        'uuid' => '170c9ddd-cb07-4fee-97f8-3b518563dab6',
		    ],
		    [
		        'body' => '{highlight}Ich liebe{/highlight}  '."\n"
		            .'Kinder, italienisches Essen, Radfahren, Kunstausstellungen'."\n"
		            ."\n"
		            .'{highlight}Reiseziele{/highlight}  '."\n"
		            .'Irland, Madeira, USA'."\n"
		            ."\n"
		            .'{highlight}Hobbies{/highlight}  '."\n"
		            .'Malen, Lesen, Schreiben, Tanzen, Städtereisen'."\n"
		            ."\n"
		            .'{highlight}Lieblingstier{/highlight}  '."\n"
		            .'Eule'."\n"
		            ."\n"
		            .'{highlight}Lieblingsfilm{/highlight}  '."\n"
		            .'Grüne Tomaten, Säulen der Erde'."\n"
		            ."\n"
		            .'{highlight}Meine Stärke{/highlight}  '."\n"
		            .'Geduld'."\n"
		            ."\n"
		            .'{highlight}Meine Schwäche{/highlight}  '."\n"
		            .'Nachteule'."\n"
		            ."\n"
		            .'{highlight}Motto (2020){/highlight}  '."\n"
		            .'Die Ruhe selbst sein',
		        'caption' => null,
		        'created_at' => '2020-06-27 02:03:43',
		        'deleted_at' => null,
		        'id' => 10,
		        'slug' => 'Portrait / Über mich',
		        'updated_at' => '2020-06-29 06:34:18',
		        'uuid' => 'ea4a4722-7a10-4f37-a800-9eda6e7f68d2',
		    ],
		    [
		        'body' => '* Frauengruppen'."\n"
		            .'* Paargruppen'."\n"
		            .'* Seminare'."\n"
		            .'* Vorträge'."\n"
		            .'* Erziehungsberatung (PEP4Kids)'."\n"
		            .'* Einzelberatung / Paarberatung'."\n"
		            .'* Gesprächstherapie'."\n"
		            .'* Kreatives Schreiben'."\n"
		            .'* Malwerkstatt'."\n"
		            .'* Lerntraining'."\n"
		            .'* Telefonberatung'."\n"
		            .'* Hypnotherapie',
		        'caption' => null,
		        'created_at' => '2020-06-27 02:44:43',
		        'deleted_at' => null,
		        'id' => 11,
		        'slug' => 'Portrait / Leistungen',
		        'updated_at' => '2020-06-28 22:18:11',
		        'uuid' => '900c0a50-5287-415d-b54e-cf40b02d957a',
		    ],
		    [
		        'body' => '### Seminare 2019/2020'."\n"
		            .'28.06.2020 / erstellt von Sybille Seuffer'."\n"
		            ."\n"
		            .'Liebe Besucher, die Termine/Seminare für 2020 sind nun online.'."\n"
		            ."\n"
		            .'Du kannst mich auch auf [**Facebook**](https://www.facebook.com/sybille.seuffer) besuchen.'."\n"
		            ."\n"
		            .'**Herzliche Grüße**  '."\n"
		            .'Sybille Seuffer',
		        'caption' => null,
		        'created_at' => '2020-06-28 01:11:57',
		        'deleted_at' => null,
		        'id' => 12,
		        'slug' => 'Home',
		        'updated_at' => '2020-06-28 23:25:18',
		        'uuid' => '65110c3b-0373-4996-b875-ac1b763a311c',
		    ],
		    [
		        'body' => '## Sybille Seuffer'."\n"
		            .'Geißwiesen 24/1  '."\n"
		            .'D-72227 Egenhausen'."\n"
		            ."\n"
		            .'Telefon {highlight}[+49 (0)7453 3264](tel:004974533264){/highlight}  '."\n"
		            .'E-Mail {highlight}[me@vivien.ag](mailto:me@vivien.ag){/highlight}  '."\n"
		            .'oder via {highlight}[**Facebook**](https://www.facebook.com/sybille.seuffer){/highlight}',
		        'caption' => null,
		        'created_at' => '2020-06-28 01:32:31',
		        'deleted_at' => null,
		        'id' => 13,
		        'slug' => 'Kontakt',
		        'updated_at' => '2020-06-29 08:39:19',
		        'uuid' => '18f0895f-bdce-4a1b-a59a-e0f0ff4daed9',
		    ],
		    [
		        'body' => 'Hier erfährst du mehr über die von mir angebotenen'."\n"
		            ."\n"
		            .'* [**Vortragsthemen**](/vortraege)'."\n"
		            .'* [**Beratungsschwerpunkte**](/beratung)'."\n"
		            .'* [**Lernstrategien**](/lerntraining)'."\n"
		            .'* und [**Seminare**](/seminare)',
		        'caption' => null,
		        'created_at' => '2020-06-29 06:19:38',
		        'deleted_at' => null,
		        'id' => 14,
		        'slug' => 'Portrait / Vorträge und Seminare',
		        'updated_at' => '2020-06-29 06:23:45',
		        'uuid' => 'c7d93aa2-601b-4a43-9d15-b669cdb674f9',
		    ],
		    [
		        'body' => '**Telefon** {highlight}[+49 (0)7453 3264](tel:004974533264){/highlight}  '."\n"
		            .'**E-Mail** {highlight}[me@vivien.ag](mailto:me@vivien.ag){/highlight}  '."\n"
		            .'oder via {highlight}[**Facebook**](https://www.facebook.com/sybille.seuffer){/highlight}'."\n"
		            ."\n"
		            .'<p class="mt-2 text-sm text-gray-500">'."\n"
		            .'	Geißwiesen 24/1'."\n"
		            .'  	<br>'."\n"
		            .'	D-72227 Egenhausen'."\n"
		            .'</p>',
		        'caption' => null,
		        'created_at' => '2020-06-29 06:29:29',
		        'deleted_at' => null,
		        'id' => 15,
		        'slug' => 'Portrait / Kontakt',
		        'updated_at' => '2020-06-29 06:43:47',
		        'uuid' => 'c6a0904b-b3cc-42ca-b6ba-bf1438c27798',
		    ],
		]);
        
    }
}
