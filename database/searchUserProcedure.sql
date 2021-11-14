DROP PROCEDURE IF EXISTS searchUsers;
DELIMITER // 
CREATE PROCEDURE searchUsers(
    IN queryName VARCHAR(255),
    IN queryAge INT,
    IN querySex VARCHAR(50),
    IN id INT,
    IN limitVar INT,
    IN skip INT
) 
BEGIN

    IF (id IS NOT NULL) 
        THEN
            SELECT * FROM userview WHERE userId = id;
    END IF;

    IF (skip IS NOT NULL) 
        THEN
            SELECT * FROM userview 
            WHERE 
                age > queryAge AND 
                fullname LIKE CONCAT('%', queryName, '%') AND
                sex = querySex
            LIMIT skip, limitVar;
    END IF;
    IF (querySex IS NOT NULL) 
        THEN
            SELECT * FROM userview 
            WHERE 
                age > queryAge AND 
                fullname LIKE CONCAT('%', queryName, '%') AND
                sex = querySex
            LIMIT skip, limitVar;
    END IF;

    SELECT * FROM userview 
        WHERE 
            age > queryAge AND 
            fullname LIKE CONCAT('%', queryName, '%')
        LIMIT limitVar;
END // 
DELIMITER;

-- CALL searchUsers('', 5, 'male', NULL, 5, 2);


