create database bd1;
create user userbd1@localhost identified with mysql_native_password by 'Clavebd1.';
grant all on bd1.* to userbd1@localhost;
flush privileges;