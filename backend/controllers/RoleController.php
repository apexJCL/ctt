<?php

namespace backend\controllers;

use common\models\Role;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class RoleController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['root']
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


    public function actionDelete($name)
    {
        if (Role::delete($name))
            return $this->redirect(['role/index']);
        else
            return $this->redirect(['role/error']);
    }

    public function actionIndex()
    {
        $model = Role::getArrayDataProvider();
        return $this->render('index', [
            'model' => $model
        ]);
    }

    public function actionCreate()
    {
        $form = new Role();
        if ($form->load(Yii::$app->request->post()) && $form->saveRole()) {
            return $this->redirect(['view', 'name' => $form->name]);
        }
        return $this->render('create', [
            'model' => $form
        ]);
    }

    public function actionUpdate()
    {
        $form = Role::getRole(Yii::$app->getRequest()->getQueryParam('name'));
        if ($form->load(Yii::$app->request->post()) && $form->saveRole()) {
            return $this->redirect(['view', 'name' => $form->name]);
        }
        return $this->render('update', [
            'model' => $form
        ]);
    }

    public function actionChildren()
    {
        $name = Yii::$app->getRequest()->getQueryParam('name');
        if (!empty($name) && $role = Role::getRole($name)){
                return $this->render('children', [
                    'model' => $role,
                    'roles' => Role::getRolesAsJson()
                ]);
        } else return $this->redirect(['site/error']);
    }

    public function actionView()
    {
        $model = Role::getRole(Yii::$app->getRequest()->getQueryParam('name'));
        return $this->render('view', [
            'model' => $model
        ]);
    }

}
