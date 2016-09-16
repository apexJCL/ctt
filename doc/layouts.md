# Layouts

Este archivo contiene una definición de los layouts que se han definido, así como sus diferentes parámetros y como usarlos.

## Contenido

1.  FAB button


### FAB Button

Este layout define un botón FAB (_flotante_), el cual contiene otros sub-botones, y que dependiendo del permiso que se les asigne, se hacen visibles o no.

Una forma de usarlo es a través del método `render` de las vistas de Yii2:

```php
$this->render('//layouts/_fab', $buttons)
```

donde `$buttons` es un arreglo, el cual contiene las definiciones de los botones, con sus siguientes parámetros:

- permission : Contiene el nombre del permiso necesario para ser visible
- url : La url (si aplica) que usará al hacer clic
- options : Opciones de la etiqueta, tal como se usa en `Html::(options[])`
- link : Configuración de la etiqueta interna `<a></a>`
  - content : Contenido de la etiqueta
  - options : Opciones de la etiqueta, tal como se usa en `Html::(options[])`

Un ejemplo de aplicación sería el siguiente:
```php
<?= $this->render('//layouts/_fab', [
            'buttons' => [
                [
                    'permission' => 'createClient',
                    'link' => [
                        'options' => [
                            'class' => 'mdi mdi-add'
                        ]
                    ],
                    'url' => Url::to(['create']),
                    'options' => [
                        'class' => 'btn-floating cyan tooltipped',
                        'data-position' => 'bottom',
                        'data-delay' => '1000',
                        'data-tooltip' => Yii::t('app', 'Add')
                    ]
                ]
            ]
        ]) ?>
```

Aquí se describe un botón que ocupa el permiso de **crear cliente**, se le da la URL del controlador para la acción de creación, las opciones de la etiqueta, así como las opciones de la etiqueta de enlace.
