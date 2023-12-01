------------------------------------TABLE COMPANY------------------------------------
DROP TABLE IF EXISTS COMPANY;

CREATE TABLE COMPANY(
    LOGO VARCHAR(100) NOT NULL,
    CIF VARCHAR(10) NOT NULL,
    COMPANY_NAME VARCHAR(50) NOT NULL,
    COMPANY_TYPE VARCHAR(25) NOT NULL,
    COUNTRY VARCHAR(20) NOT NULL,
    COMPANY_ADDRESS VARCHAR(100) NOT NULL,
    PHONE NUMBER(9) NOT NULL,
    EMAIL VARCHAR(30) NOT NULL,
    CONSTRAINT PK_COMPANY PRIMARY KEY (CIF)
);

------------------------------------TABLE BILLS------------------------------------
DROP TABLE IF EXISTS BILLS;

CREATE TABLE BILLS (
    BILL_ID VARCHAR(10),
    CIF VARCHAR(10) NOT NULL,
    TYPE_BILLS VARCHAR(12) NOT NULL,
    DATE_BILLS DATE NOT NULL,
    DESCRIPTION VARCHAR(30) NOT NULL,
    PRICE NUMERIC NOT NULL,
    CONSTRAINT PK_BILLS PRIMARY KEY (BILL_ID),
    CONSTRAINT FK_COMPANY1 FOREIGN KEY (CIF) REFERENCES COMPANY(CIF)
);

------------------------------------TABLA TRANSACTION------------------------------------
DROP TABLE IF EXISTS TRANSACTIONS;

CREATE TABLE TRANSACTIONS (
    TRANSACTION_ID VARCHAR(10),
    NIF_ORIGIN VARCHAR(10) NOT NULL,
    NIF_DESTINATION VARCHAR(10) NOT NULL,
    AMOUNT DECIMAL(18, 2) NOT NULL,
    BADGE VARCHAR(5) NOT NULL,
    TRANSACTION_DATE DATE NOT NULL,
    CONSTRAINT PK_TRANSACTION PRIMARY KEY (ID_TRANSACTION),
    CONSTRAINT FK_COMPANY2 FOREIGN KEY (NIF_ORIGIN) REFERENCES COMPANY(NIF) ON DELETE CASCADE,
    CONSTRAINT FK_COMPANY3 FOREIGN KEY (NIF_DESTINATION) REFERENCES COMPANY(NIF) ON DELETE CASCADE
);

------------------------------------TABLA REPORT------------------------------------
DROP TABLE IF EXISTS REPORT;

CREATE TABLE REPORT(
    NUM_REPORT VARCHAR(10),
    CIF VARCHAR(10) NOT NULL,
    DATE_REPORT DATE NOT NULL,
    CONSTRAINT PK_REPORT PRIMARY KEY (NUM_REPORT),
    CONSTRAINT FK_COMPANY4 FOREIGN KEY (CIF) REFERENCES COMPANY(CIF)
);
