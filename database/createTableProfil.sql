DROP TABLE IF EXISTS profil;
CREATE TABLE profil (
  userId int NOT NULL AUTO_INCREMENT,
  firstname varchar(255) DEFAULT NULL,
  surname varchar(255) DEFAULT NULL,
  sex varchar(50) DEFAULT NULL,
  partnerSex varchar(50) DEFAULT NULL,
  city varchar(50) DEFAULT NULL,
  country varchar(2) DEFAULT 'Da',
  proffession varchar(100) DEFAULT NULL,
  birthday date DEFAULT NULL,
  description varchar(500) DEFAULT NULL,
  profilImage VARCHAR(255) DEFAULT "/uploads/defualtProfil.jpg",
  PRIMARY KEY (userId)
);

-- ALTER TABLE
--   profil
-- ADD
--   COLUMN profilImage VARCHAR(255) DEFAULT "/uploads/defualtProfil.jpg";
-- ALTER TABLE profil
-- CHANGE COLUMN profilId userId INT NOT NULL AUTO_INCREMENT;

-- TRUNCATE profil;

-- INSERT INTO
--   profil(
--     firstname,
--     surname,
--     sex,
--     partnerSex,
--     city,
--     birthday
--   )
-- VALUES
--   (
--     'firstnameVar',
--     'surnameVar',
--     'sexVar',
--     'partnersexVar',
--     'cityVar',
--     '1996-08-06'
--   );