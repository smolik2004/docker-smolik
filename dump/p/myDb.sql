CREATE TABLE Person (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50)
);

INSERT INTO Person (name) VALUES 
('William from postgres'), 
('Marc from postgres'),
('John from postgres');