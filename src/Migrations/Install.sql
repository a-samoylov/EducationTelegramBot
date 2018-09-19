DROP TABLE IF EXISTS telegram_chat;
CREATE TABLE telegram_chat (
  id INT NOT NULL,
  type VARCHAR(20) NOT NULL,
  username VARCHAR(255) DEFAULT NULL,
  first_name VARCHAR(255) DEFAULT NULL,
  last_name VARCHAR(255) DEFAULT NULL,
  UNIQUE INDEX id (id)
)
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_general_ci
  ENGINE = InnoDB;

DROP TABLE IF EXISTS user;
CREATE TABLE user (
  id INT AUTO_INCREMENT NOT NULL,
  phone VARCHAR(255) DEFAULT NULL,
  chat_id INT NOT NULL,
  intensity SMALLINT NOT NULL,
  is_register TINYINT(1) NOT NULL,
  PRIMARY KEY(id),
  UNIQUE INDEX chat_id (chat_id),
  CONSTRAINT telegram_chat_id FOREIGN KEY (id) REFERENCES telegram_chat (id)
)
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_general_ci
  ENGINE = InnoDB;

DROP TABLE IF EXISTS subject;
CREATE TABLE subject (
  id INT AUTO_INCREMENT NOT NULL,
  name VARCHAR(70) NOT NULL,
  PRIMARY KEY(id)
)
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_general_ci
  ENGINE = InnoDB;

CREATE TABLE users_subjects (
  user_id INT NOT NULL,
  subject_id INT NOT NULL,
  INDEX user_id (user_id),
  INDEX subject_id (subject_id),
  PRIMARY KEY(user_id, subject_id),
  CONSTRAINT user_id FOREIGN KEY (user_id) REFERENCES user (id),
  CONSTRAINT subject_id FOREIGN KEY (subject_id) REFERENCES subject (id)
)
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_general_ci
  ENGINE = InnoDB;

INSERT INTO subject (name) VALUES ('Українська мова');
INSERT INTO subject (name) VALUES ('Математика');
INSERT INTO subject (name) VALUES ('Фізика');
