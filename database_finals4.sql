create database finals4;
use finals4;
create table finals4_slots(
	id int primary key auto_increment ,
	nom char(1) not null
)engine=innodb;

create table finals4_voiture (
	id int primary key auto_increment ,
	nom varchar(10) not null
)engine=innodb;

create table finals4_clients(
	id int primary key auto_increment ,
	matricule varchar(7),
	voiture int ,
	constraint foreign key(voiture) references finals4_voiture (id)
)engine=innodb;

create table finals4_services(
	id int primary key auto_increment ,
	nom varchar(20),
	prix int(10)
)engine=innodb;
