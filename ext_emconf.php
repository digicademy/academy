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
    'version' => '3.0.0',
    'constraints' => array(
        'depends' => array(
            'typo3' => '11.5',
            'news' => '',
            'eventnews' => '',
            'chf_time' => '',
        ),
        'conflicts' => array(),
        'suggests' => array(),
    ),
);
