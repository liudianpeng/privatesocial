create user avshare with password 'avshare123' ;

ALTER USER avshare WITH PASSWORD 'avshare123';

create database avshare with encoding='utf8' ;

grant all privileges on database avshare to avshare ;

\connect avshare;

alter database avshare owner to avshare;

alter schema public owner to avshare;

