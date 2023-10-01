create database gestionentr ;
\c gestionentr;

--------CLIENT----------
create table client (
    idclient serial primary key,
    email varchar(150),
    mdp varchar(150)
);

create table cv (
    idclient int references client(idclient),
    diplome1 decimal(3,2),
    diplome2 decimal(3,2),
    diplome3 decimal(3,2),
    diplome4 decimal(3,2),
    diplome5 decimal(3,2),
    diplome6 decimal(3,2),
    langue1 decimal(3,2),
    langue2 decimal(3,2),
    langue3 decimal(3,2),
    sexe decimal(3,2),
    Smatri decimal(3,2),
    nom varchar(150),
    adresse varchar(150),
    prenom varchar(150),
    dtn varchar(150),
    experience text
);

----------ADMIN-------------
create table service(
    idservice serial primary key,
    nom varchar(150)
);

create table tache(
    idtache serial primary key,
    idservice int references service(idservice),
    nomTache varchar(150)
);

create table besoin (
    idbesoin serial primary key,
    idtache int references tache(idtache),
    heure int,
    jour numeric
);

create table critere (
    idservice int references service(idservice),
    idbesoin int references besoin(idbesoin),
    diplome int,
    experience int,
    nationalite int,
    sexe int,
    Smatri int,
    langue1 int,
    langue2 int,
    langue3 int,
    dateFin date,
    debutEnt date
);

create table questionnaire (
    idquestion serial primary key,
    idservice int references service(idservice),
    question text,
    reponse int,
    coef int
);

--------------INSERTION------------------------

-- Insertion dans la table "client"
INSERT INTO client (email, mdp) VALUES ('soa@example.com', '123');
INSERT INTO client (email, mdp) VALUES ('lova@example.com', '456');
INSERT INTO client (email, mdp) VALUES ('rado@example.com', '789');


-- Insertion dans la table "service"
INSERT INTO service (nom) VALUES ('Informatique');
INSERT INTO service (nom) VALUES ('Securite');
INSERT INTO service (nom) VALUES ('Finance');


-- Insertion dans la table "tache"
INSERT INTO tache (idservice, nomTache) VALUES (1, 'technicien reseau');
INSERT INTO tache (idservice, nomTache) VALUES (2, 'gardien');
INSERT INTO tache (idservice, nomTache) VALUES (3, 'caissier');

-- Insertion dans la table "besoin"
INSERT INTO besoin (idtache, heure, jour) VALUES (1, 120, 24);
INSERT INTO besoin (idtache, heure, jour) VALUES (2, 60, 12);
INSERT INTO besoin (idtache, heure, jour) VALUES (3, 40, 8);



-- Critere {
    --1)diplome
                  --doctorat (30)      master (25)     licence(20)
                  --bacc     (15)      bepc   (10)     cepe   (5)
    --2)langue
                  --Mlg      (15)      frc    (10)     ang    (5)
    --3)sexe      
                  --H        (15)      F      (10)     LGBT   (5)
    --4)SMatri    
                  --marie    (15)      Celibat(10)     Divorce(5)
    --5)SMatri    
                  --Mlg      (10)     etranger(5)
--}

-- Critere 1
INSERT INTO critere
 (idservice, idbesoin, diplome, experience, nationalite, sexe, Smatri, langue1, langue2, langue3, dateFin, debutEnt)
VALUES (1, 1, 20, 2, 10, 15, 10, 15, 0, 0, '2023-10-30', '2023-11-15');

-- Critere 2
INSERT INTO critere (idservice, idbesoin, diplome, experience, nationalite, sexe, Smatri, langue1, langue2, langue3, dateFin, debutEnt)
VALUES (2, 2, 25, 4, 10, 10, 10, 5, 0, 10, '2023-10-05', '2023-10-20');

-- Critere 3
INSERT INTO critere (idservice, idbesoin, diplome, experience, nationalite, sexe, Smatri, langue1, langue2, langue3, dateFin, debutEnt)
VALUES (3, 3, 30, 6, 5, 5, 5, 10, 5, 0, '2023-10-15', '2023-10-25');


-- CV (/20) {
    --1)diplome
                  --doctorat (11)      master (8)     licence(6)
                  --bacc     (4)      bepc   (2)     cepe   (1)
    --2)langue
                  --Mlg      (3)      frc    (2)     ang    (5)
    --3)sexe      
                  --H        (2)      F      (2)     LGBT   (1)
    --4)SMatri    
                  --marie    (2)      Celibat(2)     Divorce(2)
--}

