create user privatesocial with password 'privatesocial123' ;

ALTER USER privatesocial WITH PASSWORD 'privatesocial123';

create database privatesocial with encoding='utf8' ;

grant all privileges on database privatesocial to privatesocial ;

\connect privatesocial;

alter database privatesocial owner to privatesocial;

alter schema public owner to privatesocial;
