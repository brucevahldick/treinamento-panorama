-- Database: treinamento

-- DROP DATABASE IF EXISTS treinamento;

CREATE DATABASE treinamento
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Portuguese_Brazil.1252'
    LC_CTYPE = 'Portuguese_Brazil.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;

-- Table: public.usuario

-- DROP TABLE IF EXISTS public.usuario;

CREATE TABLE IF NOT EXISTS public.usuario
(
    id integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    nome text COLLATE pg_catalog."default" NOT NULL,
    data_nascimento text COLLATE pg_catalog."default" NOT NULL,
    email text COLLATE pg_catalog."default" NOT NULL,
    senha text COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT usuario_pkey PRIMARY KEY (id),
    CONSTRAINT email UNIQUE (email)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.usuario
    OWNER to postgres;

-- Table: public.carteira

-- DROP TABLE IF EXISTS public.carteira;

CREATE TABLE IF NOT EXISTS public.carteira
(
    id integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    nome text COLLATE pg_catalog."default" NOT NULL,
    tipo text COLLATE pg_catalog."default" NOT NULL,
    usuario integer,
    previsao_gastos double precision,
    previsao_receitas double precision,
    CONSTRAINT carteira_pkey PRIMARY KEY (id),
    CONSTRAINT usuario FOREIGN KEY (usuario)
        REFERENCES public.usuario (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.carteira
    OWNER to postgres;
    

-- Table: public.movimentacao

-- DROP TABLE IF EXISTS public.movimentacao;

CREATE TABLE IF NOT EXISTS public.movimentacao
(
    id integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    montante numeric NOT NULL,
    beneficiario text COLLATE pg_catalog."default",
    carteira integer NOT NULL,
    tipo integer NOT NULL,
    data date,
    CONSTRAINT movimentacao_pkey PRIMARY KEY (id),
    CONSTRAINT carteira FOREIGN KEY (carteira)
        REFERENCES public.carteira (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.movimentacao
    OWNER to postgres;