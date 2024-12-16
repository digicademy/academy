CREATE TABLE tx_academy_domain_model_projects (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	persistent_identifier varchar(255) DEFAULT '' NOT NULL,
	identifier varchar(255) DEFAULT '' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	acronym varchar(40) DEFAULT '' NOT NULL,
	sorting varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,

    # tt_content (1:n)
    content_elements int(11) DEFAULT '0' NOT NULL,

    # slug
    slug varchar(2048) DEFAULT '' NOT NULL,

	# pages (1:n)
	page int(11) DEFAULT '0' NOT NULL,

	# sys_file (1:n)
	image int(11) DEFAULT '0' NOT NULL,

	# tx_academy_domain_model_relations (1:n)
	relations int(11) unsigned DEFAULT '0' NOT NULL,

	# tx_chftime_domain_model_dateranges (1:1)
	date_range int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumtext,
	l10n_source int(11) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY pid (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),

	KEY persistent_identifier (persistent_identifier),
	KEY identifier (identifier),
	KEY title (title),
	KEY page (page),
	KEY date_range (date_range),
	KEY relations (relations)

) ENGINE=InnoDB;

CREATE TABLE tx_academy_domain_model_units (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	persistent_identifier varchar(255) DEFAULT '' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	acronym varchar(40) DEFAULT '' NOT NULL,
	sorting varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,

    # tt_content (1:n)
    content_elements int(11) DEFAULT '0' NOT NULL,

    # slug
    slug varchar(2048) DEFAULT '' NOT NULL,

	# pages (1:n)
	page int(11) DEFAULT '0' NOT NULL,

	# sys_file (1:n)
	image int(11) DEFAULT '0' NOT NULL,

	# tx_academy_domain_model_relations (1:n)
	relations int(11) unsigned DEFAULT '0' NOT NULL,

    # tx_chftime_domain_model_dateranges (1:1)
    date_range int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY pid (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),

	KEY persistent_identifier (persistent_identifier),
	KEY title (title),
	KEY page (page),
	KEY relations (relations)

) ENGINE=InnoDB;

CREATE TABLE tx_academy_domain_model_persons (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	persistent_identifier varchar(255) DEFAULT '' NOT NULL,
	given_name varchar(80) DEFAULT '' NOT NULL,
	additional_name varchar(80) DEFAULT '' NOT NULL,
	family_name varchar(80) DEFAULT '' NOT NULL,
	honorific_prefix varchar(80) DEFAULT '' NOT NULL,
	honorific_suffix varchar(80) DEFAULT '' NOT NULL,
	sorting varchar(255) DEFAULT '' NOT NULL,

    # tt_content (1:n)
    content_elements int(11) DEFAULT '0' NOT NULL,

    # slug
    slug varchar(2048) DEFAULT '' NOT NULL,

	# sys_file (1:n)
	image int(11) DEFAULT '0' NOT NULL,

	# pages (1:n)
	page int(11) DEFAULT '0' NOT NULL,

	# tx_academy_domain_model_relations (1:n)
	relations int(11) unsigned DEFAULT '0' NOT NULL,

	# chf_time date range (1:1)
	date_range int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY pid (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),

	KEY persistent_identifier (persistent_identifier),
	KEY given_name (given_name),
	KEY family_name (family_name),
	KEY page (page),
	KEY date_range (date_range),
	KEY relations (relations)
) ENGINE=InnoDB;

CREATE TABLE tx_academy_domain_model_media (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	persistent_identifier varchar(255) DEFAULT '' NOT NULL,
	type int(11) DEFAULT '0' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,

    # slug
    slug varchar(2048) DEFAULT '' NOT NULL,

	# sys_file (1:n)
	image int(11) DEFAULT '0' NOT NULL,

	# sys_file (1:n)
	files int(11) DEFAULT '0' NOT NULL,

	# sys_file_collections (1:n)
	collections int(11) DEFAULT '0' NOT NULL,

	# pages (1:n)
	page int(11) DEFAULT '0' NOT NULL,

	# tx_academy_domain_model_relations (1:n)
	relations int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY pid (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),

	KEY persistent_identifier (persistent_identifier),
	KEY title (title),
	KEY type (type),
	KEY files (files),
	KEY page (page),
	KEY relations (relations)
) ENGINE=InnoDB;

# https://www.eurocris.org/Uploads/Web%20pages/CERIF-1.5/cerif.html#cfResProd
# https://openaire-guidelines-for-cris-managers.readthedocs.io/en/v1.1.1/cerif_xml_product_entity.html

CREATE TABLE tx_academy_domain_model_products (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	# cfURI
	persistent_identifier varchar(255) DEFAULT '' NOT NULL,
	# cfResProdId
	identifier varchar(255) DEFAULT '' NOT NULL,
	# cfName
	title varchar(255) DEFAULT '' NOT NULL,
	# cfAcro
	acronym varchar(40) DEFAULT '' NOT NULL,
	# cfDescr
	description text NOT NULL,
	# cfVersInfo
	version varchar(40) DEFAULT '' NOT NULL,

    # tt_content (1:n)
    content_elements int(11) DEFAULT '0' NOT NULL,

	# sys_file (1:n)
	image int(11) DEFAULT '0' NOT NULL,

	# pages (1:n)
	page int(11) DEFAULT '0' NOT NULL,

	# slug
    slug varchar(2048) DEFAULT '' NOT NULL,

	# tx_academy_domain_model_relations (1:n)
	relations int(11) unsigned DEFAULT '0' NOT NULL,

	# chf_time date range (1:1)
	date_range int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
	sorting varchar(255) DEFAULT '' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY pid (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),

	KEY persistent_identifier (persistent_identifier),
	KEY identifier (identifier),
	KEY page (page),
	KEY title (title),
	KEY date_range (date_range),
	KEY relations (relations)

) ENGINE=InnoDB;

# https://www.eurocris.org/Uploads/Web%20pages/CERIF-1.5/cerif.html#cfResPubl

CREATE TABLE tx_academy_domain_model_publications (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	# cfURI
	persistent_identifier varchar(255) DEFAULT '' NOT NULL,
	# cfResPublId
	identifier varchar(128) DEFAULT '' NOT NULL,
	# cfTitle
	title varchar(255) DEFAULT '' NOT NULL,
	# cfSubtitle
	subtitle varchar(255) DEFAULT '' NOT NULL,
	# cfNameAbbrev
	abbreviation varchar(255) DEFAULT '' NOT NULL,
	# cfVol
	volume varchar(255) DEFAULT '' NOT NULL,
	# cfNum
	number varchar(255) DEFAULT '' NOT NULL,
	# cfIssue
	issue varchar(255) DEFAULT '' NOT NULL,
	# cfEdition
	edition varchar(255) DEFAULT '' NOT NULL,
	# cfSeries
	series varchar(255) DEFAULT '' NOT NULL,
	# cfStartPage
	start_page int(11) unsigned DEFAULT '0' NOT NULL,
	# cfEndPage
	end_page int(11) unsigned DEFAULT '0' NOT NULL,
	# cfTotalPages
	total_pages int(11) unsigned DEFAULT '0' NOT NULL,
	# cfAbstr
	description text NOT NULL,
	# cfBiblNote
	bibliographic_note varchar(255) DEFAULT '' NOT NULL,

    # tt_content (1:n)
    content_elements int(11) DEFAULT '0' NOT NULL,

	# sys_file (1:n)
	image int(11) DEFAULT '0' NOT NULL,

	# pages (1:n)
	page int(11) DEFAULT '0' NOT NULL,

    # slug
    slug varchar(2048) DEFAULT '' NOT NULL,

	# tx_academy_domain_model_relations (1:n)
	relations int(11) unsigned DEFAULT '0' NOT NULL,

	# chf_time date range (1:1)
	# cfResPublDate
	date_range int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
	sorting varchar(255) DEFAULT '' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY pid (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),

	KEY persistent_identifier (persistent_identifier),
	KEY identifier (identifier),
	KEY title (title),
	KEY date_range (date_range),
	KEY page (page),
	KEY relations (relations)

) ENGINE=InnoDB;

# https://www.eurocris.org/Uploads/Web%20pages/CERIF-1.5/cerif.html#cfSrv

CREATE TABLE tx_academy_domain_model_services (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	# cfURI
	persistent_identifier varchar(255) DEFAULT '' NOT NULL,
	# cfSrvId
	identifier varchar(255) DEFAULT '' NOT NULL,
	# cfName
	title varchar(255) DEFAULT '' NOT NULL,
	# cfAcro
	acronym varchar(40) DEFAULT '' NOT NULL,
	# cfDescr
	description text NOT NULL,

    # tt_content (1:n)
    content_elements int(11) DEFAULT '0' NOT NULL,

	# sys_file (1:n)
	image int(11) DEFAULT '0' NOT NULL,

	# pages (1:n)
	page int(11) DEFAULT '0' NOT NULL,

    # slug
    slug varchar(2048) DEFAULT '' NOT NULL,

	# tx_academy_domain_model_relations (1:n)
	relations int(11) unsigned DEFAULT '0' NOT NULL,

	# chf_time date range (1:1)
	date_range int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
	sorting varchar(255) DEFAULT '' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY pid (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),

	KEY persistent_identifier (persistent_identifier),
	KEY identifier (identifier),
	KEY title (title),
	KEY date_range (date_range),
	KEY page (page),
	KEY relations (relations)

) ENGINE=InnoDB;

CREATE TABLE tx_academy_domain_model_relations (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	persistent_identifier varchar(255) DEFAULT '' NOT NULL,
	type int(11) DEFAULT '0' NOT NULL,
	freetext text NOT NULL,

	# tx_academy_domain_model_roles (1:1)
	role int(11) unsigned DEFAULT '0',
	role_freetext varchar(255) DEFAULT '' NOT NULL,

	# tx_chftime_domain_model_dateranges (1:1)
	date_range int(11) unsigned DEFAULT '0',

	# tx_academy_domain_model_projects (1:1)
	project int(11) unsigned DEFAULT '0',
	project_symmetric int(11) unsigned DEFAULT '0',

	# tx_academy_domain_model_units (1:1)
	unit int(11) unsigned DEFAULT '0',
	unit_symmetric int(11) unsigned DEFAULT '0',

	# tx_academy_domain_model_events (1:1)
	event int(11) unsigned DEFAULT '0',
	event_symmetric int(11) unsigned DEFAULT '0',

	# tx_academy_domain_model_persons (1:1)
	person int(11) unsigned DEFAULT '0',
	person_symmetric int(11) unsigned DEFAULT '0',

	# tx_academy_domain_model_media (1:1)
	medium int(11) unsigned DEFAULT '0',
	medium_symmetric int(11) unsigned DEFAULT '0',

	# tx_news_domain_model_news (1:1)
	news int(11) unsigned DEFAULT '0',
	news_symmetric int(11) unsigned DEFAULT '0',

	# tx_academy_domain_model_products (1:1)
	product int(11) unsigned DEFAULT '0',
	product_symmetric int(11) unsigned DEFAULT '0',

	# tx_academy_domain_model_service (1:1)
	service int(11) unsigned DEFAULT '0',
	service_symmetric int(11) unsigned DEFAULT '0',

	# tx_academy_domain_model_publications (1:1)
	publication int(11) unsigned DEFAULT '0',
	publication_symmetric int(11) unsigned DEFAULT '0',

	# tx_academy_domain_model_hcards (1:1)
	hcard int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_symmetric int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY pid (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),

	KEY persistent_identifier (persistent_identifier),
	KEY type (type),
	KEY role (role),
	KEY project (project),
	KEY project_symmetric (project_symmetric),
	KEY unit (unit),
	KEY unit_symmetric (unit_symmetric),
	KEY event (event),
	KEY event_symmetric (event_symmetric),
	KEY person (person),
	KEY person_symmetric (person_symmetric),
	KEY news (news),
	KEY news_symmetric (news_symmetric),
	KEY medium (medium),
	KEY medium_symmetric (medium_symmetric),
	KEY service (service),
	KEY service_symmetric (service_symmetric),
	KEY product (product),
	KEY product_symmetric (product_symmetric),
	KEY publication (publication),
	KEY publication_symmetric (publication_symmetric),
	KEY hcard (hcard),
	KEY date_range (date_range)

) ENGINE=InnoDB;

CREATE TABLE tx_academy_domain_model_roles (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	persistent_identifier varchar(255) DEFAULT '' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY pid (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),

	KEY persistent_identifier (persistent_identifier),
	KEY title (title)
) ENGINE=InnoDB;

CREATE TABLE tx_academy_domain_model_hcards (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	persistent_identifier varchar(255) DEFAULT '' NOT NULL,
	label varchar(255) DEFAULT '' NOT NULL,
	type int(11) unsigned DEFAULT '0' NOT NULL,
	geo varchar(255) DEFAULT '' NOT NULL,

    # slug
    slug varchar(2048) DEFAULT '' NOT NULL,

	# tx_academy_domain_model_hcards_adr (1:n)
	adr int(11) unsigned DEFAULT '0' NOT NULL,

	# tx_academy_domain_model_hcards_tel (1:n)
	tel int(11) unsigned DEFAULT '0' NOT NULL,

	# tx_academy_domain_model_hcards_email (1:n)
	email int(11) unsigned DEFAULT '0' NOT NULL,

	# tx_academy_domain_model_hcards_url (1:n)
	url int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY pid (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),

	KEY persistent_identifier (persistent_identifier),
	KEY type (type),
	KEY adr (adr),
	KEY tel (tel),
	KEY email (email),
	KEY url (url)

) ENGINE=InnoDB;

CREATE TABLE tx_academy_domain_model_hcards_adr (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	label varchar(255) DEFAULT '' NOT NULL,
	org varchar(255) DEFAULT '' NOT NULL,
	type int(11) unsigned DEFAULT '0' NOT NULL,

	# tx_academy_domain_model_hcards_adrcomponents (1:n)
	adrcomponents int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY pid (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),

	KEY type (type),
	KEY adrcomponents (adrcomponents)

) ENGINE=InnoDB;

CREATE TABLE tx_academy_domain_model_hcards_adrcomponents (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	type int(11) unsigned DEFAULT '0' NOT NULL,
	value varchar(255) DEFAULT '' NOT NULL,

	# tx_academy_domain_model_hcards_adr (1:1)
	parent int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY pid (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),

	KEY type (type),
	KEY record_value (value),
	KEY parent (parent)

) ENGINE=InnoDB;

CREATE TABLE tx_academy_domain_model_hcards_tel (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	type int(11) unsigned DEFAULT '0' NOT NULL,
	value varchar(255) DEFAULT '' NOT NULL,
	freetext varchar(255) DEFAULT '' NOT NULL,

	# tx_academy_domain_model_hcards (1:1)
	parent int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY pid (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),

	KEY type (type),
	KEY record_value (value),
	KEY parent (parent)

) ENGINE=InnoDB;

CREATE TABLE tx_academy_domain_model_hcards_email (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	type int(11) unsigned DEFAULT '0' NOT NULL,
	value varchar(255) DEFAULT '' NOT NULL,
	freetext varchar(255) DEFAULT '' NOT NULL,

	# tx_academy_domain_model_hcards (1:1)
	parent int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY pid (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),

	KEY type (type),
	KEY record_value (value),
	KEY parent (parent)
) ENGINE=InnoDB;

CREATE TABLE tx_academy_domain_model_hcards_url (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	type int(11) unsigned DEFAULT '0' NOT NULL,
	value varchar(255) DEFAULT '' NOT NULL,
	freetext varchar(255) DEFAULT '' NOT NULL,

	# tx_academy_domain_model_hcards (1:1)
	parent int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob NOT NULL,

	PRIMARY KEY (uid),
	KEY pid (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),

	KEY type (type),
	KEY record_value (value),
	KEY parent (parent)

) ENGINE=InnoDB;

CREATE TABLE tx_academy_hcards_adr_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
) ENGINE=InnoDB;

CREATE TABLE tx_news_domain_model_news (
	news_relations int(11) unsigned DEFAULT '0' NOT NULL,
	event_relations int(11) unsigned DEFAULT '0' NOT NULL
);

CREATE TABLE sys_category (
	persistent_identifier varchar(255) DEFAULT '' NOT NULL,

	KEY persistent_identifier (persistent_identifier)
);

CREATE TABLE tt_content (
    tx_academy_parent int(11) DEFAULT '0' NOT NULL,
    tx_academy_tablename varchar(255) DEFAULT '' NOT NULL,
    KEY tx_academy_parent (tx_academy_parent)
);
