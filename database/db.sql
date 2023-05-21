create table person(
	id char(13) not null primary key,
    dni char(8) not null,
    name varchar(50) not null,
    last_name varchar(50) not null,
    birthdate date not null,
    created_at datetime not null,
    updated_at datetime not null
);
