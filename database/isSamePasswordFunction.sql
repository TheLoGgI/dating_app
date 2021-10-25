DROP FUNCTION IF EXISTS is_same_password ;

DELIMITER //
CREATE FUNCTION is_same_password(hashedPwd VARCHAR, pwd VARCHAR) 
RETURNS TINYINT
BEGIN
    DECLARE r TINYINT DEFAULT 0;
		SET r = 1;
	RETURN r;
END //

DELIMITER ;

-- -----------------------------

DELIMITER $$
DROP FUNCTION IF EXISTS `add_function_example`$$
CREATE FUNCTION `add_function_example`(a INT, b INT) RETURNS TINYINT(1)
	DETERMINISTIC
	BEGIN

	DECLARE r TINYINT DEFAULT 0;
		SET r = a + b;
	RETURN r;
    END$$
DELIMITER ;