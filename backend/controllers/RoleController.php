<?php

namespace backend\controllers;

use backend\models\FormRole;
use common\models\RbacRole;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class RoleController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' =>  AccessControl::className(),
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


    public function actionCreate()
    {
        $form = new FormRole();
        if($form->load(Yii::$app->request->post()) && $model = $form->saveRole()){
            return $this->redirect(['view', 'name' => $form->name]);
        }
        return $this->render('create',[
            'model' => $form
        ]);
    }

    public function actionDelete($name)
    {
        if (RbacRole::delete($name))
            return $this->redirect(['role/index']);
        else
            return $this->redirect(['role/error']);
    }

    public function actionIndex()
    {
        $model = RbacRole::getArrayDataProvider();
        return $this->render('index', [
            'model'=> $model
        ]);
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

    public function actionView()
    {
        $model = RbacRole::getRole(Yii::$app->getRequest()->getQueryParam('name'));
        return $this->render('view', [
            'model' => $model
        ]);
    }

}
