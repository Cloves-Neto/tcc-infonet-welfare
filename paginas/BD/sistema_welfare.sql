create database sistema_welfare;
use sistema_welfare;
show tables;

create table adm (
id_adm int (4) unsigned zerofill not null unique auto_increment,
nome_adm varchar (80) not null,
email_adm varchar (80) not null,
senha_user varchar (20) not null,
primary key (id_adm)
);

create table funcionario (
id_funcionario int (4) unsigned zerofill not null unique auto_increment,
nome_funcionario varchar (80) not null,
email_funcionario varchar (80) not null,
cpf_funcionario char (11) not null unique,
senha_funcionario varchar (20) not null,
cargo_funcionario varchar (40) not null,
primary key (id_funcionario)
);

create table usuario (
id_funcionario int (4) unsigned zerofill not null unique auto_increment,
senha_funcionario varchar (20) not null,
constraint fk_id_funcionarios foreign key (id_funcionario) references funcionario(id_funcionario)
);

create table paciente (
nome_paciente varchar (80) not null,
nome_responsavel varchar (80),
dt_nascimento_paciente date not null,
dt_nascimento_responsavel date,
cpf_paciente char (11) not null unique,
rg_paciente char (9) not null,
cpf_responsavel char (11),
sexo_paciente char (1) not null,
sexo_responsavel char (1),
contato_paciente varchar (14) not null,
contato_responsavel varchar (14),
email varchar (80),
uf char (2) not null,
logradouro varchar (60) not null,
cep_paciente char (8) not null,
numero_casa_paciente varchar (10),
primary key (nome_paciente)
);

create table categoria (
id_categoria int (5) unsigned zerofill not null auto_increment,
nome_categoria varchar (50) not null,
primary key (id_categoria)
);

create table consulta (
id_consulta int (5) unsigned zerofill not null unique auto_increment,
id_funcionario int (4) not null,
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
constraint fk_id_funcionarios foreign key (id_funcionario) references funcionario(id_funcionario),
constraint fk_id_categorias foreign key (id_categoria) references categoria(id_categoria),
constraint fk_nome_pacientes foreign key (nome_paciente) references cadastro_paciente(nome_paciente),
constraint fk_nome_responsaveis foreign key (nome_responsavel) references cadastro_paciente(nome_responsavel)
);

create table pagamento_consulta (
id_consulta int (5) unsigned zerofill not null unique auto_increment,
id_funcionario int (4) not null,
dt_consulta date not null,
valor_consulta decimal (4,2),
primary key (id_consulta),
constraint fk_id_funcionarios foreign key (id_funcionario) references funcionario(id_funcionario)
);

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
constraint fk_id_funcionarios foreign key (id_funcionario) references funcionario(id_funcionario)
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
constraint fk_id_funcionarios foreign key (id_funcionario) references funcinario(id_funcionario)
);







