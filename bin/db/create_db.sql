------------------------------------TABLA COMPANY------------------------------------

DROP TABLE COMPANY CASCADE CONSTRAINT;

CREATE TABLE COMPANY(
    NIF VARCHAR(10) NOT NULL,
    NAME_COMPANY VARCHAR(12) NOT NULL,
    TYPE_COMPANY VARCHAR(15) NOT NULL,
    COUNTRY VARCHAR(20) NOT NULL,
    ADDRESS_COMPANY VARCHAR(50) NOT NULL,
    PHONE VARCHAR(12) NOT NULL,
    EMAIL VARCHAR(30) NOT NULL,
    CONSTRAINT PK_COMPANY1 PRIMARY KEY (NIF)
);

------------------------------------TABLA TRANSACTION------------------------------------

DROP TABLE COMPANY_TRANSACTION CASCADE CONSTRAINT;

CREATE TABLE COMPANY_TRANSACTION(
    ID_TRANSACTION VARCHAR(10),
    NIF_ORIGIN VARCHAR(10) NOT NULL,
    NIF_DESTINATION VARCHAR(10) NOT NULL,
    AMOUNT NUMBER NOT NULL ,
    BADGE VARCHAR(5) NOT NULL,
    DATE_TRANSACTION DATE NOT NULL,
    CONSTRAINT PK_GASTOS PRIMARY KEY (ID_TRANSACTION),
    CONSTRAINT FK_COMPANY1 FOREIGN KEY (NIF_ORIGIN) REFERENCES COMPANY(NIF) ON DELETE CASCADE,
    CONSTRAINT FK_COMPANY2 FOREIGN KEY (NIF_DESTINATION) REFERENCES COMPANY(NIF) ON DELETE CASCADE
);

------------------------------------TABLA FACTURES------------------------------------

DROP TABLE BILLS CASCADE CONSTRAINT;

CREATE TABLE BILLS(
    NUM_BILL VARCHAR(10),
    CIF VARCHAR(10) NOT NULL,
    TYPE_BILLS VARCHAR(12) NOT NULL,
    DATE_BILLS DATE NOT NULL,
    DESCRIPCTION VARCHAR(30) NOT NULL,
    PRICE NUMERIC NOT NULL ,
    CONSTRAINT PK_GASTOS PRIMARY KEY (NUM_BILL),
    CONSTRAINT FK_COMPANY1 FOREIGN KEY (CIF) REFERENCES COMPANY(CIF)
);

------------------------------------TABLA INFORME------------------------------------

DROP TABLE REPORT CASCADE CONSTRAINT;

CREATE TABLE REPORT(
    NUM_REPORT VARCHAR(10),
    CIF VARCHAR(10) NOT NULL,
    DATE_REPORT DATE NOT NULL,
    CONSTRAINT PK_REPORT PRIMARY KEY (NUM_REPORT),
    CONSTRAINT FK_COMPANY1 FOREIGN KEY (CIF) REFERENCES COMPANY(CIF)
);
