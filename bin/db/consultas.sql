
/*Busqueda y filtrado*/
CREATE OR REPLACE FUNCTION FILTER_COMPANY(
    p_name VARCHAR,
    p_type VARCHAR,
    p_country VARCHAR,
    p_nif VARCHAR
) RETURN SYS_REFCURSOR IS
    cur SYS_REFCURSOR;
BEGIN
OPEN cur FOR
SELECT *
FROM COMPANY
WHERE (p_name IS NULL OR NAME = p_name)
  AND (p_type IS NULL OR TYPE = p_type)
  AND (p_country IS NULL OR COUNTRY = p_country)
  AND (p_nif IS NULL OR NIF = p_nif);

RETURN cur;
END;
/

/*Busqueda y filtrado traducido a MySQL*/
DELIMITER //
CREATE FUNCTION FILTER_COMPANY(
    p_name VARCHAR(255),
    p_type VARCHAR(255),
    p_country VARCHAR(255),
    p_nif VARCHAR(10)
)
    RETURNS BOOLEAN
BEGIN
    DECLARE filter BOOLEAN;

    SET filter = FALSE;

    IF p_name IS NOT NULL THEN
    IF p_name = NAME THEN
    SET filter = TRUE;
END IF;
END IF;

IF p_type IS NOT NULL THEN
        IF p_type = TYPE THEN
SET filter = TRUE;
END IF;
END IF;

IF p_country IS NOT NULL THEN
        IF p_country = COUNTRY THEN
SET filter = TRUE;
END IF;
END IF;

IF p_nif IS NOT NULL THEN
        IF p_nif = NIF THEN
SET filter = TRUE;
END IF;
END IF;

RETURN filter;
END;
//
DELIMITER ;



/*Introducir empresas nuevas*/
CREATE OR REPLACE FUNCTION insert_empresa(
    p_nif VARCHAR(10),
    p_nombre VARCHAR(12),
    p_tipo VARCHAR(15),
    p_pais VARCHAR(20),
    p_direccion VARCHAR(50),
    p_telefono VARCHAR(12),
    p_email VARCHAR(30)
)
    RETURNS VOID AS $$;
BEGIN
    INSERT INTO COMPANY (NIF, NAME, TYPE, COUNTRY, ADDRESS, PHONE, EMAIL)
    VALUES (p_nif, p_nombre, p_tipo, p_pais, p_direccion, p_telefono, p_email);
END;
$$ LANGUAGE plpgsql;

/*Introducir nuevas empresas traducido a MySQL*/
DELIMITER //
CREATE PROCEDURE insert_empresa(
    IN p_nif VARCHAR(10),
    IN p_nombre VARCHAR(12),
    IN p_tipo VARCHAR(15),
    IN p_pais VARCHAR(20),
    IN p_direccion VARCHAR(50),
    IN p_telefono VARCHAR(12),
    IN p_email VARCHAR(30)
)
BEGIN
    INSERT INTO COMPANY (NIF, NAME, TYPE, COUNTRY, ADDRESS, PHONE, EMAIL)
    VALUES (p_nif, p_nombre, p_tipo, p_pais, p_direccion, p_telefono, p_email);
END;
//
DELIMITER ;


