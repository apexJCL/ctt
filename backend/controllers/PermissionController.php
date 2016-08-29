<?php

namespace backend\controllers;

use backend\models\AuthItem;
use backend\models\AuthItemSearch;
use common\models\AuthItemForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class PermissionController extends Controller
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


    public function actionCreate()
    {
        $form = new AuthItemForm();
        if ($form->load(Yii::$app->request->post()) && $form->savePermission()){
            return $this->redirect(['view', 'name' => $form->name]);
        }
        return $this->render('create', [
            'model' => $form
        ]);
    }

    public function actionDelete($name)
    {
        if (AuthItem::deletePermission($name))
            return $this->redirect(['index']);
        else
            return $this->redirect(['site/error']);
    }

    public function actionIndex()
    {
        $sm = AuthItemSearch::newPermissionSearch();
        $dp = $sm->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $sm,
            'dataProvider' => $dp
        ]);
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

    public function actionView()
    {
        $model = AuthItemForm::getPermission(Yii::$app->getRequest()->getQueryParam('name'));
        return $this->render('view',[
            'model' => $model
        ]);
    }

}
