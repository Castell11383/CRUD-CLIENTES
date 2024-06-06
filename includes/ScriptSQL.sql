create table cliente_crud(
  cli_codigo SERIAL NOT NULL,
  cli_nombre  VARCHAR(50),
  cli_apellido VARCHAR(50),
  cli_nit  INT,
  cli_telefono  INT,
  cli_situacion SMALLINT DEFAULT 1,
  PRIMARY KEY (CLI_CODIGO)
);
        