CREATE DATABASE cliente;
use cliente;

CREATE TABLE assinaturas (
	id int primary key auto_increment,
    cliente varchar(50) not null,
    assinatura text not null
);