drop database KapishAB;
create database KapishAB;
use KapishAB;

CREATE TABLE orter(

	oOrt VARCHAR(30),
    oStatus VARCHAR (15),
    oInfo TINYTEXT, #TINYTEXT limiterar texten till ca 255 tecken
    oDate date,
    
	PRIMARY KEY (oOrt)

)engine=innodb;

/*INSERT INTO orter (oOrt, oStatus, oInfo, oDate) VALUE ('Hedemora-Norrhyttan', 	'Öppen', '', '');
INSERT INTO orter (oOrt, oStatus, oInfo, oDate) VALUE ('Norrhyttan-Bondhyttan', 	'Öppen', '', '');
INSERT INTO orter (oOrt, oStatus, oInfo, oDate) VALUE ('Bondhyttan-Bommansbo', 	'Öppen', '', ''); */
INSERT INTO orter (oOrt, oStatus, oInfo, oDate) VALUE ('Bommansbo-Smedjebacken', 	'Stängd', 		'Översvämmat spår', '2018-01-14');
INSERT INTO orter (oOrt, oStatus, oInfo, oDate) VALUE ('Smedjebacken-Björsjö', 	'Under arbete', 'Träd över stigen', '2017-12-21');
#INSERT INTO orter (oOrt, oStatus, oInfo, oDate) VALUE ('Björsjö-Grängesberg', 	'öppen', '', '');

CREATE TABLE report( #DELSTRÄCKA!

	rID INT auto_increment,
    rMail VARCHAR(30),
    rName VARCHAR(30), # "R" i Rname står för report
    rDescr TINYTEXT, #Beskriving om var problemet skedde #Tinytext limiterar tecknen till max 255. 
    probChoice VARCHAR(30), #Problemval
	rOrt VARCHAR(30),
    rDate date,
    
    FOREIGN KEY (rOrt) REFERENCES orter(oOrt),    
	PRIMARY KEY (rID)
    
)engine=innodb;

/*INSERT INTO report (rMail, rName, rDescr, probChoice, rOrt, rDate) VALUE ('mail@Tmail.com', 'Kurt Lindeman', 'Död björn ligger på spåret', '', 'Hedemora-Norrhyttan','2008-01-12');
INSERT INTO report (rMail, rName, rDescr, probChoice, rOrt, rDate) VALUE ('Mejl@Tmail.com', 'Bert Lindeman', 'TRÄDÖVERVÄEGNHURGÖRMANMELLANSLAG', '', 'Smedjebacken-Björsjö','2017-12-12');
INSERT INTO report (rMail, rName, rDescr, probChoice, rOrt, rDate) VALUE ('min_mail@Tmail.com', 'Bo Lindeman', 'Spång är rutten, snälla byt ut', '', 'Bommansbo-Smedjebacken','2017-12-13');
*/

/*DELIMITER // #FLYTTADE DEN HÄR TRIGGERN TILL DEN ANDRA, SCROLLA LÄNGST NER 
	CREATE TRIGGER reporttrigger BEFORE INSERT ON report
	FOR EACH ROW 
	SET NEW.rDate = NOW()
//
 DELIMITER ;*/


#SELECT rMail AS Mail, rName AS Namn, rDescr AS Beskrivning, probChoice AS ' ' , rOrt AS Ort FROM report;

CREATE TABLE news(
	
    nID INT auto_increment,
    nDate date, 
    article TINYTEXT,
    nHeader VARCHAR(20),
    nOrt VARCHAR(30), #etapp
    
    PRIMARY KEY (nID)
    
)engine=innodb;

INSERT INTO news( nDate, article, nHeader, nOrt) VALUE ( '2017-06-06', 'Tyvärr är sträckan mellan Bomansbo-Smedjebacken översvämmad och frusen. Beträd på egen risk!', 'Avstängd', 'Bomansbo-Smedjebacken'); 
INSERT INTO news( nDate, article, nHeader, nOrt) VALUE ('2017-06-07','Julmarknad på anläggningen i Hedemora', '', ''); 
INSERT INTO news( nDate,article,nHeader, nOrt) VALUE ( '2017-06-08','Ek ligger över stigen vid Smedjebacken, var försiktig', 'Under arbete', 'Smedjebacken-Björsjö'); 

DELIMITER // 
	CREATE TRIGGER newstrigger BEFORE INSERT ON  news
	FOR EACH ROW 
	SET NEW.nDate = NOW()
//
 DELIMITER ;



#SELECT * from news;

    #SELECT * from news;
    
CREATE TABLE feedback(

	fbID INT auto_increment,
    fb int(1), #1-4 i nöjdhetsgrad
    fbComment TINYTEXT,
    
    PRIMARY KEY (fbID)
    
)engine=innodb;
    
	INSERT INTO feedback (fb, fbComment) VALUE ('4', 'Superbra löprunda!');
    INSERT INTO feedback (fb, fbComment) VALUE ('1', 'Anläggningen låg ju inte alls i Småland!');
    INSERT INTO feedback (fb, fbComment) VALUE ('3', 'Fyra av fem toast');
    
CREATE TABLE workOrder( #arbetsorder

	wWorkOrderID INT auto_increment, 
	wStartDate DATE,
	wEndDate DATE,
    
    wTyp INT(1),  #1 = Under förhandling / 2 = Pågående / 3 = Genomförd
    
    WdNr INT(2), #Delsträckenummer
    
    PRIMARY KEY (wWorkOrderID)

)engine=innodb;
     
	INSERT INTO workOrder (wStartDate,wEndDate,wTyp,WdNr) VALUE ('2017-06-15','2017-06-15', '3', '21');
	INSERT INTO workOrder (wStartDate,wEndDate,wTyp,WdNr) VALUE ('2017-11-16','2018-06-15', '2', '13');    
	INSERT INTO workOrder (wStartDate,wEndDate,wTyp,WdNr) VALUE ('2016-12-24','2017-01-01', '3', '5');  
    INSERT INTO workOrder (wStartDate,wEndDate,wTyp,WdNr) VALUE ('2018-12-24','2019-01-01', '1', '8');    
    INSERT INTO workOrder (wStartDate,wEndDate,wTyp,WdNr) VALUE ('2018-10-01','2018-10-02', '1', '5'); 
    
CREATE TABLE anv( #Användare
    
    aPnr CHAR(13),
    aPassw VARCHAR(20),
    aUsern VARCHAR(20),
    aNamn VARCHAR(20),
    aMail VARCHAR(20),
    aAdress VARCHAR(30),
    aTel INT(10),
    aTyp INT(1), #Hur tänkte vi här?
    
    PRIMARY KEY (aPnr)
    
)engine=innodb;    

#Underentreprenärer
/*INSERT INTO anv (aPnr, aPassw, aUsern, aNamn, aMail, aAdress, aTel, aTyp) VALUE ('19640101-0001', 'qwerty1', 'S_Ekman',	'Sture Ekman', 'sekman_64@Tmail.com', 'Ekmannagatan 1', '076-0101010', '1');
INSERT INTO anv (aPnr, aPassw, aUsern, aNamn, aMail, aAdress, aTel, aTyp) VALUE ('19640102-0002', 'qwerty2', 'Bror.Andersson', 'Bröderna Andersson', 'b.andersson2@Tmail.com', 'Torp 1', '076-0202020','1');
INSERT INTO anv (aPnr, aPassw, aUsern, aNamn, aMail, aAdress, aTel, aTyp) VALUE ('19640103-0003', 'qwerty3', 'SJ.Persson', 'Siv & Jan Persson', 'Personnarna@Tmail.com', 'Gårdsby 13', '0760303030', '1');

INSERT INTO anv (aPnr, aPassw, aUsern, aNamn, aMail, aAdress, aTel, aTyp) VALUE ('19640104-0004', 'qwerty4', 'J.Hed', 'Jonas Hed', 'hed_jonas@Tmail.com', 'Heden 3b', '0760404040', '1');
INSERT INTO anv (aPnr, aPassw, aUsern, aNamn, aMail, aAdress, aTel, aTyp) VALUE ('19640105-0005', 'qwerty5', 'OsEk', 'Oswald Ek', 'oswaldek@Tmail.com', 'Smedjebro 4', '0760505050', '1');
INSERT INTO anv (aPnr, aPassw, aUsern, aNamn, aMail, aAdress, aTel, aTyp) VALUE ('19640106-0006', 'qwerty6', 'Kvarn_Rune', 'Rune Kvarn', 'kvarn_rune@Tmail.com', 'Björsjöbaken 1', '0760606060', '1');

INSERT INTO anv (aPnr, aPassw, aUsern, aNamn, aMail, aAdress, aTel, aTyp) VALUE ('19640107-0007', 'qwerty7', 'IRISSAX', 'Iris Sax', 'Iris.64@Tmail.com', 'Spendrups väg 21', '0760707070', '1');
INSERT INTO anv (aPnr, aPassw, aUsern, aNamn, aMail, aAdress, aTel, aTyp) VALUE ('19640108-0008', 'qwerty8', 'V.ytter', 'Vidar Ytter', 'vidarytter_mail@Tmail.com', 'Inre vägen 13', '0760808080', '1');
INSERT INTO anv (aPnr, aPassw, aUsern, aNamn, aMail, aAdress, aTel, aTyp) VALUE ('19640109-0009', 'qwerty9', 'Urban.G', 'Urban Garv', 'UG_1964@Tmail.com', 'Grängesbergsleden 4', '0760909090', '1');

#ArenaChef
INSERT INTO anv (aPnr, aPassw, aUsern, aNamn, aMail, aAdress, aTel, aTyp) VALUE ('1900-01-01', 'arenachef', 'T.Karlsson', 'Tomas Karlsson', 'tomas@skidloppet.se', 'Stigen 1', '0761111111', '2');

#VD
INSERT INTO anv (aPnr, aPassw, aUsern, aNamn, aMail, aAdress, aTel, aTyp) VALUE ('1900-02-02', 'veedee', 'v.D', 'Vee Dee', 'vd@skidloppet.se', 'Stigen 2', '0762222222', '3');


#Admin
INSERT INTO anv (aPnr, aPassw, aUsern, aNamn, aMail, aAdress, aTel) VALUE ('1900-02-03', 'admin', 'Admin', 'Admin Administratör', 'admin@skidloppet.se', 'Adminstigen 1', '0000000000');

 #SELECT * FROm anv WHERE aTyp='2';*/
 
CREATE TABLE UndEntArb(

	uPnr CHAR(12),
	woID INT auto_increment, #WordingOrderID
    
    FOREIGN KEY(uPnr) REFERENCES anv(aPnr),
    FOREIGN KEY(woID) REFERENCES workOrder(wWorkOrderID)

)engine=innodb;    

CREATE TABLE inaccessible(
	
    iPnr CHAR(13),
	iStart date,
    iEnd date,
    iText tinytext, #255 tecken

	FOREIGN KEY(ipnr) REFERENCES anv(aPnr)

)engine=innodb;

/*INSERT INTO inaccessible (iPnr, iStart, iEnd, iText) VALUE ('19640101-0001','2017-24-24','2018-01-02', 'Julledig');
INSERT INTO inaccessible (iPnr, iStart, iEnd, iText) VALUE ('19640102-0002','2018-04-04','2018-04-06', 'Således kan slutledning dras att undertecknad icke kan utföra abete under utsatt tid');
INSERT INTO inaccessible (iPnr, iStart, iEnd, iText) VALUE ('19640103-0003','2018-06-21','2018-08-30', 'jaknintejobbadåe');*/



DELIMITER //
CREATE PROCEDURE Antalordrar(IN typval INT(1))
 BEGIN
 SELECT * 
 FROM workOrder
 WHERE wTyp = typval;
 END //
DELIMITER ;

#CALL AntalOrdrar('1');


#CREATE USER 'Admin'@'localhost' IDENTIFIED BY 'admin';
#GRANT SELECT ON KapishAB.* TO Admin;

CREATE TABLE log_workOrder( #arbetsorder logtable

	log_ID INT auto_increment,
	log_operation char(3), #DEL/UP/INS
    log_datum date, #Datum för operation
    log_user varchar(99), #användarens ID
	log_wWorkOrderID INT, 
	log_wStartDate DATE,
	log_wEndDate DATE,
    
    log_wTyp INT(1),  #1 = Under förhandling / 2 = Pågående / 3 = Genomförd
    
    log_WdNr INT(2), #Delsträckenummer
    
    PRIMARY KEY (log_ID)

)engine=innodb;

CREATE TABLE log_report( #DELSTRÄCKA! logtable
	
    log_ID INT auto_increment,
    log_operation char(3), #DEL/UP/INS
    log_datum date, #Datum för operation
    log_user varchar(99), #användarens ID
	log_rID INT,
    log_rMail VARCHAR(30),
    log_rName VARCHAR(30), # "R" i Rname står för report
    log_rDescr TINYTEXT, #Beskriving om var problemet skedde #Tinytext limiterar tecknen till max 255. 
    log_probChoice VARCHAR(30), #Problemval
	log_rOrt VARCHAR(30),
    log_rDate date,
    
    FOREIGN KEY (log_rOrt) REFERENCES orter(oOrt),    
	PRIMARY KEY (log_ID)
    
)engine=innodb;

#Trigger som automatiskt loggar uppdateringar i workOrder-tabellen
delimiter //

	create trigger workOrderUpdateLog before update on workOrder
		for each row
			begin        
                insert into log_workOrder (log_operation, log_datum, log_user, log_wWorkOrderID, log_wStartDate, log_wEndDate, log_wTyp, log_WdNr)
					values ("UPD", now(), user(), new.wWorkOrderID, new.wStartDate, new.wEndDate, new.wTyp, new.WdNr);
			end;
//
delimiter ;

#Trigger som automatiskt loggar nya insättningar i workOrder-tabellen
delimiter //

	create trigger workOrderInsertLog after insert on workOrder
		for each row
			begin        
                insert into log_workOrder (log_operation, log_datum, log_user, log_wWorkOrderID, log_wStartDate, log_wEndDate, log_wTyp, log_WdNr)
					values ("INS", now(), user(), new.wWorkOrderID, new.wStartDate, new.wEndDate, new.wTyp, new.WdNr);
			end;
//
delimiter ;

#Trigger som automatiskt loggar deletes i workOrder-tabellen
delimiter //

	create trigger workOrderDeleteLog after delete on workOrder
		for each row
			begin        
                insert into log_workOrder (log_operation, log_datum, log_user, log_wWorkOrderID, log_wStartDate, log_wEndDate, log_wTyp, log_WdNr)
					values ("DEL", now(), user(), old.wWorkOrderID, old.wStartDate, old.wEndDate, old.wTyp, old.WdNr);
			end;
//
delimiter ;

#Trigger som automatiskt loggar uppdateringar i report-tabellen
delimiter //

	create trigger reportUpdateLog before update on report
		for each row
			begin        
                insert into log_report (log_operation, log_datum, log_user, log_rID, log_rMail, log_rName, log_rDescr, log_probChoice, log_rOrt, log_rDate)
					values ("UPD", now(), user(), new.rID, new.rMail, new.rName, new.rDescr, new.probChoice, new.rOrt, new.rDate);
			end;
//
delimiter ;

#Trigger som automatiskt loggar nya insättningar i report-tabellen
delimiter //

	create trigger reportInsertLog after insert on report
		for each row
			begin
				
				set new.rDate = NOW();
				
                insert into log_report (log_operation, log_datum, log_user, log_rID, log_rMail, log_rName, log_rDescr, log_probChoice, log_rOrt, log_rDate)
					values ("INS", now(), user(), new.rID, new.rMail, new.rName, new.rDescr, new.probChoice, new.rOrt, new.rDate);
			
            end;
            
		
//
delimiter ;

#Trigger som automatiskt loggar deletes i report-tabellen
delimiter //

	create trigger reportDeleteLog after delete on report
		for each row
			begin        
                insert into log_report (log_operation, log_datum, log_user, log_rID, log_rMail, log_rName, log_rDescr, log_probChoice, log_rOrt, log_rDate)
					values ("DEL", now(), user(), old.rID, old.rMail, old.rName, old.rDescr, old.probChoice, old.rOrt, old.rDate);
			end;
//
delimiter ;
