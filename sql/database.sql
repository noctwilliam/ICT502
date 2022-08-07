--------------------------------------------------------
--  File created - Wednesday-July-20-2022   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Sequence BOOK_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "LIBRARY"."BOOK_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence BOOK_SEQ1
--------------------------------------------------------

   CREATE SEQUENCE  "LIBRARY"."BOOK_SEQ1"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 41 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence BORROWED_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "LIBRARY"."BORROWED_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence DEMO_CUST_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "LIBRARY"."DEMO_CUST_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 21 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence DEMO_ORDER_ITEMS_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "LIBRARY"."DEMO_ORDER_ITEMS_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 61 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence DEMO_ORD_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "LIBRARY"."DEMO_ORD_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 11 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence DEMO_PROD_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "LIBRARY"."DEMO_PROD_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 21 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence DEMO_USERS_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "LIBRARY"."DEMO_USERS_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 21 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence LIBRARIAN_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "LIBRARY"."LIBRARIAN_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence LIBRARIAN_SEQ1
--------------------------------------------------------

   CREATE SEQUENCE  "LIBRARY"."LIBRARIAN_SEQ1"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 41 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence REPORTS_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "LIBRARY"."REPORTS_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 21 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence USERS_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "LIBRARY"."USERS_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 21 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Table BOOK
--------------------------------------------------------

  CREATE TABLE "LIBRARY"."BOOK" 
   (	"BOOK_ISBN" VARCHAR2(20 BYTE), 
	"BOOK_TITLE" VARCHAR2(200 BYTE), 
	"BOOK_AUTHOR" VARCHAR2(100 BYTE), 
	"BOOK_GENRE" VARCHAR2(50 BYTE), 
	"BOOK_EDITION" VARCHAR2(20 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table BORROWED
--------------------------------------------------------

  CREATE TABLE "LIBRARY"."BORROWED" 
   (	"BOOK_ISBN" VARCHAR2(100 BYTE), 
	"USER_ID" VARCHAR2(100 BYTE), 
	"LIBRARIAN_ID" VARCHAR2(50 BYTE), 
	"RESERVE_DATE" DATE, 
	"RETURN_DATE" DATE, 
	"DUE_DATE" DATE
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table LIBRARIAN
--------------------------------------------------------

  CREATE TABLE "LIBRARY"."LIBRARIAN" 
   (	"LIBRARIAN_ID" VARCHAR2(50 BYTE), 
	"LIBRARIAN_NAME" VARCHAR2(60 BYTE), 
	"LIBRARIAN_EMAIL" VARCHAR2(75 BYTE), 
	"LIBRARIAN_CONTACTNO" NUMBER, 
	"LIBRARIAN_PASS" VARCHAR2(75 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table REPORTS
--------------------------------------------------------

  CREATE TABLE "LIBRARY"."REPORTS" 
   (	"REPORT_ID" VARCHAR2(20 BYTE), 
	"BOOK_ISBN" VARCHAR2(30 BYTE), 
	"USER_ID" VARCHAR2(20 BYTE), 
	"ISSUE_RETURN" VARCHAR2(100 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Table USERS
--------------------------------------------------------

  CREATE TABLE "LIBRARY"."USERS" 
   (	"USER_ID" VARCHAR2(20 BYTE), 
	"USER_EMAIL" VARCHAR2(100 BYTE), 
	"USER_NAME" VARCHAR2(50 BYTE), 
	"USER_PHONENO" VARCHAR2(11 BYTE), 
	"USER_ADDRESS" VARCHAR2(100 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
REM INSERTING into LIBRARY.BOOK
SET DEFINE OFF;
Insert into LIBRARY.BOOK (BOOK_ISBN,BOOK_TITLE,BOOK_AUTHOR,BOOK_GENRE,BOOK_EDITION) values ('1','mektok','abe','kelate','2');
REM INSERTING into LIBRARY.BORROWED
SET DEFINE OFF;
Insert into LIBRARY.BORROWED (BOOK_ISBN,USER_ID,LIBRARIAN_ID,RESERVE_DATE,RETURN_DATE,DUE_DATE) values ('1','1','21',to_date('14/07/2022','DD/MM/RRRR'),to_date('15/07/2022','DD/MM/RRRR'),to_date('16/07/2022','DD/MM/RRRR'));
REM INSERTING into LIBRARY.LIBRARIAN
SET DEFINE OFF;
Insert into LIBRARY.LIBRARIAN (LIBRARIAN_ID,LIBRARIAN_NAME,LIBRARIAN_EMAIL,LIBRARIAN_CONTACTNO,LIBRARIAN_PASS) values ('1','Harith','harith2312@gmail.com',197587365,'harith123');
Insert into LIBRARY.LIBRARIAN (LIBRARIAN_ID,LIBRARIAN_NAME,LIBRARIAN_EMAIL,LIBRARIAN_CONTACTNO,LIBRARIAN_PASS) values ('21','Azmi','azmi@gmail.com',92193013,'azmi123');
REM INSERTING into LIBRARY.REPORTS
SET DEFINE OFF;
REM INSERTING into LIBRARY.USERS
SET DEFINE OFF;
Insert into LIBRARY.USERS (USER_ID,USER_EMAIL,USER_NAME,USER_PHONENO,USER_ADDRESS) values ('1','harith2312@gmail.com','Harith','0197587365','Jalan Kenangan');
Insert into LIBRARY.USERS (USER_ID,USER_EMAIL,USER_NAME,USER_PHONENO,USER_ADDRESS) values ('2','azmi@gmail.com','Azmi','128478915','Jalan Kenanga');
--------------------------------------------------------
--  DDL for Index REPORTS_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "LIBRARY"."REPORTS_PK" ON "LIBRARY"."REPORTS" ("REPORT_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Index BOOK_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "LIBRARY"."BOOK_PK" ON "LIBRARY"."BOOK" ("BOOK_ISBN") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Index USERS_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "LIBRARY"."USERS_PK" ON "LIBRARY"."USERS" ("USER_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Index LIBRARIAN_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "LIBRARY"."LIBRARIAN_PK" ON "LIBRARY"."LIBRARIAN" ("LIBRARIAN_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM" ;
--------------------------------------------------------
--  DDL for Trigger BOOK_TRG
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "LIBRARY"."BOOK_TRG" 
BEFORE INSERT ON BOOK 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    NULL;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "LIBRARY"."BOOK_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger BOOK_TRG1
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "LIBRARY"."BOOK_TRG1" 
BEFORE INSERT ON BOOK 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.BOOK_ISBN IS NULL THEN
      SELECT BOOK_SEQ1.NEXTVAL INTO :NEW.BOOK_ISBN FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "LIBRARY"."BOOK_TRG1" ENABLE;
--------------------------------------------------------
--  DDL for Trigger BORROWED_TRG
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "LIBRARY"."BORROWED_TRG" 
BEFORE INSERT ON BORROWED 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    NULL;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "LIBRARY"."BORROWED_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger LIBRARIAN_TRG
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "LIBRARY"."LIBRARIAN_TRG" 
BEFORE INSERT ON LIBRARIAN 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    NULL;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "LIBRARY"."LIBRARIAN_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger LIBRARIAN_TRG1
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "LIBRARY"."LIBRARIAN_TRG1" 
BEFORE INSERT ON LIBRARIAN 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.LIBRARIAN_ID IS NULL THEN
      SELECT LIBRARIAN_SEQ1.NEXTVAL INTO :NEW.LIBRARIAN_ID FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "LIBRARY"."LIBRARIAN_TRG1" ENABLE;
--------------------------------------------------------
--  DDL for Trigger REPORTS_TRG
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "LIBRARY"."REPORTS_TRG" 
BEFORE INSERT ON REPORTS 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.REPORT_ID IS NULL THEN
      SELECT REPORTS_SEQ.NEXTVAL INTO :NEW.REPORT_ID FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "LIBRARY"."REPORTS_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger USERS_TRG
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "LIBRARY"."USERS_TRG" 
BEFORE INSERT ON USERS 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.USER_ID IS NULL THEN
      SELECT USERS_SEQ.NEXTVAL INTO :NEW.USER_ID FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "LIBRARY"."USERS_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Function CUSTOM_AUTH
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "LIBRARY"."CUSTOM_AUTH" (p_username in VARCHAR2, p_password in VARCHAR2)
return BOOLEAN
is
  l_password varchar2(4000);
  l_stored_password varchar2(4000);
  l_expires_on date;
  l_count number;
begin
-- First, check to see if the user is in the user table
select count(*) into l_count from demo_users where user_name = p_username;
if l_count > 0 then
  -- First, we fetch the stored hashed password & expire date
  select password, expires_on into l_stored_password, l_expires_on
   from demo_users where user_name = p_username;

  -- Next, we check to see if the user's account is expired
  -- If it is, return FALSE
  if l_expires_on > sysdate or l_expires_on is null then

    -- If the account is not expired, we have to apply the custom hash
    -- function to the password
    l_password := custom_hash(p_username, p_password);

    -- Finally, we compare them to see if they are the same and return
    -- either TRUE or FALSE
    if l_password = l_stored_password then
      return true;
    else
      return false;
    end if;
  else
    return false;
  end if;
else
  -- The username provided is not in the DEMO_USERS table
  return false;
end if;
end;

/
--------------------------------------------------------
--  DDL for Function CUSTOM_HASH
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "LIBRARY"."CUSTOM_HASH" (p_username in varchar2, p_password in varchar2)
return varchar2
is
  l_password varchar2(4000);
  l_salt varchar2(4000) := '0V6TI7J22V4KA4G5MNTPQ01WX19L4H';
begin

-- This function should be wrapped, as the hash algorhythm is exposed here.
-- You can change the value of l_salt or the method of which to call the
-- DBMS_OBFUSCATOIN toolkit, but you much reset all of your passwords
-- if you choose to do this.

l_password := utl_raw.cast_to_raw(dbms_obfuscation_toolkit.md5
  (input_string => p_password || substr(l_salt,10,13) || p_username ||
    substr(l_salt, 4,10)));
return l_password;
end;

/
--------------------------------------------------------
--  Constraints for Table USERS
--------------------------------------------------------

  ALTER TABLE "LIBRARY"."USERS" ADD CONSTRAINT "USERS_PK" PRIMARY KEY ("USER_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "LIBRARY"."USERS" MODIFY ("USER_ID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table REPORTS
--------------------------------------------------------

  ALTER TABLE "LIBRARY"."REPORTS" ADD CONSTRAINT "REPORTS_PK" PRIMARY KEY ("REPORT_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "LIBRARY"."REPORTS" MODIFY ("REPORT_ID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table LIBRARIAN
--------------------------------------------------------

  ALTER TABLE "LIBRARY"."LIBRARIAN" ADD CONSTRAINT "LIBRARIAN_PK" PRIMARY KEY ("LIBRARIAN_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "LIBRARY"."LIBRARIAN" MODIFY ("LIBRARIAN_ID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table BOOK
--------------------------------------------------------

  ALTER TABLE "LIBRARY"."BOOK" ADD CONSTRAINT "BOOK_PK" PRIMARY KEY ("BOOK_ISBN")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "SYSTEM"  ENABLE;
  ALTER TABLE "LIBRARY"."BOOK" MODIFY ("BOOK_ISBN" NOT NULL ENABLE);
--------------------------------------------------------
--  Ref Constraints for Table BORROWED
--------------------------------------------------------

  ALTER TABLE "LIBRARY"."BORROWED" ADD CONSTRAINT "BOOK_ISBN_FFK" FOREIGN KEY ("BOOK_ISBN")
	  REFERENCES "LIBRARY"."BOOK" ("BOOK_ISBN") ENABLE;
  ALTER TABLE "LIBRARY"."BORROWED" ADD CONSTRAINT "LIBRARIAN_ID_FFK" FOREIGN KEY ("LIBRARIAN_ID")
	  REFERENCES "LIBRARY"."LIBRARIAN" ("LIBRARIAN_ID") ENABLE;
  ALTER TABLE "LIBRARY"."BORROWED" ADD CONSTRAINT "USER_ID_FFK" FOREIGN KEY ("USER_ID")
	  REFERENCES "LIBRARY"."USERS" ("USER_ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table REPORTS
--------------------------------------------------------

  ALTER TABLE "LIBRARY"."REPORTS" ADD CONSTRAINT "BOOK_ISBN_FK" FOREIGN KEY ("BOOK_ISBN")
	  REFERENCES "LIBRARY"."BOOK" ("BOOK_ISBN") ENABLE;
  ALTER TABLE "LIBRARY"."REPORTS" ADD CONSTRAINT "USER_FK" FOREIGN KEY ("USER_ID")
	  REFERENCES "LIBRARY"."USERS" ("USER_ID") ENABLE;
