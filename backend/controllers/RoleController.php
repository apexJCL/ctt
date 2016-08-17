<?php

namespace backend\controllers;

use app\models\AuthItem;
use common\models\AuthItemSearch;
use common\models\FormRole;
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


    /**
     * @param $name
     * @return \yii\web\Response
     */
    public function actionDelete($name)
    {
        if (AuthItem::deleteRole($name))
            return $this->redirect(['role/index']);
        else
            return $this->redirect(['role/error']);
    }

    public function actionIndex()
    {
        $sm = AuthItemSearch::newRoleSearch();
        $dp = $sm->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dp,
            'searchModel' => $sm
        ]);
    }

    public function actionCreate()
    {
        $form = new FormRole();
        if ($form->load(Yii::$app->request->post()) && $form->saveRole()) {
            return $this->redirect(['view', 'name' => $form->name]);
        }
        return $this->render('create', [
            'model' => $form
        ]);
    }

    public function actionUpdate()
    {
        $form = FormRole::getRole(Yii::$app->getRequest()->getQueryParam('name'));
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
        if (!empty($name) && $role = AuthItem::getRole($name)){
                return $this->render('children', [
                    'model' => $role
                ]);
        } else return $this->redirect(['site/error']);
    }

    public function actionView()
    {
        $model = AuthItem::getRole(Yii::$app->getRequest()->getQueryParam('name'));
        return $this->render('view', [
            'model' => $model
        ]);
    }

}
