USE uclases;

SELECT c.cursoid, c.nombre, c.costo, c.descripcion, c.imagen, a.nombre as area, i.nombrecompleto as instructor, i.instructorid as instructorid
FROM cursos as c, area as a, instructor as i
WHERE  c.estado=1
AND c.areaid=12 = a.areaid
AND c.instructorid = i.instructorid
AND c.costo = c.costo
AND c.descripcion = c.descripcion
AND c.imagen = c.imagen

SELECT c.cursoid, c.nombre, c.imagen, a.nombre as area, i.nombrecompleto as instructor, i.instructorid as instructorid
FROM cursos as c, area as a, instructor as i
WHERE  c.estado=1
AND c.areaid = a.areaid
AND c.instructorid =1 = i.instructorid


SELECT c.cursoid, c.nombre, i.foto, i.especialidad, i.nombrecompleto as instructor, i.instructorid as instructorid
FROM instructor AS i , cursos AS c
WHERE i.instructorid = 2
AND c.instructorid = i.instructorid
AND c.estadoId = 1

SELECT w.usuarioid AS ID, w.nombreusuario AS Usuario, w.email AS Email, y.Nombre AS Estado, t.nombre AS Rol
FROM usuario AS w, estado AS y, tipousuario AS t 
WHERE w.estado = y.estadoId
AND w.tipousuario = t.tipoUsuarioId

/*TABLAS CURSOS */
SELECT c.cursoid, c.nombre, c.costo, c.descripcion, c.imagen, a.nombre as area, i.nombrecompleto as instructor
FROM cursos as c, area as a, instructor as i
WHERE c.estadoId=1
AND c.areaid = a.areaid 
AND c.instructorid = i.instructorid
AND c.costo = c.costo
AND c.descripcion = c.descripcion
AND c.imagen = c.imagen

/* TABLA USUARIOS*/ 
SELECT w.usuarioid AS ID, w.nombreusuario AS Usuario, w.email AS Email, y.Nombre AS Estado, t.nombre AS Rol
FROM usuario AS w, estado AS y, tipousuario AS t 
WHERE w.estado = y.estadoId
AND w.tipousuario = t.tipoUsuarioId

/* TABLA CURSOS SelectAll*/				

SELECT c.cursoid, c.nombre, c.costo, c.descripcion, c.imagen, a.nombre as area, i.nombrecompleto as instructor
FROM cursos as c, area as a, instructor as i
WHERE c.estadoId=1
AND c.areaid = a.areaid 
AND c.instructorid = i.instructorid
AND c.costo = c.costo
AND c.descripcion = c.descripcion
AND c.imagen = c.imagen 

/* TABLA INSTRUCTOR SelectById*/
SELECT c.cursoid, c.nombre, i.foto, i.especialidad, i.nombrecompleto as instructor, i.instructorid as instructorid
FROM instructor AS i , cursos AS c
WHERE i.instructorid = 1
AND c.instructorid = i.instructorid
AND c.estadoId=1

SELECT * FROM instructor

/* Tabla instructor SelectAll*/
SELECT i.instructorid AS ID, i.nombrecompleto AS instructor, i.especialidad AS Especialidad, i.foto AS Foto,
e.Nombre AS Estado
FROM instructor AS i, estado AS e
WHERE i.estadoId = e.estadoId

/* TABLA CURSOS SelectAllWith*/
SELECT c.cursoid, c.nombre, c.costo, c.descripcion, c.imagen, a.nombre as area, e.Nombre AS Estado , i.nombrecompleto as instructor
FROM cursos as c, area as a, instructor AS i, estado AS e
WHERE  c.areaid = a.areaid 
AND c.instructorid = i.instructorid
AND c.costo = c.costo
AND c.descripcion = c.descripcion
AND c.estadoId = e.estadoId
AND c.imagen = c.imagen

SELECT c.cursoid, c.nombre, c.costo, c.descripcion, c.imagen, a.nombre as area, i.nombrecompleto as instructor
FROM cursos as c, area as a, instructor as i
WHERE c.areaid = a.areaid 
AND c.instructorid = i.instructorid
AND c.costo = c.costo
AND c.descripcion = c.descripcion
AND c.imagen = c.imagen

SELECT * FROM area WHERE estadoId=1

SELECT c.areaid AS ID, c.nombre AS Nombre, c.imagen AS Imagen, c.descripcion AS Descripcion, e.Nombre AS Estado
FROM area AS c, estado AS e
WHERE c.estadoId = e.estadoId


/* tabla cursos SelectById*/			  
SELECT c.cursoid, c.nombre, c.costo, c.descripcion, c.imagen, a.nombre as area, i.nombrecompleto as instructor, i.instructorid as instructorid
FROM cursos as c, area as a, instructor as i
WHERE c.estadoId=1
AND c.areaid = ?
AND c.areaid = a.areaid 
AND c.instructorid = i.instructorid
AND c.costo = c.costo
AND c.descripcion = c.descripcion
AND c.imagen = c.imagen

/*Tabla instructor SelectById*/			   
SELECT c.cursoid, c.nombre, i.foto, i.especialidad, i.nombrecompleto as instructor, i.instructorid as instructorid
FROM instructor AS i , cursos AS c
WHERE i.instructorid = 1
AND c.instructorid = i.instructorid
AND c.estadoId=1

/* TABLA USUARIOS SelectAllWith*/	        
SELECT w.usuarioid AS ID, w.nombreusuario AS Usuario, w.email AS Email, y.Nombre AS Estado, t.nombre AS Rol
FROM usuario AS w, estado AS y, tipousuario AS t 
WHERE w.estado = y.estadoId
AND w.tipousuario = t.tipoUsuarioId

/* TABLA USUARIOS SelectByRol*/            
SELECT w.usuarioid AS ID, w.nombreusuario AS Usuario, y.Nombre AS estado, w.tipousuario AS Rol
FROM usuario AS w, estado AS y, tipousuario AS t 
WHERE w.tipousuario = 1
AND w.estado = y.estadoId
AND w.tipousuario = t.tipoUsuarioId

/* TABLA USUARIOS: Select*/
SELECT * FROM usuario WHERE email="miguel@email.com" AND clave="1234" AND estado=1


/* Tabla cursosdeusuario */
SELECT * FROM cursosdeusuario

SELECT c.compraId, c.cursoId, c.usuarioId, b.nombre, b.imagen, b.costo
FROM	 cursosdeusuario AS c, cursos AS b
WHERE	 c.usuarioId = 1

/* cursosdeusuarios CONSULTA: Select*/
SELECT * FROM cursosdeusuario

SELECT c.compraId, c.cursoId, c.usuarioId, b.nombre, b.imagen, b.costo
FROM	 cursosdeusuario AS c, cursos AS b, usuario AS u
WHERE	c.usuarioId = 69
AND b.estadoid = 1
AND c.cursoId = b.cursoid
AND c.usuarioId = u.usuarioid