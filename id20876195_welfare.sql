CREATE DATABASE sistema_welfare;

USE sistema_welfare;

SHOW tables;

/*Tabela de cargos dos funcionarios inserido apenas os cargos presentes na empresa*/
CREATE TABLE cargo(
id_cargo int (4) UNSIGNED ZEROFILL NOT NULL UNIQUE AUTO_INCREMENT,
cargo_funcionario varchar (40) NOT NULL, /*deve ser registrado apenas os cargos especificados no tipo_usuario*/
PRIMARY KEY (id_cargo));

INSERT INTO cargo (id_cargo, cargo_funcionario)
VALUES
(0001, 'administrador'),
(0002, 'medico'),
(0003, 'recepcionista');

/*Tela de login*/
CREATE TABLE funcionario (
id_funcionario int (4) UNSIGNED ZEROFILL NOT NULL UNIQUE AUTO_INCREMENT,
nome_funcionario varchar (80) NOT NULL,
email_funcionario varchar (80) NOT NULL,
senha_funcionario varchar (20) NOT NULL,
cpf_funcionario char (11) NOT NULL UNIQUE,
status_funcionario char (1) , /*Adicionado status Ativo/Inativo*/
foto_funcionario blob, /*foto do funcionario*/
cargo_funcionario varchar (40) NOT NULL, 
PRIMARY KEY (id_funcionario),
CONSTRAINT fk_cargo_funcionario FOREIGN KEY (cargo_funcionario) REFERENCES cargo (cargo_funcionario));

INSERT INTO funcionario (nome_funcionario, email_funcionario, senha_funcionario, cpf_funcionario, status_funcionario, cargo_funcionario)
VALUES 
('Joao Vitor', 'adm@welfare.com', 'adm123456', '74185296301', 'a', '1'),
('Andressa Moreira', 'rec@welfare.com', 'rec123456', '36925814702', 'a', '2'),
('Andrielly Zucco', 'med@welfare.com', 'med123456', '36925814702', 'a', '3');


/*Especialidade de cada médico*/
CREATE TABLE especialidade (
id_especialidade int (4) UNSIGNED ZEROFILL NOT NULL UNIQUE AUTO_INCREMENT,
tipo_especialidade varchar (50) NOT NULL,
PRIMARY KEY (id_especialidade)
);
INSERT INTO especialidade (id_especialidade, tipo_especialidade)
VALUES
(1, 'alergologia'),
(2, 'cardiologia'),
(3, 'dermatologia'),
(4, 'endocrinologia'),
(5, 'psicologia'),
(6, 'pediatria');



/*Tabela de dados do paciente*/
CREATE TABLE paciente(
    id_paciente int (4) UNSIGNED ZEROFILL NOT NULL UNIQUE AUTO_INCREMENT,
    nome_paciente varchar (80)  NOT NULL,
    enfermidades varchar (100),
    medicamentos varchar (100),
    alergias varchar(100),
    nome_responsavel varchar (80),
    dt_nascimento_paciente date  NOT NULL,
    dt_nascimento_responsavel date,
    cpf_paciente char (11)  NOT NULL UNIQUE,
    rg_paciente char (9)  NOT NULL,
    cpf_responsavel char (11),
    rg_responsavel char (9),
    sexo_paciente char (1)  NOT NULL,
    sexo_responsavel char (1),
    contato_paciente varchar (11)  NOT NULL,
    contato_responsavel varchar (11),
    email_paciente varchar (80)  NOT NULL,
    uf char (2)  NOT NULL,
    logradouro varchar (60)  NOT NULL,
    cep_paciente int (8)  NOT NULL,
    numero_casa_paciente varchar (10),
    PRIMARY KEY (id_paciente));
/*Tabela de dados do paciente*/



CREATE TABLE medico(
    crm_medico int (4) UNSIGNED ZEROFILL NOT NULL UNIQUE AUTO_INCREMENT,
    nome_medico varchar (60) NOT NULL,
    fk_id_especialidade int (4) NOT NULL,
    especialidade_medico varchar (60) NOT NULL,
    fk_id_funcionario int (4) NOT NULL
    PRIMARY KEY (id_categoria),
    CONSTRAINT fk_id_funcionario FOREIGN KEY (fk_id_funcionario) REFERENCES funcionario (id_funcionario),
    CONSTRAINT fk_id_especialidade FOREIGN KEY (fk_id_especialidade) REFERENCES especialidade (id_especialidade);
);


/*Tabela agendamento do paciente/cliente feito pelo recepcionista*/
CREATE TABLE agendamento (
    id_agendamento int (4) UNSIGNED ZEROFILL NOT NULL UNIQUE AUTO_INCREMENT,
    fk_id_paciente int (4) NOT NULL,
    fk_crm_medico int (4)  NOT NULL,
    nome_paciente varchar(80)  NOT NULL,
    contato_paciente varchar(11) NOT NULL,
    email_paciente varchar(60) NOT NULL,
    cpf_paciente int (11) NOT NULL,
    nome_responsavel varchar (80),
    data_consulta datetime NOT NULL,
    hora_consulta varchar (15) NOT NULL,
    observacoes varchar (180),
    PRIMARY KEY (id_agendamento),
    CONSTRAINT fk_id_paciente FOREIGN KEY (fk_id_paciente) REFERENCES paciente(id_paciente),
    CONSTRAINT fk_crm_medico FOREIGN KEY (fk_crm_medico) REFERENCES medico(crm_medico);
);
/*Tabela agendamento do paciente/cliente feito pelo recepcionista*/


create table consulta (
    id_consulta int (4) UNSIGNED ZEROFILL NOT NULL UNIQUE AUTO_INCREMENT,
    fk_id_funcionario int (4) NOT NULL,
    fk_crm_medico int (4) NOT NULL,
    nome_medico varchar (80) NOT NULL,
    especialidade_medico int (5) NOT NULL,
    relatorio_medico varchar(180) NOT NULL,
    receita_consulta varchar (50),
    fk_id_paciente int (4) NOT NULL,
    nome_paciente varchar (80) NOT NULL,
    nome_responsavel varchar (80) NOT NULL,
    estado_consulta varchar (15) NOT NULL, /*Consultar / Consultando / Consultado*/
    dt_consulta date NOT NULL,
    hora_consulta varchar (15) NOT NULL,
    PRIMARY KEY (id_consulta),
    CONSTRAINT fk_id_funcionario FOREIGN KEY (fk_id_funcionario) REFERENCES funcionario (id_funcionario),
    CONSTRAINT fk_crm_medico FOREIGN KEY (fk_crm_medico) REFERENCES funcionario (crm_medico),
    CONSTRAINT fk_id_paciente FOREIGN KEY (fk_id_paciente) REFERENCES funcionario (id_paciente);
);

CREATE TABLE mensagem(
    id_msg int (4) UNSIGNED ZEROFILL NOT NULL UNIQUE AUTO_INCREMENT,
    msg varchar (255) NOT NULL
);
/*
join
*/
-- CREATE VIEW relatorio_gerado_medico AS
-- SELECT p.id_paciente, p.nome_paciente, c.id_consulta, c.dt_consulta
-- FROM paciente p
-- INNER JOIN consulta c ON p.id_paciente = c.id_paciente;
-- /*
-- join
*/

-- create table pagamento_consulta (
-- id_pagamento int (5) unsigned zerofill not null unique auto_increment,
-- nome_pagador varchar (80) not null,
-- cpf_pagador char (11) not null,
-- status_pagamento enum('pago', 'pendente', 'cancelado') not null default 'pendente',
-- id_funcionario int (4) not null,
-- dt_consulta date not null,
-- valor_consulta decimal (4,2),
-- primary key (id_pagamento),
-- foreign key (id_funcionario) references funcionario(id_funcionario)
-- );

-- DELIMITER //
-- CREATE TRIGGER atualizar_status_pagamento
-- BEFORE INSERT ON movimento_consulta
-- FOR EACH ROW
-- BEGIN
--     DECLARE total_pago DECIMAL(4,2);
    
--     SELECT SUM(valor_pago) INTO total_pago
--     FROM movimento_consulta
--     WHERE id_pagamento = NEW.id_pagamento;
    
--     IF total_pago >= NEW.valor_consulta THEN
--         SET NEW.status_pagamento = 'pago';
--     ELSE
--         SET NEW.status_pagamento = 'pendente';
--     END IF;
-- END //
-- DELIMITER ;


-- /*criação tabela movimento*/
-- create table movimento_consulta (
-- id_movimento int(5) unsigned zerofill not null unique auto_increment,
-- id_pagamento int(5) not null,
-- nome_pagador varchar (80) not null,
-- cpf_pagador char (11) not null,
-- id_funcionario int(4) not null,
-- dt_consulta date not null,
-- valor_pago decimal(4,2),
-- status_pagamento enum('pago', 'pendente', 'cancelado') not null default 'pendente',
-- primary key (id_movimento),
-- foreign key (id_pagamento) references pagamento_consulta(id_pagamento),
-- foreign key (id_funcionario) references funcionario(id_funcionario)
-- );
/*criação tabela movimento*/


-- create table fornecedor (
-- id_fornecedor int (5) unsigned zerofill not null unique auto_increment,
-- id_funcionario int (4) not null,
-- status_fornecedor char (1) not null,
-- nome_fornecedor varchar (80) not null,
-- cnpj_fornecedor char (14) not null,
-- contato_fornecedor varchar (14) not null,
-- email_fornecedor varchar (80) not null,
-- cep_fornecedor char (8) not null,
-- numero_portaria_fornecedor varchar (10),
-- primary key (id_fornecedor),
-- foreign key (id_funcionario) references funcionario(id_funcionario)
-- );

-- create table compra (
-- id_pedido_compra int (5) unsigned not null unique auto_increment,
-- nome_pedido_compra varchar (40) not null,
-- fornecedor_pedido_compra varchar (20) not null,
-- nota_pedido_compra varchar (20) not null,
-- id_funcionario int (4),
-- dt_entrada_pedido_compra date not null,
-- dt_vencimento_pedido_compra date not null,
-- qtde_pedido_compra int (6) not null,
-- valor_pedido_compra decimal (10,2) not null,
-- primary key (id_pedido_compra),
-- foreign key (id_funcionario) references funcionario(id_funcionario)
-- );
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







