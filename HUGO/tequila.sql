drop database if exists tequila;
create database tequila;
use tequila;
 
create table trabajador(
id int (10) not null primary key auto_increment,
nombre varchar (100) not null,
apellido varchar (100) not null,
cargo varchar (100) not null,
edad int (10) not null,
telefono int (10) not null
);

create table comprador (
id int (10) not null primary key auto_increment,
nombre varchar (100) not null,
apellido varchar (100) not null,
telefono int (10) not null
);

create table catalogo (
id int (10) not null primary key auto_increment,
stock int (10) not null,
disponible int (10) not null
);

create table producto (
id int (10) not null primary key auto_increment,
nombre varchar (100) not null,
precio varchar (100) not null,
categoria varchar (100) not null,
proveedor varchar (100) not null,
id_catalogo int(10) not null,
foreign key (id_catalogo) references catalogo(id)
);

create table venta (
id int (10) not null primary key auto_increment,
fecha varchar(100) not null,
cantidad int (10) not null,
total int (10) not null,
numeroventa int (10) not null,
id_trabajador int(10) not null,
id_producto int(10) not null,
id_comprador int(10) not null,
foreign key (id_trabajador) references trabajador(id),
foreign key (id_producto) references producto(id),
foreign key (id_comprador) references comprador(id)
);

  insert into  comprador values (null,'Ilse Gabriela','Illan Gutierrez','9711004101');
  insert into  comprador values (null,'Jose Antonio','Uzcayna Albaro','9717292494');
   
  insert into  catalogo values (null,'50','78');
  insert into  catalogo values (null,'48','35');
  
  insert into  trabajador values (null,'Esmeralda','Rueda Leon','Empleada de mostrador','20','9711592940');
  insert into  trabajador values (null,'Dana Paola','Santiago Díaz','Almacenista','19','9711377756');

  insert into  producto values (null,'TEQUILA PREMIUM AÑEJO','1500','TEQUILA EDICION ESPECIAL','TEQUILAS DE MEXICO CONDESA', '1');
  insert into  producto values (null,'TEQUILA PREMIUM BLANCO','1700','TEQUILA EDICION LIMITADA','TEQUILAS DE MEXICO POLANCO', '1');

  insert into venta values (null,'11/11/2011','1','1500','001','1','1','1');
  insert into venta values (null,'12/12/2012','1','1700','001','2','2','2');
