CREATE DATABASE SISTEMA_WELFARE;

USE SISTEMA_WELFARE;
SHOW TABLES;


CREATE TABLE TB_CATEGORIA (
	ID_CATEGORIA INT NOT NULL AUTO_INCREMENT,
    NOME_CATEGORIA VARCHAR(50) NOT NULL,
	PRIMARY KEY (ID_CATEGORIA)
);

SELECT * FROM TB_CATEGORIA;

INSERT INTO TB_CATEGORIA (ID_CATEGORIA, NOME_CATEGORIA) VALUES
(1, 'ALERGOLOGIA'),
(2, 'CARDIOLOGIA'),
(3, 'DERMATOLOGIA'),
(4, 'ENDOCRINOLOGIA'),
(5, 'GASTROENTEROLOGIA'),
(6, 'GINECOLOGIA'),
(7, 'NEUROLOGIA'),
(8, 'NUTRIÇÃO'),
(9,'OBSTETRÍCIA'),
(10, 'ORTOPEDIA E TRAUMATOLOGIA'),
(11, 'PEDIATRIA'),
(12, 'UROLOGIA');
DROP TABLE TB_CATEGORIA;

SHOW TABLES;

CREATE TABLE CADASTRO_FUNCIONARIO (
ID_FUNCIONARIO INT (4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
nome_funcionario varchar (50) not null,
EMAIL_FUNCIONARIO VARCHAR (80) NOT NULL UNIQUE,
CPF_FUNCIONARIO CHAR (11) NOT NULL UNIQUE,
RG_FUNCIONARIO CHAR (9) NOT NULL UNIQUE,
CARGO_FUNCIONARIO VARCHAR (40) NOT NULL,
PRIMARY KEY (ID_FUNCIONARIO)
);

CREATE TABLE USUARIO (
ID_FUNCIONARIO INT (4) UNSIGNED ZEROFILL NOT NULL,
SENHA_FUNCIONARIO VARCHAR (20) NOT NULL,
PRIMARY KEY (ID_FUNCIONARIO),
FOREIGN KEY (ID_FUNCIONARIO)
REFERENCES CADASTRO_FUNCIONARIO(ID_FUNCIONARIO)
);

CREATE TABLE ASSINATURA (
id_assinatura int (4) unsigned ZEROFILL NOT NULL AUTO_INCREMENT,
tipo_plano char (1) not null unique,
data_assinatura timestamp default current_timestamp,
primary key (id_assinatura)
);
select * from assinatura;
drop table assinatura;
insert into assinatura (tipo_plano) values
('A'),
('B'),
('C');
 
CREATE TABLE COMPRA (
id_pedido_compra int (5) not null unique auto_increment,
nome_pedido_compra varchar(30) not null,
fornecedor_pedido_compra varchar (20) not null,
nota_pedido_compra varchar (3) not null unique,
id_funcionario int (4) not null unique,
dt_entrada_pedido_compra date not null,
dt_vencimento_pedido_compra date not null,
qtde_pedido_compra int (6) not null,
valor_pedido_compra decimal(10,2) not null
references usuario (id_funcionario)
);

create table consulta (
id_consulta Int (5) unsigned zerofill not null auto_increment,
idfuncionario Int (4) not null unique,
estado_consulta Varchar (20) not null,
tipo_consulta Varchar (20) not null,
relatorio_consulta Varchar (20) not null,
id_categoria varchar (20) not null unique,
dt_consulta date not null,
receita_consulta Varchar (50) not null,
cargo_funcionario Varchar (20) not null
);



