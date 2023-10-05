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
    idbesoin int references besoin(idbesoin),
    diplome decimal(3,2),
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
    diplome varchar(150),
    experience varchar(150),
    nationalite varchar(150),
    sexe varchar(150),
    Smatri varchar(150),
    langue1 varchar(150),
    langue2 varchar(150),
    langue3 varchar(150),
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

create table admin(
    idadmin serial primary key,
    pseudo varchar(150),
    mdp varchar(80)
);

create table coefCv(
    idtache int references tache(idtache),
    doctorat int,
    master int,
    licence int,
    bacc int,
    bepc int,
    cepe int,
    mlg int,
    frc int,
    ang int,
    homme int,
    femme int,
    autre int,
    mariee int,
    celibat int,
    divorcee int
);

---------------------------INSERTION-------------------------

-- Insertion dans la table "client"
INSERT INTO client (email, mdp) VALUES ('soa@example.com', '123');
INSERT INTO client (email, mdp) VALUES ('lova@example.com', '456');
INSERT INTO client (email, mdp) VALUES ('rado@example.com', '789');

-- Insertion dans la table "admin"
INSERT INTO admin (pseudo, mdp) VALUES ('Informatique', '123');
INSERT INTO admin (pseudo, mdp) VALUES ('Securite', '456');
INSERT INTO admin (pseudo, mdp) VALUES ('Finance', '789');


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
    --5)Nationalite    
                  --Mlg      (10)     etranger(5)
--}

-- Insertion dans la table "critere"
INSERT INTO critere (idservice, idbesoin, diplome, experience, nationalite, sexe, Smatri, langue1, langue2, langue3, dateFin, debutEnt)
VALUES (1, 1, 'licence', '2 ans', 'Malagasy', 'homme', 'marie', 'Malagasy', '', '', '2023-10-30', '2023-11-15');

INSERT INTO critere (idservice, idbesoin, diplome, experience, nationalite, sexe, Smatri, langue1, langue2, langue3, dateFin, debutEnt)
VALUES (2, 2, 'master', '4 ans', 'Malagasy', 'Femme', 'marie', '', 'anglais', 'français', '2023-10-05', '2023-10-20');

INSERT INTO critere (idservice, idbesoin, diplome, experience, nationalite, sexe, Smatri, langue1, langue2, langue3, dateFin, debutEnt)
VALUES (3, 3, 'doctorat', '6 ans', 'etranger', 'Femme', 'Divorce', 'Malagasy', 'anglais', '', '2023-10-15', '2023-10-25');


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

-- Insertion dans la table "coefCv"
INSERT INTO coefCv 
(idtache, doctorat, master, licence, bacc, bepc, cepe, mlg, frc, ang,
 homme, femme, autre, mariee, celibat, divorcee)
VALUES
    (1, 5, 4, 3, 2, 1, 0, 5, 1, 3, 2, 2, 2, 5, 1, 2),
    (2, 5, 3, 2, 2, 1, 0, 3, 2, 3, 2, 0, 2, 1, 5, 2),
    (3, 5, 3, 3, 2, 1, 0, 3, 2, 3, 2, 2, 1, 5, 3, 2);


---------------------------SELECT-------------------------

--Select ANNONCE
SELECT t.nomTache, s.nom AS nomService, TO_CHAR(dateFin, 'DD-MM-YY') AS datefin, (b.heure/b.jour) as personnel,b.idbesoin
FROM critere c
JOIN besoin b ON c.idbesoin = b.idbesoin
JOIN tache t ON b.idtache = t.idtache
JOIN service s ON t.idservice = s.idservice;

--Select Details Annonce
SELECT * , TO_CHAR(dateFin, 'DD-MM-YY') AS datefin, (b.heure/b.jour) as personnel FROM critere c
JOIN besoin b ON c.idbesoin = b.idbesoin
JOIN tache t ON b.idtache = t.idtache
JOIN service s ON t.idservice = s.idservice
where b.idbesoin=1;

--Select CoefCv/service/poste
SELECT * FROM coefcv c
JOIN besoin b ON c.idtache = b.idtache
where b.idbesoin = 1;


select *  from client;
select *  from service;
select *  from besoin;
select *  from tache;
select *  from critere;