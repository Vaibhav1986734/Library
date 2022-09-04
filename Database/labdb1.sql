
CREATE TABLE banner (
  bannerid int(10) PRIMARY KEY,
  bannername varchar(50) NOT NULL,
  photo varchar(100) DEFAULT NULL
) 

INSERT INTO banner (bannerid, bannername, photo) VALUES
(100, 'Banner-1', './images/slider/100.jpg'),
(101, 'Banner-2', './images/slider/101.jpg'),
(102, 'Banner-3', './images/slider/102.jpg'),
(103, 'Banner-4', './images/slider/103.jpg'),
(104, 'Banner-5', './images/slider/104.jpg'),
(105, 'Banner-6', './images/slider/105.jpg');


CREATE TABLE book (
  bno int(11) PRIMARY KEY,
  bname varchar(50) NOT NULL,
  author varchar(30) NOT NULL,
  pcation varchar(50) NOT NULL,
  branchid int(11) DEFAULT NULL,
  price decimal(10,2) NOT NULL,
  qtity int(10) NOT NULL,
  photo varchar(50) NOT NULL,
  qrcode varchar(50) NOT NULL
) 


INSERT INTO book (bno, bname, author, pcation, branchid, price, qtity, photo, qrcode) VALUES
(101, 'java ', 'Priyam Tayal', 'sharthak Publication', 6, '300.00', 3, 'images/newbook/101.jpg', 'images/qrcode/101.jpg'),
(102, 'Math-3rd', 'Balram ', 'sharthak Publication', 6, '4800.00', 24, 'images/newbook/102.jpg', 'images/qrcode/102.jpg'),
(103, 'Data Structure Using C', 'P.L. Goyal', 'sharthak Publication', 6, '300.00', 5, 'images/newbook/103.jpg', 'images/qrcode/103.jpg'),
(104, 'D.B.M.S.', 'Mishra ', 'Sarthak Publication', 7, '500.00', 20, 'images/newbook/104.jpg', 'images/qrcode/104.jpg'),
(105, 'Math-2nd', 'Balram ', 'sharthak Publication', 1, '4800.00', 24, 'images/newbook/105.jpg', 'images/qrcode/105.jpg'),
(106, 'Math-1st', 'Balram ', 'sharthak Publication', 2, '4800.00', 24, 'images/newbook/106.jpg', 'images/qrcode/106.jpg');


CREATE TABLE branches (
  branchid int(20) PRIMARY KEY,
  branchname varchar(50) NOT NULL
) 



INSERT INTO branches (branchid, branchname) VALUES
(1, 'Civil'),
(2, 'Mechanical (Auto)'),
(3, 'Mechanical (Production)'),
(4, 'Electronics'),
(5, 'Electrical'),
(6, 'Information Technology'),
(7, 'P.G.D.C.A'),
(8, 'P.G.D in Web Designing'),
(9, 'P.G.D in Computer Hardware  & Network'),
(10, 'P.G.D in Mass Communication'),
(11, 'Library Science'),
(12, 'Plastic Mould  Technology'),
(13, 'Architecture');


CREATE TABLE contact (
  cid int(10) PRIMARY KEY,
  name varchar(50) NOT NULL,
  mail varchar(20) NOT NULL,
  mno varchar(25) NOT NULL,
  address varchar(100) NOT NULL,
  photo varchar(50) NOT NULL,
  mess varchar(50) NOT NULL
)

INSERT INTO contact (cid, name, mail, mno, address, photo, mess) VALUES
(1, 'Vaibhav Mishra', 'vm1986734@gmail.com', '6393026050', ' 227408 Narhi Bhanti kunwar Sultanpur', 'images/contactpic/3.jpg', 'Hello ...! \r\ni am vaibhav Mishra from sultanpur .'),
(2, 'Vishal Pandey', 'Pandey112gmail.com', '9919845197', 'Mahangupur Gonda U.P.', 'images/contactpic/2.jpg', 'hello...!\r\n i am vishal Pandey from Gonda.\r\n');


CREATE TABLE designation (
  designationid int(5) PRIMARY KEY,
  designationname varchar(50) NOT NULL
) 

INSERT INTO designation (designationid, designationname) VALUES
(1, 'H.O.D'),
(2, 'Lecturer'),
(3, 'WorkShop'),
(4, 'Principal'),
(5, 'Librarian');


CREATE TABLE faculties (
  facultid int(10) PRIMARY KEY,
  fusername varchar(50) DEFAULT NULL,
  fpassword varchar(50) DEFAULT NULL,
  facultname varchar(50) NOT NULL,
  femail varchar(100) NOT NULL,
  fcontact varchar(10) NOT NULL,
  fbranchid int(11) DEFAULT NULL,
  fdesignationid int(10) DEFAULT NULL,
  fqualificationid int(10) DEFAULT NULL,
  photo varchar(100) NOT NULL
)

INSERT INTO faculties (facultid, fusername, fpassword, facultname, femail, fcontact, fbranchid, fdesignationid, fqualificationid, photo) VALUES
(1, 'Soniya', '123', 'Soniya Verma', 'soniya123@gmail.com', '9856038897', 6, 1, 1, 'images/faculty/1.jpg');


CREATE TABLE feedback
 (
  uid int(10) PRIMARY KEY,
  uname varchar(50) NOT NULL,
  mail varchar(50) NOT NULL,
  sub text NOT NULL,
  umno varchar(25) NOT NULL,
  mess varchar(100) NOT NULL
) 

INSERT INTO feedback (uid, uname, mail, sub, umno, mess) VALUES
(1, 'Vaibhav MIshra', 'vm1986734@gmail.com', 'Propertys of form', '9919845197', 'Awesome'),
(2, 'Adarsh', 'adarshsingh072002@gmail.com', 'Contact', '9026449581', 'Hello I am Adarsh Singh , Awesome- contact form !'),
(3, 'Vishal Pandey', 'vp038811@gmail.com', 'Communication book', '9569852726', 'Hello ...!\r\nI am Vishal Panday from Gonda .your Banner activity is good .              ');


CREATE TABLE gallery (
  pid int(11) PRIMARY KEY,
  pdetails varchar(100) NOT NULL,
  gphoto varchar(50) NOT NULL
) 

INSERT INTO gallery (pid, pdetails, gphoto) VALUES
(1, '1', './images/gallery/1.jpg'),
(2, '2', './images/gallery/2.jpg'),
(3, '3', './images/gallery/3.jpg'),
(4, '4', './images/gallery/4.jpg'),
(5, '5', './images/gallery/5.jpg');



CREATE TABLE publisher (
  pno int(11) PRIMARY KEY,
  pname varchar(50) NOT NULL
) 

INSERT INTO publisher (pno, pname) VALUES
(100, 'Vaibhav Mishra'),
(101, 'Anubhav Mishra');


CREATE TABLE qualification (
  qualificationid int(3) PRIMARY KEY,
  qualificationname varchar(50) NOT NULL
)

INSERT INTO qualification (qualificationid, qualificationname) VALUES
(1, 'M.Tech.'),
(2, 'B.Tech'),
(3, 'M.A.'),
(4, 'M.Sc.'),
(5, 'P.H.D.'),
(6, 'Deploma'),
(7, 'B.Arch'),
(8, 'MURP'),
(9, 'M.Arch'),
(10, 'M.E.'),
(11, 'B.E.'),
(12, 'M.Sc.');


CREATE TABLE requestb (
  Reqid int(3) PRIMARY KEY,
  enrollNo varchar(20) NOT NULL,
  studnm varchar(50) NOT NULL,
  branchid int(3) DEFAULT NULL,
  yearid int(3) DEFAULT NULL,
  mobile varchar(10) NOT NULL,
  bname varchar(50) NOT NULL,
  idCard varchar(20) NOT NULL,
  status varbinary(1) NOT NULL
) 

INSERT INTO requestb (Reqid, enrollNo, studnm, branchid, yearid, mobile, bname, idCard, status) VALUES
(1, 'E2022013563035', 'Anubhav Pandey', 9, 23, '9026446787', 'math-1', 'images/idCard/1.jpg', 0x41),
(2, 'E2022013563035', 'Vikash Pandey', 6, 18, '6393026050', 'C.A.D.', 'images/idCard/2.jpg', 0x52),
(3, 'E2022013563035', 'Anubhav Pandey', 6, 16, '9026446787', 'C.S.-l', 'images/idCard/3.jpg', 0x41),
(4, 'E2022013563028', 'Vaibhav Mishra ', 6, 18, '6393026050', 'php', 'images/idCard/4.jpg', 0x4e),
(5, 'E2022013563029', 'Vishal Pandey', 6, 18, '9569852726', 'Python', 'images/idCard/5.jpg', 0x4e);


CREATE TABLE student (
  sid int(3) PRIMARY KEY,
  enrollNo varchar(20) NOT NULL,
  studnm varchar(50) NOT NULL,
  branchid int(10) DEFAULT NULL,
  yearid int(10) DEFAULT NULL,
  mobile varchar(12) NOT NULL,
  spic varchar(50) NOT NULL,
  rfee varchar(50) NOT NULL,
  adhar varchar(50) NOT NULL
) 

INSERT INTO student (sid, enrollNo, studnm, branchid, yearid, mobile, spic, rfee, adhar) VALUES
(101, 'E2022013563035', 'Vaibhav Mishra', 6, 17, '6393026050', 'images/student/101.jpg', 'images/feepic/101.jpg', 'images/adharpic/101.jpg'),
(102, 'E2022013563036', 'Vishal Pandey', 6, 17, '9919845197', 'images/student/102.jpg', 'images/feepic/102.jpg', 'images/adharpic/102.jpg'),
(103, 'E2022013563037', 'Sachin Soni', 6, 17, '9079697987', 'images/student/103.jpg', 'images/feepic/103.jpg', 'images/adharpic/103.jpg');


CREATE TABLE users (
  username varchar(20) PRIMARY KEY,
  password varchar(20) NOT NULL,
  rolename varchar(20) DEFAULT NULL
)

INSERT INTO users (username, password, rolename) VALUES
('admin', 'admin', 'Administrator'),
('priyanka', '123', 'H.O.D.'),
('Soniya', '123', 'Faculty');


CREATE TABLE year (
  yearid int(11) PRIMARY KEY,
  yearname varchar(20) NOT NULL,
  branchid int(11) DEFAULT NULL
) 

INSERT INTO year (yearid, yearname, branchid) VALUES
(1, '1st year', 1),
(2, '2nd year', 1),
(3, '3rd Year', 1),
(4, '1st Year', 2),
(5, '2nd Year', 2),
(6, '3rd Year', 2),
(7, '1st Year', 3),
(8, '2nd Year', 3),
(9, '3rd Year', 3),
(10, '1st Year', 4),
(11, '2nd Year', 4),
(12, '3rd Year', 4),
(13, '1st Year', 5),
(14, '2nd Year', 5),
(15, '3rd Year', 5),
(16, '1st Year', 6),
(17, '2nd Year', 6),
(18, '3rd Year', 6),
(19, '1st Year', 7),
(20, '2nd Year', 7),
(21, '1st Year', 8),
(22, '2nd Year', 8),
(23, '1st Year', 9),
(24, '2nd Year', 9),
(25, '1st Year', 10),
(26, '2nd Year', 10),
(27, '1st Year', 11),
(28, '1st Year', 12),
(29, '2nd Year', 12),
(30, '3rd Year', 12),
(31, '1st Year', 13),
(32, '2nd Year', 13),
(33, '3rd Year', 13);
