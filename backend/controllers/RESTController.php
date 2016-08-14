<?php

namespace backend\controllers;

use yii\rest\ActiveController;

class RESTController extends ActiveController
{
    public function actionGet()
    {
        return $this->render('get');
    }

}
