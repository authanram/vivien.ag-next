<?php

return [
    [
        'id' => 1,
        'method' => 'get',
        'name' => 'welcome',
        'uri' => '/',
        'routable_type' => 'App\\Models\\Page',
        'routable_id' => 1,
        'middlewares' => '{"web": true, "auth": false}',
        'published' => 1,
        'created_at' => '2020-05-15 03:20:33',
        'updated_at' => '2022-05-29 03:27:35',
        'deleted_at' => null,
    ],
    [
        'id' => 2,
        'method' => 'get',
        'name' => 'seminars',
        'uri' => 'seminare',
        'routable_type' => 'App\\Models\\RouteAction',
        'routable_id' => 1,
        'middlewares' => '{"web": true, "auth": false}',
        'published' => 1,
        'created_at' => '2020-05-15 03:23:40',
        'updated_at' => '2022-05-29 02:39:05',
        'deleted_at' => null,
    ],
    [
        'id' => 3,
        'method' => 'get',
        'name' => 'lectures',
        'uri' => 'vortraege',
        'routable_type' => 'App\\Models\\Page',
        'routable_id' => 2,
        'middlewares' => '{"web": true, "auth": false}',
        'published' => 1,
        'created_at' => '2020-05-15 03:24:05',
        'updated_at' => '2022-05-29 02:53:31',
        'deleted_at' => null,
    ],
    [
        'id' => 4,
        'method' => 'get',
        'name' => 'consulting',
        'uri' => 'beratung',
        'routable_type' => 'App\\Models\\Page',
        'routable_id' => 3,
        'middlewares' => '{"web": true, "auth": false}',
        'published' => 1,
        'created_at' => '2020-05-15 03:24:34',
        'updated_at' => '2022-05-29 02:59:21',
        'deleted_at' => null,
    ],
    [
        'id' => 5,
        'method' => 'get',
        'name' => 'learning',
        'uri' => 'lerntraining',
        'routable_type' => 'App\\Models\\Page',
        'routable_id' => 4,
        'middlewares' => '{"web": true, "auth": false}',
        'published' => 1,
        'created_at' => '2020-05-15 03:25:03',
        'updated_at' => '2022-05-29 03:05:23',
        'deleted_at' => null,
    ],
    [
        'id' => 6,
        'method' => 'get',
        'name' => 'portrait',
        'uri' => 'portrait',
        'routable_type' => 'App\\Models\\Page',
        'routable_id' => 5,
        'middlewares' => '{"web": true, "auth": false}',
        'published' => 1,
        'created_at' => '2020-05-15 03:25:24',
        'updated_at' => '2022-05-29 03:05:32',
        'deleted_at' => null,
    ],
    [
        'id' => 7,
        'method' => 'get',
        'name' => 'blog',
        'uri' => 'blog',
        'routable_type' => 'App\\Models\\RouteAction',
        'routable_id' => 2,
        'middlewares' => '{"web": true, "auth": false}',
        'published' => 1,
        'created_at' => '2020-05-15 03:25:36',
        'updated_at' => '2022-05-29 03:00:03',
        'deleted_at' => null,
    ],
    [
        'id' => 8,
        'method' => 'get',
        'name' => 'books',
        'uri' => 'buchtipps',
        'routable_type' => 'App\\Models\\RouteAction',
        'routable_id' => 4,
        'middlewares' => '{"web": true, "auth": false}',
        'published' => 0,
        'created_at' => '2020-05-15 03:25:55',
        'updated_at' => '2022-05-29 03:02:22',
        'deleted_at' => null,
    ],
    [
        'id' => 9,
        'method' => 'get',
        'name' => 'contact',
        'uri' => 'kontakt',
        'routable_type' => 'App\\Models\\Page',
        'routable_id' => 6,
        'middlewares' => '{"web": true, "auth": false}',
        'published' => 1,
        'created_at' => '2020-05-15 03:26:40',
        'updated_at' => '2022-05-29 03:05:17',
        'deleted_at' => null,
    ],
    [
        'id' => 10,
        'method' => 'get',
        'name' => 'imprint',
        'uri' => 'impressum',
        'routable_type' => 'App\\Models\\Page',
        'routable_id' => 7,
        'middlewares' => '{"web": true, "auth": false}',
        'published' => 1,
        'created_at' => '2020-05-20 21:38:09',
        'updated_at' => '2022-05-29 03:05:10',
        'deleted_at' => null,
    ],
    [
        'id' => 11,
        'method' => 'get',
        'name' => 'privacy-policy',
        'uri' => 'datenschutzerklaerung',
        'routable_type' => 'App\\Models\\Page',
        'routable_id' => 8,
        'middlewares' => '{"web": true, "auth": false}',
        'published' => 1,
        'created_at' => '2020-05-20 21:38:48',
        'updated_at' => '2022-05-29 03:04:48',
        'deleted_at' => null,
    ],
    [
        'id' => 12,
        'method' => 'get',
        'name' => 'cookie-policy',
        'uri' => 'cookie-vereinbarung',
        'routable_type' => 'App\\Models\\Page',
        'routable_id' => 9,
        'middlewares' => '{"web": true, "auth": false}',
        'published' => 1,
        'created_at' => '2020-05-20 21:39:12',
        'updated_at' => '2022-05-29 03:04:38',
        'deleted_at' => null,
    ],
    [
        'id' => 13,
        'method' => 'get',
        'name' => 'gallery',
        'uri' => 'galerie',
        'routable_type' => 'App\\Models\\RouteAction',
        'routable_id' => 5,
        'middlewares' => '{"web": true, "auth": false}',
        'published' => 0,
        'created_at' => '2020-06-28 01:39:38',
        'updated_at' => '2022-05-29 03:05:03',
        'deleted_at' => null,
    ],
    [
        'id' => 14,
        'method' => 'post',
        'name' => 'seminars.registration',
        'uri' => 'seminare/anmeldung',
        'routable_type' => 'App\\Models\\RouteAction',
        'routable_id' => 1,
        'middlewares' => '{"web": true, "auth": false}',
        'published' => 1,
        'created_at' => '2020-05-15 03:23:40',
        'updated_at' => '2022-05-29 02:39:05',
        'deleted_at' => null,
    ],
    [
        'id' => 15,
        'method' => 'get',
        'name' => 'blog.show',
        'uri' => 'blog/{slug?}',
        'routable_type' => 'App\\Models\\RouteAction',
        'routable_id' => 3,
        'middlewares' => '{"web": true, "auth": false}',
        'published' => 0,
        'created_at' => '2022-05-29 03:00:43',
        'updated_at' => '2022-05-29 03:01:51',
        'deleted_at' => null,
    ],
];
