<?php

namespace backend\controllers;

use backend\models\AuthItem;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class AjaxController extends Controller
{
    public function actionAutocomplete()
    {
        if (!Yii::$app->request->isAjax){
            return $this->redirect(['site/error']);
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
        $parent = Yii::$app->request->getQueryParam('parent');
        $type = Yii::$app->request->getQueryParam('type');
        $result = AuthItem::getChildrenAutocomplete($parent, $type);
        return $result;
    }
}
