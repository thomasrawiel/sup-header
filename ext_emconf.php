<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Sup Header',
    'description' => 'Add a button to TCA fields that adds sup, sub or other html',
    'state' => 'stable',
    'category' => 'misc',
    'author' => 'Thomas Rawiel',
    'author_email' => 'thomas.rawiel@gmail.com',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-13.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
