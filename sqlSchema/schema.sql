CREATE TABLE partners (
    partner_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(32),
    last_name VARCHAR(32),
    age INT,
    gender VARCHAR(32),
    birthdate DATE,
    home_address VARCHAR(512),
    date_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE franchises (
    franchise_id INT AUTO_INCREMENT PRIMARY KEY,
    owner_id INT,
    business_name VARCHAR(64),
    franchise_location VARCHAR(512),
    date_franchised TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);