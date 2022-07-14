  CREATE TABLE genres (
  id bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  created_at timestamp NULL DEFAULT current_timestamp(),
  updated_at timestamp NULL DEFAULT  current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO genres (id,name, created_at, updated_at) VALUES
(1,'Femme', '2021-10-26 05:45:24', '2021-10-26 05:45:24'),
(2,'Homme', '2021-10-26 05:45:24', '2021-10-26 05:45:24');

CREATE TABLE congers (
  id bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  total_day INT NOT NULL DEFAULT 31,
  total_year INT NOT NULL CHECK(total_year=1) DEFAULT 1,
  created_at timestamp NULL DEFAULT current_timestamp(),
  updated_at timestamp NULL DEFAULT  current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

insert into congers(total_day,total_year,created_at,updated_at) values (31,1,NOW(),NOW());

CREATE TABLE roles (
  id bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  created_at timestamp NULL DEFAULT current_timestamp(),
  updated_at timestamp NULL DEFAULT  current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO roles (id,name, created_at, updated_at) VALUES
(1,'super admin', NOW(), NOW()),
(1,'admin', NOW(), NOW()),
(2,'employer', NOW(),NOW()),
(3,'visiteur',NOW(),NOW());

CREATE TABLE departements (
  id bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  created_at timestamp NULL DEFAULT current_timestamp(),
  updated_at timestamp NULL DEFAULT  current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO departements (id,name, created_at, updated_at) VALUES
(1,'NATURA', NOW(), NOW()),
(1,'HAISOA', NOW(), NOW()),
(2,'TORO', NOW(),NOW()),
(3,'HAZA',NOW(),NOW());


  CREATE TABLE users (
  id bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  email varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  identifiant varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  cin varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  telephone varchar(20) COLLATE utf8mb4_unicode_ci ,
  email_verified_at timestamp NULL DEFAULT NULL,
  password varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  role_id bigint(20) UNSIGNED NOT NULL REFERENCES roles(id) ON DELETE CASCADE,
  activiter boolean not null default false
  created_at timestamp NULL DEFAULT  current_timestamp(),
  updated_at timestamp NULL DEFAULT  current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE employes (
  id bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  matricule varchar(255) COLLATE utf8mb4_unicode_ci,
  name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  username varchar(255) COLLATE utf8mb4_unicode_ci,
  naissance date current_timestamp(),
  cin varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  email varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  phone varchar(255) COLLATE utf8mb4_unicode_ci,
  poste varchar(255) COLLATE utf8mb4_unicode_ci  default 'XXXXXXX',
  debut_job DATE NOT NULL DEFAULT current_timestamp(),
  fin_job DATE DEFAULT NULL,
  departement_id bigint(20) UNSIGNED  REFERENCES entreprises(id) ON DELETE CASCADE,
  adresse varchar(255) COLLATE utf8mb4_unicode_ci  default 'XXXXXXX',
  user_id bigint(20) UNSIGNED NOT NULL REFERENCES users(id) ON DELETE CASCADE,
  genre_id bigint(20) unsigned REFERENCES genres(id),
  conger_id bigint(20) unsigned REFERENCES congers(id) ON DELETE CASCADE,
  photo varchar(255) COLLATE utf8mb4_unicode_ci,
  activiter boolean not null default true,
  created_at timestamp NOT NULL DEFAULT current_timestamp(),
  updated_at timestamp
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE demande_congers (
  id bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  object varchar(255) COLLATE utf8mb4_unicode_ci NOt NULL,
  description TEXT COLLATE utf8mb4_unicode_ci NOT NULL,
  date_debut DATE NOT NULL DEFAULT current_timestamp(),
  date_fin DATE NOT NULL DEFAULT current_timestamp(),
  hour_debut TIME NOT NULL,
  hour_fin TIME NOT NULL,
  validation boolean not null default false,
  refus boolean not null default false,
  employe_id bigint(20) UNSIGNED NOT NULL REFERENCES employes(id) ON DELETE CASCADE,
  created_at timestamp NOT NULL DEFAULT current_timestamp(),
  updated_at timestamp
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE demande_absences (
  id bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  object varchar(255) COLLATE utf8mb4_unicode_ci NOt NULL,
  description TEXT COLLATE utf8mb4_unicode_ci NOT NULL,
  date_debut DATE NOT NULL DEFAULT current_timestamp(),
  date_fin DATE NOT NULL DEFAULT current_timestamp(),
  hour_debut TIME NOT NULL,
  hour_fin TIME NOT NULL,
  validation boolean not null default false,
  refus boolean not null default false,
  employe_id bigint(20) UNSIGNED NOT NULL REFERENCES employes(id) ON DELETE CASCADE,
  created_at timestamp NOT NULL DEFAULT current_timestamp(),
  updated_at timestamp
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
