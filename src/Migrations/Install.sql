DROP TABLE IF EXISTS telegram_chat;
CREATE TABLE telegram_chat (
  id INT AUTO_INCREMENT NOT NULL,
  chat_id INT NOT NULL,
  type VARCHAR(20) NOT NULL,
  username VARCHAR(255) NOT NULL,
  first_name VARCHAR(255) NOT NULL,
  last_name VARCHAR(255) NOT NULL,
  UNIQUE INDEX chat_id (chat_id),
  PRIMARY KEY(id)
)
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_general_ci
  ENGINE = InnoDB;

DROP TABLE IF EXISTS telegram_user;
CREATE TABLE telegram_user (
  id INT AUTO_INCREMENT NOT NULL,
  phone VARCHAR(255) DEFAULT NULL,
  chat_id INT NOT NULL,
  PRIMARY KEY(id),
  UNIQUE INDEX chat_id (chat_id),
  CONSTRAINT telegram_chat_chat_id FOREIGN KEY (chat_id) REFERENCES telegram_chat (chat_id)
)
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_general_ci
  ENGINE = InnoDB;

CREATE TABLE users_subjects (
  id INT AUTO_INCREMENT NOT NULL,
  user_id INT NOT NULL,
  subject_id INT NOT NULL
)
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_general_ci
  ENGINE = InnoDB;
