# CRUD Básico PHP-PDO
Crud de imagenes en php.
------------

HERRAMIENTAS :
- Base de Datos: MySQL.
- Estilos: CSS3 y Bootstrap 4.
- Lenguaje : Lenguaje PHP.

## Arquitectura MVC
1. MODELO: representación de los datos que maneja el sistema, su lógica de negocio, y sus mecanismos de persistencia.
2. VISTA: Información que se envía al cliente y los mecanismos interacción con éste.
3. CONTROLADOR: intermediario entre el Modelo y la Vista, gestionando el flujo de información entre ellos y las transformaciones para adaptar los datos a las necesidades de cada uno.

## Imagenes
Vitas:
- 1
![1](https://user-images.githubusercontent.com/68178186/101994904-1f20c600-3c94-11eb-8d8e-cf65c412638b.PNG)
- 2
![2](https://user-images.githubusercontent.com/68178186/101994906-234ce380-3c94-11eb-9a36-43f24bc02d89.PNG)
- 3
![3](https://user-images.githubusercontent.com/68178186/101994907-25af3d80-3c94-11eb-9a14-5eb60e8c6df7.PNG)
- 4
![4](https://user-images.githubusercontent.com/68178186/101994911-28119780-3c94-11eb-92b3-76592e221d54.PNG)
- 5
![6](https://user-images.githubusercontent.com/68178186/101995056-301e0700-3c95-11eb-8358-6e5c87e64526.PNG)
- 5
![5](https://user-images.githubusercontent.com/68178186/101994914-2b0c8800-3c94-11eb-9a49-43c39722531d.PNG)


### SCRIPT DE LA BASE DE DATOS
```sql
CREATE DATABASE Zapatosphp DEFAULT CHARACTER SET UTF8;
SET default_storage_engine = INNODB;

USE Zapatosphp;


#TABLE USUARIOS 
create table dboUsuarios(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(40) NOT NULL,
    email VARCHAR(200) NOT NULL,
    pass VARCHAR(255)  NOT NULL
)ENGINE=InnoDB default charset=UTF8MB4;

 
#TABLE TALLA
create table dbotalla(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    talla VARCHAR(45)  NOT NULL
)ENGINE=InnoDB default charset=utf8mb4;


#TABLE STYLES
create table dboestilo(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    estilo VARCHAR(45) NOT NULL
)ENGINE=InnoDB default charset=utf8mb4;


#TABLE GENERO
create table dbogenero(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    genero VARCHAR(45) NOT NULL
)ENGINE=InnoDB default charset=utf8mb4;


create table dbozapato(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    foto VARCHAR(50)  NOT NULL, #originalname
    precio DOUBLE     NOT NULL,
    color VARCHAR(45) NOT NULL,
    cantidad INT      NOT NULL, 
    id_dboUsuarios INT(11) NULL, #foreing key dboUsuarios
  
    dboestilo_id INT NOT NULL, #foreign key tables
    dbotalla_id  INT NOT NULL, #foreign key tables
    dbogenero_id INT NOT NULL, #foreign key tables
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB default charset=utf8mb4;

UPDATE dbozapato SET foto=? , precio=? , color=? , cantidad=? , 
                              id_dboUsuarios=? , dboestilo_id=? ,
                              dbotalla_id=? , dbogenero_id=? WHERE id=?;

INSERT INTO dbozapato(foto,precio,color,cantidad,id_dboUsuarios,dboestilo_id,dbotalla_id,dbogenero_id) 
VALUES('coffe.jpg',123,'negro',10,NULL,1,2,1);


#----------------------------------------------------------------------
#LLAVES UNICAS
#----------------------------------------------------------------------
ALTER TABLE dboUsuarios
ADD CONSTRAINT UK_idUsuario UNIQUE KEY(id);

ALTER TABLE dbotalla
ADD CONSTRAINT UK_idtalla UNIQUE KEY(id);

ALTER TABLE dboestilo
ADD CONSTRAINT UK_idestilo UNIQUE KEY(id);

ALTER TABLE dbogenero
ADD CONSTRAINT UK_idgenero UNIQUE KEY(id);

ALTER TABLE dbozapato
ADD CONSTRAINT UK_id_zapato UNIQUE KEY(id);



#----------------------------------------------------------------------
#LLAVES FORANEAS
#----------------------------------------------------------------------
 ALTER TABLE dbozapato
 ADD CONSTRAINT FK_dboestilo_idestilo FOREIGN KEY (dboestilo_id) 
 REFERENCES `dboestilo`(id);

 ALTER TABLE dbozapato
 ADD CONSTRAINT FK_dbotalla_idtalla FOREIGN KEY (dbotalla_id) 
 REFERENCES `dbotalla`(id);

 ALTER TABLE dbozapato
 ADD CONSTRAINT FK_dbogenero_idgenero FOREIGN KEY (dbogenero_id)
 REFERENCES `dbogenero`(id);

 ALTER TABLE dbozapato
 ADD CONSTRAINT FK_idUser FOREIGN KEY (id_dboUsuarios)
 REFERENCES `dboUsuarios`(id);
#----------------------------------------------------------------------

#----------------------------------------------------------------------
#PAGINACION
 SELECT * FROM dbozapato WHERE user_id=1  LIMIT 9 OFFSET 0;
#----------------------------------------------------------------------
						
#----------------------------------------------------------------------
#LLAVES FORANEAS
#----------------------------------------------------------------------
 INSERT INTO dbotalla(talla) VALUES('45');
 INSERT INTO dbotalla(talla) VALUES('44');
 INSERT INTO dbotalla(talla) VALUES('43');
 INSERT INTO dbotalla(talla) VALUES('42');
 INSERT INTO dbotalla(talla) VALUES('41');
 INSERT INTO dbotalla(talla) VALUES('40');
 INSERT INTO dbotalla(talla) VALUES('39');
 INSERT INTO dboestilo(estilo) VALUES('Zapatilla');
 INSERT INTO dboestilo(estilo) VALUES('Zandalia');
 INSERT INTO dboestilo(estilo) VALUES('Zapato de gala');
 INSERT INTO dboestilo(estilo) VALUES('Zapato');
 INSERT INTO dbogenero(genero) VALUES('Femenino');
 INSERT INTO dbogenero(genero) VALUES('Masculino');
 INSERT INTO dbousuarios(nombre,email,pass) VALUES('Eduardo','eduardo@gmail.com','anthony123');
 USE Zapatos;
#----------------------------------------------------------------------




#----------------------------------------------------------------------
#LLAVES FORANEAS
#----------------------------------------------------------------------
 SELECT * FROM dboestilo;
 SELECT * FROM dbotalla;
 SELECT * FROM dbogenero;
 SELECT * FROM dbozapato;
 SELECT * FROM dbousuarios;
 SELECT * FROM dbozapato WHERE id =1;
 SELECT * FROM dboUsuarios WHERE id =1;
 SELECT * FROM dboUsuarios WHERE email = '111@gmail.com'
 SELECT path FROM dbozapato WHERE id =  1;
#----------------------------------------------------------------------


#----------------------------------------------------------------------
#DELETE
#----------------------------------------------------------------------
 DELETE FROM dbozapato WHERE id = 1
 DELETE FROM dboUsuarios WHERE id = 1;
#----------------------------------------------------------------------



#----------------------------------------------------------------------
#PROCEDIMIENTOS ALMACENADOS
#----------------------------------------------------------------------
 DELIMITER $$
 CREATE PROCEDURE obtenerZapatosPorId(IN pro_id INT)
 BEGIN
    SELECT * 
    FROM dbozapato
    WHERE id = pro_id;
 END
 $$

 CALL obtenerZapatosPorId(1);
#----------------------------------------------------------------------






#----------------------------------------------------------------------
#UPDETE ZAPATOS
#----------------------------------------------------------------------
UPDATE dbozapato SET  precio = '11.00',
                      color = 'color nuevo',
                      cantidad = '20',
                      dboestilo_idestilo = '1',
                      dbotalla_idtalla = '1',
                      dbogenero_idgenero  = '1'
                      WHERE id_zapato = '37';
#----------------------------------------------------------------------


#----------------------------------------------------------------------
#CONSULTAS
#----------------------------------------------------------------------
SELECT z.id, z.foto ,z.precio, z.color, e.estilo, t.talla, g.genero, z.cantidad 
                           FROM dbozapato z 
                           INNER JOIN dboestilo e on z.dboestilo_id = e.id
                           INNER JOIN dbotalla t on z.dbotalla_id = t.id
                           INNER JOIN dbogenero g ON z.dbogenero_id = g.id;
#----------------------------------------------------------------------
```
