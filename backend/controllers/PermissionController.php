<?php

namespace backend\controllers;

use app\models\AuthItem;
use common\models\AuthItemSearch;
use Yii;
use yii\web\Controller;

class PermissionController extends Controller
{
    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionDelete()
    {
        return $this->render('delete');
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
        return $this->render('view');
    }

}
