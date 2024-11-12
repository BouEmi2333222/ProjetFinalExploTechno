USE [SiteTemperature_HT_EB];

ALTER TABLE RoleUtilisateur
ADD CONSTRAINT FK_RoleUtilisateur_Utilisateur
FOREIGN KEY (codeUtilisateur) REFERENCES Utilisateur(code);

ALTER TABLE RoleUtilisateur
ADD CONSTRAINT FK_RoleUtilisateur_Role
FOREIGN KEY (codeRole) REFERENCES Role(code);