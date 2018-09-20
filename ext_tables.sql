# https://www.eurocris.org/Uploads/Web%20pages/CERIF-1.5/cerif.html#cfProj
CREATE TABLE tx_academy_domain_model_projects (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	persistent_identifier varchar(255) DEFAULT '' NOT NULL, # cfURI
	identifier varchar(128) DEFAULT '' NOT NULL, # cfProjId
	title varchar(255) DEFAULT '' NOT NULL, # cfTitle
	acronym varchar(40) DEFAULT '' NOT NULL, # cfAcro
	description text NOT NULL, # cfAbstr

	# pages (1:n)
	page int(11) DEFAULT '0' NOT NULL,

	# sys_file (1:n)
	image int(11) DEFAULT '0' NOT NULL,

	# tx_academy_domain_model_relations (1:n)
	relations int(11) unsigned DEFAULT '0' NOT NULL,

	# tx_chftime_domain_model_dateranges (1:1)
	date_range int(11) unsigned DEFAULT '0', # cfStartDate, cfEndDate

	# tx_vocabulary_domain_model_subjects (m:n)
	statements int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
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
	KEY page (page),
	KEY date_range (date_range),
	KEY relations (relations),
	KEY statements (statements),

) ENGINE=InnoDB;

# https://www.eurocris.org/Uploads/Web%20pages/CERIF-1.5/cerif.html#cfOrgUnit
CREATE TABLE tx_academy_domain_model_units (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	persistent_identifier varchar(255) DEFAULT '' NOT NULL, # cfURI
	identifier varchar(128) DEFAULT '' NOT NULL, # cfOrgUnitId
	title varchar(255) DEFAULT '' NOT NULL, # cfName
	acronym varchar(40) DEFAULT '' NOT NULL, # cfAcro
	turnover varchar(255) DEFAULT '' NOT NULL, # cfTurn
	head_count int(11) DEFAULT '0' NOT NULL, # cfHeadcount
	description text NOT NULL, # cfResAct

	# pages (1:n)
	page int(11) DEFAULT '0' NOT NULL,

	# sys_file (1:n)
	image int(11) DEFAULT '0' NOT NULL,

	# tx_academy_domain_model_relations (1:n)
	relations int(11) unsigned DEFAULT '0' NOT NULL,

	# tx_vocabulary_domain_model_subjects (m:n)
	statements int(11) unsigned DEFAULT '0',

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
	KEY page (page),
	KEY relations (relations),
	KEY statements (statements)

) ENGINE=InnoDB;

# https://www.eurocris.org/Uploads/Web%20pages/CERIF-1.5/cerif.html#cfPers
CREATE TABLE tx_academy_domain_model_persons (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	persistent_identifier varchar(255) DEFAULT '' NOT NULL, # cfURI
	identifier varchar(128) DEFAULT '' NOT NULL, # cfPersId
	gender tinyint(4) unsigned DEFAULT '0' NOT NULL, # cfGender
	given_name varchar(80) DEFAULT '' NOT NULL, # cfFirstNames
	additional_name varchar(80) DEFAULT '' NOT NULL, # cfOtherNames
	family_name varchar(80) DEFAULT '' NOT NULL, # cfFamilyNames
	honorific_prefix varchar(80) DEFAULT '' NOT NULL,
	honorific_suffix varchar(80) DEFAULT '' NOT NULL,
	research_interest varchar(255) DEFAULT '' NOT NULL, # cfResInt

	# sys_file (1:n)
	image int(11) DEFAULT '0' NOT NULL,

	# pages (1:n)
	page int(11) DEFAULT '0' NOT NULL,

	# tx_academy_domain_model_relations (1:n)
	relations int(11) unsigned DEFAULT '0' NOT NULL,

	# chf_time date range (1:1)
	date_range int(11) unsigned DEFAULT '0', # cfBirthdate

	# tx_vocabulary_domain_model_subjects (m:n)
	statements int(11) unsigned DEFAULT '0',

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
	KEY given_name (given_name),
	KEY family_name (family_name),
	KEY page (page),
	KEY date_range (date_range),
	KEY relations (relations),
	KEY statements (statements)

) ENGINE=InnoDB;

# media are part of research portal features (not bound to CERIF)
CREATE TABLE tx_academy_domain_model_media (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	persistent_identifier varchar(255) DEFAULT '' NOT NULL,
	identifier varchar(255) DEFAULT '' NOT NULL,
	type int(11) DEFAULT '0' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,

	# sys_file (1:n)
	image int(11) DEFAULT '0' NOT NULL,

	# sys_file (1:n)
	files int(11) DEFAULT '0' NOT NULL,

	# sys_file_collections (1:n)
	collections int(11) DEFAULT '0' NOT NULL,

	# tx_academy_domain_model_relations (1:n)
	relations int(11) unsigned DEFAULT '0' NOT NULL,

	# tx_vocabulary_domain_model_subjects (m:n)
	statements int(11) unsigned DEFAULT '0',

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
	KEY relations (relations),
	KEY statements (statements),

) ENGINE=InnoDB;

# https://www.eurocris.org/Uploads/Web%20pages/CERIF-1.5/cerif.html#cfResProd
CREATE TABLE tx_academy_domain_model_products (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	persistent_identifier varchar(255) DEFAULT '' NOT NULL, # cfURI
	identifier varchar(255) DEFAULT '' NOT NULL,
	type int(11) DEFAULT '0' NOT NULL, # product classification: software, research data, etc.
	title varchar(255) DEFAULT '' NOT NULL, # cfName
	acronym varchar(40) DEFAULT '' NOT NULL,
	description text NOT NULL, # cfDescr
	version varchar(40) DEFAULT '' NOT NULL, # cfVersInfo

	# sys_file (1:n)
	image int(11) DEFAULT '0' NOT NULL,

	# tx_academy_domain_model_relations (1:n)
	relations int(11) unsigned DEFAULT '0' NOT NULL,

	# chf_time date range (1:1)
	date_range int(11) unsigned DEFAULT '0',

	# tx_vocabulary_domain_model_subjects (m:n)
	statements int(11) unsigned DEFAULT '0',

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
	KEY type (type),
	KEY title (title),
	KEY date_range (date_range),
	KEY relations (relations),
	KEY statements (statements)

) ENGINE=InnoDB;

# https://www.eurocris.org/Uploads/Web%20pages/CERIF-1.5/cerif.html#cfResPubl
CREATE TABLE tx_academy_domain_model_publications (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	persistent_identifier varchar(255) DEFAULT '' NOT NULL, # cfURI
	identifier varchar(128) DEFAULT '' NOT NULL, # cfResPublId
	type int(11) DEFAULT '0' NOT NULL, # publication classification: article, book, newspaper, etc. (cf. Zotero types)
	title varchar(255) DEFAULT '' NOT NULL, # cfTitle
	subtitle varchar(255) DEFAULT '' NOT NULL, # cfSubtitle
	abbreviation varchar(255) DEFAULT '' NOT NULL, # cfNameAbbrev
	volume varchar(255) DEFAULT '' NOT NULL, # cfVol
	number varchar(255) DEFAULT '' NOT NULL, # cfNum
	issue varchar(255) DEFAULT '' NOT NULL, # cfIssue
	edition varchar(255) DEFAULT '' NOT NULL, # cfEdition
	series varchar(255) DEFAULT '' NOT NULL, # cfSeries
	start_page int(11) unsigned DEFAULT '0' NOT NULL, # cfStartPage
	end_page int(11) unsigned DEFAULT '0' NOT NULL, # cfEndPage
	total_pages int(11) unsigned DEFAULT '0' NOT NULL, # cfTotalPages
	isbn varchar(255) DEFAULT '' NOT NULL, # cfISBN
	issn varchar(255) DEFAULT '' NOT NULL, # cfISSN
	description text NOT NULL, # cfAbstr
	bibliographic_note varchar(255) DEFAULT '' NOT NULL, # cfBiblNote
	version varchar(40) DEFAULT '' NOT NULL, # cfVersInfo

	# sys_file (1:n)
	image int(11) DEFAULT '0' NOT NULL,

	# tx_academy_domain_model_relations (1:n)
	relations int(11) unsigned DEFAULT '0' NOT NULL,

	# chf_time date range (1:1)
	date_range int(11) unsigned DEFAULT '0', # cfResPublDate

	# tx_vocabulary_domain_model_subjects (m:n)
	statements int(11) unsigned DEFAULT '0',

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
	KEY type (type),
	KEY title (title),
	KEY isbn (isbn),
	KEY issn (issn),
	KEY date_range (date_range),
	KEY relations (relations),
	KEY statements (statements)

) ENGINE=InnoDB;

# https://www.eurocris.org/Uploads/Web%20pages/CERIF-1.5/cerif.html#cfResPat
CREATE TABLE tx_academy_domain_model_patents (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	persistent_identifier varchar(255) DEFAULT '' NOT NULL, # cfURI
	identifier varchar(128) DEFAULT '' NOT NULL, # cfResPatId
	number varchar(255) DEFAULT '' NOT NULL, # cfPatentNum
	title varchar(255) DEFAULT '' NOT NULL, # cfTitle
	description text NOT NULL, # cfAbstr
	version varchar(40) DEFAULT '' NOT NULL, # cfVersInfo

	# chf_time date range (1:1)
	registration_date int(11) unsigned DEFAULT '0', # cfRegistrDate

	# chf_time date range (1:1)
	approval_date int(11) unsigned DEFAULT '0', # cfApprovDate

	# tx_academy_domain_model_relations (1:n)
	relations int(11) unsigned DEFAULT '0' NOT NULL,

	# tx_vocabulary_domain_model_subjects (m:n)
	statements int(11) unsigned DEFAULT '0',

	# static_countries (1:1)
	country_code int(11) unsigned DEFAULT '0', # cfCountryCode

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
	KEY registration_date (registration_date),
	KEY approval_date (approval_date),
	KEY relations (relations),
	KEY statements (statements)

) ENGINE=InnoDB;

# implements some of the CERIF relationship types
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

	# tx_academy_domain_model_persons (1:1)
	person int(11) unsigned DEFAULT '0',
	person_symmetric int(11) unsigned DEFAULT '0',

	# tx_academy_domain_model_media (1:1)
	medium int(11) unsigned DEFAULT '0',

	# tx_news_domain_model_news (1:1)
	news int(11) unsigned DEFAULT '0',

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
	KEY person (person),
	KEY person_symmetric (person_symmetric),
	KEY news (news),
	KEY medium (medium),
	KEY hcard (hcard),
	KEY date_range (date_range)

) ENGINE=InnoDB;

# CERIF classifications for relationship roles between CERIF entities supported by the academy extension
CREATE TABLE tx_academy_domain_model_roles (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	persistent_identifier varchar(255) DEFAULT '' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,

	# tx_vocabulary_domain_model_subjects (m:n)
	statements int(11) unsigned DEFAULT '0',

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
	KEY statements (statements)

) ENGINE=InnoDB;

# https://en.wikipedia.org/wiki/VCard
# relates to https://www.eurocris.org/Uploads/Web%20pages/CERIF-1.5/cerif.html#cfEAddr
# relates to https://www.eurocris.org/Uploads/Web%20pages/CERIF-1.5/cerif.html#cfPAddr
CREATE TABLE tx_academy_domain_model_hcards (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	persistent_identifier varchar(255) DEFAULT '' NOT NULL,
	label varchar(255) DEFAULT '' NOT NULL,
	type int(11) unsigned DEFAULT '0' NOT NULL,
	geo varchar(255) DEFAULT '' NOT NULL,

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
	KEY parent (parent),
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
	KEY parent (parent),

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

	# tx_vocabulary_domain_model_subjects (m:n)
	statements int(11) unsigned DEFAULT '0',

	KEY persistent_identifier (persistent_identifier),
	KEY statements (statements),
);
