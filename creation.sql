DROP DATABASE IF EXISTS [SiteTemperature_HT_EB]

CREATE DATABASE [SiteTemperature_HT_EB]

USE [SiteTemperature_HT_EB]

CREATE TABLE Utilisateur
(
    code                INT                 NOT NULL    PRIMARY KEY     IDENTITY(1,1),
    nom                 NVARCHAR(64)        NOT NULL,
    prenom              NVARCHAR(64)        NOT NULL,
    courriel            NVARCHAR(64)        NOT NULL,
    motDePasse          BINARY(128)         NOT NULL,
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
);

CREATE TABLE Temperature
(
    DateEnregistre      DATETIME            NOT NULL    PRIMARY KEY     IDENTITY(1,1),
    TempCelc            DECIMAL(6,3)        NOT NULL,
    TempFahr            DECIMAL(6,3)        NOT NULL,
    TempKelv            DECIMAL(6,3)        NOT NULL,
);

CREATE TABLE StatTemperature
(
);