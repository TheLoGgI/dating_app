DROP PROCEDURE IF EXISTS updateUser;
DELIMITER // 
CREATE PROCEDURE updateUser(
  IN profilIdVar INT,
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

BEGIN DECLARE EXIT HANDLER FOR SQLEXCEPTION,
SQLWARNING BEGIN ROLLBACK;
END;
START TRANSACTION;


  UPDATE profil 
  SET firstname = firstnameVar,
      surname = surnameVar,
      sex = sexVar,
      partnerSex = partnerSexVar,
      city = cityVar,
      country = countryVar,
      proffession = proffessionVar,
      description = descriptionVar,
      profilImage = profilImageVar
  WHERE profilId = profilIdVar;

COMMIT;
END // 
DELIMITER;