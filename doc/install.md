# Instalación

## Requisitos

- Git
- Servidor Web Apache
- PHP v5.4 (mínimo)

## Configurando dependencias

### Git

Primero instale git para poder proceder con el proyecto, lo puede descargar [aqui](https://git-scm.com/downloads) Ahora bien, también puede usar la versión gráfica ofrecida por GitHub, llamada (GitHub Desktop)[<https://desktop.github.com/>]

## Instalando Proyecto

### Prerequisitos

Si no ha instalado o usado Yii2 antes en el servidor, siga las instrucciones de instalación del plugin necesario en la página oficial de Yii. Este plugin sirve para poder descargar dependencias de **bower**, entre otros, usando sólo Composer.

### Obteniendo el proyecto

Clone el repositorio en su raíz de documentos

```
git clone https://github.com/apexJCL/ctt_mockup.git
```

### Configurando el servidor

**Esta configuración es para Apache, si usted tiene otro servidor, favor de seguir pasos similares para su servidor**

Primero asegúrese de que esté habilidato **mod_rewrite** y se permita el uso de archivos **.htaccess** Agregue esto a su configuración de **vhosts**:

```
<VirtualHost admin.ctt.com>
    DocumentRoot "C:\xampp\htdocs\ctt\backend\web"
    ServerName localhost
    ServerAlias admin.ctt.com
    Options +FollowSymlinks
</VirtualHost>

<VirtualHost ctt.com>
    DocumentRoot "C:\xampp\htdocs\ctt\frontend\web"
    ServerName localhost
    ServerAlias ctt.com
    Options +FollowSymlinks
</VirtualHost>
```

Después agregue a su archivo de **hosts** las siguientes líneas:

```
127.0.0.1 ctt.com admin.ctt.com

Windows: C:\Windows\System32\drivers\etc\hosts
Linux: /etc/hosts
```

### Configurando el proyecto

#### Inicialización

Para inicializar el proyecto, ejecute **init** en el directorio raíz del proyecto:

```bash
Si está en Windows:
init

Si está en *nix:
./init
```

Aquí siga las instrucciones que vayan acorde a su entorno, ya sea producción o desarrollo.

### Base de Datos

Cree una base de datos en MySQL/MariaDB con las características encontradas en **base_datos.md**, mismo nombre, colación, usuario y contraseña.

Después, ejecute las migraciones para preestablecer Yii:

```bash
Si está en Windows:

yii migrate

Si está en *nix:
./yii migrate
```

### Dependencias del proyecto

Yii2 hace manejo de dependencias, tales como librerías, plugins, etc, a través de **Composer**, para esto, ejecutemos el siguiente comando para instalar/actualizar las mismas:

```
composer update
```

El proyecto debería estar funcionando por ahora

### Darse de alta

Visite [este link](http://ctt.com/site/signup) para dar de alta un usuario nuevo para acceder a la aplicación.
