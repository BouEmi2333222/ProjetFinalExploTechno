USE [SiteTemperature_HT_EB]

CREATE TRIGGER CalculMoyenne AFTER INSERT ON Temperature FOR EACH ROW
BEGIN
    IF EXISTS (SELECT code FROM StatTempJour WHERE dateJour = NEW.dateEnregistre)
    BEGIN
        
    END
END