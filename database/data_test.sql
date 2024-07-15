-- Ajouter des données de test pour les tables dans database_finals4.sql

insert into reference values ("2024-07-13");

-- Ajout de données pour la table finals4_slots
INSERT INTO finals4_slots (nom) VALUES ('A'), ('B'), ('C');

-- Ajout de données pour la table finals4_voiture
INSERT INTO finals4_voiture (nom) VALUES 
	("4x4"),
	("petit"),
	("camion");

-- Ajout de données pour la table finals4_clients
INSERT INTO finals4_clients (matricule, voiture) VALUES 
	('1234TBN', 1), 
	('7654TAS', 2), 
	('9876TBB', 3), 
	('3456TAQ', 1);

-- Ajout de données pour la table finals4_services
INSERT INTO finals4_services (nom, prix, duree) VALUES 
	('reparation', 500000, 50000), 
	('check', 150000, 20000), 
	('vidange', 100000, 30000), 
	('reparation vip', 800000, 40000);

-- Ajout de données pour la table finals4_demande_rendez_vous
INSERT INTO finals4_demande_rendez_vous (client, services) VALUES 
	(1, 1), 
	(2, 2), 
	(1, 3), 
	(3, 4);

-- Ajout de données pour la table finals4_operation_rendez_vous
INSERT INTO finals4_operation_rendez_vous (rendez_vous, slot, entree_date, entree_time, sortie_date, sortie_time) 
VALUES (1, 1, '2024-07-13', '09:00:00', '2024-07-13', '14:00:00'),
       (2, 2, '2024-07-13', '14:30:00', '2024-07-13', '16:30:00'),
       (3, 1, '2024-07-14', '8:00:00', '2024-07-14', '11:00:00'),
       (4, 3, '2024-07-14', '15:30:00', '2024-07-15', '13:00:00');

-- Ajout de données pour la table finals4_devis
INSERT INTO finals4_devis (rendez_vous, effectue, prix, payement, paye) 
	VALUES (1, 1, 500000, '2024-07-21', 1), 
			 (2, 1, 150000, '2024-07-19', 1), 
			 (3, 1, 100000, '2024-07-24', 1), 
			 (4, 1, 800000, '2024-07-29', 1);

-- Ajout de données pour la table finals4_employe
INSERT INTO finals4_employe (nom, mdp) 
	VALUES ('Alice', 'password'), 
			 ('Bob', '123456'), 
			 ('Eva', 'securepassword'), 
			 ('David', 'p@ssw0rd');

