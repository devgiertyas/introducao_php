CREATE TABLE users (
  id serial PRIMARY KEY,
  email varchar (120),
  name varchar (120),
  password text,
  role varchar(40)
);

CREATE TABLE provider (
  id_provider serial PRIMARY KEY,
  cnpj varchar(14),
  name varchar (120) not null,
  description varchar (200),
  phone varchar(20),
  email varchar(80)
);

CREATE TABLE product (
  id_product serial PRIMARY KEY,
  name varchar (120) not null,
  description varchar (200),
  id_provider int not null,
    CONSTRAINT fk_provider
      FOREIGN KEY(id_provider) 
	  REFERENCES provider(id_provider)
);

insert into users (email, name, password, role) values ('admin@admin.com', 'Natã Giertas',
'82b83e666a49d8a95c424330bb4edfc8', 'admin')
