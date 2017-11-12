<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Academy',
    'description' => 'Framework for creating research portals: Projects, Persons, Organizational Units, News, Events, and Media',
    'category' => 'fe',
    'author' => 'Torsten Schrade',
    'author_email' => 'Torsten.Schrade@adwmainz.de',
    'author_company' => 'Academy of Sciences and Literature, Mainz, Academy of Sciences and Literature, Mainz',
    'shy' => '',
    'dependencies' => 'cms,extbase,fluid',
    'conflicts' => '',
    'priority' => 'bottom',
    'module' => '',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => '',
    'modify_tables' => '',
    'clearCacheOnLoad' => 0,
    'lockType' => '',
    'version' => '2.0.0',
    'constraints' => array(
        'depends' => array(
            'typo3' => '7.6.0-8.7.99',
            'news' => '',
            'eventnews' => '',
            'category_selector' => '',
            'chf_time' => '',
            'vocabulary' => '',
        ),
        'conflicts' => array(),
        'suggests' => array(),
    ),
);
