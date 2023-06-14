create database sistema_welfare;
use sistema_welfare;
show tables;
select*from funcionario;

/*Tela de login*/
create table funcionario (
id_funcionario int (4) unsigned zerofill not null unique auto_increment,
nome_funcionario varchar (80) not null,
email_funcionario varchar (80) not null,
senha_funcionario varchar (20) not null,
cpf_funcionario char (11) not null unique,
status_funcionario char (1) , /*Adicionado status Ativo/Inativo*/
foto_funcionario blob, /*foto do funcionario*/
cargo_funcionario varchar (40) not null,
primary key (id_funcionario),
foreign key (cargo_funcionario) references cargo (cargo_funcionario)
);
insert into funcionario (id_funcionario, nome_funcionario, email_funcionario, senha_funcionario, cpf_funcionario, cargo_funcionario)
values (1, 'Joao', 'admin@welfare.com', 'adm123456', '12345678900', 'administrador');
/*Tela de login*/


/*Tabela de cargos dos funcionarios inserido apenas os cargos presentes na empresa*/
create table cargo (
id_cargo int (4) unsigned zerofill not null unique auto_increment,
cargo_funcionario varchar (40) not null, /*deve ser registrado apenas os cargos especificados no tipo_usuario*/
primary key (id_cargo)
);
insert into cargo (id_cargo, cargo_funcionario) values
(1, 'administrador'),
(2, 'medico'),
(3, 'recepcionista');
/*Tabela de cargos dos funcionarios inserido apenas os cargos presentes na empresa*/

/*Especialidade de cada médico*/
create table especialidade (
id_especialidade int (4) unsigned zerofill not null unique auto_increment,
tipo_especialidade varchar (50) not null,
primary key (id_especialidade)
);
insert into especialidade (id_especialidade, tipo_especialidade) values
(1, 'alergologia'),
(2, 'cardiologia'),
(3, 'dermatologia'),
(4, 'endocrinologia'),
(5, 'gastroenterologia'),
(6, 'ginecologia'),
(7, 'neurologia'),
(8, 'nutrição'),
(9, 'obstetrícia'),
(10 ,'ortopedia e traumatologia'),
(11 ,'pediatria'),
(12 ,'urologia');
/*Especialidade de cada médico*/

/*Tabela de dados do paciente*/
create table paciente (
id_paciente int (3) unsigned zerofill not null unique auto_increment,
nome_paciente varchar (80) not null,
enfermidades varchar (50),
medicamentos text,
alergias text,
nome_responsavel varchar (80),
dt_nascimento_paciente date not null,
dt_nascimento_responsavel date,
cpf_paciente char (11) not null unique,
rg_paciente char (9) not null,
cpf_responsavel char (11),
rg_responsavel char (9),
sexo_paciente char (1) not null,
sexo_responsavel char (1),
contato_paciente varchar (14) not null,
contato_responsavel varchar (14),
email varchar (80),
uf char (2) not null,
logradouro varchar (60) not null,
cep_paciente char (8) not null,
numero_casa_paciente varchar (10),
primary key (id_paciente)
);
/*Tabela de dados do paciente*/


/*
create table categoria (
id_categoria int (5) unsigned zerofill not null auto_increment,
nome_categoria varchar (50) not null,
primary key (id_categoria)
);
*/

/*Tabela agendamento do paciente/cliente feito pelo recepcionista*/
create table agendamento (
id_agendamento int (5) unsigned zerofill not null unique auto_increment,
id_paciente int (3) not null,
nome_paciente varchar(80) not null,
nome_responsavel varchar (80),
cpf_paciente char (11) not null,
data_consulta datetime not null,
observacoes text,
id_funcionario int (4) not null,
id_especialidade int (4) not null,
primary key (id_agendamento),
foreign key (id_paciente) references paciente(id_paciente),
foreign key (id_funcionario) references funcionario(id_funcionario),
foreign key (id_especialidade) references especialidade(id_especialidade)
);
/*Tabela agendamento do paciente/cliente feito pelo recepcionista*/


create table consulta (
id_consulta int (5) unsigned zerofill not null unique auto_increment,
id_funcionario int (4) not null,
id_medico varchar (10) not null,
id_paciente int (3) not null,
nome_paciente varchar (80) not null,
nome_responsavel varchar (80) not null,
estado_consulta char (1) not null,
tipo_consulta char (1) not null,
relatorio_do_medico text not null,
id_especialidade int (5) not null,
dt_consulta date not null,
receita_consulta varchar (50) not null,
cargo_funcionario varchar (20) not null,
primary key (id_consulta),
foreign key (id_funcionario) references funcionario (id_funcionario),
foreign key (id_especialidade) references especialidade (id_especialidade),
foreign key (id_paciente) references paciente (id_paciente),
foreign key (cargo_funcionario) references funcionario (cargo_funcionario)
);

/*
join
*/
CREATE VIEW relatorio_gerado_medico AS
SELECT p.id_paciente, p.nome_paciente, c.id_consulta, c.dt_consulta
FROM paciente p
INNER JOIN consulta c ON p.id_paciente = c.id_paciente;
/*
join
*/

create table pagamento_consulta (
id_pagamento int (5) unsigned zerofill not null unique auto_increment,
nome_pagador varchar (80) not null,
cpf_pagador char (11) not null,
status_pagamento enum('pago', 'pendente', 'cancelado') not null default 'pendente',
id_funcionario int (4) not null,
dt_consulta date not null,
valor_consulta decimal (4,2),
primary key (id_pagamento),
foreign key (id_funcionario) references funcionario(id_funcionario)
);

DELIMITER //
CREATE TRIGGER atualizar_status_pagamento
BEFORE INSERT ON movimento_consulta
FOR EACH ROW
BEGIN
    DECLARE total_pago DECIMAL(4,2);
    
    SELECT SUM(valor_pago) INTO total_pago
    FROM movimento_consulta
    WHERE id_pagamento = NEW.id_pagamento;
    
    IF total_pago >= NEW.valor_consulta THEN
        SET NEW.status_pagamento = 'pago';
    ELSE
        SET NEW.status_pagamento = 'pendente';
    END IF;
END //
DELIMITER ;


/*criação tabela movimento*/
create table movimento_consulta (
id_movimento int(5) unsigned zerofill not null unique auto_increment,
id_pagamento int(5) not null,
nome_pagador varchar (80) not null,
cpf_pagador char (11) not null,
id_funcionario int(4) not null,
dt_consulta date not null,
valor_pago decimal(4,2),
status_pagamento enum('pago', 'pendente', 'cancelado') not null default 'pendente',
primary key (id_movimento),
foreign key (id_pagamento) references pagamento_consulta(id_pagamento),
foreign key (id_funcionario) references funcionario(id_funcionario)
);
/*criação tabela movimento*/


create table fornecedor (
id_fornecedor int (5) unsigned zerofill not null unique auto_increment,
id_funcionario int (4) not null,
status_fornecedor char (1) not null,
nome_fornecedor varchar (80) not null,
cnpj_fornecedor char (14) not null,
contato_fornecedor varchar (14) not null,
email_fornecedor varchar (80) not null,
cep_fornecedor char (8) not null,
numero_portaria_fornecedor varchar (10),
primary key (id_fornecedor),
foreign key (id_funcionario) references funcionario(id_funcionario)
);

create table compra (
id_pedido_compra int (5) unsigned not null unique auto_increment,
nome_pedido_compra varchar (40) not null,
fornecedor_pedido_compra varchar (20) not null,
nota_pedido_compra varchar (20) not null,
id_funcionario int (4),
dt_entrada_pedido_compra date not null,
dt_vencimento_pedido_compra date not null,
qtde_pedido_compra int (6) not null,
valor_pedido_compra decimal (10,2) not null,
primary key (id_pedido_compra),
foreign key (id_funcionario) references funcionario(id_funcionario)
);
/*possível alteração nas tabelas categoria, agendamento e consulta, agora com tabela especialidade não será necessário tabela categoria, assim havendo alterações nas tabelas agendamento e consulta*/
/*
create table adm (
id_adm int (4) ,
nome_adm varchar (80) ,
email_adm varchar (80) ,
senha_user varchar (20) ,
primary key (id_adm)
);

INSERT INTO adm (id_adm, nome_adm, email_adm, senha_user)
VALUES (2, 'Julia', 'admin@welfare.com', 'adm123');
*/
/*
create table medico (
id_medico varchar (10) not null unique,
nome_medico varchar (80) not null,
email_medico varchar(80) not null,
senha_medico varchar (20) not null,
especialidade varchar (40) not null,
status_medico char (1) not null,
primary key (id_medico)
);
*/







