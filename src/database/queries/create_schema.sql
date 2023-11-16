-- drop database if exists cardapio;

-- create database cardapio;

drop schema if exists public cascade;

create schema public;

drop table if exists pedido_itens;
drop table if exists pedidos;
drop table if exists produtos;
drop table if exists cardapios;
drop table if exists lojas;
drop table if exists usuarios;

create table usuarios
(
    id     serial       not null,
    email  varchar(255) not null,
    senhas varchar(255) not null,
    primary key (id)
);

create table lojas
(
    id   serial       not null,
    nome varchar(255) not null,
    primary key (id)
);

create table cardapios
(
    id        serial       not null,
    descricao varchar(255) not null,
    loja_id   serial       not null,
    primary key (id),
    foreign key (loja_id) references lojas (id)
);

create table produtos
(
    id          serial         not null,
    nome        varchar(255)   not null,
    valor       decimal(12, 2) not null,
    cardapio_id serial         not null,
    primary key (id),
    foreign key (cardapio_id) references cardapios (id)
);

create table pedidos
(
    id         serial    not null,
    data       timestamp not null,
    usuario_id serial    not null,
    loja_id    serial    not null,
    primary key (id),
    foreign key (usuario_id) references usuarios (id),
    foreign key (loja_id) references lojas (id)
);

create table pedido_itens
(
    id         serial    not null,
    data       timestamp not null,
    produto_id serial    not null,
    pedido_id  serial    not null,
    primary key (id),
    foreign key (pedido_id) references pedidos (id),
    foreign key (pedido_id) references usuarios (id)
)