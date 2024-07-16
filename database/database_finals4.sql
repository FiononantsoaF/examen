drop database db_infop16a_ETU002740;
create database db_infop16a_ETU002740;
use db_infop16a_ETU002740;

create table horaire (ouvrture time, fermeture time) engine = innodb;

create table finals4_slots(
	id int primary key auto_increment,
	nom char(1) not null
) engine = innodb;

create table finals4_voiture (
	id int primary key auto_increment,
	nom varchar(10) not null
) engine = innodb;

create table finals4_clients(
	id int primary key auto_increment,
	matricule varchar(7) not null,
	voiture int not null,
	constraint foreign key(voiture) references finals4_voiture(id)
) engine = innodb;

create table finals4_services(
	id int primary key auto_increment,
	nom varchar(20) not null,
	prix int(10) not null,
	duree time
) engine = innodb;

create table finals4_demande_rendez_vous(
	id int primary key auto_increment,
	client int,
	services int,
	constraint foreign key(client) references finals4_clients(id),
	constraint foreign key(services) references finals4_services(id)
) engine = innodb;

create table finals4_operation_rendez_vous(
	id int primary key auto_increment,
	rendez_vous int,
	slot int,
	entree_date date,
	entree_time time,
	sortie_date date,
	sortie_time time,
	constraint foreign key(slot) references finals4_slots(id),
	constraint foreign key(rendez_vous) references finals4_demande_rendez_vous(id)
) engine = innodb;

create table finals4_devis(
	id int primary key auto_increment,
	rendez_vous int,
	effectue tinyint(1),
	prix int,
	payement date,
	paye tinyint(1),
	constraint foreign key(rendez_vous) references finals4_demande_rendez_vous(id)
) engine = innodb;

create table finals4_employe(
	id int primary key auto_increment,
	nom varchar(20),
	mdp varchar(20)
);
-- isoler les deux couples entree et sortie
CREATE OR REPLACE VIEW finals4_view_all_sortie AS
SELECT sortie_date AS daty,
	sortie_time AS fotoana,
	slot
FROM finals4_operation_rendez_vous
ORDER BY sortie_date,
	sortie_time;

CREATE OR REPLACE VIEW finals4_view_all_entree AS
SELECT entree_date AS daty,
	entree_time AS fotoana,
	slot
FROM finals4_operation_rendez_vous
ORDER BY entree_date,
	entree_time;
	
CREATE OR REPLACE VIEW finals4_view_detail_rendez_vous AS
SELECT dr.id AS rendez_vous_id,
       cl.id AS client_id,
       cl.matricule AS client_matricule,
       v.nom AS voiture_nom,
       s.id AS service_id,
       s.nom AS service_nom,
       s.prix AS service_prix,
       s.duree AS service_duree,
       op.id AS operation_id,
       op.entree_date AS operation_entree_date,
       op.entree_time AS operation_entree_time,
       op.sortie_date AS operation_sortie_date,
       op.sortie_time AS operation_sortie_time,
       sl.nom AS slot_nom,
       dv.payement AS devis_payment_date
FROM finals4_demande_rendez_vous dr
JOIN finals4_clients cl ON dr.client = cl.id
JOIN finals4_voiture v ON cl.voiture = v.id
JOIN finals4_services s ON dr.services = s.id
LEFT JOIN finals4_operation_rendez_vous op ON dr.id = op.rendez_vous
LEFT JOIN finals4_slots sl ON op.slot = sl.id
LEFT JOIN finals4_devis dv ON dr.id = dv.rendez_vous
ORDER BY dr.id;


CREATE OR REPLACE VIEW finals4_view_free_slots AS
SELECT *,
       CAST(
           TIMEDIFF(fotoana_m, fotoana_v) - DATEDIFF(fotoana_m, fotoana_v) * 140000 AS TIME
       ) AS diff
FROM (
    SELECT finals4_view_all_sortie.slot AS slot,
           CONCAT(finals4_view_all_sortie.daty, ' ', finals4_view_all_sortie.fotoana) AS fotoana_v,
           CONCAT(finals4_view_all_entree.daty, ' ', finals4_view_all_entree.fotoana) AS fotoana_m
    FROM finals4_view_all_sortie
    LEFT JOIN finals4_view_all_entree ON finals4_view_all_sortie.slot = finals4_view_all_entree.slot
    WHERE finals4_view_all_sortie.daty >= '2024-07-12'  
) AS tab
WHERE fotoana_v < fotoana_m;
