CREATE TABLE IF NOT EXISTS responses (
        id INTEGER PRIMARY KEY,
        name TEXT,
        email TEXT UNIQUE,
        comment TEXT UNIQUE
);
