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