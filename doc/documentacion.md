# Documentación aplicación CTT

_José Carlos López, 23 de Julio del 2016_

Este documento funge como un reglamento básico para la documentación del desarrollo de la aplicación, en la cual se definen aspectos básicos, tales como redacción de este mismo documento, junto con signos que ayuden a saber si una característica fue implementada, está en proceso o ha sido descartada.

A lo largo de los distintos documentos de esta bitácora, podrá encontrarse con lo siguiente:

-   Elementos que terminen en **(?)**: Estos quieren decir que son características que pueden ser consideradas y después aprobadas a seguir o descartarse.

Algunos documentos engloban ciertos aspectos de la aplicación, tales como:

-   Base de datos
-   Elementos de la aplicación
-   Elementos técnicos de la aplicación
-   Sugerencia e instrucciones para los frameworks incorporados en la misma

# Elementos del proyecto

Este proyecto está realizado con las siguientes herramientas:

-   Yii2 PHP Framework
-   Composer
-   Node.js
-   Sass
-   MaterializeCSS

# Datos del servidor de producción

La aplicación se encuentra alojada en [SistemaCTT](http://sistemactt.com)

Datos de acceso:

-   Usuario: root
-   Contraseña: CTTExp_1337

Configurado como servidor de producción, para actualizar el proyecto, sólo hay que hacer **push** de la rama **master** del repositorio oficial (este) y solo se aplicarán los cambios.

_Pendiente: Actualizar WebHook de GitHub para cuando se hagan cambios en Master, SistemaCTT automáticamente haga **pull** a la rama_
