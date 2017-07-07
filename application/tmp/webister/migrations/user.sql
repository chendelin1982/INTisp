CREATE TABLE user (
    id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    username varchar(50),
    password varchar(80),
    email varchar(254) DEFAULT NULL,
    bandwidth TEXT,
    diskspace TEXT,
    port vachar(4)
)
