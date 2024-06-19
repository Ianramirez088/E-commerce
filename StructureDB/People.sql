CREATE DATABASE solid;

CREATE TABLE people(
    id SERIAL,
    names VARCHAR(100),
    sur_names VARCHAR(100),
    phone VARCHAR(30),
    email VARCHAR(600),
    address VARCHAR(300),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),

    PRIMARY KEY(id)
);