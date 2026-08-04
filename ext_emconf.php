<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Academy',
    'description' => 'Framework for creating CRIS portals',
    'category' => 'fe',
    'author' => 'Torsten Schrade',
    'author_email' => 'Torsten.Schrade@adwmainz.de',
    'author_company' => 'Academy of Sciences and Literature | Mainz',
    'state' => 'stable',
    'version' => 'dev-master',
    'constraints' => array(
        'depends' => array(
            'typo3' => '13.4.0-13.4.99',
            'news' => '',
            'eventnews' => '',
            'chf_time' => '',
        ),
        'conflicts' => array(),
        'suggests' => array(),
    ),
);
