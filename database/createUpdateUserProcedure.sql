DROP PROCEDURE IF EXISTS updateUser;
DELIMITER // 
CREATE PROCEDURE updateUser(
  IN userIdVar INT,
  IN emailVar VARCHAR(100),
  IN firstnameVar VARCHAR(255),
  IN surnameVar VARCHAR(255),
  IN sexVar VARCHAR(50),
  IN partnerSexVar VARCHAR(50),
  IN descriptionVar VARCHAR(500),
  IN cityVar VARCHAR(50),
  IN countryVar VARCHAR(2),
  IN birthdayVar DATE,
  IN proffessionVar VARCHAR(100),
  IN profilImageVar VARCHAR(255)
) 
BEGIN 
-- DECLARE EXIT HANDLER FOR SQLEXCEPTION,
-- SQLWARNING BEGIN ROLLBACK; 
-- END;
-- START TRANSACTION;


  UPDATE profil 
  SET firstname = firstnameVar,
      surname = surnameVar,
      sex = sexVar,
      partnerSex = partnerSexVar,
      city = cityVar,
      country = countryVar,
      birthday = birthdayVar,
      proffession = proffessionVar,
      description = descriptionVar,
      profilImage = profilImageVar
  WHERE userId = userIdVar;

-- COMMIT;
END // 
DELIMITER;

  
  -- UPDATE profil 
  -- SET firstname = "Michala",
  -- surname = "Nissen", 
  -- sex = "female",
  -- partnersex = "female",
  -- city = "Hobro",
  -- country = "DK",
  -- birthday = "1996-10-27",
  -- `description` = 'profil profil profil profil',
  -- proffession = "Rolespilskriger",
  -- profilImage = "/uploads/defualtProfil.jpg"
  -- WHERE userId = 6;