INSERT INTO db_book VALUES(1,'book1',12.34,'author1',5,3,1);
INSERT INTO db_book VALUES(2,'book2',56.78,'author2',2,3,1);
INSERT INTO db_book VALUES(3,'book3',90.12,'author3',10,2,1);
INSERT INTO db_book VALUES(4,'book4',34.56,'author4',12,3,2);
INSERT INTO db_book VALUES(5,'book5',78.90,'author5',5,2,2);
INSERT INTO db_book VALUES(6,'book6',12.34,'author6',30,1,3);
INSERT INTO db_book VALUES(7,'book7',56.90,'author2',17,3,4);
INSERT INTO db_book VALUES(8,'book8',33.44,'author7',2,1,3);

INSERT INTO db_customer VALUES(1,'lastname1','firstname1','334-001-001');
INSERT INTO db_customer VALUES(2,'lastname2','firstname2','334-002-002');
INSERT INTO db_customer VALUES(3,'lastname3','firstname3','334-003-003');
INSERT INTO db_customer VALUES(4,'lastname4','firstname4','334-004-004');

INSERT INTO db_employee VALUES(1,'lastname5','firstname5');
INSERT INTO db_employee VALUES(2,'lastname6','firstname6');
INSERT INTO db_employee VALUES(3,'lastname6','firstname9');

INSERT INTO db_order VALUES(1,1,1,'2016-8-1','2016-8-3',1);
INSERT INTO db_order VALUES(2,1,2,'2016-8-4',NULL,NULL);
INSERT INTO db_order VALUES(3,2,1,'2016-8-1','2016-8-4',2);
INSERT INTO db_order VALUES(4,4,2,'2016-8-4','2016-8-4',1);
INSERT INTO db_order VALUES(5,1,1,'2016-8-4','2016-8-5',1);
INSERT INTO db_order VALUES(6,4,2,'2016-8-4','2016-8-5',1);
INSERT INTO db_order VALUES(7,3,1,'2016-8-4','2016-8-4',1);

INSERT INTO db_order_details VALUES(1,1,2);
INSERT INTO db_order_details VALUES(4,1,1);
INSERT INTO db_order_details VALUES(6,2,2);
INSERT INTO db_order_details VALUES(7,2,3);
INSERT INTO db_order_details VALUES(5,3,1);
INSERT INTO db_order_details VALUES(3,4,2);
INSERT INTO db_order_details VALUES(4,4,1);
INSERT INTO db_order_details VALUES(7,4,1);
INSERT INTO db_order_details VALUES(1,5,1);
INSERT INTO db_order_details VALUES(1,6,2);
INSERT INTO db_order_details VALUES(1,7,1);

INSERT INTO db_shipper VALUES(1,'shipper1');
INSERT INTO db_shipper VALUES(4,'shipper4');
INSERT INTO db_shipper VALUES(2,'shipper2');
INSERT INTO db_shipper VALUES(3,'shipper3');

INSERT INTO db_subject VALUES(1,'category1');
INSERT INTO db_subject VALUES(2,'category2');
INSERT INTO db_subject VALUES(3,'category3');
INSERT INTO db_subject VALUES(4,'category4');
INSERT INTO db_subject VALUES(5,'category5');

INSERT INTO db_supplier VALUES(1,'supplier1','company1','company1','1111111111');
INSERT INTO db_supplier VALUES(2,'supplier2','company2','company2','2222222222');
INSERT INTO db_supplier VALUES(3,'supplier3','company3','company3','3333333333');
INSERT INTO db_supplier VALUES(4,'supplier4','company4','company4','4444444444');
