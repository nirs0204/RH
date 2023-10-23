---CLIENT
---------------client
INSERT INTO client (email, mdp) VALUES ('soa@example.com', '123');
INSERT INTO client (email, mdp) VALUES ('lova@example.com', '456');
INSERT INTO client (email, mdp) VALUES ('rado@example.com', '789');
INSERT INTO client (email, mdp) VALUES ('lina@example.com', 'abc');
INSERT INTO client (email, mdp) VALUES ('andry@example.com', 'def');
INSERT INTO client (email, mdp) VALUES ('zo@example.com', 'ghi');

---------------cv
INSERT INTO cv (idclient, idbesoin, diplome, langue1, langue2, langue3, sexe, Smatri, nom, adresse, prenom, dtn, experience,typee) VALUES
(1, 1, 8.5, 7.2, 5.0, 5.0, 2, 6.0, 'Randrianasolo', '123 Street 28 AK 908 Bali', 'Soa', '1990-07-29', 'Some experience',0),
(2, 4, 8.5, 7.2, 5.0, 5.0, 2, 6.0, 'Raharinalinoro', '123 Street villa 03429 Analalava', 'Rado', '1990-10-03', 'Many experience',0),
(3, 1, 8.0, 8.0, 6.0, 5.0, 2, 6.0, 'Ratongavao', '456 Street 657 BIP 101 Mareha', 'lova', '1992-04-15', 'Considerable experience',0)
(4, 1, 8.5, 7.2, 5.0, 5.0, 2, 6.0, 'Mahafaly', '123 Street villa 28 AK 98 Nosivaly', 'Lina', '1991-07-22', 'Some experience',0),
(5, 2, 8.5, 7.2, 5.0, 5.0, 2, 6.0, 'Mahatehotia', '1 AK Street villa 000 Ambiarano', 'Andry', '1990-01-15', 'Many experience',0),
(6, 3, 8.0, 8.0, 6.0, 5.0, 2, 6.0, 'Andriamahery', '456 AK 3 Street villa 0323 Anadapa', 'zo', '1993-04-17', 'Considerable experience',0);

---------------noteclient
INSERT INTO noteClient (idbesoin, noteClient, idclient) VALUES
(1, 35, 1),
(1, 50, 2),
(1, 35, 1),
(1, 50, 2),
(1, 25, 1),
(1, 50, 2);

---ADMIN
---------------service
INSERT INTO service (nom) VALUES ('Informatique');
INSERT INTO service (nom) VALUES ('Securite');
INSERT INTO service (nom) VALUES ('Finance');

---------------tache
INSERT INTO tache (idservice, nomTache) VALUES (1, 'technicien reseau');
INSERT INTO tache (idservice, nomTache) VALUES (1, 'DAF Info');
INSERT INTO tache (idservice, nomTache) VALUES (1, 'developpeur');
INSERT INTO tache (idservice, nomTache) VALUES (1, 'data Analyst');

INSERT INTO tache (idservice, nomTache) VALUES (2, 'gardien');
INSERT INTO tache (idservice, nomTache) VALUES (2, 'agent Securite');
INSERT INTO tache (idservice, nomTache) VALUES (2, 'enqueteur prive');

INSERT INTO tache (idservice, nomTache) VALUES (3, 'caissier');
INSERT INTO tache (idservice, nomTache) VALUES (3, 'comptable tresorier');
INSERT INTO tache (idservice, nomTache) VALUES (3, 'controleur de gestion');

----------------besoin
INSERT INTO besoin (idtache,   volumetache, volumehoraire) VALUES (1, 120, 24);
INSERT INTO besoin (idtache,   volumetache, volumehoraire) VALUES (2, 60, 12);
INSERT INTO besoin (idtache,   volumetache, volumehoraire) VALUES (4, 40, 8);
INSERT INTO besoin (idtache,   volumetache, volumehoraire) VALUES (8, 40, 8);
INSERT INTO besoin (idtache,   volumetache, volumehoraire) VALUES (10, 300, 8);

INSERT INTO critere (idservice, idbesoin, diplome, experience, nationalite, sexe, Smatri, langue1, langue2, langue3, dateFin, debutEnt)
VALUES (1, 1, 'master', '2 ans', 'Malagasy', 'homme', 'marie', 'malagasy', 'anglais', '', '2023-11-30', '2023-11-15');

INSERT INTO critere (idservice, idbesoin, diplome, experience, nationalite, sexe, Smatri, langue1, langue2, langue3, dateFin, debutEnt)
VALUES (2, 2, 'master', '4 ans', 'Malagasy', 'homme', 'marie', 'malagasy', 'anglais', 'français','2023-11-30', '2023-11-15');

INSERT INTO critere (idservice, idbesoin, diplome, experience, nationalite, sexe, Smatri, langue1, langue2, langue3, dateFin, debutEnt)
VALUES (3, 3, 'doctorat', '6 ans', 'etranger', 'Femme', 'Divorce', 'Malagasy', 'anglais', '', '2023-11-30', '2023-11-15');

INSERT INTO critere (idservice, idbesoin, diplome, experience, nationalite, sexe, Smatri, langue1, langue2, langue3, dateFin, debutEnt)
VALUES (1, 4, 'licence', '8 ans', 'etranger', 'homme', 'mariee', '', 'anglais', 'français','2023-11-30', '2023-11-15');

INSERT INTO critere (idservice, idbesoin, diplome, experience, nationalite, sexe, Smatri, langue1, langue2, langue3, dateFin, debutEnt)
VALUES (1, 5, 'master', '8 ans', 'malagasy', 'femme', 'mariee', 'malagase', 'anglais', 'français','2023-11-30', '2023-11-15');

----------------coefCV
INSERT INTO coefCv 
(idtache, doctorat, master, licence, bacc, bepc, cepe, mlg, frc, ang,
 homme, femme, autre, mariee, celibat, divorcee)
VALUES

    (1, 5, 4, 3, 2, 1, 0, 5, 1, 3, 2, 1, 2, 5, 1, 2),
    (2, 5, 3, 2, 2, 1, 0, 3, 2, 3, 2, 1, 2, 1, 5, 2),
    (3, 5, 3, 3, 2, 1, 0, 3, 2, 3, 2, 1, 1, 5, 3, 2),
    (1, 5, 4, 3, 2, 1, 0, 5, 1, 3, 2, 1, 2, 5, 1, 2),
    (2, 5, 3, 2, 2, 1, 0, 3, 2, 3, 2, 1, 2, 1, 5, 2),
    (3, 5, 3, 3, 2, 1, 0, 3, 2, 3, 2, 1, 1, 5, 3, 2),
    (1, 5, 4, 3, 2, 1, 0, 5, 1, 3, 2, 1, 2, 5, 1, 2),
    (2, 5, 3, 2, 2, 1, 0, 3, 2, 3, 2, 1, 2, 1, 5, 2),
    (3, 5, 3, 3, 2, 1, 0, 3, 2, 3, 2, 1, 1, 5, 3, 2);
