DROP DATABASE IF EXISTS [SiteTemperature_HT_EB]

CREATE DATABASE [SiteTemperature_HT_EB]

USE [SiteTemperature_HT_EB]

CREATE TABLE Utilisateur
(
    code                INT                 NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    nom                 VARCHAR(64)         NOT NULL,
    prenom              VARCHAR(64)         NOT NULL,
    courriel            VARCHAR(64)         NOT NULL,
    motDePasse          VARCHAR(255)        NOT NULL,
    sel                 UNIQUEIDENTIFIER
);

CREATE TABLE Role
(
    code                INT                 NOT NULL    PRIMARY KEY     IDENTITY(1,1),
    nom                 VARCHAR(64)         NOT NULL,
    codeRessoure        INT                 NOT NULL,
    typeRessource       VARCHAR(64)         NOT NULL
);

CREATE TABLE RoleUtilisateur
(
    codeUtilisateur     INT                 NOT NULL,
    codeRole            INT                 NOT NULL,
    PRIMARY KEY (codeUtilisateur, codeRole)
    FOREIGN KEY (codeUtilisateur) REFERENCES Utilisateur(code)
    FOREIGN KEY (codeRole) REFERENCES Role(code)
);

CREATE TABLE Temperature
(
    code                INT                 NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    dateEnregistre      DATE                NOT NULL,
    tempCelc            DECIMAL(6,3)        NOT NULL,
    tempFahr            DECIMAL(6,3)        NOT NULL,
    tempKelv            DECIMAL(6,3)        NOT NULL
);

CREATE TABLE StatTempJour
(
    code                INT                 NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    dateJour            DATE                NOT NULL,
    moyenneTempJ        DECIMAL(6,3)        NULL
);