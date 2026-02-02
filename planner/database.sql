CREATE DATABASE planner;
USE planner;
CREATE TABLE cliente(
	username VARCHAR(20) PRIMARY KEY,
	password VARCHAR(20),
	nome VARCHAR(15),
	cognome VARCHAR(15),
	email VARCHAR(20),
	indirizzo VARCHAR(30),
	citta VARCHAR(20),
	cap INT,
	n_cell INT
);
CREATE TABLE acquistare(
	fk_username VARCHAR(20),
	fk_cod_planner  VARCHAR(15),
	data_acquisto_planner DATE,
	quantità_planner INT
);
CREATE TABLE planner_comprare(
	cod_planner  VARCHAR(15) PRIMARY KEY,
	img VARCHAR(15),
	tipo VARCHAR(10),
	prezzo DECIMAL,
	nome VARCHAR(15),
	descrizione VARCHAR(30),
	disponibilita INT
);
CREATE TABLE slot_giornaliero(
	cod_giorno INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	data_giorno DATE,
	fk_cod_slot varchar(15),
	fk_username VARCHAR(20),
	descrizione VARCHAR(25),
	fk_cod_attivita VARCHAR(15)
);
CREATE TABLE inserire(
	fk_cod_giorno  VARCHAR(15),
	fk_cod_strumenti VARCHAR(15),
	tipologie_strumento_specifico VARCHAR(10)
);
CREATE TABLE strumenti(
	cod_strumenti VARCHAR(15) PRIMARY KEY,
	tipologie_strumento_generale VARCHAR(10)
);
CREATE TABLE attività(
	cod_attivita VARCHAR(15) PRIMARY KEY,
	fk_cod_giorno  VARCHAR(15),
	data_i_attivita DATE,
	data_f_attivita DATE,
	tipologie_attivita VARCHAR(10)
);
CREATE TABLE slot(
	cod_slot int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	inizio int,
	fine int,
	giorno int
);
planner da comprare
INSERT INTO planner_comprare (cod_planner, img, tipo, prezzo, nome, descrizione, disponibilita) value(1,"planner1.jpg","cartaceo", 14, "Classic", "Classico planner", 5);
INSERT INTO planner_comprare (cod_planner, img, tipo, prezzo, nome, descrizione, disponibilita) value(2,"planner2.jpg","cartaceo", 11, "Day", "Planner giornaliero", 5);
INSERT INTO planner_comprare (cod_planner, img, tipo, prezzo, nome, descrizione, disponibilita) value(3,"planner3.jpg","cartaceo", 15, "Calenday", "calendario planner", 5);
INSERT INTO planner_comprare (cod_planner, img, tipo, prezzo, nome, descrizione, disponibilita) value(4,"planner4.jpg","digitale", 13, "Classic D", "Classico planner digitale", 5);
INSERT INTO planner_comprare (cod_planner, img, tipo, prezzo, nome, descrizione, disponibilita) value(5,"planner5.jpg","digitale", 11, "aestetic", "planner con stile", 5);
INSERT INTO planner_comprare (cod_planner, img, tipo, prezzo, nome, descrizione, disponibilita) value(6,"planner6.jpg","digitale", 11, "Pink lady", "Planner rosa", 5);

Strumenti
INSERT INTO strumenti (cod_strumenti, tipologie_strumento_generale) value("1","Libero");
INSERT INTO strumenti (cod_strumenti, tipologie_strumento_generale) value("2","Scuola");
INSERT INTO strumenti (cod_strumenti, tipologie_strumento_generale) value("3","Lavoro");
INSERT INTO strumenti (cod_strumenti, tipologie_strumento_generale) value("4","Appuntamenti");
INSERT INTO strumenti (cod_strumenti, tipologie_strumento_generale) value("5","Salute");

slot
INSERT INTO slot (inizio, fine, giorno) value(6,7,0);
INSERT INTO slot (inizio, fine, giorno) value(6,7,1);
INSERT INTO slot (inizio, fine, giorno) value(6,7,2);
INSERT INTO slot (inizio, fine, giorno) value(6,7,3);
INSERT INTO slot (inizio, fine, giorno) value(6,7,4);
INSERT INTO slot (inizio, fine, giorno) value(6,7,5);
INSERT INTO slot (inizio, fine, giorno) value(6,7,6);
INSERT INTO slot (inizio, fine, giorno) value(7,8,0);
INSERT INTO slot (inizio, fine, giorno) value(7,8,1);
INSERT INTO slot (inizio, fine, giorno) value(7,8,2);
INSERT INTO slot (inizio, fine, giorno) value(7,8,3);
INSERT INTO slot (inizio, fine, giorno) value(7,8,4);
INSERT INTO slot (inizio, fine, giorno) value(7,8,5);
INSERT INTO slot (inizio, fine, giorno) value(7,8,6);
INSERT INTO slot (inizio, fine, giorno) value(8,9,0);
INSERT INTO slot (inizio, fine, giorno) value(8,9,1);
INSERT INTO slot (inizio, fine, giorno) value(8,9,2);
INSERT INTO slot (inizio, fine, giorno) value(8,9,3);
INSERT INTO slot (inizio, fine, giorno) value(8,9,4);
INSERT INTO slot (inizio, fine, giorno) value(8,9,5);
INSERT INTO slot (inizio, fine, giorno) value(8,9,6);
INSERT INTO slot (inizio, fine, giorno) value(9,10,0);
INSERT INTO slot (inizio, fine, giorno) value(9,10,1);
INSERT INTO slot (inizio, fine, giorno) value(9,10,2);
INSERT INTO slot (inizio, fine, giorno) value(9,10,3);
INSERT INTO slot (inizio, fine, giorno) value(9,10,4);
INSERT INTO slot (inizio, fine, giorno) value(9,10,5);
INSERT INTO slot (inizio, fine, giorno) value(9,10,6);
INSERT INTO slot (inizio, fine, giorno) value(10,11,0);
INSERT INTO slot (inizio, fine, giorno) value(10,11,1);
INSERT INTO slot (inizio, fine, giorno) value(10,11,2);
INSERT INTO slot (inizio, fine, giorno) value(10,11,3);
INSERT INTO slot (inizio, fine, giorno) value(10,11,4);
INSERT INTO slot (inizio, fine, giorno) value(10,11,5);
INSERT INTO slot (inizio, fine, giorno) value(10,11,6);
INSERT INTO slot (inizio, fine, giorno) value(11,12,0);
INSERT INTO slot (inizio, fine, giorno) value(11,12,1);
INSERT INTO slot (inizio, fine, giorno) value(11,12,2);
INSERT INTO slot (inizio, fine, giorno) value(11,12,3);
INSERT INTO slot (inizio, fine, giorno) value(11,12,4);
INSERT INTO slot (inizio, fine, giorno) value(11,12,5);
INSERT INTO slot (inizio, fine, giorno) value(11,12,6);
INSERT INTO slot (inizio, fine, giorno) value(12,13,0);
INSERT INTO slot (inizio, fine, giorno) value(12,13,1);
INSERT INTO slot (inizio, fine, giorno) value(12,13,2);
INSERT INTO slot (inizio, fine, giorno) value(12,13,3);
INSERT INTO slot (inizio, fine, giorno) value(12,13,4);
INSERT INTO slot (inizio, fine, giorno) value(12,13,5);
INSERT INTO slot (inizio, fine, giorno) value(12,13,6);
INSERT INTO slot (inizio, fine, giorno) value(13,14,0);
INSERT INTO slot (inizio, fine, giorno) value(13,14,1);
INSERT INTO slot (inizio, fine, giorno) value(13,14,2);
INSERT INTO slot (inizio, fine, giorno) value(13,14,3);
INSERT INTO slot (inizio, fine, giorno) value(13,14,4);
INSERT INTO slot (inizio, fine, giorno) value(13,14,5);
INSERT INTO slot (inizio, fine, giorno) value(13,14,6);
INSERT INTO slot (inizio, fine, giorno) value(14,15,0);
INSERT INTO slot (inizio, fine, giorno) value(14,15,1);
INSERT INTO slot (inizio, fine, giorno) value(14,15,2);
INSERT INTO slot (inizio, fine, giorno) value(14,15,3);
INSERT INTO slot (inizio, fine, giorno) value(14,15,4);
INSERT INTO slot (inizio, fine, giorno) value(14,15,5);
INSERT INTO slot (inizio, fine, giorno) value(14,15,6);
INSERT INTO slot (inizio, fine, giorno) value(15,16,0);
INSERT INTO slot (inizio, fine, giorno) value(15,16,1);
INSERT INTO slot (inizio, fine, giorno) value(15,16,2);
INSERT INTO slot (inizio, fine, giorno) value(15,16,3);
INSERT INTO slot (inizio, fine, giorno) value(15,16,4);
INSERT INTO slot (inizio, fine, giorno) value(15,16,5);
INSERT INTO slot (inizio, fine, giorno) value(15,16,6);
INSERT INTO slot (inizio, fine, giorno) value(16,17,0);
INSERT INTO slot (inizio, fine, giorno) value(16,17,1);
INSERT INTO slot (inizio, fine, giorno) value(16,17,2);
INSERT INTO slot (inizio, fine, giorno) value(16,17,3);
INSERT INTO slot (inizio, fine, giorno) value(16,17,4);
INSERT INTO slot (inizio, fine, giorno) value(16,17,5);
INSERT INTO slot (inizio, fine, giorno) value(16,17,6);
INSERT INTO slot (inizio, fine, giorno) value(17,18,0);
INSERT INTO slot (inizio, fine, giorno) value(17,18,1);
INSERT INTO slot (inizio, fine, giorno) value(17,18,2);
INSERT INTO slot (inizio, fine, giorno) value(17,18,3);
INSERT INTO slot (inizio, fine, giorno) value(17,18,4);
INSERT INTO slot (inizio, fine, giorno) value(17,18,5);
INSERT INTO slot (inizio, fine, giorno) value(17,18,6);
INSERT INTO slot (inizio, fine, giorno) value(18,19,0);
INSERT INTO slot (inizio, fine, giorno) value(18,19,1);
INSERT INTO slot (inizio, fine, giorno) value(18,19,2);
INSERT INTO slot (inizio, fine, giorno) value(18,19,3);
INSERT INTO slot (inizio, fine, giorno) value(18,19,4);
INSERT INTO slot (inizio, fine, giorno) value(18,19,5);
INSERT INTO slot (inizio, fine, giorno) value(18,19,6);
INSERT INTO slot (inizio, fine, giorno) value(19,20,0);
INSERT INTO slot (inizio, fine, giorno) value(19,20,1);
INSERT INTO slot (inizio, fine, giorno) value(19,20,2);
INSERT INTO slot (inizio, fine, giorno) value(19,20,3);
INSERT INTO slot (inizio, fine, giorno) value(19,20,4);
INSERT INTO slot (inizio, fine, giorno) value(19,20,5);
INSERT INTO slot (inizio, fine, giorno) value(19,20,6);
INSERT INTO slot (inizio, fine, giorno) value(20,21,0);
INSERT INTO slot (inizio, fine, giorno) value(20,21,1);
INSERT INTO slot (inizio, fine, giorno) value(20,21,2);
INSERT INTO slot (inizio, fine, giorno) value(20,21,3);
INSERT INTO slot (inizio, fine, giorno) value(20,21,4);
INSERT INTO slot (inizio, fine, giorno) value(20,21,5);
INSERT INTO slot (inizio, fine, giorno) value(20,21,6);
INSERT INTO slot (inizio, fine, giorno) value(21,22,0);
INSERT INTO slot (inizio, fine, giorno) value(21,22,1);
INSERT INTO slot (inizio, fine, giorno) value(21,22,2);
INSERT INTO slot (inizio, fine, giorno) value(21,22,3);
INSERT INTO slot (inizio, fine, giorno) value(21,22,4);
INSERT INTO slot (inizio, fine, giorno) value(21,22,5);
INSERT INTO slot (inizio, fine, giorno) value(21,22,6);
INSERT INTO slot (inizio, fine, giorno) value(22,23,0);
INSERT INTO slot (inizio, fine, giorno) value(22,23,1);
INSERT INTO slot (inizio, fine, giorno) value(22,23,2);
INSERT INTO slot (inizio, fine, giorno) value(22,23,3);
INSERT INTO slot (inizio, fine, giorno) value(22,23,4);
INSERT INTO slot (inizio, fine, giorno) value(22,23,5);
INSERT INTO slot (inizio, fine, giorno) value(22,23,6);
INSERT INTO slot (inizio, fine, giorno) value(23,24,0);
INSERT INTO slot (inizio, fine, giorno) value(23,24,1);
INSERT INTO slot (inizio, fine, giorno) value(23,24,2);
INSERT INTO slot (inizio, fine, giorno) value(23,24,3);
INSERT INTO slot (inizio, fine, giorno) value(23,24,4);
INSERT INTO slot (inizio, fine, giorno) value(23,24,5);
INSERT INTO slot (inizio, fine, giorno) value(23,24,6);
