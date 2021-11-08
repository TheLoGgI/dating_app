DROP VIEW IF EXISTS userView;
CREATE VIEW userView AS
SELECT
  users.userId,
  users.email,
  users.signed_up,
  profil.firstName as firstname,
  profil.surname,
  profil.city,
  profil.country,
  CONCAT(profil.firstName, ' ', profil.surname) AS fullname,
  profil.sex,
  profil.partnerSex as partnerGender,
  FLOOR( (TO_DAYS(CURRENT_DATE) - TO_DAYS(profil.birthday)) / 365.25) AS age,
  DATE_FORMAT(profil.birthday, '%d %M %Y') as birthdaystring,
  profil.birthday,
  profil.proffession,
  profil.description,
  profil.profilImage
FROM
  profil
  INNER JOIN users ON users.userId = profil.userId;
-- SELECT
--   *
-- FROM
--   userview
-- WHERE
--   userId = 5;