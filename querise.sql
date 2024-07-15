insert into finals4_slots(nom)
values('A'),
    ('B'),
    ('C');

insert into finals4_voiture(nom)
values('legère'),
    ('4*4'),
    ('camion'),
    ('Plaisir');
 
insert into finals4_services(nom,duree,prix)
values('Reparation Simple','1:00:00',150000),
    ('Reparation standard','1:00:00',250000),
    ('Reparation complexe','8:00:00',800000),
    ('Entretien','2:30:00',300000);

create table finals4_employe(
	id int primary key auto_increment,
	nom varchar(20),
	mdp varchar(20)
);

insert into finals4_employe(nom,mdp)
values('admin','123');
   