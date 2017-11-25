CREATE TABLE registered (
  u_id int(11) NOT NULL,
  username varchar(16)  NOT NULL,
  phNo varchar(10)  NOT NULL,
  address varchar(100)  NOT NULL,
  dob date NOT NULL,
  PRIMARY KEY (u_id)
);

CREATE TABLE routes (
  rid int(11) NOT NULL,
  bid int(11) NOT NULL,
  fromCity varchar(20)  NOT NULL,
  toCity varchar(20)  NOT NULL,
  cost int(11) NOT NULL,
  dep_date date NOT NULL,
  dep_time time NOT NULL,
  arr_date date NOT NULL,
  arr_time time NOT NULL,
  availseats int(11) NOT NULL , 
  PRIMARY KEY (bid)
);

CREATE TABLE tickets (
  `Tid` int(11) NOT NULL,
  `BusID` int(11) NOT NULL,
  `noseats` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL ,
  PRIMARY KEY (Tid),
  FOREIGN KEY (BusID) REFERENCES routes(bid) 
);

CREATE TABLE wallet (
  uid int(10) NOT NULL DEFAULT '1',
  balance int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (uid),
  FOREIGN KEY (uid) REFERENCES registered(u_id)
);

CREATE TABLE payment (
  uid int(11) NOT NULL,
  pcode int(11) NOT NULL,
  cc int(20) NOT NULL ,
  PRIMARY KEY (uid,cc),
  FOREIGN KEY (uid) REFERENCES registered (u_id)
);

CREATE TABLE login (
  uID int(11) NOT NULL,
  username varchar(16)  NOT NULL,
  password varchar(25)  NOT NULL,
  PRIMARY KEY (uID),
  foreign key (uID) references registered(u_id)
);

INSERT INTO `registered` (`u_id`, `username`, `phNo`, `address`, `dob`) VALUES
(1, 'abz', '7019970219', 'Marathahalli, Bangalore-560980', '1997-03-15'),
(2, 'Arbaaz', '9980572645', 'E33/9 , CV RAMAN NAGAR', '2017-02-11'),
(3, 'Ankush', '7259240173', 'JP Nagar', '2018-01-11');

INSERT INTO `routes` (`rid`, `bid`, `fromCity`, `toCity`, `cost`, `dep_date`, `dep_time`, `arr_date`, `arr_time`, `availseats`) VALUES
(1, 1, 'Bangalore', 'Chennai', 500, '2017-11-30', '22:00:00', '2017-12-01', '06:00:00', 37),
(1, 2, 'Bangalore', 'Chennai', 500, '2017-11-30', '05:30:00', '2017-11-30', '12:00:00', 50),
(2, 3, 'Delhi', 'Kolkata', 400, '2017-10-28', '18:00:00', '2017-10-29', '06:00:00', 60),
(3, 4, 'Kolkata', 'Delhi', 350, '2017-10-30', '20:00:00', '2017-10-31', '08:00:00', 60);

INSERT INTO `login` (`uID`, `username`, `password`) VALUES
(1, 'abz', 'root123'),
(2, 'Arbaaz', 'root123'),
(3, 'Ankush', 'root123');

INSERT INTO `wallet` (`uid`, `balance`) VALUES
(1, 500),
(2, 1000),
(3, 3000);

INSERT INTO `payment` (`uid`, `pcode`, `cc`) VALUES
(1, 2110, 174656729),
(2, 1234, 163453790),
(3, 3333, 235326236);



