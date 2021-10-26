# Actividad lenguaje PHP: Meme generator

La actividad consiste en crear un sistema de creación de memes para una comunidad de usuarios.  

#### Requisitos:  
1. CRUD usuarios
2. Autenticación de usuarios
3. Cada usuario tendrá una lista de memes personalizados
4. Los memes podrán ser generados a través de:
	- Peticiones usando [cUrl](https://www.php.net/manual/es/book.curl.php) a una API externa: [imgflip.com](https://imgflip.com/api) 
	- Descargando imágenes y usando librería [GD](https://www.php.net/manual/es/book.image.php)
5. Los usuarios podrán añadir, borrar y filtrar memes por su denominación  

#### Entrega:
La entrega será a través del pull request de este repositorio.  

Es importante incluir un archivo .sql con las sentencias para crear las tablas y datos necesarios para el funcionamiento correcto de la aplicación.  

#### Items de evaluación:
###### OBLIGATORIOS:  
- [ ] CRUD Usuarios  
- [ ] Login/logout  
- [ ] Control de sesión de usuario  
- [ ] Creación de memes  
	- [ ] Listado de memes disponibles  
	- [ ] Ajuste de literales según el meme  
	- [ ] Visualización de la imagen generada  
- [ ] Listado de memes creados por un usuario

###### OPCIONALES:
- [ ] Filtro de memes por denominación
- [ ] Foto de perfil de usuario
- [ ] Estilo y diseño frontend
- [ ] Uso de otras API o librerías

#### Plazo:
1. Primera revisión: 29/10/2021
2. Entrega: 05/11/2021

#### Ejemplos de código usando API:
[Obtener listado de memes](codigophp/ejemplos/recibir-json.php)  
[Crear un meme](codigophp/ejemplos/peticion-post.php)  

#### Ejemplos de código usando librería GD:
[Subir una imagen](codigophp/ejemplos/sube-imagen.php)   
[Subida archivos w3Schools](https://www.w3schools.com/php/php_file_upload.asp)   
[Devolver una imagen con texto](codigophp/ejemplos/imagen-mod.php)   
[Usar imagen modificada](codigophp/ejemplos/muestra-imagen.php)  
 

###### NOTA: Asegúrate haber hecho ```docker pull fjortegan/dwes:php```
