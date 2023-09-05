
CREATE TABLE users
(
    id serial
        CONSTRAINT users_pk
            PRIMARY KEY,
    email varchar(255),
    password varchar(255)
);

CREATE TABLE offers
(
    id serial not null 
        CONSTRAINT offers_pk
            PRIMARY KEY,
    brand varchar(255) not null,
    model varchar(255) not null,
    description text,
    image varchar(255),
    id_assigned_by int not null
);

ALTER TABLE offers
    add CONSTRAINT offers_users_id_fk
        FOREIGN KEY (id_assigned_by) REFERENCES users
            ON UPDATE CASCADE ON DELETE CASCADE;

create table users_offers
(
    id_user int not null,
    id_offer int not null
);

ALTER TABLE users_offers
    ADD CONSTRAINT user_users_offers_fk
        FOREIGN KEY (id_user) REFERENCES users
            ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE users_offers
    ADD CONSTRAINT offer_users_offers_fk
        FOREIGN KEY (id_offer) REFERENCES offers
            ON UPDATE CASCADE ON DELETE CASCADE;

CREATE TABLE users_details
(
    id serial not null
        CONSTRAINT users_details_pk
            PRIMARY KEY,
    name varchar(100) not null,
    surname varchar(100) not null,
    phone varchar(20)
);

ALTER TABLE users 
    ADD id_user_details int default 0 not null;


UPDATE users SET id_user_details = 1;


ALTER TABLE users
    ADD CONSTRAINT details_users_fk
        FOREIGN KEY (id_user_details) REFERENCES users_details
            ON UPDATE CASCADE ON DELETE CASCADE;


INSERT INTO users (email, password, id_user_details) VALUES ('test_email', 'test_password', 1);
INSERT INTO users_details(name, surname) VALUES ('John', 'Snow');
INSERT INTO offers (brand, model, description, image, id_assigned_by) VALUES ('brand','model','description','photo.png',1);