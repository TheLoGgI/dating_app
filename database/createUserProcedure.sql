
DROP PROCEDURE IF EXISTS createUser;

-- FOREIGN KEYS CONTSTRAINS DON'T ACCEPT INSERTS ON TABLES WITH REFERENCES, BUT DON'T TELL YOU SO. 

DELIMITER //

CREATE PROCEDURE createUser(
    IN emailVar VARCHAR(100),
    IN passwordVar VARCHAR(100),
    IN firstnameVar VARCHAR(100),
    IN surnameVar VARCHAR(100),
    IN cityVar VARCHAR(100),
    IN birthdayVar VARCHAR(100),
    IN sexVar VARCHAR(100),
    IN partnersexVar VARCHAR(100)
)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION, SQLWARNING
    BEGIN 
        ROLLBACK;
    END;

    START TRANSACTION;
    -- Check for if city name exists in postcode table, if not create empty entry with postcode in table
    IF 
        NOT EXISTS (SELECT userId FROM users WHERE email = emailVar)
    THEN
        INSERT INTO profil(firstname, surname,sex, partnerSex, city, birthday) 
            VALUES (firstnameVar, surnameVar, sexVar, partnersexVar, cityVar, birthdayVar); 
        INSERT INTO users(profilId, email, password) VALUES (@@IDENTITY , emailVar, MD5(passwordVar));
    END IF;


    -- SET @profilId := ( SELECT profilId FROM users WHERE email = emailVar);

    -- IF 
    --     NOT EXISTS (SELECT profilId FROM profil WHERE profilId = @profilId)
    -- THEN 
    --     INSERT INTO profil(firstname, surname,sex, partnerSex, city, birthday) 
    --         VALUES (firstnameVar, surnameVar, sexVar, partnersexVar, cityVar, birthdayVar); 
    -- END IF;
    COMMIT;
END //

DELIMITER ;


-- EXAMPLE OF CALL
-- CALL createUser('username', 'password');
-- CALL createUser('mads', 'password');


-- TRUNCATE users;
-- ALTER TABLE matches DROP FOREIGN KEY fk_user2;

