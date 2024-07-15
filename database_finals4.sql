drop database finals4;
create database finals4;
use finals4;
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
	voiture int not null ,
	constraint foreign key(voiture) references finals4_voiture(id)
) engine = innodb;

create table finals4_services(
	id int primary key auto_increment,
	nom varchar(20) not null,
	duree decimal(),
	prix int(10) not null
) engine = innodb;

create table finals4_demande_rendez_vous(
	id int primary key auto_increment,
	client int,
	services int ,
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

create table finals4_resultat_rendez_vous(
	id int primary key auto_increment,
	rendez_vous int,
	effectue tinyint(1),
	prix int,
	payement date,
	paye tinyint(1) ,
	constraint foreign key(rendez_vous) references finals4_demande_rendez_vous(id)
) engine = innodb;


create table finals4_employe(
	id int primary key auto_increment,
	nom varchar(20),
	mdp varchar(20)
);