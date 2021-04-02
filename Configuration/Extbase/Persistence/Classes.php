<?php
declare(strict_types = 1);

return [
    # hcard academy classes need to be mapped to hcard academy tables since they contain an additional '_xyz'
    \Digicademy\Academy\Domain\Model\HcardsAdr::class => [
        'tableName' => 'tx_academy_domain_model_hcards_adr',
    ],
    \Digicademy\Academy\Domain\Model\HcardsAdrcomponents::class => [
        'tableName' => 'tx_academy_domain_model_hcards_adrcomponents',
    ],
    \Digicademy\Academy\Domain\Model\HcardsTel::class =>[
        'tableName' => 'tx_academy_domain_model_hcards_tel',
    ],
    \Digicademy\Academy\Domain\Model\HcardsEmail::class => [
        'tableName' => 'tx_academy_domain_model_hcards_email',
    ],
    \Digicademy\Academy\Domain\Model\HcardsUrl::class => [
        'tableName' => 'tx_academy_domain_model_hcards_url',
    ],
    # map the sys_file_collection table
    \Digicademy\Academy\Domain\Model\FileCollection::class => [
        'tableName' => 'sys_file_collection',
    ],
    # map the sys_category table
    \Digicademy\Academy\Domain\Model\Categories::class => [
        'tableName' => 'sys_category',
    ],
    # insert new subclass type for events (news extension)
    \GeorgRinger\News\Domain\Model\News::class => [
        'subclasses' => [
            \Digicademy\Academy\Domain\Model\News::class,
            \GeorgRinger\News\Domain\Model\NewsInternal::class,
            \GeorgRinger\News\Domain\Model\NewsExternal::class,
            \Digicademy\Academy\Domain\Model\Events::class
        ]
    ],
    # map news table
    \Digicademy\Academy\Domain\Model\News::class => [
        'tableName' => 'tx_news_domain_model_news',
        'recordType' => 0,
    ],
    # map events table
    \Digicademy\Academy\Domain\Model\Events::class => [
        'tableName' => 'tx_news_domain_model_news',
        'recordType' => 3,
    ],
];
