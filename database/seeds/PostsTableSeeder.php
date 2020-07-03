<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('posts')->delete();
        
        \DB::table('posts')->insert([
		    [
		        'body' => 'Ein Deutscher in Irland, ausgewandert mit seiner Frau und nun ohne seine Frau, da die ihn verlassen hat. Er läuft verzweifelt durch den Regen und trifft auf eine alte Frau, eine Irin. Sie lädt ihn zum Tee ein und aus dieser Begegnung entwickelt sich eine Beziehung, die zur Folge hat, dass eine irische Lebensgeschichte niedergeschrieben wird und er, der Deutsche darüber den Schmerz seiner eigenen Geschichte spüren kann und lernt damit zu leben. Wunderschöne Sprache, originelle Gedankengänge und man hört den irischen Regen rauschen.',
		        'created_at' => '2020-05-21 09:01:17',
		        'deleted_at' => null,
		        'id' => 1,
		        'published_at' => '2020-05-21 10:00:00',
		        'slug' => 'hansjorg-schertenleib-das-regenorchester',
		        'title' => 'Hansjörg Schertenleib: Das Regenorchester',
		        'updated_at' => '2020-05-21 09:01:41',
		        'uuid' => 'f4f5ec23-0a6f-4002-8d43-03b77bc20aab',
		    ],
		    [
		        'body' => 'Urkomisch – die ganze Geschichte. Ruth und Edek wieder voll in Aktion. Die Tochter, Ruth, nach wie vor ängstlich und haarspalterisch besorgt um Vaters Wohlergehen. Der Vater, Edek, diesmal voller Tatendrang und im siebten Klops und Mops Himmel sowieso alles in New York. Einer der besten Romane von Lily Brett.',
		        'created_at' => '2020-05-21 10:04:24',
		        'deleted_at' => null,
		        'id' => 2,
		        'published_at' => '2020-05-21 09:03:51',
		        'slug' => 'lily-brett-chuzpe',
		        'title' => 'Lily Brett: Chuzpe',
		        'updated_at' => '2020-05-21 10:04:24',
		        'uuid' => '14bb1ada-bd11-4fad-855f-8745a9ecd826',
		    ],
		    [
		        'body' => 'Auf der Suche nach einem “anderen” Städteführer bin ich auf diese Reihe bei Herder gestossen. Barcelona interessierte mich besonders und inzwischen weiß ich Vieles über die Stadt, durch den 12 Monatebericht der Autorin. Man bekommt neben der Aussenansicht einer Stadt, eine Innenansicht geliefert und das erweitert den Horizont und macht neugierig.',
		        'created_at' => '2020-05-21 10:04:50',
		        'deleted_at' => null,
		        'id' => 3,
		        'published_at' => '2020-05-21 09:04:24',
		        'slug' => 'barbara-baumgartner-ein-jahr-in-barcelona',
		        'title' => 'Barbara Baumgartner: Ein Jahr in Barcelona',
		        'updated_at' => '2020-05-21 10:04:50',
		        'uuid' => '5011cca9-466c-4ef6-8a8c-ac26962cfdbc',
		    ],
		    [
		        'body' => 'Kurze pregnante Texte, die es in sich haben, die bewegt werden wollen und die, den Leser in Bewegung bringen. Ich würde sagen Gehirnjogging für Denker.',
		        'created_at' => '2020-05-21 10:05:29',
		        'deleted_at' => null,
		        'id' => 4,
		        'published_at' => '2020-05-21 09:05:13',
		        'slug' => 'ulrich-schaffer-handbuch-der-mutigen',
		        'title' => 'Ulrich Schaffer: Handbuch der Mutigen',
		        'updated_at' => '2020-05-21 10:05:29',
		        'uuid' => '9bdca49a-50f4-4a14-8207-4124b5a4d1b9',
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
		        'id' => 6,
		        'published_at' => '2020-05-21 14:29:41',
		        'slug' => 'schreibwerkstatt-ligurien-juni-2010-sommergedichte-suden',
		        'title' => 'Schreibwerkstatt Ligurien Juni 2010, Sommergedichte: Süden',
		        'updated_at' => '2020-05-21 14:30:25',
		        'uuid' => '73ea37a8-0580-4f54-b80b-6c199e443e1a',
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
		        'id' => 7,
		        'published_at' => '2020-06-28 18:32:41',
		        'slug' => 'es-war-einmal',
		        'title' => 'Es war einmal',
		        'updated_at' => '2020-06-29 05:42:18',
		        'uuid' => '6110923e-9c32-4654-9440-6aabdc596e6e',
		    ],
		]);
        
    }
}
