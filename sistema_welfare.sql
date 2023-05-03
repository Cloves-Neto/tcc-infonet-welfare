create database sistema_welfare;
use sistema_welfare;
show tables;
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


create table funcionario (
id_funcionario int (4) unsigned zerofill not null unique auto_increment,
nome_funcionario varchar (80) not null,
email_funcionario varchar (80) not null,
senha_funcionario varchar (20) not null,
cpf_funcionario char (11) not null,
cargo_funcionario varchar (40) not null, /*deve ser registrado apenas os cargos especificados no tipo_usuario*/
tipo_usuario enum ('administrador', 'enfermeiro', 'medico', 'recepcionista') not null,
status_funcionario char (1), /*Adicionado status Ativo/Inativo*/
foto_funcionario blob, /*foto do funcionario*/
primary key (id_funcionario)
);

create table usuario (
id_funcionario int (4) unsigned zerofill not null unique auto_increment,
email_usuario varchar (80) not null,
senha_funcionario varchar (20) not null,
tipo_usuario enum ('administrador', 'enfermeiro', 'medico', 'recepcionista') not null,
foreign key (id_funcionario) references funcionario(id_funcionario)
);
insert into usuario (id_funcionario, email_usuario, senha_funcionario, tipo_usuario)
values (1, 'admin@welfare.com', 'adm123', 'administrador');


create table paciente (
id_paciente int (3) unsigned zerofill not null unique auto_increment,
nome_paciente varchar (80) not null,
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

create table categoria (
id_categoria int (5) unsigned zerofill not null auto_increment,
nome_categoria varchar (50) not null,
primary key (id_categoria)
);

create table agendamento (
id_agendamento int (5) unsigned zerofill not null unique auto_increment,
id_paciente int (3) not null,
nome_paciente varchar(80) not null,
nome_responsavel varchar (80),
cpf_paciente char (11) not null,
data_consulta datetime not null,
observacoes text,
id_medico varchar (10) not null unique,
nome_categoria varchar (50) not null,
primary key (id_agendamento),
foreign key (id_paciente) references paciente(id_paciente),
foreign key (id_medico) references medico(id_medico)
);


create table consulta (
id_consulta int (5) unsigned zerofill not null unique auto_increment,
id_funcionario int (4) not null,
id_medico varchar (10) not null,
id_paciente int (3) not null,
nome_paciente varchar (80) not null,
nome_responsavel varchar (80) not null,
estado_consulta char (1) not null,
tipo_consulta char (1) not null,
relatorio_consulta text not null,
id_categoria int (5) not null,
dt_consulta date not null,
receita_consulta varchar (50) not null,
cargo_funcionario varchar (20) not null,
primary key (id_consulta),
foreign key (id_funcionario) references funcionario(id_funcionario),
foreign key (id_categoria) references categoria(id_categoria),
foreign key (id_paciente) references paciente(id_paciente),
foreign key (id_medico) references medico (id_medico)
);

create table pagamento_consulta (
id_consulta int (5) unsigned zerofill not null unique auto_increment,
id_funcionario int (4) not null,
dt_consulta date not null,
valor_consulta decimal (4,2),
primary key (id_consulta),
foreign key (id_funcionario) references funcionario(id_funcionario)
);

/*criação tabela movimento*/
create table movimento_consulta (
id_movimento int(5) unsigned zerofill not null unique auto_increment,
id_consulta int(5) unsigned zerofill not null,
id_funcionario int(4) not null,
dt_consulta date not null,
valor_pago decimal(4,2),
status_pagamento enum('pago', 'pendente', 'cancelado') not null default 'pendente',
primary key (id_movimento),
foreign key (id_consulta) references pagamento_consulta(id_consulta),
foreign key (id_funcionario) references funcionario(id_funcionario),
foreign key (dt_consulta) references pagamento_consulta(dt_consulta)
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







