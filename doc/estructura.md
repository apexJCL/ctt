# Estructura del proyecto

El proyecto está basado en la **plantilla avanzada de Yii**, la cual tiene las siguientes carpetas importantes:

-   backend: Aquí se ubica todo el sitio denominado **backend**
-   frontend: Aquí se ubica todo el sitio denominado **frontend**
-   common: Aquí se ubican archivos que son comunes para ambos proyectos
-   console: Aquí se ubican archivos para ser ejecutados por la utilidad de consola Yii
-   vendor: Aquí se ubica la descarga de las dependencias de Composer

## Backend/Frontend

Estas carpetas no son más que aplicaciones de Yii, las cuales tienen la estructura de la manera siguiente:

-   assets: Archivos de configuración de assets para Yii
-   config: Archivos de configuración de la aplicación, así como traducción de la UI
-   controllers: Controladores
-   models: Modelos
-   views: Vistas
-   web: Directorio raíz de la aplicación Yii, punto de inicio

### Carpeta Web

Dentro de esta carpeta, se encuentran algunos assets útiles para la misma aplicación, dentro de las siguientes carpetas:

-   assets: Directorio de publicación de assets para ser consumidos al ejecutar la aplicación
-   css: Ubicación de hojas de estilo por defecto para la aplicación
-   js: Ubicación de scripts por defecto para la aplicación
-   fonts: Fuentes defecto para la aplicación.
-   img: Imágenes por defecto para la aplicación.

Por ahora, las imágenes no tienen un estandar, por lo que los encabezados de prueba actual son los siguientes:

**Backend**: img/showcase/users.jpg **Frontend**: img/sections/user/background.jpg

Más delante se estandarizará la ubicación de fondos en backend al estilo del frontend, para discernir exáctamente los fondos de los encabezados de cada sección, así como la posibilidad de agregar una imagen para cada sub-sección del controlador actual (Ej: encabezado distinto para index/view/create/update)
