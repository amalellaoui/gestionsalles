create database gestion_de_salle;
use gestion_de_salle;
create table A
(
   IDSOC                int not null,
   IDPRO                int not null,
   primary key (IDSOC, IDPRO)
);
create table ABONNEMENT
(
   IDABONNER            int not null,
   DATEDB               date,
   DATEFIN              date,
   primary key (IDABONNER)
);
create table ADMINISTRATEUR
(
   IDADM                int not null,
   NOMADM               varchar(10),
   PRENOMADM            varchar(10),
   ADRESSEADM           longtext,
   TELEADM              varchar(10),
   primary key (IDADM)
);
create table COMPETITION
(
   IDCOMP               int not null,
   DATEDB               date,
   DATEFIN              date,
   primary key (IDCOMP)
);
create table COURS
(
   IDCOURS              int not null,
   NOMCOUR              varchar(10),
   primary key (IDCOURS)
);
create table ENTRAINEUR
(
   ID_ETR               int not null,
   CIN_ETR              varchar(10) not null,
   PRENOMETR            varchar(10) not null,
   NOMETR               varchar(10) not null,
   ADRESSEETR           varchar(10) not null,
   primary key (ID_ETR)
);
create table MEMBRE
(
   IDMEM                int not null,
   IDQUIZ               char(10) not null,
   ID_S                 int,
   IDTP                 int not null,
   NOMMEM               varchar(10),
   PRENOM               varchar(10),
   ADRESS               varchar(10),
   TELE                 varchar(10),
   primary key (IDMEM)
);
create table PROGRAMME
(
   IDPG                 int not null,
   IDCOURS              int not null,
   DATEPG               date,
   CONTENU              varchar(10),
   HEURE                time,
   primary key (IDPG)
);
create table PROMOTION
(
   IDPRO                int not null,
   TYPEPRO              varchar(10),
   DATEDB               date,
   DATEFIN_             date,
   primary key (IDPRO)
);
create table QUIZ
(
   IDQUIZ               char(10) not null,
   IDCOMP               int not null,
   NOTE                 int,
   primary key (IDQUIZ)
);
create table SALLE
(
   ID_S                 int not null,
   IDSOC                int not null,
   IDPG                 int not null,
   IDCOMP               int not null,
   IDVILLE              int not null,
   ADRESS_S             longtext,
   TELE_S               varchar(10),
   primary key (ID_S)
);
create table SOCIETE
(
   IDSOC                int not null,
   NOMSOC               varchar(10),
   primary key (IDSOC)
);
create table TESTPRATIQ
(
   IDTP                 int not null,
   IDCOMP               int not null,
   NOTE                 int,
   primary key (IDTP)
);
create table TYPEABONNEMENT
(
   ID_AB                int not null,
   CODE_ABN             varchar(10),
   LIBELLE              varchar(10),
   DESCRIPTIF           varchar(10),
   TARIF                int,
   primary key (ID_AB)
);
create table VILLE
(
   IDVILLE              int not null,
   NOMVILLE             varchar(10) not null,
   primary key (IDVILLE)
);

alter table MEMBRE add constraint FK_ASSOCIATION_16 foreign key (IDQUIZ)
      references QUIZ (IDQUIZ) on delete restrict on update restrict;

alter table MEMBRE add constraint FK_ASSOCIATION_17 foreign key (IDTP)
      references TESTPRATIQ (IDTP) on delete restrict on update restrict;

alter table MEMBRE add constraint FK_INSCRIRE foreign key (ID_S)
      references SALLE (ID_S) on delete restrict on update restrict;

alter table PROGRAMME add constraint FK_INCLUT foreign key (IDCOURS)
      references COURS (IDCOURS) on delete restrict on update restrict;

alter table QUIZ add constraint FK_TESTER foreign key (IDCOMP)
      references COMPETITION (IDCOMP) on delete restrict on update restrict;

alter table SALLE add constraint FK_APPARTIENT foreign key (IDSOC)
      references SOCIETE (IDSOC) on delete restrict on update restrict;

alter table SALLE add constraint FK_AVOIR foreign key (IDPG)
      references PROGRAMME (IDPG) on delete restrict on update restrict;

alter table SALLE add constraint FK_DANS foreign key (IDVILLE)
      references VILLE (IDVILLE) on delete restrict on update restrict;

alter table SALLE add constraint FK_ETRE foreign key (IDCOMP)
      references COMPETITION (IDCOMP) on delete restrict on update restrict;

alter table TESTPRATIQ add constraint FK_TESTER2 foreign key (IDCOMP)
      references COMPETITION (IDCOMP) on delete restrict on update restrict;



