DROP VIEW IF EXISTS userView;
CREATE VIEW userView AS
SELECT
  users.userId,
  users.profilId,
  users.email,
  users.signed_up,
  profil.firstName,
  profil.surname,
  CONCAT(profil.firstName, ' ', profil.surname) AS fullname,
  profil.sex,
  profil.partnerSex,
  DATE_FORMAT(profil.birthday, '%d %M %Y') as birthdaystring,
  profil.birthday,
  profil.proffession,
  profil.description
FROM
  profil
  INNER JOIN users ON users.profilId = profil.profilId;
SELECT
  *
FROM
  userview
WHERE
  userId = 5;