<?php

use Illuminate\Database\Seeder;

class EventTemplatesTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('event_templates')->delete();
        
        \DB::table('event_templates')->insert([
		    [
		        'color_id' => 8,
		        'created_at' => '2020-05-26 04:27:53',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 1,
		        'name' => 'Filmclub',
		        'updated_at' => '2020-05-26 04:27:53',
		        'uuid' => 'd75f55a7-7c5b-4044-b76e-23880c029f68',
		    ],
		    [
		        'color_id' => 3,
		        'created_at' => '2020-05-26 04:28:28',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 2,
		        'name' => 'Frauengruppe 1, Mittwoch',
		        'updated_at' => '2020-05-26 04:28:28',
		        'uuid' => '69bafc5d-3d0f-42b3-9b9c-64ef3cf1f760',
		    ],
		    [
		        'color_id' => 8,
		        'created_at' => '2020-05-26 04:28:32',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 3,
		        'name' => 'Frauengruppe 2, Mittwoch',
		        'updated_at' => '2020-05-26 04:28:32',
		        'uuid' => '862b3c23-aaf2-4baa-a511-836473f29c62',
		    ],
		    [
		        'color_id' => 5,
		        'created_at' => '2020-05-26 04:28:40',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 4,
		        'name' => 'Frauengruppe, Freitag',
		        'updated_at' => '2020-05-26 04:28:40',
		        'uuid' => '5b18af95-400b-4ad6-8f34-4cdddcf9d1ff',
		    ],
		    [
		        'color_id' => 5,
		        'created_at' => '2020-05-26 04:28:59',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 5,
		        'name' => 'Frauenwochenende, Wörnersberger Anker',
		        'updated_at' => '2020-05-26 04:28:59',
		        'uuid' => 'aadebb90-d4e0-476e-900d-8467e822c3ac',
		    ],
		    [
		        'color_id' => 2,
		        'created_at' => '2020-05-26 04:29:07',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 6,
		        'name' => 'Malwerkstatt, Sonntag',
		        'updated_at' => '2020-05-26 04:29:07',
		        'uuid' => '9ae717d5-f459-489d-8444-787c13feb9be',
		    ],
		    [
		        'color_id' => 2,
		        'created_at' => '2020-05-26 04:29:15',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 7,
		        'name' => 'Online Schreibwerkstatt, Samstag',
		        'updated_at' => '2020-05-26 04:29:15',
		        'uuid' => '3d1ee061-8ab7-4ace-b55d-f01acbfd14b2',
		    ],
		    [
		        'color_id' => 2,
		        'created_at' => '2020-05-26 04:29:24',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 8,
		        'name' => 'Online Schreibwerkstatt, Freitag',
		        'updated_at' => '2020-05-26 04:29:24',
		        'uuid' => 'ef82e41e-75d7-49ba-a5b5-87a27d649e71',
		    ],
		    [
		        'color_id' => 4,
		        'created_at' => '2020-05-26 04:29:32',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 9,
		        'name' => 'Paargruppe 1',
		        'updated_at' => '2020-05-26 04:29:32',
		        'uuid' => '69ab294a-5e10-450b-81db-72c41e0923fe',
		    ],
		    [
		        'color_id' => 3,
		        'created_at' => '2020-05-26 04:29:41',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 10,
		        'name' => 'Paargruppe 2',
		        'updated_at' => '2020-05-26 04:29:41',
		        'uuid' => 'cad8e0dd-0e55-4af9-be48-e2c82eac8d41',
		    ],
		    [
		        'color_id' => 5,
		        'created_at' => '2020-05-26 04:30:18',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 11,
		        'name' => 'Schreibausflug, mit dem E-Bike',
		        'updated_at' => '2020-05-26 04:30:18',
		        'uuid' => '158a5f04-d7f5-4c08-98b3-1f3cf369aa43',
		    ],
		    [
		        'color_id' => 2,
		        'created_at' => '2020-05-26 04:30:27',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 12,
		        'name' => 'Schreibwerkstatt',
		        'updated_at' => '2020-05-26 04:30:27',
		        'uuid' => '4337a306-25d6-48c9-823e-3bd9adeae5f4',
		    ],
		    [
		        'color_id' => 7,
		        'created_at' => '2020-06-28 22:07:43',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 13,
		        'name' => 'Erzähl mir dein Leben',
		        'updated_at' => '2020-06-28 22:07:43',
		        'uuid' => 'e01493ba-9187-4e51-96bb-24ffbe84f87a',
		    ],
		    [
		        'color_id' => 6,
		        'created_at' => '2020-07-08 00:40:01',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 14,
		        'name' => 'Schreibnacht',
		        'updated_at' => '2020-07-08 00:40:01',
		        'uuid' => '53b3732b-2f2f-4382-a65f-7a6cb4574f81',
		    ],
		    [
		        'color_id' => 6,
		        'created_at' => '2020-10-13 08:21:43',
		        'deleted_at' => null,
		        'description' => 'Frauenreise von Donnerstag bis Sonntag im Januar 2021'."\n"
		            .'Sei dabei und fühl dich frei! Denn reisen mit Frauen stärkt dich, macht dich kreativ, eröffnet dir neue Horizonte verändert deinen Blick auf dich selbst und wirkt nachhaltig',
		        'id' => 15,
		        'name' => 'Winter in Oberammergau',
		        'updated_at' => '2020-10-13 08:21:43',
		        'uuid' => '52879308-5121-408f-8d7a-18ea9b6a8235',
		    ],
		    [
		        'color_id' => 7,
		        'created_at' => '2020-10-13 08:45:47',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 16,
		        'name' => 'Frühling am Bodensee',
		        'updated_at' => '2020-10-13 08:45:47',
		        'uuid' => 'c507b8c2-0d90-4948-ad2e-06c09c85c898',
		    ],
		    [
		        'color_id' => 7,
		        'created_at' => '2020-10-13 08:48:11',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 17,
		        'name' => 'Frühling am Bodensee',
		        'updated_at' => '2020-10-13 08:48:11',
		        'uuid' => 'a0f32e8c-71f9-4ce4-b902-66cba199b635',
		    ],
		    [
		        'color_id' => 7,
		        'created_at' => '2020-10-13 08:50:34',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 18,
		        'name' => 'Frühling am Bodensee',
		        'updated_at' => '2020-10-13 08:50:34',
		        'uuid' => 'db703e6a-fe8a-4046-b90a-75ea097923eb',
		    ],
		    [
		        'color_id' => 2,
		        'created_at' => '2020-10-13 08:58:46',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 19,
		        'name' => 'Sommer in Heidelberg',
		        'updated_at' => '2020-10-14 03:55:38',
		        'uuid' => '5b1248b2-9b6d-49b2-9788-0951a4efc0f0',
		    ],
		    [
		        'color_id' => 6,
		        'created_at' => '2021-01-03 10:57:48',
		        'deleted_at' => null,
		        'description' => 'Dienstag Donnerstag und Samstagabend zum Schreibabend machen. Interessante Impulse, Anregung durch Musik, VideoClips, literarische Texte, philosophische Zitate bekommst Du per e-Mail zugesandt und kannst dann in deinem Tempo, deiner Art dich schreibenderweise vertiefen. Einmal in der Woche gibt es einen Biografischen Impuls, so kannst du beginnen deine Lebensgeschichte aufzuschreiben.',
		        'id' => 20,
		        'name' => 'Schreiben für dich selbst',
		        'updated_at' => '2021-01-03 10:57:48',
		        'uuid' => '7b165f88-3996-4337-a74f-c5cfebf6f290',
		    ],
		    [
		        'color_id' => 3,
		        'created_at' => '2021-07-02 06:49:13',
		        'deleted_at' => null,
		        'description' => 'Kreativität kennt keine Grenzen'."\n"
		            .'Alles wird möglich',
		        'id' => 22,
		        'name' => 'Frauenwochenende',
		        'updated_at' => '2021-07-02 06:49:13',
		        'uuid' => '2118a253-1287-46be-9a2c-cbce3de8c948',
		    ],
		    [
		        'color_id' => 7,
		        'created_at' => '2021-07-04 10:18:20',
		        'deleted_at' => null,
		        'description' => 'Kreatives Schreiben in einer Gruppe erleben',
		        'id' => 23,
		        'name' => 'Schreibwerkstatt',
		        'updated_at' => '2021-07-04 10:18:20',
		        'uuid' => 'a6d4dd35-a249-4e64-ba57-d6c3b39cae8e',
		    ],
		    [
		        'color_id' => 3,
		        'created_at' => '2021-10-17 11:03:44',
		        'deleted_at' => null,
		        'description' => 'Frauenzeit . Kreativzeit',
		        'id' => 24,
		        'name' => 'WWW WildWomenWeekend',
		        'updated_at' => '2021-10-17 11:03:44',
		        'uuid' => '60275754-d458-4a82-b3c1-1f359c0c9b96',
		    ],
		    [
		        'color_id' => 3,
		        'created_at' => '2021-12-27 18:25:07',
		        'deleted_at' => null,
		        'description' => 'Das Leben lieben',
		        'id' => 25,
		        'name' => 'Frauengruppe Mittwoch',
		        'updated_at' => '2021-12-27 18:25:07',
		        'uuid' => '70f6dfbe-bb96-4e45-9921-c0cfdddbd118',
		    ],
		    [
		        'color_id' => 8,
		        'created_at' => '2021-12-27 19:04:53',
		        'deleted_at' => null,
		        'description' => 'Schreiben macht glücklich!',
		        'id' => 26,
		        'name' => 'Online Schreibnacht am Samstag',
		        'updated_at' => '2021-12-27 19:04:53',
		        'uuid' => '2857c9e3-3bf8-43fd-96c9-356d7d7451e0',
		    ],
		    [
		        'color_id' => 7,
		        'created_at' => '2021-12-27 19:43:54',
		        'deleted_at' => null,
		        'description' => 'Auftanken Aufatmen Aufbrechen'."\n"
		            .'Alles was der Seele gut tut',
		        'id' => 27,
		        'name' => 'Resilienz Gruppe',
		        'updated_at' => '2021-12-27 19:43:54',
		        'uuid' => '9a402c76-7d54-4559-9a1f-a82e305fa6a7',
		    ],
		    [
		        'color_id' => 8,
		        'created_at' => '2021-12-27 19:54:41',
		        'deleted_at' => null,
		        'description' => 'Wir besprechen gemeinsam ein Buch, dass wir zu Hause gelesen haben.',
		        'id' => 28,
		        'name' => 'Lesekreis',
		        'updated_at' => '2021-12-27 19:54:41',
		        'uuid' => '6126c83f-eda7-42ec-ae0b-ea3989530116',
		    ],
		    [
		        'color_id' => 6,
		        'created_at' => '2021-12-27 20:01:27',
		        'deleted_at' => null,
		        'description' => 'Gesprächsrunden - Input - Musik - Meditation',
		        'id' => 29,
		        'name' => 'Paargruppe',
		        'updated_at' => '2021-12-27 20:01:27',
		        'uuid' => '213c72e4-0fd7-4443-ad32-246ab3eae683',
		    ],
		    [
		        'color_id' => 8,
		        'created_at' => '2022-02-07 23:26:37',
		        'deleted_at' => null,
		        'description' => 'Ohne Dich - Du hast einen Menschen verloren, du willst deiner Trauer Worte und Bilder geben.',
		        'id' => 30,
		        'name' => 'Ohne Dich - Schreiben in Zeiten der Trauer',
		        'updated_at' => '2022-02-07 23:26:37',
		        'uuid' => '107d4272-6f0d-43be-8f0a-2e17f8690a9a',
		    ],
		    [
		        'color_id' => 8,
		        'created_at' => '2022-04-14 21:05:34',
		        'deleted_at' => null,
		        'description' => 'Kreativsein am Abend bis in die Nacht hinein! Malen macht glücklich!',
		        'id' => 31,
		        'name' => 'Nachtmalwerkstatt',
		        'updated_at' => '2022-04-14 21:05:34',
		        'uuid' => '1c294261-cd52-4049-ad32-b62308778875',
		    ],
		]);
        
    }
}
