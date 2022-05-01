<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('posts')->delete();

        DB::table('posts')->insert([
		    [
		        'body' => 'Sofort fiel mir meine selbst gehäkelte lange Jacke aus Wollresten ein.'."\r\n"
		            .'Kunterbunt in Stäbchen gehäkelt nach einer eigenen Idee.'."\r\n"
		            .'Täglich saß ich an dieser Häkelarbeit weil ich es kaum erwarten konnte'."\r\n"
		            .'diese Jacke zu tragen. Dann war sie endlich fertig – rote Cordhosen '."\r\n"
		            .'und braune Indianerstiefel aus weichem Leder trug ich dazu.'."\r\n"
		            .'Damals hatte ich schon 3 Kinder – Ben trug ich im Tragetuch und in diesem'."\r\n"
		            .'Aufzug sah ich ganz schön verwegen aus – die Haare lang und offen.'."\r\n"
		            .'Im Dorf in dem wir wohnten war ich die Hippie Mutter, die ihr Kind'."\r\n"
		            .'mit dem  gelben Mofa in den Kindergarten brachte. Ich saß auf dem Sitz'."\r\n"
		            .'und Anika stand vor mir und hielt sich am Lenker fest! '."\r\n"
		            .'Wir genossen unsere gemeinsamen Fahrten und die anderen'."\r\n"
		            .'Mütter starrten uns an!'."\r\n"
		            .'Anika war ihr Leben lang ein Mensch, der sich was traute.'."\r\n"
		            .'Als sie durch die Chemo Haarausfall bekam, hat sie sich eine Glatze, bei Yvonne ihrer'."\r\n"
		            .'Lieblingsfriseurin, rasieren lassen und sie ging dann ohne Kopfbedeckung in Hildesheim'."\r\n"
		            .'spazieren mit voller Glatze – ich war dabei und habe sie echt bewundert für ihre'."\r\n"
		            .'Chuzpe! '."\r\n"
		            .'Die Leute haben schon geguckt – ihr war das mehr oder weniger egal, sie lächelte die Leute an!'."\r\n"
		            ."\r\n"
		            .'Meine selbst gehäkelte Jacke war mein Symbol für Unabhängigkeit, Lebensfreude, lasst mich in Ruhe'."\r\n"
		            .'mit eurer Spießbürgerlichkeit, ich lebe so mit meinen Kindern und meinem Mann wie ich will und es für richtig halte.'."\r\n"
		            .'Robert hatte ein rotes Mofa. Wir waren glücklich!'."\r\n"
		            .'2020 Schreibnacht',
		        'created_at' => '2022-02-05 08:32:32',
		        'deleted_at' => null,
		        'published_at' => '2022-02-05 05:30:18',
		        'slug' => 'mein-lieblingskleidungsstuck',
		        'title' => 'Mein Lieblingskleidungsstück',
		        'updated_at' => '2022-04-27 06:50:35',
		        'uuid' => Str::orderedUuid(), //'0c3ec5ba-2b58-4297-9f9a-7f4022213931',
		    ],
		    [
		        'body' => 'Kunst Glaubensbekenntnis:'."\n"
		            .'Ich glaube an die Fantasie die in jedem Menschen schlummert, der evolutionäre Funke,'."\n"
		            .'der uns mitgegeben wird von Anfang an.'."\n"
		            .'Der dafür Sorge trägt, daß wir gestalten, erfinden, lösen, weiterentwickeln'."\n"
		            .'Uns selbst und was um uns lebt und ist.'."\n"
		            ."\n"
		            .'Ich glaube an das Freie Spiel dem der Fantasiefunke'."\n"
		            .'Zu Grunde liegt. Im Spiel erprobt sich die Fantasie,'."\n"
		            .'schlägt Purzelbäume macht Feuerwerk mit Farben, singt, tanzt,'."\n"
		            .'baut, gestaltet sich in Form, Wort und Ausdruck.'."\n"
		            .'Ich glaube an die Kunst in ihrer vielfältigen Weise.'."\n"
		            .'Sie verbindet das Gestern mit dem Heute, das Heute mit dem Morgen. '."\n"
		            .'So wird sie Teil der irdischen Ewigkeit, der Geschichte. Kunst überdauert.'."\n"
		            .'Ich glaube an das künstlerische Schaffen, das aus dem Alltäglichen herausragt, die Seele nährt,'."\n"
		            .'den Geist beflügelt, den Körper erfrischt.'."\n"
		            .'Ich glaube da wo Menschen Kunst als Teil ihres Lebens wählen .'."\n"
		            .'lebt die Hoffnung!'."\n"
		            .'Sybille Schreibreise Weimar 2019',
		        'created_at' => '2020-10-04 00:35:27',
		        'deleted_at' => null,
		        'published_at' => '2020-10-03 20:35:10',
		        'slug' => 'kunst-glaubensbekenntnis',
		        'title' => 'Kunst Glaubensbekenntnis',
		        'updated_at' => '2020-10-14 03:57:55',
		        'uuid' => Str::orderedUuid(), //'10097205-713b-469d-b40f-9c6fb4f1a29e',
		    ],
		    [
		        'body' => 'Urkomisch – die ganze Geschichte. Ruth und Edek wieder voll in Aktion. Die Tochter, Ruth, nach wie vor ängstlich und haarspalterisch besorgt um Vaters Wohlergehen. Der Vater, Edek, diesmal voller Tatendrang und im siebten Klops und Mops Himmel sowieso alles in New York. Einer der besten Romane von Lily Brett.',
		        'created_at' => '2020-05-21 10:04:24',
		        'deleted_at' => null,
		        'published_at' => '2020-05-21 09:03:51',
		        'slug' => 'lily-brett-chuzpe',
		        'title' => 'Lily Brett: Chuzpe',
		        'updated_at' => '2020-05-21 10:04:24',
		        'uuid' => Str::orderedUuid(), //'14bb1ada-bd11-4fad-855f-8745a9ecd826',
		    ],
		    [
		        'body' => 'Wenn Stille aus der Landschaft spricht und sich das Licht in Schneekristallen bricht.'."\n"
		            .'Das tiefe Weiß mich staunend macht weil es erhellt die dunkle Nacht.'."\n"
		            .'Wenn Kinder Freiheit spüren weil sie sich in der Geschwindigkeit auf ihrem Schlitten verlieren.'."\n"
		            .'Wenn Klein und Groß im weißen Lebensraum sich finden, versuchen diesen Wintertraum '."\n"
		            .'Miteinander zu ergründen. Dann eint die Jahreszeit uns alle und das ist Lebensglück'."\n"
		            .'im besten Falle.'."\n"
		            .'Sybille Januar 2021',
		        'created_at' => '2021-01-18 16:59:01',
		        'deleted_at' => null,
		        'published_at' => '2021-01-18 16:58:46',
		        'slug' => 'winterzauber',
		        'title' => 'Winterzauber',
		        'updated_at' => '2021-01-18 16:59:01',
		        'uuid' => Str::orderedUuid(), //'15f01305-bc68-4a02-aff2-b8d313eec26b',
		    ],
		    [
		        'body' => 'Schlanker werden wir später '."\r\n"
		            .'Nein! Es ist nun mal an der Zeit es in Angriff zu nehmen '."\r\n"
		            .'denn die Gesundheit leidet und das ist ein Zeichen da'."\r\n"
		            .'kannst du nicht mehr ausweichen!'."\r\n"
		            .'Verschenk die Schokolade, steck die Gummibärchen den'."\r\n"
		            .'Nachbarsjungen zu, bring deiner Freundin die Pralinen'."\r\n"
		            .'und das Eis mit den Nüssen sowie die Schachtel mit den Negerküssen'."\r\n"
		            .'dürfen die Enkel in einem Rutsch essen.'."\r\n"
		            .'Dann bist du frei von aller Versuchung und kannst den Süßkram vergessen.'."\r\n"
		            .'Schlanker werden wir später'."\r\n"
		            .'Nein! Dein Arzt hat dir gesagt: So geht es nicht weiter!'."\r\n"
		            .'Zum Trost lächelte er noch heiter! Sagte dir die Kilogramm, die du erreichen musst, damit dich nicht'."\r\n"
		            .'Herzinfarkt, Diabetes und Hirnschlag hinterrücks erdrücken und deine Kinder,'."\r\n"
		            .'für dein Grab bald schon Blumen pflücken!'."\r\n"
		            .'Von wegen, schlanker werde ich später!'."\r\n"
		            .'Jetzt lebst du nach GLYX, Atkins, Kohlsuppe und Trennkost und kaufst dein Gemüse bei BoFrost!'."\r\n"
		            .'Fährst Rad, machst Seniorengymnastik und meditierst in der Hoffnung dass du satte'."\r\n"
		            .'20 Kilo verlierst!'."\r\n"
		            .'Bleib dran – sagt dir dein Verstand und dein Mann! Der hat gut reden!'."\r\n"
		            .'Er hat nicht deine Hormone! Die fiesen Dinger, die nichts loslassen wollen,'."\r\n"
		            .'die dich dazu bringen, dass Du lieber stirbst als auf Schokolade zu verzichten!'."\r\n"
		            .'Wie war das mit dem menschlichen Trachten und Dichten? Oder war das'."\r\n"
		            .'der Geist der willig ist, das Fleisch aber schwach?'."\r\n"
		            .'Ach Schlanker werde ich später, denn ich schaffe es nur in meiner Zeit!'."\r\n"
		            .'Das nehme ich jetzt für mich in Anspruch denn ich bin es leid!'."\r\n"
		            .'Konsequent sein geht eine Weile, denn die Krise kommt bestimmt!'."\r\n"
		            .'In Form von Geburtstag, Frust, Libidoverlust dem du allem nicht entrinnst!'."\r\n"
		            .'Kein Mensch kann das, was Schokolade, Gummibärchen, Pralinen können'."\r\n"
		            .'Dir für kurze Momente, Entlastung gönnen!',
		        'created_at' => '2022-04-22 00:13:41',
		        'deleted_at' => null,
		        'published_at' => '2022-04-21 22:13:15',
		        'slug' => 'schlanker-werden',
		        'title' => 'Schlanker werden',
		        'updated_at' => '2022-04-27 06:46:55',
		        'uuid' => Str::orderedUuid(), //'1714c392-b8cb-4575-807a-ceb952897ebf',
		    ],
		    [
		        'body' => 'Wer nicht will, findet Gründe. Wer will findet Wege!'."\r\n"
		            .'Sagt sie und blickte ihm direkt in die Augen!'."\r\n"
		            .'Er spielt mit der Zunge an seinem  Oberlippenpiercing,'."\r\n"
		            .'das kurze Flackern in seinem Blick sagt ihr, dass er verstanden hat.'."\r\n"
		            .'Schluss mit Ausreden, Schluss mit Täuschung und Selbsttäuschung.'."\r\n"
		            .'Wenn er jetzt nicht zu sich kommt und Ernst macht, dann wird'."\r\n"
		            .'das nichts mehr, denkt sie und hält die Stille zwischen ihnen aus.'."\r\n"
		            .'Ja, was ist dann der nächste Schritt, fragt er mehr sich selbst'."\r\n"
		            .'aber doch so laut, dass es auch ihr gilt.'."\r\n"
		            .'Du musst dein Ändern leben – sagt sie!'."\r\n"
		            .'Hä??? Was soll das heißen? Na ja den Weg finden -'."\r\n"
		            .'bedeutet Veränderung, den ersten Schritt gehen, bedeutet Veränderung!'."\r\n"
		            .'Und das war bisher nicht dein Ding! Jetzt ist dein Wille gefragt und'."\r\n"
		            .'dein Verstand, der Wege findet oder sagen wir mal den nächsten Schritt.'."\r\n"
		            .'Was willst du überhaupt nicht? fragt sie.'."\r\n"
		            .'Morgens aufstehen, war seine prompte Antwort.'."\r\n"
		            .'Dann finde einen halbtags Job der nachmittags anfängt!'."\r\n"
		            .'Echt jetzt? Fragt er ungläubig. Ja klar wenn du morgens nicht'."\r\n"
		            .'rauskommst dann ist das deine Suchanfrage.'."\r\n"
		            .'Er tippt in den Laptop Halbtagsjob am Nachmittag ein und'."\r\n"
		            .'Wartet mit ihr zusammen was sich zeigt.'."\r\n"
		            .'Tatsächlich! Sagt er! Eine Tankstelle sucht jemanden für nachmittags'."\r\n"
		            .'in Baiersbronn. Jetzt bin ich gespannt auf deine Gründe! Sagt sie süffisant.'."\r\n"
		            .'Mh macht er, ich mach die online Bewerbung, wenn sie mir helfen.'."\r\n"
		            .'Klar dafür bin ich da! Du willst also diesen Job? Warum willst du diesen Job?'."\r\n"
		            .'Irgendwie muss es ja mal weitergehen bei mir! Ja das sehe ich auch so, sagt sie.'."\r\n"
		            .'Das reicht als Grund! Also schreib: Sehr geehrte Damen und Herren kannst auch'."\r\n"
		            .'Schreiben Hallo Leute ….. ihr braucht mich! Er grinst, sie lächelt!'."\r\n"
		            .'Er schreibt, sie liest, macht Vorschläge, er verbessert.'."\r\n"
		            .'Als nächstes üben wir dann das Vorstellungsgespräch!',
		        'created_at' => '2022-04-15 19:00:23',
		        'deleted_at' => null,
		        'published_at' => '2022-04-15 16:58:41',
		        'slug' => 'wer-nicht-will-findet-gru',
		        'title' => 'Wer nicht will findet Gründe',
		        'updated_at' => '2022-04-27 06:48:23',
		        'uuid' => Str::orderedUuid(), //'17857b79-d1f7-490d-8f2d-8897ae000064',
		    ],
		    [
		        'body' => 'Der perfekte Tag'."\n"
		            .'Plane ihn! Erlebe ihn'."\n"
		            .'Mein Beispiel:'."\n"
		            ."\n"
		            .'Aufstehen ohne Wecker'."\n"
		            .'Lesen im Bett bis ich hungrig bin'."\n"
		            .'Frühstück mit Leberwurst und Himbeer Joghurt'."\n"
		            .'Schwimmen oder Radeln oder Wandern'."\n"
		            .'Alleine oder mit Andern'."\n"
		            .'Mittagschlaf'."\n"
		            .'Kaffee mit Windbeutel'."\n"
		            .'Verabredung mit einem lieben Menschen'."\n"
		            .'Gute Gespräche'."\n"
		            .'Malen Schreiben oder Lesen bis es ganz dunkel ist'."\n"
		            .'Film'."\n"
		            .'Baden in der Badewanne'."\n"
		            .'Rilke Projekt hören im Bett'."\n"
		            .'Irgendwann dabei einschlafen'."\n"
		            ."\n"
		            .'Den perfekten Tag auch als Geburtstagsgeschenk für den Partner planen oder für eine beste Freundin '."\n"
		            .'Das wird ein unvergessliches Erlebnis!',
		        'created_at' => '2021-03-03 09:16:18',
		        'deleted_at' => null,
		        'published_at' => '2021-03-03 09:16:01',
		        'slug' => 'der-perfekte-tag',
		        'title' => 'Der perfekte Tag',
		        'updated_at' => '2021-03-03 09:16:18',
		        'uuid' => Str::orderedUuid(), //'20f58e30-eeac-442f-880d-e5c75f4f15f0',
		    ],
		    [
		        'body' => 'Zupf von den roten Beeren dir einen Mundvoll '."\n"
		            .'genieße die saure Süße'."\n"
		            .'Schmücke den Tisch mit Sonnenblumen und Lilien'."\n"
		            .'Faul beginnt dein Tag'."\n"
		            .'Spiel mit deinen Fantasien'."\n"
		            .'Vergiss die Pflicht – den Streit – die Weltkrise'."\n"
		            .'denke wie ein Kind im Augenblick'."\n"
		            .'Grashupfer  -  Seifenblasen  -  Purzelbaum'."\n"
		            .'sind jetzt das Wichtigste der Welt'."\n"
		            .'sei glücklich'."\n"
		            .'trotz allem',
		        'created_at' => '2021-08-13 06:45:01',
		        'deleted_at' => null,
		        'published_at' => '2021-08-13 02:44:36',
		        'slug' => 'sommerfrische',
		        'title' => 'Sommerfrische',
		        'updated_at' => '2021-08-14 09:45:18',
		        'uuid' => Str::orderedUuid(), //'232d396e-12c1-495c-9d98-c78766e0a14c',
		    ],
		    [
		        'body' => 'Es wird Zeit zu leben'."\n"
		            .'Und die Liebe sagt leise jetzt und hier'."\n"
		            ."\n"
		            .'Was bleibt ist der Moment an dem ich dir, im vorübergehen ein Lächeln schenk.'."\n"
		            .'Es wärmt dich und auch mich, du trägst es weiter und bist dir gut, dadurch wächst in dir ein klein bisschen Mut.'."\n"
		            .'Denn die Liebe sagt leise jetzt und hier  -  zu Dir und zu mir.'."\n"
		            ."\n"
		            .'Was bleibt ist die Stunde in der du mir zuhörst, mich siehst und versuchst mich zu verstehen.'."\n"
		            .'Meine Fragen innerlich mitzutragen, zu spüren was macht Sinn und zu erkennen wer ich gerade bin.'."\n"
		            .'Denn die Liebe sagt leise jetzt und hier -  zu Dir und zu mir.'."\n"
		            ."\n"
		            .'Was bleibt ist der Tag an dem ich mit dir die Welt entdecke, im Wald mich hinter Bäumen verstecke.'."\n"
		            .'Wir die Wolken betrachten, den Vögeln lauschen, dem Bach zu hören bei seinem Rauschen.'."\n"
		            .'Denn die Liebe sagt leise jetzt und hier – zu Dir und zu mir.'."\n"
		            ."\n"
		            .'Was bleibt ist die Zeit die wir uns schenken ohne an die Arbeit, das Geld. Politik  und die Sorgen zu denken.'."\n"
		            .'Die Zeit in der die Seelen miteinander verbunden und wir dadurch an Leib und Seele gesunden.'."\n"
		            .'Denn die Liebe sagt leise jetzt und hier – zu Dir und zu mir.',
		        'created_at' => '2021-01-03 18:10:17',
		        'deleted_at' => null,
		        'published_at' => '2021-01-03 17:09:18',
		        'slug' => 'zeit-zu-leben',
		        'title' => 'Zeit zu leben',
		        'updated_at' => '2021-01-06 23:42:54',
		        'uuid' => Str::orderedUuid(), //'2369641d-7a0d-4b2e-8c58-4a0d1d0878cc',
		    ],
		    [
		        'body' => 'In jedem Menschen ist ES angelegt.'."\n"
		            .'Jeder Mensch könnte die Verwirklichung eines wunderbaren Traumes sein, einer Geschichte, eines Kunstwerks.'."\n"
		            .'Jeder Mensch könnte eine tiefe wahrhafte Bereicherung sein,'."\n"
		            .'ein Phänomen, eine lebendige Sinfonie.'."\n"
		            .'Jeder Mensch ein Stern, der leuchtet.'."\n"
		            .'Jeder Mensch ein wunderbares Wesen.',
		        'created_at' => '2021-09-08 10:37:55',
		        'deleted_at' => null,
		        'published_at' => '2021-09-08 10:37:27',
		        'slug' => 'erkenntnis',
		        'title' => 'Erkenntnis',
		        'updated_at' => '2021-09-08 10:37:55',
		        'uuid' => Str::orderedUuid(), //'37893711-403a-4817-a4dc-0f3152c5a92a',
		    ],
		    [
		        'body' => 'Reise mit Freude '."\n"
		            .'danach sehnt sich mein Wesen '."\n"
		            .' einmal wieder sein – '."\n"
		            .' im'."\n"
		            .'nie Dagewesen.'."\n"
		            .'Unterwegs sein mit offenen Sinnen,'."\n"
		            .'den Morgen in einer fremden Stadt beginnen. '."\n"
		            .'Gerüche die mich locken, Sprache die mich verzaubert,'."\n"
		            .'Gesichter die  ich einmal im Leben nur sehe -  weil ich ja weitergehe.'."\n"
		            ."\n"
		            .'Plätze und Kirchen, Cafes und Museen will ich so gerne besuchen,'."\n"
		            .'und sehen. Dasein im Jetzt mit Stift und Papier, mit Frauen die schreiben'."\n"
		            .'im Hintergrund spielt ein Klavier.'."\n"
		            .'Reden und hören, Geschichten die betören, Gedichte die tiefe Gefühle'."\n"
		            .'erwecken, Neues in Dir und mir entdecken!'."\n"
		            .'Wasser und Sand, Sonne und Strand, Wind und Wellen das sind die Quellen'."\n"
		            .'die niemals versiegen. Die Sinne erwecken, mich und dich mit Leben anstecken!'."\n"
		            .'Reise mit Freude  - du und ich - die Welt entdecken!!!'."\n"
		            .'Schreibnacht im August Sybille',
		        'created_at' => '2020-09-12 16:30:07',
		        'deleted_at' => null,
		        'published_at' => '2020-09-12 14:28:52',
		        'slug' => 'reisesehnsucht',
		        'title' => 'Reisesehnsucht',
		        'updated_at' => '2020-09-12 16:32:16',
		        'uuid' => Str::orderedUuid(), //'4f075ec4-fcfa-461d-8d8e-c113f9c4720f',
		    ],
		    [
		        'body' => 'Auf der Suche nach einem “anderen” Städteführer bin ich auf diese Reihe bei Herder gestossen. Barcelona interessierte mich besonders und inzwischen weiß ich Vieles über die Stadt, durch den 12 Monatebericht der Autorin. Man bekommt neben der Aussenansicht einer Stadt, eine Innenansicht geliefert und das erweitert den Horizont und macht neugierig.',
		        'created_at' => '2020-05-21 10:04:50',
		        'deleted_at' => null,
		        'published_at' => '2020-05-21 09:04:24',
		        'slug' => 'barbara-baumgartner-ein-jahr-in-barcelona',
		        'title' => 'Barbara Baumgartner: Ein Jahr in Barcelona',
		        'updated_at' => '2020-05-21 10:04:50',
		        'uuid' => Str::orderedUuid(), //'5011cca9-466c-4ef6-8a8c-ac26962cfdbc',
		    ],
		    [
		        'body' => 'Darüber ärgere ich mich nicht mehr – ich bleibe gelassen'."\n"
		            .'Schlechtes Wetter, nicht auffindbarer Schlüssel, kein Kleingeld für die Parkuhr, eine zerbrochene Schüssel!'."\n"
		            .'Ein Loch im Pulli, ein Klecks auf der Hose, meine windschiefe Frisur, eine abgelaufene Konservendose!'."\n"
		            .'Rasenmäher am Samstag, Schlange an der Kasse, Werbeanruf am Telefon, eine kläffende Hunderasse'."\n"
		            .'Saure Milch, Wartezeit beim Arzt, Öffnungszeiten der Post, im Stau stehen auf einer langen Fahrt!'."\n"
		            .'Es liegt bei mir wie ich mich fühle ob ich mich in jedes kleine Problemchen reinwühle oder mir'."\n"
		            .'Sage: Vieles ist  einfach normal und ist mir deshalb Sch… egal!!!',
		        'created_at' => '2021-01-03 18:08:38',
		        'deleted_at' => null,
		        'published_at' => '2021-01-03 18:05:58',
		        'slug' => 'daruber-argere-ich-mich-nicht-mehr',
		        'title' => 'Darüber ärgere ich mich nicht mehr',
		        'updated_at' => '2021-01-03 18:08:38',
		        'uuid' => Str::orderedUuid(), //'5b1a315e-99db-4b7d-9d76-a88550eccdca',
		    ],
		    [
		        'body' => 'Es war einmal ein kleines, unschuldiges Mädchen, dass mit großen Augen die Welt betrachtete.'."\n"
		            .'Wo kommen die Schneeflocken her? Fragte sie in einer  verschneiten Winternacht.'."\n"
		            .'Woher wissen die Vögel wo Süden ist? Fragte sie im Herbst'."\n"
		            .'Wie finden die Bienen auf den Blumenwiesen zu ihrem Bienenstock zurück? Fragte sie im Sommer'."\n"
		            .'Wie schaffen es die Frösche ihren Teich zu finden in dem sie geboren wurden?  Fragte sie im Frühling'."\n"
		            .'Nie hörten ihre Fragen auf! Die Erwachsenen waren es müde ihr ständig etwas Erklären zu müssen.'."\n"
		            .'Und sie fand es seltsam, dass Erwachsene kein Interesse hatten an all diesen Besonderheiten.'."\n"
		            .'So erzählte sie ihrem Kater Mikesch was sie wusste und was sie wissen wollte.'."\n"
		            .'Dabei kraulte sie ihn und er hörte ihr meist geduldig zu.'."\n"
		            .'Eines Tages war sie wieder unterwegs in den Wäldern da hörte sie plötzlich wunderbare Flötenmusik.'."\n"
		            .'Sie blieb stehen und lauschte. Woher kam die Musik? Sie lief weiter am Bach entlang bis zu einer uralten Holz Brücke.'."\n"
		            .'Dort saß ein kleines Männchen das spielte selbstvergessen auf seiner Flöte.'."\n"
		            .'Das Mädchen lauschte solange bis das Männchen sein Lied beendet hatte.'."\n"
		            .'Dann trat es herzu! Wie wunderschön du spielst! Oh danke sagte es. Wie hast du das gelernt?'."\n"
		            .'wollte das Mädchen wissen! Weißt du ich habe es gelernt weil ich mich sehr allein gefühlt habe in dieser Welt.'."\n"
		            .'Es gab niemand, der sich für mich interessiert hat und da blieb mir nichts anderes übrig als mit mir selbst'."\n"
		            .'gut Freund zu werden und mir die Zeit mit Schönem zu vertreiben! So habe ich das Flöten spielen gelernt '."\n"
		            .'und ich erfreue mich jeden Tag daran. Ach sagte das Mädchen: Ich möchte auch etwas Lernen das mir Freude macht!'."\n"
		            .'Nur zu finde heraus was es sein soll! Riet ihr das Männchen. Wie mache ich das? Fragte sie interessiert!'."\n"
		            .'Probiere viel aus und da wo dein Herz zu singen anfängt und du dich selbst ganz vergisst – das ist es!!!'."\n"
		            .'Das lerne und vertiefe dann!  Das klingt gut!  antwortete sie. Ausprobieren ist spannend das tue ich gerne!'."\n"
		            .'Also so wirst du deinen Schatz finden! Glaube mir! '."\n"
		            .'Das Mädchen bedankte sich und bat das Männchen noch einmal etwas zu spielen.'."\n"
		            .'Sie lauschte und dachte beglückt: Ich werde das finden was mich glücklich macht!!!',
		        'created_at' => '2020-06-28 22:33:56',
		        'deleted_at' => null,
		        'published_at' => '2020-06-28 18:32:41',
		        'slug' => 'es-war-einmal',
		        'title' => 'Es war einmal',
		        'updated_at' => '2020-06-29 05:42:18',
		        'uuid' => Str::orderedUuid(), //'6110923e-9c32-4654-9440-6aabdc596e6e',
		    ],
		    [
		        'body' => 'Lass alles los am Abend sei nur müde und bereit für'."\r\n"
		            .'die Nacht mit ihren Gaben träume, träume weit!'."\r\n"
		            .'Lerne Lebe Lache Weine sei dir gut und komm mit dir ins Reine'."\r\n"
		            .'Pflanze wilden Mut und verwegene Hoffnung in die Herzen'."\r\n"
		            .'Vergiss niemals besonders mit den Kindern immer wieder auch zu scherzen'."\r\n"
		            .'Mache dir das Leben leicht denn du musst es leben'."\r\n"
		            .'Werde wie ein Kätzchen das nur tut was es wirklich will - das wird dir das Gefühl von Freiheit geben'."\r\n"
		            .'Freue dich mit am Glück der Andern'."\r\n"
		            .'Weine für dich leis und still'."\r\n"
		            .'Schlafe ein mit Musik sie berührt die Seele weiß was ist und werden will'."\r\n"
		            .'Pflege deine Künste bei Tag und auch bei Nacht'."\r\n"
		            .'Weigere dich -  zu denken was alle denken sondern'."\r\n"
		            .'Träume du am kühnsten '."\r\n"
		            .'Stell dir vor ALLES  nimmt für dich ein gutes Ende'."\r\n"
		            .'Höre auf dein Seelenlied'."\r\n"
		            .'Öffne täglich deine Hände ganz egal was auch geschieht'."\r\n"
		            .'Baue Brücken wo du kannst denn du kannst  klar denken und so auf deine Art die Geschicke dieser'."\r\n"
		            .'Erde ein klein bisschen lenken'."\r\n"
		            .'Umarme Freud und Leid im Leben denn alles gehört dazu umarme auch die Menschen denn sie sind wie ich und du'."\r\n"
		            .'Schreibe so oft es dir danach ist,  denk nicht das bringt doch nichts denn du hast es oft erfahren das was zu Wort kommt birgt letztlich keine Gefahren!'."\r\n"
		            .'Online Schreibnacht November 2020',
		        'created_at' => '2022-02-05 08:39:09',
		        'deleted_at' => null,
		        'published_at' => '2022-02-05 07:37:00',
		        'slug' => 'lass-alles-los',
		        'title' => 'Lass alles los',
		        'updated_at' => '2022-04-27 06:50:23',
		        'uuid' => Str::orderedUuid(), //'6d8acf3c-6c67-4010-ae3c-ed05b9ceb3d9',
		    ],
		    [
		        'body' => 'Es trennt den Herbst vom Sommer bloß ein zarter Schleier.*'."\n"
		            .'So sanft und mild der Übergang'."\n"
		            .'Kaum merklich geht das Licht ins Gold  auch spürst'."\n"
		            .'du  jetzt  den neuen Wind.'."\n"
		            .'Die Blätter sind noch an den Bäumen, manch Eines rot'."\n"
		            .'und Herbstzeitlose schmücken Wiesen.'."\n"
		            .'Das Feld ist nur noch braune Scholle.'."\n"
		            .'Die Luft riecht erdig und ist feucht.'."\n"
		            .'Der Winterraps wächst dir entgegen du grüßt'."\n"
		            .'Ihn freudig im Vorbei'."\n"
		            .'Er wird die nächsten Wochen auf dich warten!'."\n"
		            .'Dein Herz trägt grün und gelb und rot'."\n"
		            .'Es liebt die Jahreszeiten es weiß dass alles '."\n"
		            .'gehen muss und doch ist da ein Bleiben.'."\n"
		            ."\n"
		            .'Schreibnacht September Sybille'."\n"
		            .'* Giannina Wedde Anfangssatz',
		        'created_at' => '2020-09-26 00:33:47',
		        'deleted_at' => null,
		        'published_at' => '2020-09-26 00:30:12',
		        'slug' => 'herbst-beginn',
		        'title' => 'Herbst Beginn',
		        'updated_at' => '2020-09-26 00:33:47',
		        'uuid' => Str::orderedUuid(), //'730d5394-d34e-46de-bac1-70b2d29056d1',
		    ],
		    [
		        'body' => 'Morgensonne, die mich begrüßt,'."\n"
		            .'ein Lächeln in meiner Seele wird wach.'."\n"
		            .'Vogelgezwitscher, Gespräch der Natur, gerne würde ich verstehen.'."\n"
		            .'Lauschend halte ich still, berührt von – Etwas -'."\n"
		            .'Uralte Welt, schon lange vor mir dagewesen, wird sein wenn ich vergehe.'."\n"
		            .'Am Meer wogt mir entgegen – Vergangenheit – Gegenwart und Zukunft.'."\n"
		            .'Auch in der Sternendichte, blinkt und glitzert, das was war und ist.'."\n"
		            .'Pinienwälder, die meine Träume säumen, bewachen.'."\n"
		            .'Glühwürmchen erhellt das Dunkel und lässt mich lachen.'."\n"
		            .'Der Schöpfer hat Humor.',
		        'created_at' => '2020-05-21 14:30:25',
		        'deleted_at' => null,
		        'published_at' => '2020-05-21 14:29:41',
		        'slug' => 'schreibwerkstatt-ligurien-juni-2010-sommergedichte-suden',
		        'title' => 'Schreibwerkstatt Ligurien Juni 2010, Sommergedichte: Süden',
		        'updated_at' => '2020-05-21 14:30:25',
		        'uuid' => Str::orderedUuid(), //'73ea37a8-0580-4f54-b80b-6c199e443e1a',
		    ],
		    [
		        'body' => 'Egehausa heißt mei Dorf lait am Waldrand do wo Fuchs ond Has sich treffet'."\r\n"
		            .'da wo dr Bretterzaun übern Bach nom goht und da wo die große Eiche am Ortseingang stod!'."\r\n"
		            .'Da wohn I und mei Ma mit m‘ Bambus vorm Haus und hinte kannsch zum Garde naus!'."\r\n"
		            .'Reh ond Hirsch ond auch di Kü stehn uf der Wies scho morgens früh.'."\r\n"
		            .'Die Leit sind alle scho ganz nett – schüttlet aus ihr Federbett – machet Samstagsputz ums Haus,'."\r\n"
		            .'nehmet au im Auto älle Matta raus. Froget net viel -  wisset aber älles. Wann du aufschtosch, wer di'."\r\n"
		            .'bsucht ob du Schprudel tränksch oder fluchsch. Helfet gern und immer – gehn ind Kirch und zum Posaunechor'."\r\n"
		            .'kennet Bibel meget Zwiebel au mit Roschdbroda dun se ihre Spätzle esse und niemals de Weltspardag forgessa!!!'."\r\n"
		            .'Egehausa do wohn i gern bin dem Weltgeschäha so sche fern.',
		        'created_at' => '2022-02-05 08:59:06',
		        'deleted_at' => '2022-02-05 11:09:54',
		        'published_at' => '2022-02-05 08:57:06',
		        'slug' => 'do-wohn-i',
		        'title' => 'Do wohn i',
		        'updated_at' => '2022-02-05 11:09:54',
		        'uuid' => Str::orderedUuid(), //'79d0d4c8-d6b5-42ce-889d-4faa5e825310',
		    ],
		    [
		        'body' => 'Jenseits von richtig und falsch da liegt ein Land'."\n"
		            .'da treffen wir uns. Rumi'."\n"
		            ."\n"
		            .'Du siehst es durch deine Brille'."\n"
		            .'Ich sehe es durch meine'."\n"
		            .'Deine Sicht und meine Sicht erklären sich uns '."\n"
		            .'oberflächlich gesehen erst mal nicht'."\n"
		            .'Dein Ego und mein Ego beide Egos wollen recht behalten'."\n"
		            .'Bei jungen Egos noch verständlich '."\n"
		            .'lächerlich wirkt es dann bei den Alten'."\n"
		            .'Du und ich kommen aus unterschiedlichen Stämmen'."\n"
		            .'die Gleiches unterschiedlich beurteilen und benennen'."\n"
		            .'oder'."\n"
		            .'Du bist vom Mars und ich komme von der Venus'."\n"
		            .'Du bist Wasser ich bin Licht'."\n"
		            .'Du bist Flamme ich bin Erde'."\n"
		            .'Was muss geschehen damit zwischen uns die'."\n"
		            .'Weisheit wächst'."\n"
		            .'und Friede werde?'."\n"
		            ."\n"
		            .'Februar 2021',
		        'created_at' => '2021-03-02 01:23:57',
		        'deleted_at' => null,
		        'published_at' => '2021-03-02 01:23:13',
		        'slug' => 'jenseits-von-richtig-und-falsch',
		        'title' => 'Jenseits von richtig und falsch',
		        'updated_at' => '2021-03-02 01:23:57',
		        'uuid' => Str::orderedUuid(), //'85b54b08-e97c-4f08-b688-7d9fd4ce94d2',
		    ],
		    [
		        'body' => 'Du hast dir eine Glatze verpasst und hältst dir die Hand vor den Mund, es fehlen dir zwei Zähne das ist der Grund.'."\r\n"
		            .'Grimmig schaust du in die Welt, denn keiner soll dir zu nahe kommen und du riechst nach verwahrlostem Leben,'."\r\n"
		            .'nach verstörter Seele und verborgenem Leid – als du ein Kind warst hatte keiner für dich Zeit! Missmut und Schläge'."\r\n"
		            .'löstest du aus und ganz früh musstest du zu Hause raus! Du gehst ins Karate 4 mal in der Woche am Wochenende wendest'."\r\n"
		            .'du es dann an, bist stolz weil du Knochen brechen kannst. '."\r\n"
		            .'Wenn ich dich sehe tut es mir leid. Ich würde dir gerne helfen aber nichts heilt die Zeit.'."\r\n"
		            .'Dein Schicksal wurde sehr früh schon besiegelt, du traust keinem mehr!'."\r\n"
		            .'Verlorene Seele die sich schützt mit einem Panzer aus Argwohn, Gewalt, Angst und viel Wut!'."\r\n"
		            .'Doch einmal da ist etwas in dir aufgebrochen, da warst du plötzlich ganz weich und so offen da hast du'."\r\n"
		            .'mir deine Hand gereicht, mich schüchtern angesehen wie der 5 jährige kleine Junge und ich ahnte die schwere'."\r\n"
		            .'deiner Last in der Summe!'."\r\n"
		            .'Schreibnacht 2021',
		        'created_at' => '2022-02-05 08:43:36',
		        'deleted_at' => '2022-02-05 20:08:54',
		        'published_at' => '2022-02-05 07:39:09',
		        'slug' => 'einmal',
		        'title' => 'Einmal',
		        'updated_at' => '2022-02-05 20:08:54',
		        'uuid' => Str::orderedUuid(), //'8dc2ad75-65b5-4270-9ef7-ce9ce2a7e975',
		    ],
		    [
		        'body' => 'Kurze pregnante Texte, die es in sich haben, die bewegt werden wollen und die, den Leser in Bewegung bringen. Ich würde sagen Gehirnjogging für Denker.',
		        'created_at' => '2020-05-21 10:05:29',
		        'deleted_at' => null,
		        'published_at' => '2020-05-21 09:05:13',
		        'slug' => 'ulrich-schaffer-handbuch-der-mutigen',
		        'title' => 'Ulrich Schaffer: Handbuch der Mutigen',
		        'updated_at' => '2020-05-21 10:05:29',
		        'uuid' => Str::orderedUuid(), //'9bdca49a-50f4-4a14-8207-4124b5a4d1b9',
		    ],
		    [
		        'body' => 'Die Vögel ziehen fort in weite Ferne'."\n"
		            .'Du spürst das Kalt am morgen'."\n"
		            .'Trägst die warmen Schuhe'."\n"
		            .'Das Hagebuttenrot ist nun dein Trost'."\n"
		            .'Und die letzten Rosen auch.'."\n"
		            .'Noch einmal spürst du Sommer denn'."\n"
		            .'Die späten Sonnenblumen blühen noch'."\n"
		            .'Und du denkst: Ach wie schön war das doch!'."\n"
		            .'Nimmst Abschied lässt die Vögel ziehen'."\n"
		            .'Und bist dankbar, dass die Sonnenblumen blühen!'."\n"
		            ."\n"
		            .'Online Schreibnacht Sybille',
		        'created_at' => '2020-10-23 08:59:05',
		        'deleted_at' => null,
		        'published_at' => '2020-10-23 06:58:37',
		        'slug' => 'herbst',
		        'title' => 'Herbst',
		        'updated_at' => '2020-10-23 09:00:42',
		        'uuid' => Str::orderedUuid(), //'a2928a70-811f-4c8d-af1a-277f4fc3774b',
		    ],
		    [
		        'body' => 'Die Stille liegt in allem'."\n"
		            .'In Frau im Mann im Kinde'."\n"
		            .'In Blume Baum Gewässer Rinde'."\n"
		            .'Sie spricht mit stiller Stimme vom Dasein und vom Sinn'."\n"
		            .'Sie gibt mir Antwort wer ich bin'."\n"
		            ."\n\n"
		            .'Die Stille wirkt in allem'."\n"
		            .'Im Kerzenlicht in Mondesnacht und wenn du lachst'."\n"
		            .'auch im Gedicht'."\n"
		            .'In Tränen und in Heiterkeit und jedem Angesicht'."\n"
		            .'Sie spricht mit stiller Stimme vom Abend- und vom Morgenlicht'."\n"
		            .'Zeigt dir den Weg'."\n"
		            .'und'."\n"
		            .'Flüstert '."\n"
		            .'fürcht dich nicht'."\n"
		            ."\n\n"
		            .'Die Stille ruht in allem'."\n"
		            .'Im Blatt im Traum im Wolken ziehen '."\n"
		            .'Sie ruht im Vogelnest  im Immergrün und auch in jeder Sprache'."\n"
		            .'spricht in der Musik vom  Leben und Danache'."\n"
		            .'Die Stille will dich finden'."\n"
		            .'Damit du selbst dich findest und aus der Stille dann heraus'."\n"
		            .'dein Leben neu ergründest und erfindest',
		        'created_at' => '2021-01-30 01:11:24',
		        'deleted_at' => null,
		        'published_at' => '2021-01-30 01:11:01',
		        'slug' => 'die-stille',
		        'title' => 'Die Stille',
		        'updated_at' => '2021-01-30 01:11:24',
		        'uuid' => Str::orderedUuid(), //'aaccf490-7f7b-4f91-81ce-740b4f198aab',
		    ],
		    [
		        'body' => 'Wir treiben auf dem Floß der Zeit '."\r\n"
		            .'durch ruhige Wasser und durch wilde Stürme'."\r\n"
		            .'Wir halten durch und sind bereit'."\r\n"
		            .'denn das was uns erwartet ist das Ende unserer Zeit'."\r\n"
		            .'Was gibt uns Mut und Kraft und Halt'."\r\n"
		            .'Es ist der Wille zu überleben'."\r\n"
		            .'Die Hoffnung wurde als Segel uns allen mitgegeben'."\r\n"
		            .'Wir treiben auf dem Floß der Zeit dem Horizont'."\r\n"
		            .'entgegen'."\r\n"
		            .'Genießen wir die kurze Fahrt denn das ist unser Leben'."\r\n"
		            .'Schreibnacht im Juli Sybille',
		        'created_at' => '2022-02-05 09:06:59',
		        'deleted_at' => null,
		        'published_at' => '2022-02-05 08:05:27',
		        'slug' => 'unser-leben',
		        'title' => 'Unser Leben',
		        'updated_at' => '2022-04-27 06:49:58',
		        'uuid' => Str::orderedUuid(), //'ab7649c6-d6a0-4403-954e-bb42d8ceef45',
		    ],
		    [
		        'body' => 'Ohne Sprache ist man nichts – sagt sie aus tiefster innerer Überzeugung! 20 Jahre ist sie alt, dunkelbraune, wache Augen, so wach wie ihr Verstand. Vor mit sitzt ein Mensch, eine junge Frau, die aus einem Land kommt von dem ich bisher nur Kopftuch, Verschleierung und Unterwürfigkeit bei Frauen erlebt habe. Wieder bin ich gespannt auf eine Geschichte, die mir erklärt, was Frauen zu dem macht was sie sind. Sie hat ihren Steckbrief ausgefüllt und ich habe ihr meinen gegeben. Wir gehen die Fragen miteinander durch. Sie beginnt mit ihrem Namen und ich frage wo sie geboren wurde. Kabul Afghanistan -  sie erzählt von ihrer Familie: Die Mutter Lehrerin für Biologie und Chemie, der Vater Ingenieur bei den Wasserwerken in Kabul. Aber er lebt nicht mehr, sagt sie. Als ich 11 Jahre alt war wurde er erschossen. Meine Mutter sagte mir: Er hat für die Regierung gearbeitet ….. ich frage ob es ein Attentat war, sie sagt ja. Ich bin sprachlos.'."\r\n"
		            .'Unser Gespräch geht auf eine andere Ebene, wir schauen uns an und ich sage:'."\r\n"
		            .'Das Leben ist ungerecht – sie nickt. Wir haben beide durch Erfahrungen begriffen, dass es so ist. Diese Erkenntnis verbindet uns. Sie ist 20 – ich bin 64.'."\r\n"
		            ."\r\n"
		            .'Wir sprechen über meinen Steckbrief, sie stellt Fragen zu meiner Familie, will wissen was mein Mann arbeitet und wo wir uns kennengelernt haben. Sie fragt gezielt wie wenn sie die Chance nutzen will etwas über ein Leben hier in Deutschland erfahren zu können.'."\r\n"
		            .'Wir wechseln dann wieder zu ihrem Steckbrief. Ich frage sie nach ihrer Lieblingsmusik, sie erzählt und ich frage ob sie Spotify auf ihrem händy hat. Und dann sucht sie ihre Lieblingsmusik und spielt sie mir vor. Wir lauschen, sie den vertrauten Klängen, ich den fremden Klängen. Jetzt will sie meine Musik hören. Ich lächle und wir hören Lorena MC Kennet. Sie sagt: Das ist schön und geheimnisvoll! Sie will wissen was ich lese. 7 Bücher parallel, ich gebe ihr einen kurzen Abriss. Sie interessiert sich für Psychologie. Das merke ich mir, sehe mich schon die Zeitschrift: Psychologie heute, für sie ein packen. Sie erzählt, dass ihre Mutter sehr krank ist, depressiv, dass sie durch den Tod des Vaters völlig alleine mit ihren zwei Kindern war, weil aus ihrer Familie niemand mehr lebt und dann kam vor 5 Jahren die Flucht, das hat sie zerstört. Sie hat keine Kraft mehr irgendetwas zu tun. Sie die Tochter, lebt nicht mehr zu Hause sondern bei ihrem Mann, sie ist verheiratet. Gott sei Dank denke ich, hat sie einen anderen Lebensmittelpunkt. Sie musste gehen, sagt sie, sonst wäre sie auch krank geworden. Sie besucht ihre Mutter und den Bruder zweimal in der Woche.'."\r\n"
		            .'Wir reden zwei Stunden miteinander, der Steckbrief wird ausgeschlachtet, muss herhalten für alle möglichen Verzweigungen im Gespräch, die sich aus den Fakten ergeben. Bei der Frage nach dem Lebensmotto will sie von mir wissen, wie ich das meine. Das Leben lieben! Ich glaube an das Gute, das wir tun können füreinander -  sage ich. Die Schönheit der Natur, die Musik, meine Arbeit, die Familie und die Freundinnen – das Alles liebe ich. Sie schaut mich direkt an, nickt und lächelt dabei.',
		        'created_at' => '2022-02-05 08:30:18',
		        'deleted_at' => '2022-02-05 20:09:09',
		        'published_at' => '2022-02-05 08:29:15',
		        'slug' => 'sprache-ist-jetzt-das-wichtigst',
		        'title' => 'Sprache ist jetzt das Wichtigste',
		        'updated_at' => '2022-02-05 20:09:09',
		        'uuid' => Str::orderedUuid(), //'ae13ad76-e47c-4e01-9509-17804c55181a',
		    ],
		    [
		        'body' => 'Bauch Beine Po'."\r\n"
		            .'Wenn ich daran denke werde ich nicht froh'."\r\n"
		            .'Bauch Beine Po'."\r\n"
		            .'werden sich nur dann verändern'."\r\n"
		            .'wenn ich es schaffe an allem Süßen gelassen vorbei zu schlendern'."\r\n"
		            .'Bauch Beine Po'."\r\n"
		            .'Nehm ich mit ins Grab und hab mein Leben dann genossen'."\r\n"
		            .'mit Sekt und ohne Sprossen mit Schmalzgebäck und Himbeereis'."\r\n"
		            .'mir doch egal ich mag den Scheiß!'."\r\n"
		            .'Statt'."\r\n"
		            .'Bauch Beine Po'."\r\n"
		            .'Steh ich auf '."\r\n"
		            .'Herz Güte Flow'."\r\n"
		            .'Und das ist besser so'."\r\n"
		            .'Denn '."\r\n"
		            .'Herz Güte Flow'."\r\n"
		            .'Macht mich und andere froh!',
		        'created_at' => '2022-04-15 18:52:20',
		        'deleted_at' => null,
		        'published_at' => '2022-04-15 16:52:01',
		        'slug' => 'bauch-beine-po',
		        'title' => 'Bauch Beine Po',
		        'updated_at' => '2022-04-27 06:49:41',
		        'uuid' => Str::orderedUuid(), //'b99f0c83-cb3d-4f89-aff3-0dfb20f0f119',
		    ],
		    [
		        'body' => 'Es war einmal ein kleines, unschuldiges Mädchen, dass mit großen Augen die Welt betrachtete.'."\r\n"
		            .'Wo kommen die Schneeflocken her? Fragte sie in einer  verschneiten Winternacht.'."\r\n"
		            .'Woher wissen die Vögel wo Süden ist? Fragte sie im Herbst'."\r\n"
		            .'Wie finden die Bienen auf den Blumenwiesen zu ihrem Bienenstock zurück? Fragte sie im Sommer'."\r\n"
		            .'Wie schaffen es die Frösche ihren Teich zu finden in dem sie geboren wurden?  Fragte sie im Frühling'."\r\n"
		            .'Nie hörten ihre Fragen auf! Die Erwachsenen waren es müde ihr ständig etwas Erklären zu müssen.'."\r\n"
		            .'Und sie fand es seltsam, dass Erwachsene kein Interesse hatten an all diesen Besonderheiten.'."\r\n"
		            .'So erzählte sie ihrem Kater Mikesch was sie wusste und was sie wissen wollte.'."\r\n"
		            .'Dabei kraulte sie ihn und er hörte ihr meist geduldig zu.'."\r\n"
		            .'Eines Tages war sie wieder unterwegs in den Wäldern da hörte sie plötzlich wunderbare Flötenmusik.'."\r\n"
		            .'Sie blieb stehen und lauschte. Woher kam die Musik? Sie lief weiter am Bach entlang bis zu einer uralten Holz Brücke.'."\r\n"
		            .'Dort saß ein kleines Männchen das spielte selbstvergessen auf seiner Flöte.'."\r\n"
		            .'Das Mädchen lauschte solange bis das Männchen sein Lied beendet hatte.'."\r\n"
		            .'Dann trat es herzu! Wie wunderschön du spielst! Oh danke sagte es. Wie hast du das gelernt?'."\r\n"
		            .'wollte das Mädchen wissen! Weißt du ich habe es gelernt weil ich mich sehr allein gefühlt habe in dieser Welt.'."\r\n"
		            .'Es gab niemand, der sich für mich interessiert hat und da blieb mir nichts anderes übrig als mit mir selbst'."\r\n"
		            .'gut Freund zu werden und mir die Zeit mit Schönem zu vertreiben! So habe ich das Flöten spielen gelernt '."\r\n"
		            .'und ich erfreue mich jeden Tag daran. Ach sagte das Mädchen: Ich möchte auch etwas Lernen das mir Freude macht!'."\r\n"
		            .'Nur zu finde heraus was es sein soll! Riet ihr das Männchen. Wie mache ich das? Fragte sie interessiert!'."\r\n"
		            .'Probiere viel aus und da wo dein Herz zu singen anfängt und du dich selbst ganz vergisst – das ist es!!!'."\r\n"
		            .'Das lerne und vertiefe dann!  Das klingt gut!  antwortete sie. Ausprobieren ist spannend das tue ich gerne!'."\r\n"
		            .'Also so wirst du deinen Schatz finden! Glaube mir! '."\r\n"
		            .'Das Mädchen bedankte sich und bat das Männchen noch einmal etwas zu spielen.'."\r\n"
		            .'Sie lauschte und dachte beglückt: Ich werde das finden was mich glücklich macht!!!',
		        'created_at' => '2022-02-05 09:05:27',
		        'deleted_at' => '2022-02-05 09:17:11',
		        'published_at' => '2022-02-05 08:59:06',
		        'slug' => 'es-war-ein',
		        'title' => 'Es war einmal .....',
		        'updated_at' => '2022-02-05 09:17:11',
		        'uuid' => Str::orderedUuid(), //'bbf032ef-28de-40a4-b6f4-8eb5e68b5d71',
		    ],
		    [
		        'body' => 'Als welkten in den Himmeln ferne Gärten* Rilke'."\r\n"
		            ."\r\n"
		            .'Ohne Dich geh ich meinen Lebensweg weiter'."\r\n"
		            .'So endgültig  zu Ende, gar nicht mehr und niemals wieder'."\r\n"
		            .'werden wir uns hier auf dieser Erde wiedersehen!'."\r\n"
		            .'Unbegreiflich, verstörend, tieftraurig …'."\r\n"
		            .'Ich will nicht fragen wie konnte das geschehen:'."\r\n"
		            .'Denn es ist so wie es ist, ich kann und will, hinter diese Tatsache,'."\r\n"
		            .'nicht mehr zurück. Denn damit mache ich es mir noch viel schwerer.'."\r\n"
		            .'Verbunden sein über die Trauer hinaus, so lebe ich ohne dich'."\r\n"
		            .'und doch mit dir, in meinem Lebenshaus!'."\r\n"
		            .'Als welkten in den Himmel ferne Gärten die dann im'."\r\n"
		            .'Frühling wieder grünen, blühen - Kraft uns schenken'."\r\n"
		            .'damit wir diese Leere überstehen und an die Liebe zueinander denken.'."\r\n"
		            .'Sybille 15.02. 2022',
		        'created_at' => '2022-02-15 22:59:58',
		        'deleted_at' => '2022-02-15 23:11:37',
		        'published_at' => '2022-02-15 22:59:12',
		        'slug' => 'ohne-dich',
		        'title' => 'Ohne Dich',
		        'updated_at' => '2022-02-15 23:11:37',
		        'uuid' => Str::orderedUuid(), //'bf097a51-e36a-41ff-a355-53228d3585d8',
		    ],
		    [
		        'body' => 'Dein Ich hat viele Gesichter'."\n"
		            .'Welches magst du am liebsten?'."\n"
		            .'Das Gelassene, das Neugierige,'."\n"
		            .'das Konzentrierte?'."\n"
		            .'Welches magst du am wenigsten?'."\n"
		            .'Das Traurige, das Enttäuschte, '."\n"
		            .'das Ängstliche, das Verletzte'."\n"
		            .'oder das Beschämte?'."\n"
		            ."\n"
		            .'Stimmungen kommen und gehen'."\n"
		            .'Deine Gesichter kommen und gehen'."\n"
		            .'Nimm sie so an, wie sie kommen dann gehen'."\n"
		            .'Sie auch wieder und kommen dann wieder wenn deine Gefühle'."\n"
		            .'Sie rufen'."\n"
		            .'Verdrängst du sie, deine Gefühle und damit deine Gesichter'."\n"
		            .'Dann wirst du unecht, unecht gelassen, unecht neugierig,'."\n"
		            .'unecht konzentriert,'."\n"
		            .'unecht fröhlich einfach'."\n"
		            .'unecht!'."\n"
		            .'Sei echt!',
		        'created_at' => '2020-10-13 09:27:55',
		        'deleted_at' => null,
		        'published_at' => '2020-10-13 09:27:34',
		        'slug' => 'gesichter',
		        'title' => 'Gesichter',
		        'updated_at' => '2020-10-13 09:27:55',
		        'uuid' => Str::orderedUuid(), //'c01c81b9-e016-4b6e-88a0-8bcb25d4d3fe',
		    ],
		    [
		        'body' => 'Schneeglöckchen sein'."\n"
		            .'so weiß so klein so fein'."\n"
		            .'Botin für diesen einen Frühlingsbeginn'."\n"
		            .'Dasein in Allem was ist'."\n"
		            .'das ist der Sinn'."\n"
		            .'so bescheiden so einfach so schön'."\n"
		            .'auf seinem Platze zu stehen'."\n"
		            .'von der Sonne beschienen vom Wind gewiegt'."\n"
		            .'vom Gras umschmeichelt'."\n"
		            .'dabei spüren'."\n"
		            .'Das Leben siegt'."\n"
		            .'Sich nicht sorgen ärgern und hetzen'."\n"
		            .'alles wird gut'."\n"
		            .'wenn du es gut sein lässt'."\n"
		            .'dich nicht widersetzen'."\n"
		            .'dich umschauen freuen genießen'."\n"
		            .'Schneeglöckchen sein'."\n"
		            .'das kann ich für mich selbst beschließen!'."\n"
		            .' Online Schreibnacht März Sybille',
		        'created_at' => '2021-03-17 21:40:03',
		        'deleted_at' => null,
		        'published_at' => '2021-03-17 21:39:10',
		        'slug' => 'schneeglockchen-sein',
		        'title' => 'Schneeglöckchen sein',
		        'updated_at' => '2021-03-17 21:40:03',
		        'uuid' => Str::orderedUuid(), //'c9e63550-6948-46d1-8224-d51b2fae1663',
		    ],
		    [
		        'body' => 'Ich bin die Frühaufsteherin, die Morgens Musikhörerin, die Wolkenschauerin, die Luftschlösser Bauerin, die aus dem Bettspringerin,'."\r\n"
		            .'Kleider Farbkartenwählerin aber keine Erbsenzählerin!'."\r\n"
		            .'Ich bin die 6 Minuten Tagebuchschreiberin, die sich mit Weledacreme Einreiberin, die Kaffee ohne Koffein Trinkerin, die Morgenmuffel Alleinsein Wollerin,'."\r\n"
		            .'die im Morgengrauen Fahrradfahrerin, die Naturfanatikerin, die Kilometermacherin, die durchs Leben Stramplerin.'."\r\n"
		            .'Ich bin die Windbraut, die Helmträgerin, die Buckelrunterraserin, die Waldfee und die Kranichbeobachterin, die Kinderliebhaberin und die Freiheitskämpferin,'."\r\n"
		            .'die Feministin auch war ich mal Gitarristin!'."\r\n"
		            .'Ich bin halt was ich bin'."\r\n"
		            .'Die Frohnatur, die Arbeitsame, die Kollegin, die heimliche Flamme, die Ratgeberin, die Bücherfresserin, die Antipasti Esserin.'."\r\n"
		            .'Die Gartenfee, die Malerin, die Zitatensammlerin, die Blumenfreundin, die Vogelkennerin, die Beerensammlerin, die Schneckenhaussucherin'."\r\n"
		            .'Die Pfützenspringerin, die Mützenträgerin, die Gruppenleiterin, die Suppenköchin, die Schnittlauchbrote Liebhaberin, die Brillensucherin,'."\r\n"
		            .'die Himbeersüchtige, die Reiseleiterin, die Dichterfrau, die Rampensau, die Autoschlüsselverlegerin, die immer Pünktliche, die Delegiererin,'."\r\n"
		            .'die Applauskassiererin.'."\r\n"
		            .'Und das bin ich auch!'."\r\n"
		            .'Die Frühschlafengeherin, die Kuscheldeckenliebhaberin, die Nachtmusikhörerin, die Schnelleinschläferin!'."\r\n"
		            .'Die bei offenem Fensterschlafende, die Gebeteaufsagende.'."\r\n"
		            .'Schreibnacht September',
		        'created_at' => '2022-02-05 08:57:06',
		        'deleted_at' => null,
		        'published_at' => '2022-02-05 06:43:36',
		        'slug' => 'und-das-bin-ich-auch',
		        'title' => 'Und das bin ich auch...',
		        'updated_at' => '2022-04-27 06:50:12',
		        'uuid' => Str::orderedUuid(), //'d54192e8-a231-46c0-b13c-fbcc3786beda',
		    ],
		    [
		        'body' => 'Das Meer in mir '."\r\n"
		            .'Es wogt, es gischtet, es bricht an den Strand'."\r\n"
		            .'Ist salzige Kühle und weißer Schaumkronenrand'."\r\n"
		            .'Es trägt mich hinaus den Horizont als Ziel'."\r\n"
		            .'Es trägt mich hinein im Wellenspiel'."\r\n"
		            .'Muscheln, Seetang, Möwenschrei gehören'."\r\n"
		            .'zusammen und sagen mir:'."\r\n"
		            .'Du bist frei!'."\r\n"
		            .'Dein Sein ist wie das Kommen und Gehen der Wellen'."\r\n"
		            .'Wie Morgen und Abend! Wie Ebbe und Flut!'."\r\n"
		            .'Der ewige Zyklus schenkt Ruhe und Mut.'."\r\n"
		            .'Dem Himmel so nah, dem Meer so weit'."\r\n"
		            .'Doch alles in mir  - meine kleine Ewigkeit!',
		        'created_at' => '2022-04-15 18:58:41',
		        'deleted_at' => null,
		        'published_at' => '2022-04-15 14:56:56',
		        'slug' => 'meer',
		        'title' => 'Meer',
		        'updated_at' => '2022-04-27 06:48:46',
		        'uuid' => Str::orderedUuid(), //'d7e76226-e208-445b-9726-8998bfcdfec1',
		    ],
		    [
		        'body' => 'Ein Text von mir, der veröffentlicht wurde in der Zeitschrift vom'."\r\n"
		            .'Wörnersberger Anker  März 2022'."\r\n"
		            ."\r\n"
		            .'Mein Herz sagt: Kunst'."\r\n"
		            ."\r\n"
		            .'Kunst und Resilienz'."\r\n"
		            ."\r\n"
		            .'In jedem Menschen ist ES angelegt.'."\r\n"
		            .'Jeder Mensch könnte die Verwirklichung eines wunderbaren Traumes sein, einer Geschichte, eines Kunstwerks.'."\r\n"
		            .'Jeder Mensch könnte eine tiefe wahrhafte Bereicherung sein,'."\r\n"
		            .'ein Phänomen, eine lebendige Sinfonie.'."\r\n"
		            .'Jeder Mensch ein Stern, der leuchtet.'."\r\n"
		            .'Jeder Mensch ein wunderbares Wesen.'."\r\n"
		            .'Sybille Seuffer'."\r\n"
		            ."\r\n"
		            .'Einer meiner Lieblingstexte, der zum Ausdruck bringt um was es mir in meinem Leben und auch in meiner Arbeit geht.'."\r\n"
		            .'Seit 25 Jahren bin ich kreativ unterwegs. In uns allen sprudelt eine unerschöpfliche Quelle die uns drängt, dass in die Welt zu bringen was unser Eigenes ist. Malen, Zeichnen, Schreiben, Musizieren, Tanzen, Singen, Fotografieren, Basteln, Nähen, Kochen, Handarbeiten, Handwerkern'."\r\n"
		            .'und vieles mehr ….'."\r\n"
		            .'alles Möglichkeiten um unsere Kreativität zu leben. Und doch höre ich immer wieder: „Ja stimmt, es tut mir gut zu malen, aber alleine'."\r\n"
		            .'tue ich es nicht, nur hier bei dir in der Malwerkstatt.“ oder „Ja stimmt, das kreative Schreiben macht mich zufrieden und schenkt mir wunderbare'."\r\n"
		            .'Momente wenn ich euch meine Texte vorlesen kann und eine Resonanz bekomme, aber allein schreiben zu Hause nein, das krieg ich nicht hin.“'."\r\n"
		            .'Es scheint ein längerer Weg zu sein, den wir gehen müssen bis wir innerlich entflammt sind und gar nicht mehr anders können als schöpferisch tätig zu sein. '."\r\n"
		            .'Mein Anliegen geht dahin, auf diesem Weg zu begleiten  - für Menschen, die gerne zeichnen, malen und kreativ Schreiben wollen, die in diesen'."\r\n"
		            .'Bereichen immer wieder neue Herausforderungen suchen und ihre Eigenwirksamkeit spüren wollen. '."\r\n"
		            .'Dabei beobachte ich, dass Menschen zur Ruhe kommen, sich entspannen, die Waschmaschine im Kopf still steht, Freude sich einstellt,'."\r\n"
		            .'das Gefühl über sich hinauszuwachsen aus den Augen strahlt. Und diese Erfahrungen wirken nach, bis in den Alltag hinein.'."\r\n"
		            .'Das bestätigen mir  auch meine Teilnehmerinnen und ein Teilnehmer in der Malwerkstatt einer psychosozialen Einrichtung. Diese Malwerkstatt leite ich seit 8 Jahren.'."\r\n"
		            .'Menschen, die Schweres erlebt haben,'."\r\n"
		            .'die seelisch belastet sind, die in der Klinik waren, die nicht mehr ihren Beruf ausüben können oder die vorübergehend pausieren um wieder Boden unter den Füssen'."\r\n"
		            .'zu bekommen, besuchen diese Malwerkstatt, einmal in der Woche für 4 Stunden. Kreativsein stärkt den Menschen, schenkt die Erfahrung, dass jeder Mensch mehr ist'."\r\n"
		            .'als sein Problem, seine Schwäche, sein Unvermögen, seine Krankheit. Schönes schaffen ist zutiefst befriedigend und ist ein Geschenk an die Welt. Jeder hat etwas zu geben.'."\r\n"
		            .'In Gemeinschaft kreativ sein hat etwas sehr friedliches. Das strahlt auch'."\r\n"
		            .'auf Besucher der Malwerkstatt aus, die gar nicht selbst malen sondern einfach dabei sitzen, ihren Kaffee trinken, ein bisschen zuschauen und die Zeitung lesen. '."\r\n"
		            .'Kunst kommt von Können.'."\r\n"
		            .'Können stellt sich durch regelmäßiges Tun ein. Inzwischen sind meine Teilnehmerinnen und mein Teilnehmer in der Malwerkstatt längst an dem Punkt angelangt, dass'."\r\n"
		            .'sie mit ihren Bildern an die Öffentlichkeit gehen können. Drei Vernissagen haben wir schon veranstaltet. Das war natürlich jedes Mal ein Highlight und eine wunderbare'."\r\n"
		            .'Erfahrung für die Gruppe. Bilder wurden bestaunt, hochgelobt und verkauft. Noch Wochen später schlugen unsere Herzen höher wenn wir über unsere letzte Vernissage sprachen.'."\r\n"
		            .'Als Gruppe konnten wir etwas schaffen, was dem Einzelnen nicht möglich gewesen wäre. Das stärkt das Wir Gefühl und vertieft die Zugehörigkeit.'."\r\n"
		            .'Unter   https://svr.zz-zeile.de/treppe-malwerkstatt/  '."\r\n"
		            .'könnt ihr die Kunstwerke anschauen!'."\r\n"
		            .'Zeichnen, Malen und kreativ Schreiben macht glücklich, sage ich aus eigener Erfahrung und möchte das an keinem Tag mehr missen. Eine Tankstelle für Leib und Seele'."\r\n"
		            .'erlebt jeder, der sich regelmäßig Zeit nimmt um kreativ zu sein. Alles was uns stärkt, uns erfüllt, macht uns auch resilient. Weil wir spüren, wir können trotzallem, was schwer ist, unsere Zeit gestalten, schöpferisch tätig sein.'."\r\n"
		            .'Gott, der Schöpfer, ist die Quelle allen Lebens, aus ihm schöpfe ich jeden Tag und diese Quelle versiegt nie!'."\r\n"
		            ."\r\n"
		            .'Mein Bekenntnis zur Kunst '."\r\n"
		            .'Ich glaube an die Fantasie die in jedem Menschen schlummert, an den schöpferischen  Funken,'."\r\n"
		            .'der uns mitgegeben ward von Anfang an.'."\r\n"
		            .'Der dafür Sorge trägt, dass wir gestalten, erfinden, lösen, weiterentwickeln -'."\r\n"
		            .'Uns selbst und was um uns lebt und ist.'."\r\n"
		            ."\r\n"
		            .'Ich glaube an das freie Spiel dem die Fantasie'."\r\n"
		            .'zu Grunde liegt. Im Spiel erprobt sich die Fantasie,'."\r\n"
		            .'schlägt Purzelbäume macht Feuerwerk mit Farben, singt, tanzt,'."\r\n"
		            .'baut, gestaltet sich in Form, Wort und Ausdruck.'."\r\n"
		            ."\r\n"
		            .'Ich glaube an die Kunst in ihrer vielfältigen Weise.'."\r\n"
		            .'Sie verbindet das Gestern mit dem Heute, das Heute mit dem Morgen. '."\r\n"
		            .'So wird sie Teil der irdischen „Ewigkeit“ der Geschichte, Kunst überdauert.'."\r\n"
		            ."\r\n"
		            .'Ich glaube an das künstlerische Schaffen, das aus dem Alltäglichen herausragt, die Seele nährt,'."\r\n"
		            .'den Geist beflügelt, den Körper erfrischt.'."\r\n"
		            .'Ich glaube da wo Menschen Kunst als Teil ihres Lebens wählen '."\r\n"
		            .'lebt die Hoffnung!'."\r\n"
		            .'Sybille Seuffer Weimar 2019',
		        'created_at' => '2022-04-15 18:56:56',
		        'deleted_at' => null,
		        'published_at' => '2022-04-15 16:52:20',
		        'slug' => 'mein-herz-sagt-kunst',
		        'title' => 'Mein Herz sagt: KUNST',
		        'updated_at' => '2022-04-27 06:49:23',
		        'uuid' => Str::orderedUuid(), //'ded60245-037d-49b7-a0b9-7b413f3999c0',
		    ],
		    [
		        'body' => 'Wie heißt die Wand'."\n"
		            .'an die man eine Ehe fährt?'."\n"
		            .'Ichbezogenheit und Kleinlichkeit machen das was schön sein könnte'."\n"
		            .'unmöglich! Perfektionismus und Sturheit sind die Pforten zum Unglück!'."\n"
		            .'Anreden wie Papa und Mama töten den Sex!'."\n"
		            .'Lügen und Ausreden verderben das Vertrauen!'."\n"
		            .'Geiz und Konkurrenz zerstören den Genuss!'."\n"
		            ."\n"
		            .'Wie heißt die Wand'."\n"
		            .'An die man eine Freundschaft fährt?'."\n"
		            .'Geschwätzigkeit und Übertreiben lösen Rückzug aus!'."\n"
		            .'Tratsch und Knatsch führen zu Langeweile!'."\n"
		            .'Jammern und Meckern am laufenden Meter verursachen '."\n"
		            .'Freundschaftsmigräne!'."\n"
		            .'Selbstmitleid und Neid führen in die Oberflächlichkeit.'."\n"
		            ."\n\n"
		            .'Wie heißt die Wand'."\n"
		            .'An die man eine Firma fährt?'."\n"
		            .'Omnipotenz und Narzissmus machen Mitarbeiter krank!'."\n"
		            .'Spekulationen und Geld mit Geld verdienen führt'."\n"
		            .'zum Bankrott!'."\n"
		            .'Abwertung und Arroganz verringern die Leistungsbereitschaft!'."\n"
		            .'Bossing führt zu Gegenreaktionen  Voodoo!'."\n"
		            ."\n\n"
		            .'Wie heißt die Wand'."\n"
		            .'An die man eine Kinderseele fährt?'."\n"
		            .'Schreien und Schlagen sät Angst!'."\n"
		            .'Verwöhnen und Vernachlässigen führt zu Randale!'."\n"
		            .'Überbehüten und alles abnehmen führt'."\n"
		            .'Zu Hilflosigkeit!'."\n"
		            .'Stundenlanger Medienkonsum führt in die Denkfaulheit!'."\n"
		            ."\n"
		            .'Wie heißt die Wand'."\n"
		            .'An die man das Vertrauen eines Volkes fährt?'."\n"
		            .'Polemik und Fakenews führt in die Verunsicherung!'."\n"
		            .'Wahlversprechen die gebrochen werden führt zu Politikverdrossenheit!'."\n"
		            .'Soziale Ungerechtigkeit führt in die Kriminalität!'."\n"
		            .'Arrogante Politiker lösen Hass aus!'."\n"
		            .'Politische Korrektheit im Denken und Reden wird zur Ersatzreligion!'."\n"
		            ."\n"
		            .'Es gibt viele unsichtbare Wände!'."\n"
		            ."\n"
		            .'Online Schreibnacht Sybille',
		        'created_at' => '2020-10-25 08:48:44',
		        'deleted_at' => null,
		        'published_at' => '2020-10-25 04:47:54',
		        'slug' => 'an-die-wand-fahren',
		        'title' => 'An die Wand fahren',
		        'updated_at' => '2020-10-27 01:29:15',
		        'uuid' => Str::orderedUuid(), //'e8984871-e817-4a5d-b781-b80d6c568e70',
		    ],
		    [
		        'body' => 'Ein Deutscher in Irland, ausgewandert mit seiner Frau und nun ohne seine Frau, da die ihn verlassen hat. Er läuft verzweifelt durch den Regen und trifft auf eine alte Frau, eine Irin. Sie lädt ihn zum Tee ein und aus dieser Begegnung entwickelt sich eine Beziehung, die zur Folge hat, dass eine irische Lebensgeschichte niedergeschrieben wird und er, der Deutsche darüber den Schmerz seiner eigenen Geschichte spüren kann und lernt damit zu leben. Wunderschöne Sprache, originelle Gedankengänge und man hört den irischen Regen rauschen.',
		        'created_at' => '2020-05-21 09:01:17',
		        'deleted_at' => null,
		        'published_at' => '2020-05-21 10:00:00',
		        'slug' => 'hansjorg-schertenleib-das-regenorchester',
		        'title' => 'Hansjörg Schertenleib: Das Regenorchester',
		        'updated_at' => '2020-05-21 09:01:41',
		        'uuid' => Str::orderedUuid(), //'f4f5ec23-0a6f-4002-8d43-03b77bc20aab',
		    ],
		    [
		        'body' => 'An guten Tagen '."\n"
		            .'schlägt mein kleines Freiheitsherz'."\n"
		            .'dem Licht, der Sonne, den Wolken, dem Himmel entgegen!'."\n"
		            .'Ich mache mit mir selbst einen Scherz, zieh eine Farbkarte und'."\n"
		            .'lass mir die Kleider legen.'."\n"
		            .'Hülle mich ein in ungewohnte Kleiderkombinationen finde das schön'."\n"
		            .'lache und freue mich und möchte am liebsten sofort in die Natur'."\n"
		            .'raus gehen.'."\n"
		            ."\n"
		            .'An guten Tagen'."\n"
		            .'schlägt mein kleines Freiheitsherz'."\n"
		            .'ein Buch auf, liest voller Interesse sammelt neue Gedanken, staunt lange'."\n"
		            .'und glaubt die Welt hat keine Schranken.'."\n"
		            .'Ich schenke mir selbst ein vertrautes Nicken kann mich gut leiden'."\n"
		            .'möchte am liebsten alle Menschen umarmen und sagen'."\n"
		            .'ihr sollt nicht das Leben vermeiden!'."\n"
		            .'Vergesst eure Ängste fühlt euch frei, fühlt euch wert'."\n"
		            .'denn jeder Tag ist ein Tag eures Lebens der nie wiederkehrt.'."\n"
		            ."\n\n"
		            .'An guten Tagen'."\n"
		            .'schlägt mein kleines Freiheitsherz '."\n"
		            .'ganz schnell und wild weil es Hunger hat nach Leben'."\n"
		            .'erfahren will die Welt und was es alles gibt zu erleben.'."\n"
		            .'Ich gehe auf alles offen zu erlebe das Schöne'."\n"
		            .'Im Ich und Du teile was ich bin und kann freue mich'."\n"
		            .'an Dir und dem Mensch von nebenan.'."\n"
		            .'Gehe abends zufrieden erfüllt in mein Bett denke'."\n"
		            .'der Tag war heute zu mir nett.'."\n"
		            .'Danke und hoffe dass es vielen so geht denn für'."\n"
		            .'Gute Tage ist es hoffentlich nie zu spät.'."\n"
		            .'Schreibnacht im Oktober 2020',
		        'created_at' => '2020-10-31 09:31:43',
		        'deleted_at' => null,
		        'published_at' => '2020-10-31 08:31:15',
		        'slug' => 'an-guten-tagen',
		        'title' => 'An guten Tagen',
		        'updated_at' => '2020-10-31 09:33:04',
		        'uuid' => Str::orderedUuid(), //'f90ec434-0f42-4432-af7d-16e79c7933e3',
		    ],
		    [
		        'body' => 'Ich bin eine  stille Poetin'."\n"
		            .'die spürt, dass Leben mehr ist,  als spontanes Denken und Reden.'."\n"
		            .'Die spürt, dass in der Tiefe Schätze liegen, die es gilt zu heben'."\n"
		            .'durch schreibendes Denken in Ruhe und Zeit. Es schließen sich Kreise,'."\n"
		            .'das wirkt sich aus auf meine Lebensweise.   '."\n"
		            ."\n"
		            .'Ich bin eine fühlende Poetin'."\n"
		            .'die spürt, wann es Zeit ist, sich Zeit zu nehmen.'."\n"
		            .'Gefühle  zu spüren, zu benennen und schriftlich sich zu ihnen zu bekennen.'."\n"
		            .'Das was benannt wird kommt zum Leben.'."\n"
		            .'Freude und Ängste, Liebe und Wut, Sorge und Klage, Trost und Verlangen,'."\n"
		            .'Sehnsucht und Bangen werden dann sichtbar in Worte und Zeilen,'."\n"
		            .'die den Weg weisen, helfen mein Innerstes heilen.'."\n"
		            ."\n"
		            .'Ich bin eine sichtbare Poetin'."\n"
		            .'die spürt, dass Menschen nach Tiefgang sich sehnen, die nicht wissen,'."\n"
		            .'nicht ahnen - was stillt dieses Fehlen. Beim Schreiben entdecken sie,'."\n"
		            .'sich selbst ganz neu, spüren ihre innere Tiefe und werden von sich selber frei.'."\n"
		            .'Leben bewusster, einfühlsamer, weiser und leichter – erkennen das Glück'."\n"
		            .'in ihrem Leben, werden dankbar und können von sich selbst mehr geben.'."\n"
		            ."\n"
		            .'Ich bin sooo gerne eine  Poetin '."\n"
		            .'das werde ich auch bleiben, solange mein Geist in der Lage ist zu denken'."\n"
		            .'und zu schreiben. '."\n"
		            .'Schreibnacht August 2020',
		        'created_at' => '2020-09-20 17:29:33',
		        'deleted_at' => null,
		        'published_at' => '2020-09-20 01:29:09',
		        'slug' => 'poetin',
		        'title' => 'Poetin',
		        'updated_at' => '2020-10-03 13:58:31',
		        'uuid' => Str::orderedUuid(), //'f92dc6ee-2777-465f-af39-1634b3836264',
		    ],
		]);

    }
}
