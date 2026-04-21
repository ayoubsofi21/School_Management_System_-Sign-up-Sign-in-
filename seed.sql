use  php_project;
alter Table users CHANGE label name varchar(100);
alter table users add password varchar(100);
INSERT INTO users(name,email,password)VALUES('fati','fati@gmail.com','21212121');

