insert into finals4_slots(nom)
values('A'),
    ('B'),
    ('C');

insert into finals4_voiture(nom)
values('legère'),
    ('4*4'),
    ('camion'),
    ('Plaisir');

create table finals4_services(
	id int primary key auto_increment,
	nom varchar(20) not null,
	duree int,
	prix int(10) not null
) engine = innodb;    

insert into finals4_services(nom,duree,prix)
values('Reparation Simple',1,150000),
    ('Reparation standard',2,250000),
    ('Reparation complexe',8,800000),
    ('Entretien',2);