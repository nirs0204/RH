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
    experience text,
    typee int
);



CREATE table noteClient (
    idNoteClient serial PRIMARY KEY,
    idbesoin int references besoin(idbesoin),
    noteClient int,
    idclient int references client(idclient)
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
    volumetache int,
    volumehoraire int
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
    coef int
);

CREATE TABLE reponse (
    idreponse serial PRIMARY KEY,
    idquestion int REFERENCES questionnaire(idquestion),
    reponse text,
    reponseVerif boolean
);

-- idadmin = idemploye, type = 1 (admin), type = 5 (employe)
create table admin(
    idadmin int references employe(idemploye) primary key,
    pseudo varchar(150),
    mdp varchar(80),
    idservice int references service(idservice),
    type int
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

create table employe(
    idemploye serial primary key,
    idservice int  references service(idservice),
    idmanager int references employe(idemploye) default null,
    idtache int references tache(idtache),
    dateEmbauche date default null,
    genre int,
    enfant int default 0,
    nom varchar(50),
    prenom varchar(100),
    dtn date,
    cin varchar(35),
    pere varchar(150),
    mere varchar(150),
    adresse varchar(150),
    contact varchar(15),
    embauche int,
    cnaps int
);

create table essaicontrat(
    idessaicontrat serial primary key,
    idemploye int references employe(idemploye),
    duree int,
    salaire decimal(11,2),
    lieutravail varchar(50),
    eventualite text,
    debut date, /*Date d'embauche*/
    fin date,
    creation date
);

 
 CREATE  TABLE fiche_poste ( 
	id_fiche_poste SERIAL PRIMARY KEY,
	id_service int references service(idservice),
	id_tache int REFERENCES tache(idtache),
	mission text,
	responsabilite text,
	objectif text,
	competence_requise text
 );

create table contrat_travail(
    id_contrat_travail serial primary key,
    idemploye int references employe(idemploye),
    debut date,
    fin date,
    salaire decimal(11,2),
    lieutravail varchar(100),
    conditiontravail int,
    categorie varchar(150),
    creation date
);

/*

    create table contrat_travail(
        id_contrat_travail serial primary key,
        idemploye int references employe(idemploye),
        idcategorie_contrat int references categorie_contrat(idcategorie_contrat),
        debut date,
        fin date,
        salaire decimal(11,2),
        lieutravail varchar(100),
        conditiontravail int,
        categorie varchar(150),
        creation date
    );

    create table categorie_contrat (
        idcategorie_contrat serial primary key,
        nomCategorie varchar(50)
    );

*/

create table conge(
    idemploye int references employe(idemploye),
    resteconge int,
    dateinsert date
);

create table conge_demande(
    idcongedemande serial primary key,
    idemploye int references employe(idemploye),
    type varchar(50),
    datedebut timestamp,
    nbjours int,
    decision int,
    datedemande date
);

create table fiche_paie (
    idfichepaie serial primary key,
    idemploye int references employe(idemploye),
    id_contrat_travail int references contrat_travail(id_contrat_travail) null,
    idessaicontrat int references essaicontrat(idessaicontrat) null,
    datefichedp date,
    irsa int null,
    id_cnaps int null
);

/*
create table irsa (
    id_irsa serial primary key,
    categorie varchar(35),
    taux decimal(5,2)
);
*/

create table cnaps (
    id_cnaps serial primary key,
    categorie varchar(35),
    taux decimal(5,2)
);



---------------------------INSERTION-------------------------

-- Insertion dans la table "client"
INSERT INTO client (email, mdp) VALUES ('soa@example.com', '123');
INSERT INTO client (email, mdp) VALUES ('lova@example.com', '456');
INSERT INTO client (email, mdp) VALUES ('rado@example.com', '789');

-- Insertion dans la table "admin"
INSERT INTO admin (idadmin, pseudo, mdp, idservice, type) VALUES (1, 'Paul', '123', 1, 1);
INSERT INTO admin (idadmin, pseudo, mdp, idservice, type) VALUES (2, 'Selena', '456', 2, 5);
-- INSERT INTO admin (idadmin, pseudo, mdp, idservice, type) VALUES ('Gary', '789', 3);


-- Insertion dans la table "service"
INSERT INTO service (nom) VALUES ('Informatique');
INSERT INTO service (nom) VALUES ('Securite');
INSERT INTO service (nom) VALUES ('Finance');


-- Insertion dans la table "tache"
INSERT INTO tache (idservice, nomTache) VALUES (1, 'technicien reseau');
INSERT INTO tache (idservice, nomTache) VALUES (1, 'DAF Info');
INSERT INTO tache (idservice, nomTache) VALUES (1, 'developpeur');
INSERT INTO tache (idservice, nomTache) VALUES (1, 'data Analyst');
INSERT INTO tache (idservice, nomTache) VALUES (2, 'gardien');
INSERT INTO tache (idservice, nomTache) VALUES (3, 'caissier');

-- Insertion dans la table "besoin"
INSERT INTO besoin (idtache,   volumetache, volumehoraire) VALUES (1, 120, 24);
INSERT INTO besoin (idtache,   volumetache, volumehoraire) VALUES (2, 60, 12);
INSERT INTO besoin (idtache,   volumetache, volumehoraire) VALUES (3, 40, 8);
INSERT INTO besoin (idtache,   volumetache, volumehoraire) VALUES (4, 300, 8);

 
-- Insertion d'employe
INSERT INTO employe(idservice, idmanager, idtache ,  enfant , genre, dateEmbauche, nom, prenom, dtn, cin, pere, mere, adresse, contact, embauche, cnaps) 
VALUES (1, null, 1, 0, 3,'2021-03-10', 'Doe', 'John', '1990-05-15', '123456789012', 'John Doe Sr.', 'Jane Doe', '123 Rue A', '1234567890', 5, 1);
INSERT INTO employe(idservice, idmanager, idtache ,  enfant , genre, dateEmbauche, nom, prenom, dtn, cin, pere, mere, adresse, contact, embauche, cnaps) 
VALUES (1, 1, 4, 3, 2,'2022-07-10', 'Smith', 'Alice', '1985-10-20', '987654321012', 'Bob Smith', 'Mary Smith', '456 Rue B', '9876543210', 5, 1);

-- Inserion de fiche de poste :
INSERT INTO fiche_poste (id_service, id_tache, mission, responsabilite, objectif, competence_requise) 
VALUES (1, 1, 'Mission 1', 'Responsabilité 1', 'Objectif 1', 'Compétence requise 1');

INSERT INTO fiche_poste (id_service, id_tache, mission, responsabilite, objectif, competence_requise) 
VALUES (1, 4, 'Mission 2', 'Responsabilité 2', 'Objectif 2', 'Compétence requise 2');

INSERT INTO fiche_poste (id_service, id_tache, mission, responsabilite, objectif, competence_requise) 
VALUES (1, 5, 'Mission 3', 'Responsabilité 3', 'Objectif 3', 'Compétence requise 3');

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


INSERT INTO critere (idservice, idbesoin, diplome, experience, nationalite, sexe, Smatri, langue1, langue2, langue3, dateFin, debutEnt)
VALUES (1, 4, 'master', '8 ans', 'etranger', 'homme', 'mariee', '', 'anglais', 'français', '2023-11-15', '2023-11-25');


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


INSERT INTO cv (idclient, idbesoin, diplome, langue1, langue2, langue3, sexe, Smatri, nom, adresse, prenom, dtn, experience,typee) VALUES
(1, 1, 8.5, 7.2, 5.0, 5.0, 2, 6.0, 'Futiosa', '123 Street', 'Laura', '1990-07-29', 'Some experience',0),
(2, 1, 8.0, 8.0, 6.0, 5.0, 2, 6.0, 'Jenner', '456 Street', 'Kailee', '1992-04-15', 'Considerable experience',0);

INSERT INTO noteClient (idbesoin, noteClient, idclient) VALUES
(1, 25, 1),
(1, 50, 2);

-- Insertion dans la table "coefCv"
INSERT INTO coefCv 
(idtache, doctorat, master, licence, bacc, bepc, cepe, mlg, frc, ang,
 homme, femme, autre, mariee, celibat, divorcee)
VALUES

    (1, 5, 4, 3, 2, 1, 0, 5, 1, 3, 2, 1, 2, 5, 1, 2);
    (5, 5, 3, 2, 2, 1, 0, 3, 2, 3, 2, 1, 2, 1, 5, 2);
    (3, 5, 3, 3, 2, 1, 0, 3, 2, 3, 2, 1, 1, 5, 3, 2);


--- QUESTIONS ---
--- Questions qcm Dptmnt Informatique -> Technicien ---
--- question 1
INSERT INTO questionnaire (idservice, question, coef) VALUES (
    1, 
    'Pouvez-vous expliquer la différence entre un serveur et un poste de travail ?',
    15
);
--- question 2
INSERT INTO questionnaire (idservice, question, coef) VALUES (
    1,
    'Quelle est la plage pour les adresses IP privées par défaut ?',
    15
);
--- question 3
INSERT INTO questionnaire (idservice, question, coef) VALUES (
    1,
    'Quelle est la différence entre un commutateur et un routeur ?',
    20
);
--- Questions qcm Dptmnt Informatique -> Technicien ---
--- Questions qcm Dptmnt Securite -> Gardien ---
--- question 4
INSERT INTO questionnaire (idservice, question, coef) VALUES (
    2,
    'Que doit faire un agent de sécurité si il y a une incedie ?',
    15
);
--- question 5
INSERT INTO questionnaire (idservice, question, coef) VALUES (
    2,
    'Quel est le rôle doit avoir un agent de sécurité ?',
    15
);
--- question 6
INSERT INTO questionnaire (idservice, question, coef) VALUES (
    2,
    'Quel est la base en terme équipement pour un agent de sécurité ?',
    20
);
--- Questions qcm Dptmnt Securite -> Gardien ---
--- Questions qcm Dptmnt Finance -> Caissier ---
--- question 7
INSERT INTO questionnaire (idservice, question, coef) VALUES (
    3,
    'Quel est le rôle a un caissier ?',
    15
);
--- question 8
INSERT INTO questionnaire (idservice, question, coef) VALUES (
    3,
    'Quels sont les types de paiements que peut accepter un caissier ?',
    15
);
--- question 9
INSERT INTO questionnaire (idservice, question, coef) VALUES (
    3,
    'Quelle est la procédure à suivre si il y a erreur de caisse ?',
    20
);
--- Questions qcm Dptmnt Finance -> Caissier ---
--- QUESTIONS ---

--- REPONSES ---
--- Reponses qcm Dptmnt Informatique -> Technicien ---
INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    1,
    'Un serveur fournit des ressources et des services, tandis que le poste de travail est utilisé par un utilisateur individuel.',
    TRUE
);

INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    1,
    'Le serveur est un employé tandis que le poste de travail est le lieu de travail du travailleur',
    FALSE
);

INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    1,
    'Le serveur est la personne qui reçoit les commandes dans un hotel/restaurant et le poste de travail le lieu de travail de celui-ci',
    FALSE
);
INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    2,
    '192.168.0.0/16',
    TRUE
);

INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    2,
    '10.0.0.0/8',
    FALSE
);

INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    2,
    '172.16.0.0/12',
    FALSE
);
INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    3,
    'Un commutateur permet de connecter des périphériques sur un même réseau local, tandis que le routeur permet de connecter des réseaux locaux distincts',
    TRUE
);

INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    3,
    'Un commutateur permet de configurer des adresses IP, tandis que le routeur permet de configurer des noms de domaine.',
    FALSE
);

INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    3,
    'Un commutateur permet de partager une connexion Internet, tandis que le routeur permet de contrôler un accès à Internet.',
    FALSE
);
--- Reponses qcm Dptmnt Informatique -> Technicien ---

--- Reponses qcm Dptmnt Securite -> Gardien ---
INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    4,
    'Appeler les pompiers et évacuer les lieux',
    TRUE
);

INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    4,
    'Arrêter les personnes qui courent',
    FALSE
);

INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    4,
    'Rouvrir les portes pour laisser sortir les fumées',
    FALSE
);
INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    5,
    'Protéger les biens et les personnes',
    TRUE
);

INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    5,
    'Vérifier les identité des personnes',
    FALSE
);

INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    5,
    'Intervenir si il y a un incident',
    FALSE
);
INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    6,
    'Un gilet jaune, une matraque et un talkie-walkie',
    TRUE
);

INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    6,
    'Une corde, des menottes',
    FALSE
);

INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    6,
    'Un kit de clé, une lampe torche et un casque',
    FALSE
);
--- Reponses qcm Dptmnt Securite -> Gardien ---

--- Reponses qcm Dptmnt Finance -> Caissier ---
INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    7,
    'Recevoir les paiements des clients et effectuer des encaissements et des décaissements',
    TRUE
);

INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    7,
    'Gérer les stocks',
    FALSE
);

INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    7,
    'Accueillir et renseigner les clients',
    FALSE
);
INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    8,
    'Espèces, chèques, cartes bancaires, cartes de crédit',
    TRUE
);

INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    8,
    'Espèces, chèques, cartes de crédit, cartes de débit',
    FALSE
);

INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    8,
    'Espèces, chèques, cartes de crédit, cartes prépayées',
    FALSE
);
INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    9,
    'Signaler l erreur à son supérieur hiérarchique et corriger l erreur sur le journal de caisse',
    TRUE
);

INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    9,
    'Faire un état des pertes et des profits',
    FALSE
);

INSERT INTO reponse (idquestion, reponse, reponseVerif) VALUES (
    9,
    'Signaler l erreur à la police',
    FALSE
);
--- Reponses qcm Dptmnt Finance -> Caissier ---
--- REPONSES ---

--------------------------UPDATE--------------------------
UPDATE reponse
SET  reponseVerif = TRUE
WHERE idreponse = 2; -- L'ID de la question que vous souhaitez mettre à jour


update cv set typee = 2  where idclient =1 and idbesoin = 1;
update cv set typee = 2  where idclient =2 and idbesoin = 1;

---------------------------SELECT-------------------------

--Select ANNONCE
SELECT t.nomTache, s.nom AS nomService, TO_CHAR(dateFin, 'DD-MM-YY') AS datefin, (b.volumetache/b.volumehoraire) as personnel,b.idbesoin
FROM critere c
JOIN besoin b ON c.idbesoin = b.idbesoin
JOIN tache t ON b.idtache = t.idtache
JOIN service s ON t.idservice = s.idservice;

--Select COMPLETE
SELECT t.nomTache, s.nom AS nomService, TO_CHAR(dateFin, 'DD-MM-YY') AS datefin, (b.volumetache/b.volumehoraire) as personnel,b.idbesoin
FROM critere c
JOIN besoin b ON c.idbesoin = b.idbesoin
JOIN tache t ON b.idtache = t.idtache
JOIN service s ON t.idservice = s.idservice
JOIN cv cv ON b.idbesoin = cv.idbesoin
JOIN noteClient n ON n.idbesoin = b.idbesoin
WHERE n.idclient = 1 and b.idbesoin = 1 ;

--CV completed
SELECT t.nomTache, s.nom AS nomService, TO_CHAR(dateFin, 'DD-MM-YY') AS datefin, (b.volumetache/b.volumehoraire) as personnel,b.idbesoin
FROM critere c
JOIN besoin b ON c.idbesoin = b.idbesoin
JOIN tache t ON b.idtache = t.idtache
JOIN service s ON t.idservice = s.idservice
JOIN cv cv ON b.idbesoin = cv.idbesoin
WHERE cv.idclient = 1 ;

--Select Details Annonce
SELECT * , TO_CHAR(dateFin, 'DD-MM-YY') AS datefin, (b.volumehoraire/b.volumetache) as personnel FROM critere c
JOIN besoin b ON c.idbesoin = b.idbesoin
JOIN tache t ON b.idtache = t.idtache
JOIN service s ON t.idservice = s.idservice
WHERE b.idbesoin=1;

select t.idtache, t.nomTache
from service s
join tache t on s.idservice = t.idservice
WHERE s.idservice = 1;

--Select CoefCv/service/poste
SELECT * FROM coefcv c
JOIN besoin b ON c.idtache = b.idtache
WHERE b.idbesoin = 1;

--Select de questionnaire client
SELECT * FROM questionnaire q
JOIN service s ON s.idservice = q.idservice
JOIN tache t ON s.idservice = t.idservice
JOIN besoin b ON t.idtache = b.idtache
WHERE idbesoin = 1;

SELECT idreponse ,q.question,r.reponse , r.reponseVerif FROM questionnaire q
JOIN service s ON s.idservice = q.idservice
JOIN tache t ON s.idservice = t.idservice
JOIN besoin b ON t.idtache = b.idtache
JOIN reponse r ON q.idquestion = r.idquestion
WHERE idbesoin = 1;

SELECT * fROM reponse where idquestion = 1;

SELECT * FROM questionnaire q 
JOIN reponse r ON q.idquestion = r.idquestion
WHERE r.idreponse = 8;

--NOTE de CV d'un client a chaque beoin de service
select +diplome+langue1+langue2+langue3+sexe+Smatri as noteCv
FROM cv 
WHERE idclient = 1 and idbesoin =1 ;

SELECT * , (c.diplome + c.langue1 + c.langue2 + c.langue3 + c.sexe + c.Smatri) as total_cv_note,n.idNoteClient, n.noteClient
FROM  cv c
JOIN  noteClient n ON  c.idclient = n.idclient
JOIN  critere cr ON  cr.idbesoin = c.idbesoin
where c.idbesoin=1
ORDER BY total_cv_note DESC, n.noteClient DESC limit 5;

SELECT * FROM employe 
WHERE ;

SELECT * FROM  essaicontrat ec
JOIN employe e ON e.idemploye = ec.idemploye
ORDER BY idessaicontrat DESC LIMIT 1;

SELECT * FROM  essaicontrat ec
JOIN employe e ON e.idemploye = ec.idemploye
where ec.idemploye = 1;

SELECT * FROM employe e
JOIN tache t ON  e.idtache = t.idtache
where e.idservice =1;

SELECT * FROM besoin ORDER BY idbesoin DESC LIMIT 1;

SELECT * 
FROM cv c 
JOIN besoin b ON b.idbesoin = c.idbesoin
JOIN tache t ON t.idtache = b.idtache
where c.idclient = 1;

SELECT *,
    EXTRACT(YEAR FROM CURRENT_DATE) - EXTRACT(YEAR FROM dtn) AS age
FROM employe
WHERE idservice = 1
and genre =3
order by age desc;

--Superieur:

WITH RECURSIVE superior_hierarchy AS (
    SELECT e1.idemploye, e1.nom, e1.idmanager, e1.idtache, t.nomTache as nomtache, e1.prenom as prenom_manager
    FROM employe e1
    LEFT JOIN tache t ON e1.idtache = t.idtache
    WHERE e1.idemploye = 3
    UNION
    SELECT e2.idemploye, e2.nom, e2.idmanager, e2.idtache, t.nomTache as nomtache, e2.prenom as prenom_manager
    FROM employe e2
    JOIN superior_hierarchy sh ON e2.idemploye = sh.idmanager
    LEFT JOIN tache t ON e2.idtache = t.idtache
)
SELECT * FROM superior_hierarchy;


--Subordonne

SELECT idemploye, nom, prenom, idtache
FROM employe
WHERE idmanager = 1;

SELECT c.* FROM conge c 
JOIN employe e ON e.idemploye = c.idemploye;

SELECT e.*
            FROM employe e
            LEFT JOIN conge c ON e.idemploye = c.idemploye
            LEFT JOIN tache t ON e.idtache = t.idtache
            LEFT JOIN service s ON t.idservice = s.idservice
            WHERE e.dateEmbauche <= CURRENT_DATE - INTERVAL '1 year'
            AND (c.dateinsert IS NULL OR EXTRACT(YEAR FROM c.dateinsert) < EXTRACT(YEAR FROM CURRENT_DATE))

SELECT *
FROM conge_demande c
JOIN employe e ON e.idemploye = c.idemploye
WHERE c.decision = 2
AND (c.datedebut + INTERVAL '1 DAY' * c.nbjours) > CURRENT_DATE
AND EXTRACT(YEAR FROM c.datedebut) = EXTRACT(YEAR FROM CURRENT_DATE);


SELECT *
FROM conge_demande
WHERE decision  =2 AND EXTRACT(YEAR FROM datedebut) = EXTRACT(YEAR FROM CURRENT_DATE);


Select *  from client;
select *  from service;
select *  from besoin;
select *  from tache;
select *  from critere;
select * from questionnaire;
select * from reponse;
