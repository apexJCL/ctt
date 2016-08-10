# Documentación de la base de datos

> Ultima edición por:
> *José Carlos López, 23 de Julio del 2016*

### Información básica

| DBMS            | Usuario | Constraseña | Colación |
|-----------------|---------|-------------|----------|
| MariaDB / MySQL | ctt | j4cr012msls01nfk | UTF-8 (Spanish CI) |
 
### Tablas

Aquí va una descripción de las tablas que conforman la base de datos, así como su función y/o relación con otras.
**Se omiten las llaves primarias por comodidad**


###### Usuario

Esta tabla contiene los datos de los usuarios que tienen acceso a la aplicación, junto con algunos datos esenciales, así como un correo electrónico para recuperación de contraseña.

| Atributo              | Tipo de dato  | Descripción |
|---|---|---|
| **nombre**            | VARCHAR(30)   | Nombre del usuario |
| **apellido_paterno**  | VARCHAR(30)   | Apellido paterno del usuario |
| **apellido_materno**  | VARCHAR(30)   | Apellido materno del usuario |
| **email**| VARCHAR(50)   | Dirección de correo del usuario |
| **username**          | VARCHAR(30)   | Nombre de usuario, único, que lo identifica de manera corta en la aplicación |

###### Roles

Esta tabla contiene los roles disponibles para la aplicación.

| Atributo          | Tipo Dato     | Descripción | 
|---|---|---|
| rol               | VARCHAR(30)   | Nombre del rol |
| descripcion       | VARCHAR(100)  | Descripción de la función del rol especificado |

###### Permisos

Esta tabla define los permisos básicos que puede haber en la aplicación, así como pueden ser básicos, hasta una colección de varios englobada con una sola definición.

| Atributo          | Tipo Dato     | Descripción | 
|---|---|---|
| permiso           | VARCHAR(50)   | Nombre del permiso |
| descripcion       | VARCHAR(100)  | Descripción del permiso | 

###### Rol Permisos

Esta tabla contiene la relaciones de rol y sus respectivos permisos sobre la plataforma

| Atributo          | Tipo Dato     | Descripción | 
|---|---|---|
| rol_id            | int   | ID del rol |
| permiso_id        | int   | ID del permiso |

###### Usuario Roles

Esta tabla contiene la relación entre los usuarios y los roles que les corresponden y están asignados en la aplicación.

| Atributo          | Tipo Dato     | Descripción | 
|---|---|---|
| rol_id            | int   | ID del rol |
| usuario_id        | int   | ID del usuario |


###### Clientes

Esta tabla contiene la información básica de los clientes.

| Atributo          | Tipo Dato     | Descripción | 
|---|---|---|
| nombre | VARCHAR(50) |   Nombre del cliente |
| apellido_paterno | VARCHAR(50)    | Apellido Paterno del cliente |
| apellido_materno | VARCHAR(50)    | Apellido Materno del cliente |
| email            | VARCHAR(50)    | Dirección de correo electrónico (única por ahora) |
