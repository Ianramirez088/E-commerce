CREATE TABLE sales(
    id SERIAL,
    consecutive VARCHAR(100),
    quantity INTEGER,
    total_value INTEGER,
    person INTEGER,
    product INTEGER,
    state CHAR(1),
    cancellation_observation VARCHAR(500),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),

    PRIMARY KEY(id),
    UNIQUE (consecutive, person, product),
    FOREIGN KEY (person) REFERENCES customers(id),
    FOREIGN KEY (product) REFERENCES products(id)
);