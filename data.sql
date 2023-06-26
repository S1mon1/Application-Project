

CREATE TABLE users
(
    id serial,
    name varchar(255),
    surname varchar(255),
    email varchar(255),
    password varchar(255)
);

INSERT INTO users (name, surname, email, password) VALUES ('John', 'Snow', 'test_email', 'test_password');