DROP TABLE IF EXISTS users;
CREATE TABLE users (
  userId INT(10) DEFAULT UUID(),
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  signed_up DATE NOT NULL DEFAULT (CURRENT_DATE),
  PRIMARY KEY (userId)
);

-- ALTER TABLE users
-- MODIFY userId INT(10);

-- ALTER TABLE users
--   DROP COLUMN profilId;


TRUNCATE users;