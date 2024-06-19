CREATE DATABASE solid;

CREATE TABLE products(
    id SERIAL,
    category VARCHAR(150),
    name VARCHAR(250),
    description VARCHAR(600),
    price INTEGER,
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),

    PRIMARY KEY(id)
);