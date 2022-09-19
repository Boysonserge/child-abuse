<?php

return [
    'event_redirect_route' => '/_splade/eventRedirect/{uuid}',

    'share_session_flash_data' => true,

    'blade' => [
        'component_prefix' => 'splade',

        'table_cell_directive' => 'cell',
    ],

    'seo' => [

        'title_prefix' => '',

        'title_suffix' => '| My Site',

        'defaults' => [

            'title' => env('APP_NAME', 'Laravel Splade'),

            'description' => 'Child Abuse Monitoring Information System',

            'keywords' => ['CAMIS', 'Child abuse'],

        ],

    ],

    'ssr' => [

        'enabled' => env('SPLADE_SSR_ENABLED', false),

        'server' => 'http://127.0.0.1:9000/',

        'blade_fallback' => true,

    ],

    'dusk' => [
        'choices_select_macro' => 'choicesSelect',

        'choices_remove_item_macro' => 'choicesRemoveItem',
    ],

];
