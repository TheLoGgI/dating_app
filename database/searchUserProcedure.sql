DROP PROCEDURE IF EXISTS searchUser;
DELIMITER // 
CREATE PROCEDURE searchUser(
    IN queryName VARCHAR(255),
    IN queryAge INT,
    IN querySex VARCHAR(50),
    IN id INT,
    IN limitVar INT
) 
BEGIN

    SET @names = SELECT * 
        FROM userview 
        WHERE fullname 
        LIKE CONCAT('%', queryName, '%') ESCAPE '\'
        LIMIT limitVar;
    -- @age := SELECT * FROM userview WHERE age > queryAge LIMIT limitVar;
    -- @sex := SELECT * FROM userview WHERE sex = querySex LIMIT limitVar;
    -- @id := SELECT * FROM userview WHERE userid = id LIMIT limitVar;

    -- SELECT * from @names;

END // 
DELIMITER;
