# RBAC

El sistema de **Role-Based Access Control** está implementado via Yii2 y su uso de objetos y migraciones adecuadas al mismo.

Se creó una interfaz para poder administrar:

-   Roles
-   Permisos
-   Roles y sus hijos
-   Roles y sus permisos

# Implementación de los permisos y el filtro

Una sección de la aplicación está dirigida por un **controlador**, el cual tiene:

-   Nombre
-   Acciones

Un ejemplo sería:

-   Nombre: **client**
-   Acción: **view**

De esta manera, con una combinación de ambos parámetros, tenemos denominaciones de permisos _naturales_, porque son determinados por la acción del controlador y el nombre del mismo. Es por eso que se optó que para la creación, validación y aplicación de permisos, por la siguiente nomenclatura:

```
<accion><nombre controlador capitalizado>
```

Esto nos da como resultado, permisos de la siguiente manera:

**Controlador**: Client

**Acciones**:

-   index
-   view
-   update
-   create
-   delete

**Permisos resultantes:**

-   indexClient
-   viewClient
-   updateClient
-   createClient
-   deleteClient

Asi pues, se declara en en controlador el siguiente código para que, antes de realizar cualquier acción, se verifique que:

-   El usuario está logueado
-   El usuario cuenta con los permisos necesarios (los cuales hereda de los roles asignados)

Se usa el siguiente código para esto (_nota: se pone todo el método para dar contexto de donde va, más no es necesario agregarlo todo, sólo las líneas pertinentes_):

```php
public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'view'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return RBACHelper::hasAccess($action);
                        }
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
```

Aquí lo que hay que notar, es en la sección **rules**, la cual nos indica que son reglas a aplicar, en este caso se le dice que:

-   Es una regla para conceder acceso
-   Las acciones en las que la regla entrará en función son las que se denominen ahí, en este caso, esas son las que _por ahora_ han sido puestas a condición.
-   Los roles que pueden acceder (aquí se le dice @, que quiere decir que cualquier usuario que tenga su sesión abierta)
-   Por último, se asigna una función que se ejecutará en cuanto se intente acceder a alguno de estos métodos, en esta se manda llamar una función estática que devolverá si se tiene acceso o no a la aplicación o a alguna sección.

Esa función contiene lo siguiente:

```php
public static function hasAccess($action)
    {
        return Yii::$app->user->can($action->id . ucfirst($action->controller->id))
        || User::hasRole(Yii::$app->user->id, 'root');
    }
```

Aquí devuelve cierto si o sí:

-   El usuario tiene los permisos necesarios
-   El usuario tiene el rol

Suponiendo un caso prueba, con el controlador que se usó previamente de ejemplo y la acción **create**, la función se está evaluando de la siguiente manera:

```
Yii::$app->user->can(cadenaPermiso);

donde cadena permiso:

createClient = acción + nombre capitalizado del controlador
```

Así pues, si el usuario cuenta con el permiso, se devuelve cierto y se permite que el usuario prosiga con la acción.

Del otro modo, se evalua si el usuario tiene el rol de **root**, que en esta situación, es aquel que tiene acceso a todo.

## Reglamento para los permisos

Si se crea un nuevo controlador, y se quiere implicar el uso del RBAC, para los permisos que se puede tener, se debe seguir la nomenclatura previamente nombrada.

Cabe hacer énfasis en que esto se ajusta de manera firme al esquema de trabajo de la aplicación, ya que un usuario no es propietario de un cliente, o de un catálogo, sino que todos trabajan en conjunto, además de que también se aplican restricciones de acceso y modificación de datos.

## Trabajando con migraciones

Al dar de alta una migración, por lo regular es para crear una nueva tabla con sus atributos y además crear un CRUD, el cual, como se viene mencionando, requiere permisos.
Para esto, se proporciona una clase llamada **Defaults**, la cual cuenta con dos métodos muy útiles a aplicar durante la migración:

-   `addDefaultPermissions($name)`
-   `deletePermissions($name)`

Estos métodos reciben 1 parámetro, el cual es el nombre de la tabla que se está usando. El primer método lo que hace es crear los permisos por defecto, tales como **create, index, view, update, delete**, mientras que el segundo método elimina los permisos.

Esto es sólo hablando de cosas por defecto, si el controlador ocupará más permisos que esos, o no ocupará algunos, es menos trabajo eliminar/agregar/editar los permisos a estar dando de alta cada uno a mano.
